<?php

namespace App\Http\Controllers\Admin;

use App\Filters\ApplicantFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\ChangeStatusApplicantRequest;
use App\Http\Requests\Applicant\CreateFamilyInformationRequest;
use App\Http\Requests\Applicant\CreateVoucherRequest;
use App\Http\Requests\Applicant\UpdatePersonalInformationRequest;
use App\Models\Applicant;
use App\Models\ApplicantExam;
use App\Models\District;
use App\Models\Exam;
use App\Models\Municipality;
use App\Models\Province;
use App\Repositories\Applicant\ApplicantRepository;
use App\Repositories\ApplicantDocuments\ApplicantDocumentRepository;
use App\Repositories\ApplicantLog\ApplicantLogRepository;
use App\Repositories\FamilyInformation\FamilyInformationRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Nilambar\NepaliDate\NepaliDate;

class ApplicantController extends Controller
{
    //
    protected $applicantRepository, $log,  $applicantLogRepository, $filter, $familyInformationRepository, $applicantDocumentRepository;
    public function __construct(
        ApplicantRepository $applicantRepository,
        ApplicantLogRepository $applicantLogRepository,
        Log $log,
        ApplicantFilter $filter,
        FamilyInformationRepository $familyInformationRepository,
        ApplicantDocumentRepository $applicantDocumentRepository
    ) {
        $this->applicantRepository = $applicantRepository;
        $this->applicantLogRepository = $applicantLogRepository;
        $this->filter = $filter;
        $this->log = $log;
        $this->familyInformationRepository = $familyInformationRepository;
        $this->applicantDocumentRepository = $applicantDocumentRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('read', $this->applicantRepository->getModel());
        $applicants
            = Applicant::join('applicant_exam', 'applicant.id', '=', 'applicant_exam.applicant_id')
            ->distinct()
            ->select(['applicant.*', 'applicant_exam.status as applicant_exam_status', 'applicant_exam.created_at as applicant_exam_created_at']);

        $data = $request->all();
        $data['status'] = isset($data['status']) ? $data['status'] : 'NEW';
        $this->filter->applyFilters($applicants, $data);
        $applicants = $applicants->paginate(50);
        $provinces = Province::all();
        return view('admin.pages.applicant-list', compact('applicants', 'request', 'provinces'));
    }

    public function approve(Request $request)
    {
        $this->authorize('read', $this->applicantRepository->getModel());
        $applicants
            = Applicant::join('applicant_exam', 'applicant.id', '=', 'applicant_exam.applicant_id')
            ->distinct() // To ensure unique applicants
            ->select(['applicant.*', 'applicant_exam.status as applicant_exam_status', 'applicant_exam.created_at as applicant_exam_created_at']);

        $data = $request->all();
        $data['status'] = isset($data['status']) ? $data['status'] : 'APPROVE';
        $this->filter->applyFilters($applicants, $data);

        $applicants = $applicants->paginate(50);
        $provinces = Province::all();

        return view('admin.pages.applicant-list', compact('applicants', 'request', 'provinces'));
    }

    public function rejected(Request $request)
    {
        $this->authorize('read', $this->applicantRepository->getModel());
        $applicants
            = Applicant::join('applicant_exam', 'applicant.id', '=', 'applicant_exam.applicant_id')
            ->distinct()
            ->select(['applicant.*', 'applicant_exam.status as applicant_exam_status', 'applicant_exam.created_at as applicant_exam_created_at']);

        $data = $request->all();
        $data['status'] = isset($data['status']) ? $data['status'] : 'REJECTED';
        $this->filter->applyFilters($applicants, $data);

        $applicants = $applicants->paginate(50);
        $provinces = Province::all();

        return view('admin.pages.applicant-list', compact('applicants', 'provinces'));
    }

