<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\ChangeStatusApplicantRequest;
use App\Models\Applicant;
use App\Models\Exam;
use App\Repositories\Applicant\ApplicantRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApplicantController extends Controller
{
    //
    protected $applicantRepository, $log;
    public function __construct(ApplicantRepository $applicantRepository, Log $log)
    {
        $this->applicantRepository = $applicantRepository;
        $this->log = $log;
    }

    public function index()
    {
        $this->authorize('read', $this->applicantRepository->getModel());
        $applicants
            = Applicant::join('applicant_exam', 'applicant.id', '=', 'applicant_exam.applicant_id')
            ->whereIn('applicant_exam.status', ['new', 'progress'])
            ->distinct() // To ensure unique applicants
            ->get(['applicant.*', 'applicant_exam.status as applicant_exam_status', 'applicant_exam.created_at as applicant_exam_created_at']);

        return view('admin.pages.applicant-list', compact('applicants'));
    }

    public function approve()
    {
        $this->authorize('read', $this->applicantRepository->getModel());
        $applicants
            = Applicant::join('applicant_exam', 'applicant.id', '=', 'applicant_exam.applicant_id')
            ->whereIn('applicant_exam.status', ['approved'])
            ->distinct() // To ensure unique applicants
            ->get(['applicant.*', 'applicant_exam.status as applicant_exam_status', 'applicant_exam.created_at as applicant_exam_created_at']);

        return view('admin.pages.applicant-list', compact('applicants'));
    }

    public function rejected()
    {
        $this->authorize('read', $this->applicantRepository->getModel());
        $applicants
            = Applicant::join('applicant_exam', 'applicant.id', '=', 'applicant_exam.applicant_id')
            ->whereIn('applicant_exam.status', ['rejected'])
            ->distinct() // To ensure unique applicants
            ->get(['applicant.*', 'applicant_exam.status as applicant_exam_status', 'applicant_exam.created_at as applicant_exam_created_at']);

        return view('admin.pages.applicant-list', compact('applicants'));
    }


    public function show($id)
    {
        $this->authorize('show', $this->applicantRepository->getModel());
        $applicant = $this->applicantRepository->findById($id);
        return view('admin.pages.admin.profile', compact('applicant'));
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
            DB::commit();
            return redirect()->route('applicant.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            DB::rollBack();
            return redirect()->back()->withInput();
        }
        return view('admin.pages.applicant.show', compact('applicant'));
    }
}
