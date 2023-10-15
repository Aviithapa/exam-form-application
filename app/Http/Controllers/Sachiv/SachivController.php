<?php

namespace App\Http\Controllers\Sachiv;

use App\Filters\ApplicantFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\ChangeStatusApplicantRequest;
use App\Models\Applicant;
use App\Models\ApplicantExam;
use App\Models\Exam;
use App\Repositories\Applicant\ApplicantRepository;
use App\Repositories\ApplicantLog\ApplicantLogRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SachivController extends Controller
{
    //
    //
    protected $applicantRepository, $log,  $applicantLogRepository, $filter;
    public function __construct(ApplicantRepository $applicantRepository,  ApplicantLogRepository $applicantLogRepository, Log $log, ApplicantFilter $filter)
    {
        $this->applicantRepository = $applicantRepository;
        $this->applicantLogRepository = $applicantLogRepository;
        $this->log = $log;
        $this->filter = $filter;
    }

    public function index(Request $request)
    {
        $this->authorize('read', $this->applicantRepository->getModel());
        $applicants
            = Applicant::join('applicant_exam', 'applicant.id', '=', 'applicant_exam.applicant_id')
            ->distinct()
            ->select(['applicant.*', 'applicant_exam.status as applicant_exam_status', 'applicant_exam.created_at as applicant_exam_created_at']);

        $data = $request->all();
        $data['status'] = isset($data['status']) ? $data['status'] : 'PROGRESS';
        $this->filter->applyFilters($applicants, $data);
        $applicants = $applicants->paginate(50);

        return view('admin.sachiv.applicant-list', compact('applicants', 'request'));
    }


    public function show($id)
    {
        $this->authorize('show', $this->applicantRepository->getModel());
        $applicant = $this->applicantRepository->findById($id);
        $voucherData = null;
        if ($applicant)
            $voucherData = ApplicantExam::all()->where('applicant_id', $applicant->id)->first();
        return view('admin.sachiv.profile', compact('applicant', 'voucherData'));
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
            return redirect()->route('sachiv.applicant.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            DB::rollBack();
            return redirect()->back()->withInput();
        }
        return view('admin.pages.applicant.show', compact('applicant'));
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
