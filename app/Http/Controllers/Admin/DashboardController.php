<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Repositories\Applicant\ApplicantRepository;
use App\Repositories\ApplicantDocuments\ApplicantDocumentRepository;
use App\Repositories\FamilyInformation\FamilyInformationRepository;
use App\Repositories\Qualification\QualificationRepository;
use App\Repositories\User\UserRepository;
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
                $exams = Exam::orderBy('created_at', 'desc')
                    ->paginate(10);
                return view('admin.dashboard.admin', compact('exams', 'applicant'));
                break;
            case 'applicant':
                $applicant_id = Auth::user()->applicant->id;
                $applicant = $this->applicantRepository->findById($applicant_id);
                $voucher = $this->applicantDocumentRepository->getAll()->where('applicant_id', $applicant_id)->where('document_name', 'voucher')->first();
                return view('admin.dashboard.applicant', compact('applicant', 'voucher'));
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
