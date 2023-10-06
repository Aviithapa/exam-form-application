<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\CreateFamilyInformationRequest;
use App\Http\Requests\Applicant\CreatePersonalInformation;
use App\Models\ApplicantDocuments;
use App\Repositories\Applicant\ApplicantRepository;
use App\Repositories\ApplicantDocuments\ApplicantDocumentRepository;
use App\Repositories\ApplicantLog\ApplicantLogRepository;
use App\Repositories\FamilyInformation\FamilyInformationRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class ApplicantController extends Controller
{
    //

    protected $applicantRepository, $log, $applicantLogRepository, $applicantDocumentRepository, $familyInformationRepository;
    public function __construct(
        ApplicantRepository $applicantRepository,
        Log $log,
        FamilyInformationRepository $familyInformationRepository,
        ApplicantDocumentRepository $applicantDocumentRepository,
        ApplicantLogRepository $applicantLogRepository
    ) {
        $this->applicantRepository = $applicantRepository;
        $this->familyInformationRepository = $familyInformationRepository;
        $this->applicantDocumentRepository = $applicantDocumentRepository;
        $this->applicantLogRepository = $applicantLogRepository;
        $this->log = $log;
    }

    public function personalForm()
    {
        return view('admin.pages.applicant.personal-detail-form');
    }

    public function guardianForm()
    {
        return view('admin.pages.applicant.guardian-form');
    }

    public function qualificationForm()
    {
        return view('admin.pages.applicant.qualification.index');
    }

    public function personalInformation(CreatePersonalInformation $createPersonalInformation)
    {
        $data = $createPersonalInformation->all();
        dd($data);
        try {
            $applicant = $this->applicantRepository->create($data);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }

            foreach ($data as $key => $value) {
                // Define the types based on the keys in $data
                $documentTypes = [
                    'citizenship_front' => 'PERSONAL',
                    'citizenship_back' => 'PERSONAL',
                    'profile' => 'PERSONAL',
                    'signature' => 'PERSONAL',
                ];

                // Check if the key exists in the $documentTypes array
                if (array_key_exists($key, $documentTypes)) {
                    // Create a new document record
                    $document = new ApplicantDocuments();
                    $document->document_name = $key;
                    $document->path = $value;
                    $document->applicant_id = $applicant->id;
                    $document->type = $documentTypes[$key];
                    $document->save();
                }
            }
            $log['status'] = 'Stored';
            $log['state'] = 'FILLED';
            $log['remarks'] = 'Personal Information added by the student';
            $log['applicant_id'] = $applicant->id;
            $this->logReport($log);
            session()->flash('success', 'Exam created successfully');
            return view('website.applicant.guardian-form', compact('applicant'));
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function guardianInformation(CreateFamilyInformationRequest $createFamilyInformation)
    {
        $data = $createFamilyInformation->all();
        try {
            $applicant = $this->applicantRepository->findById($data['applicant_id']);
            if (!$applicant) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $guardian = $this->familyInformationRepository->create($data);
            if (!$applicant) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }

            $log['status'] = 'Stored';
            $log['state'] = 'FILLED';
            $log['remarks'] = 'Family Information added by the student';
            $log['applicant_id'] = $applicant->id;
            $this->logReport($log);
            session()->flash('success', 'Exam created successfully');
            return view('website.applicant.qualification-index', compact('applicant'));
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
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
