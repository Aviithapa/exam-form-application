<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\ChangeStatusApplicantRequest;
use App\Repositories\Applicant\ApplicantRepository;
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
        $exams =  $this->applicantRepository->getAll();
        return view('admin.pages.applicant.index', compact('exams'));
    }

    public function show($id)
    {
        $this->authorize('show', $this->applicantRepository->getModel());
        $applicant = $this->applicantRepository->findById($id);
        return view('admin.pages.applicant.show', compact('applicant'));
    }

    public function status(ChangeStatusApplicantRequest $request, $id)
    {
        $this->authorize('update', $this->applicantRepository->getModel());
        $applicant = $this->applicantRepository->findById($id);
        return view('admin.pages.applicant.show', compact('applicant'));
    }
}