    public function admitList(Request $request)
    {
        $this->authorize('show', $this->applicantRepository->getModel());
        $applicants
            = Applicant::join('applicant_exam', 'applicant.id', '=', 'applicant_exam.applicant_id')
            ->distinct() // To ensure unique applicants
            ->select(['applicant.*', 'applicant_exam.status as applicant_exam_status', 'applicant_exam.created_at as applicant_exam_created_at', 'applicant_exam.symbol_number as symbol_number']);

        $data = $request->all();
        $data['status'] = isset($data['status']) ? $data['status'] : 'READY-FOR-ADMIT-CARD';
        $this->filter->applyFilters($applicants, $data);

        $applicants = $applicants->paginate(50);

        $isAdmit = true;
        $provinces = Province::all();
        return view('admin.pages.applicant-list', compact('applicants', 'isAdmit', 'provinces'));
    }


    public function show($id)
    {
        $this->authorize('show', $this->applicantRepository->getModel());
        $applicant = $this->applicantRepository->findById($id);
        $voucherData = null;
        $examData = null;
        if ($applicant) {
            $voucherData = ApplicantExam::all()->where('applicant_id', $applicant->id)->first();
            $examData = ApplicantExam::all()->where('applicant_id', $applicant->id);
        }
        return view('admin.pages.admin.profile', compact('applicant', 'voucherData', 'examData'));
    }

    public function format($id)
    {
        $this->authorize('show', $this->applicantRepository->getModel());
        $applicant = $this->applicantRepository->findById($id);
        $voucherData = null;
        $exam = null;
        $exam_name = null;
        $exam = ApplicantExam::all()->where('applicant_id', $applicant->id)->where('status', 'GENERATED')->first();
        if ($exam)
            $exam_name = Exam::all()->where('id', $exam->exam_id)->first();
        if ($applicant)
            $voucherData = ApplicantExam::all()->where('applicant_id', $applicant->id)->first();
        return view('admin.pages.admin.applicant-format', compact('applicant', 'voucherData', 'exam', 'exam_name'));
    }

