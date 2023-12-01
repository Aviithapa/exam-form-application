<?php

namespace App\Http\Controllers\Admin;

use App\Filters\ApplicantFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\ChangeStatusApplicantRequest;
use App\Http\Requests\Applicant\CreateFamilyInformationRequest;
use App\Http\Requests\Applicant\CreateVoucherRequest;
use App\Http\Requests\Applicant\UpdatePersonalInformationRequest;
use App\Models\Applicant;
use App\Models\ApplicantDocuments;
use App\Models\ApplicantExam;
use App\Models\District;
use App\Models\Exam;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\University;
use App\Repositories\Applicant\ApplicantRepository;
use App\Repositories\ApplicantDocuments\ApplicantDocumentRepository;
use App\Repositories\ApplicantLog\ApplicantLogRepository;
use App\Repositories\FamilyInformation\FamilyInformationRepository;
use App\Repositories\Qualification\QualificationRepository;
use App\Services\Export\ExportService;
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
    protected $applicantRepository, $log,
        $applicantLogRepository, $filter,
        $familyInformationRepository,
        $applicantDocumentRepository, $exportService, $qualificationRepository;
    public function __construct(
        ApplicantRepository $applicantRepository,
        ApplicantLogRepository $applicantLogRepository,
        Log $log,
        ApplicantFilter $filter,
        FamilyInformationRepository $familyInformationRepository,
        ApplicantDocumentRepository $applicantDocumentRepository,
        ExportService $exportService,
        QualificationRepository $qualificationRepository
    ) {
        $this->applicantRepository = $applicantRepository;
        $this->applicantLogRepository = $applicantLogRepository;
        $this->filter = $filter;
        $this->log = $log;
        $this->familyInformationRepository = $familyInformationRepository;
        $this->applicantDocumentRepository = $applicantDocumentRepository;
        $this->exportService = $exportService;
        $this->qualificationRepository = $qualificationRepository;
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


    public function exportCsv($id)
    {
        $fileName = 'StudentList.csv';

        $tasks = ApplicantExam::all()->where('exam_id', $id)->where('status', '!=', 'REJECTED');

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array(
            'S.N.',  'Symbol Number', 'Student Name Nepali', 'Student Name English',
            'Qualification', 'Exam Center',
            'gender', 'Mother Name Nepali', 'Mother Name English', 'Father Name Nepali', 'Father Name English',
            'District', 'Municipality',
            'Ward No', 'Province', 'Date of Birth', 'Citizenship Number',   'Contact Number', 'Bank Name', 'Working', 'Collage', 'University Name'
        );



        $callback = function () use ($tasks, $columns) {
            $this->exportService->generateStudentCsv($tasks, $columns);
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

    public function qualificationDetailIndex($id)
    {
        $model = $this->qualificationRepository->findById($id);
        $university = University::all();
        return view('admin.pages.admin.qualification', compact('model'));
    }

    public function qualificationDetailUpdate(Request $createExamRequest, $id)
    {
        // $this->authorize('update', $this->qualificationRepository->getModel());
        $data = $createExamRequest->all();
        DB::beginTransaction();

        try {
            $data = $createExamRequest->all();
            $qualification = $this->qualificationRepository->findById($id);

            if (!$qualification) {
                session()->flash('danger', 'Qualification not found.');
                DB::rollBack(); // Rollback the transaction
                return redirect()->back()->withInput();
            }

            $qualification->update($data);

            // Update the associated documents
            foreach ($data as $key => $value) {
                if ($qualification->documents->where('document_name', $key)->first()) {
                    $qualification->documents->where('document_name', $key)->first()->update(['path' => $value]);
                } else {

                    // Define the types based on the keys in $data
                    $documentTypes = null;


                    if ($data['provisional']) {
                        $documentTypes['provisional'] = $data['type'];
                    }

                    if ($data['character']) {
                        $documentTypes['character'] = $data['type'];
                    }

                    if ($data['transcript']) {
                        $documentTypes['transcript'] = $data['type'];
                    }

                    if ($data['transcript_add']) {
                        $documentTypes['transcript_add'] = $data['type'];
                    }

                    if ($data['transcript_additional']) {
                        $documentTypes['transcript_additional'] = $data['type'];
                    }

                    if ($data['equivalence']) {
                        $documentTypes['equivalence'] = $data['type'];
                    }


                    if ($data['licence']) {
                        $documentTypes['licence'] = $data['type'];
                    }


                    // Check if the key exists in the $documentTypes array
                    if (array_key_exists($key, $documentTypes)) {

                        // Create a new document record
                        $document = new ApplicantDocuments();
                        $document->document_name = $key;
                        $document->path = $value;
                        $document->applicant_id = $qualification->applicant_id;
                        $document->qualification_id = $qualification->id;
                        $document->type = $documentTypes[$key];
                        $document->save();
                    }
                }
            }

            $log['status'] = $data['type'];
            $log['state'] = $data['type'] . ' ADDED';
            $log['remarks'] = $data['type'] . 'QUALIFICATION DETAILS ADDED';
            $log['applicant_id'] = $qualification->applicant_id;
            $log['created_by'] = Auth::user()->id;
            $this->logReport($log);

            session()->flash('success', 'Qualification has been  updated successfully');
            DB::commit(); // Commit the transaction
            return redirect()->route('applicant.show', ['id' => $qualification->applicant_id]);
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            DB::rollBack(); // Rollback the transaction
            return redirect()->back()->withInput();
        }
    }
}
