<?php

namespace App\Http\Controllers\Admin;

use App\Filters\ApplicantFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\ChangeStatusApplicantRequest;
use App\Models\Applicant;
use App\Models\ApplicantExam;
use App\Models\Exam;
use App\Repositories\Applicant\ApplicantRepository;
use App\Repositories\ApplicantLog\ApplicantLogRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApplicantController extends Controller
{
    //
    protected $applicantRepository, $log,  $applicantLogRepository, $filter;
    public function __construct(
        ApplicantRepository $applicantRepository,
        ApplicantLogRepository $applicantLogRepository,
        Log $log,
        ApplicantFilter $filter
    ) {
        $this->applicantRepository = $applicantRepository;
        $this->applicantLogRepository = $applicantLogRepository;
        $this->filter = $filter;
        $this->log = $log;
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

        $applicants = $applicants->paginate(5);


        return view('admin.pages.applicant-list', compact('applicants', 'request'));
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

        $applicants = $applicants->paginate(5);

        return view('admin.pages.applicant-list', compact('applicants', 'request'));
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

        $applicants = $applicants->paginate(5);

        return view('admin.pages.applicant-list', compact('applicants'));
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

        $applicants = $applicants->paginate(5);

        $isAdmit = true;
        return view('admin.pages.applicant-list', compact('applicants', 'isAdmit'));
    }


    public function show($id)
    {
        $this->authorize('show', $this->applicantRepository->getModel());
        $applicant = $this->applicantRepository->findById($id);
        $voucherData = null;
        if ($applicant)
            $voucherData = ApplicantExam::all()->where('applicant_id', $applicant->id)->first();
        return view('admin.pages.admin.profile', compact('applicant', 'voucherData'));
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
        return view('admin.pages.admin.admit-card', compact('applicant'));
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
}