    public function status(ChangeStatusApplicantRequest $request, $id)
    {
        $this->authorize('status', $this->applicantRepository->getModel());
        $data = $request->all();
        $applicant = $this->applicantRepository->findById($id);
        $exam = Exam::all()->where('status', 'Open')->first();
        DB::beginTransaction();
        try {
            $applicant->exams()->updateExistingPivot($exam->id, ['status' => $data['status']]);
            $log['status'] = $data['status'];
            $log['state'] = 'UPDATED';
            $log['remarks'] = $data['remarks'];
            $log['applicant_id'] = $applicant->id;
            $log['created_by'] = Auth::user()->id;
            $this->logReport($log);
            DB::commit();
            session()->flash('success', 'Applicant have been approved.');
            return redirect()->route('applicant.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            DB::rollBack();
            return redirect()->back()->withInput();
        }
        return view('admin.pages.applicant.show', compact('applicant'));
    }

    public function admit($id)
    {
        $this->authorize('show', $this->applicantRepository->getModel());
        $applicant = $this->applicantRepository->findById($id);
        $exam = ApplicantExam::all()->where('applicant_id', $applicant->id)->where('status', 'GENERATED')->first();
        $exam_name = Exam::all()->where('id', $exam->exam_id)->first();
        return view('admin.pages.admin.admit-card', compact('applicant', 'exam', 'exam_name'));
    }


    public function generateAdmitCard()
    {
        $gregorianDate = Carbon::now();
        $nepaliYear = $gregorianDate->year + 57;
        $datas = ApplicantExam::all()->where('status', 'READY-FOR-ADMIT-CARD');
        $i = 0;
        foreach ($datas as $data) {
            $applicant_id = $data['applicant_id'];
            $data->update([
                'status' => 'GENERATED',
                'symbol_number' => '29' . '-' . $nepaliYear . '-' . str_pad(++$i, 3, "0", STR_PAD_LEFT),
            ]);
            $log['status'] = 'GENERATED';
            $log['state'] = 'ADMIT CARD';
            $log['remarks'] = 'ADMIT CARD HAS BEEN GENERATED';
            $log['applicant_id'] = $applicant_id;
            $log['created_by'] = Auth::user()->id;
        }
        session()->flash('success', 'Admit Card has been generated.');
        return redirect()->route('applicant.admit.list');
    }

    public function logReport($data)
    {
        try {
            $this->applicantLogRepository->create($data);
        } catch (Exception $e) {
            // Log or handle the exception as needed
            // You can log the error message or perform other actions here
            // Example: Log::error('Error in logReport: ' . $e->getMessage());
        }
    }

    public function centerDataIndex()
    {
        $exam = Exam::latest('created_at')->first();
        $applicants = ApplicantExam::all()->where('exam_id', $exam->id)->where('status', 'GENERATED');
        return view('admin.pages.admin.center', compact('applicants', 'exam'));
    }


    public function exportCsv()
    {
        $fileName = 'StudentList.csv';


        $exam = Exam::latest('created_at')->first();
        $tasks = ApplicantExam::all()->where('exam_id', $exam->id);



        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array(
            'registration_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'update_by', 'deleted_by',
            'first_name',
            'middle_name',
            'last_name',
            'symbol_number', 'gender', 'program', 'level', 'photo_link',
            'barcode', 'exam_center', 'vdc_municipality_english', 'phone_id', 'DOB', 'year_dob_nepali_data', 'month_dob_nepali_data',
            'day_dob_nepali_data', 'student_signature', 'collage', 'webcam', 'thumb', 'thumb2', 'email',
            'phone_no', 'result', 'percentage', 'year', 'month'
        );

        $callback = function () use ($tasks, $columns) {

            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($tasks as $key => $task) {
                dd($task->applicant->name);
                $row['S.N.'] = ++$key;
                $row['Symbol Number'] = $task->symbol_number;
                $row['Student Name Nepali'] = $task->applicant->full_name_nepali;
                $row['Student Name English'] = $task->applicant->full_name_english;
                $row['gender']    = $task->applicant->gender;
                $row['Mother Name']    = $task->applicant->familyInformation->mother_name;


                $row['updated_at'] = "2023-02-03 09:51:53";
                $row['deleted_at'] = null;
                $row['created_by'] = 1;
                $row['updated_by'] = 1;
                $row['deleted_by'] = 0;
                $row['first_name']  = $task->first_name;
                $row['middle_name']  =  $task->middle_name;
                $row['last_name']  = $task->last_name;
                $row['symbol']    = $task->symbol_number;
                $row['gender']    = $task->sex;
                $row['program']  = $task->name;
                $row['level'] = $task->level_name;
                $row['photo_link'] = 'http://103.175.192.52/storage/documents/' . $task->profile_picture;
                $row['bar_code'] = null;
                $row['exam_center'] = null;
                $row['vdc'] = $task->vdc_municiplality;
                $row['phone_id'] = null;
                $row['dob']    = $task->dob_nep;
                $row['year_dob_nepali_data'] = null;
                $row['month_dob_nepali_data'] = null;
                $row['day_dob_nepali_data'] = null;
                $row['student_signature'] = null;
                $row['collage'] = null;
                $row['webcam'] = null;
                $row['thumb'] = null;
                $row['thumb2'] = null;
                $row['email'] = $task->email;
                $row['phone_no'] = $task->phone_number;
                $row['result'] = null;
                $row['percentage'] = null;
                $row['year'] = null;
                $row['month'] = null;


                fputcsv($file, array(
                    $row['registration_id'],
                    $row['created_at'],
                    $row['updated_at'],
                    $row['deleted_at'],
                    $row['created_by'],
                    $row['updated_by'],
                    $row['deleted_by'],
                    $row['first_name'],
                    $row['middle_name'],
                    $row['last_name'],
                    $row['symbol'],
                    $row['gender'],
                    $row['program'],
                    $row['level'],
                    $row['photo_link'],
                    $row['bar_code'],
                    $row['exam_center'],
                    $row['vdc'],
                    $row['phone_id'],
                    $row['dob'],
                    $row['year_dob_nepali_data'],
                    $row['month_dob_nepali_data'],
                    $row['day_dob_nepali_data'],
                    $row['student_signature'],
                    $row['collage'],
                    $row['webcam'],
                    $row['thumb'],
                    $row['thumb2'],
                    $row['email'],
                    $row['phone_no'],
                    $row['result'],
                    $row['percentage'],
                    $row['year'],
                    $row['month']
                ));
            }


            fclose($file);
        };


        return response()->stream($callback, 200, $headers);
    }


    public function personalDetailIndex($id)
    {
        $applicant = $this->applicantRepository->findById($id);
        $data = $applicant->documents->where('type', 'PERSONAL');
        $districts = District::all();
        $provinces = Province::all();
        $municipalities = Municipality::all();
        return view('admin.pages.admin.personal-detail', compact('applicant', 'data', 'districts', 'provinces', 'municipalities'));
    }

    public function familyDetailIndex($id)
    {
        $applicant = $this->applicantRepository->findById($id);
        $data = $applicant->familyInformation;
        return view('admin.pages.admin.family-detail', compact('data'));
    }


    public function familyDetailUpdate(CreateFamilyInformationRequest $createFamilyInformation, $id)
    {
        $data = $createFamilyInformation->all();
        try {
            $guardian = $this->familyInformationRepository->update($data, $id);
            if (!$guardian) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Family Information updated successfully');
            return redirect()->route('applicant.show', ['id' => $guardian->applicant_id]);
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function personalDetailUpdate(UpdatePersonalInformationRequest $createPersonalInformation, $id)
    {

        $data = $createPersonalInformation->all();
        $obj = new NepaliDate();
        $dateComponents = explode('-', $data['dob_nepali']);
        $year = $dateComponents[0];
        $month = $dateComponents[1];
        $day = $dateComponents[2];
        $dob_english = $obj->convertBsToAd($year, $month, $day);
        $date = \Carbon\Carbon::create(
            $dob_english['year'],
            $dob_english['month'],
            $dob_english['day']
        );
        $data['dob_english'] = $date->format('Y-m-d');
        DB::beginTransaction();
        try {
            $personalData = $this->applicantRepository->findById($id);

            if (!$personalData) {
                session()->flash('danger', 'Applicant Data not found.');
                DB::rollBack(); // Rollback the transaction
                return redirect()->back()->withInput();
            }

            $personalData->update($data);

            // Update the associated documents
            foreach ($data as $key => $value) {
                if ($personalData->documents->where('document_name', $key)->first()) {
                    $personalData->documents->where('document_name', $key)->first()->update(['path' => $value]);
                }
            }
            session()->flash('success', 'Applicant Personal Data updated successfully');
            DB::commit();
            return redirect()->route('applicant.show', ['id' => $id]);
        } catch (Exception $e) {
            dd($e);
            session()->flash('danger', 'Oops! Something went wrong.');
            DB::rollBack();
            return redirect()->back()->withInput();
        }
    }


    public function voucherEdit($id)
    {
        $provinces = Province::all()->where('status', 'active');
        $voucherData =  ApplicantExam::all()->where('id', $id)->first();
        $voucher = $this->applicantDocumentRepository->getAll()->where('applicant_id', $voucherData->applicant_id)->where('document_name', 'voucher')->first();
        return view('admin.pages.admin.voucher-detail', compact('provinces', 'voucherData', 'voucher'));
    }

    public function voucherUpdate(CreateVoucherRequest $request, $id)
    {
        $data = $request->all();
        $applicant = $this->applicantRepository->findById($id);
        $exam = Exam::all()->where('status', 'Open')->first();
        DB::beginTransaction();
        try {

            // If attached, update the document path for the existing attachment.
            $existingAttachment = $applicant->documents->where('exam_id', $exam->id)->first();
            $existingAttachment->update(['path' => $data['voucher']]);

            $applicant->exams()->updateExistingPivot($exam->id, ['name' => $data['name'], 'contact_number' => $data['contact_number'], 'bank_name' => $data['bank_name'], 'province_id' => $data['province_id'], 'total_amount' => $data['total_amount'], 'updated_at' => now()]);

            session()->flash('success', 'Exam application has been updated.');
            DB::commit();
            return redirect()->route('dashboard');
        } catch (Exception $e) {
            dd($e);
            session()->flash('danger', 'Oops! Something went wrong.');
            DB::rollBack();
            return redirect()->back()->withInput();
        }
    }
}
