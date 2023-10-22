<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicantExam;
use App\Models\Exam;
use App\Models\Province;
use App\Repositories\Applicant\ApplicantRepository;
use App\Repositories\ApplicantDocuments\ApplicantDocumentRepository;
use App\Repositories\FamilyInformation\FamilyInformationRepository;
use App\Repositories\Qualification\QualificationRepository;
use App\Repositories\User\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    protected $userRepository, $applicantRepository, $familyInformationRepository, $applicantDocumentRepository, $qualificationRepository;

    public function __construct(
        UserRepository $userRepository,
        ApplicantRepository $applicantRepository,
        FamilyInformationRepository $familyInformationRepository,
        ApplicantDocumentRepository $applicantDocumentRepository,
        QualificationRepository $qualificationRepository,
    ) {
        $this->userRepository = $userRepository;
        $this->applicantRepository = $applicantRepository;
        $this->familyInformationRepository = $familyInformationRepository;
        $this->applicantDocumentRepository = $applicantDocumentRepository;
        $this->qualificationRepository = $qualificationRepository;
    }


    public function index()
    {
        $role = Auth::user()->mainRole() ? Auth::user()->mainRole()->name : 'default';
        switch ($role) {
            case 'admin':
                $applicant = $this->applicantRepository->getAll();
                $exams = Exam::all()->whereIn('status', ['Open', 'applicant_applied'])->first();
                $applicant_exam = null;
                if ($exams)
                    $applicant_exam = ApplicantExam::all()->where('exam_id', $exams->id);
                return view('admin.dashboard.admin', compact('exams', 'applicant', 'applicant_exam'));
                break;
            case 'secretary':
                $applicant = $this->applicantRepository->getAll();
                $exams = Exam::all()->whereIn('status', ['Open'])->first();
                $applicant_exam = null;
                if ($exams)
                    $applicant_exam = ApplicantExam::all()->where('exam_id', $exams->id);
                return view('admin.dashboard.admin', compact('exams', 'applicant', 'applicant_exam'));
                break;
            case 'applicant':
                if (Auth::user()->applicant) {
                    $applicant = Auth::user()->applicant;
                    $voucherData = null;
                    if ($applicant)
                        $voucherData = ApplicantExam::all()->where('applicant_id', $applicant->id)->where('status', '!=', 'FAILED')->first();
                    $voucher = $this->applicantDocumentRepository->getAll()->where('applicant_id', $applicant->id)->where('document_name', 'voucher')->first();
                    $provinces = Province::all();
                    return view('admin.dashboard.applicant', compact('applicant', 'voucher', 'voucherData', 'provinces'));
                } else {
                    // Handle the case where there is no associated applicant
                    // For example, you can set a default value or display an error message
                    $applicant = null; // or any other appropriate action
                    $voucher = null; // or any other appropriate action
                    $provinces = Province::all();
                    $exam = Exam::all()->whereIn('status', ['Open'])->first();
                    return view('admin.dashboard.applicant', compact('applicant', 'voucher', 'exam', 'provinces'));
                }

                break;

            default:
                return $this->view('dashboard.default');
                break;
        }
    }

    public function profile()
    {
        $applicant = Auth::user()->applicant;
        return view('admin.pages.applicant.profile', compact('applicant'));
    }
}
