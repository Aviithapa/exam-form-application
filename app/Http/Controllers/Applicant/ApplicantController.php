<?php

namespace App\Http\Controllers\Applicant;

use App\Enums\DocumentTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\CreateFamilyInformationRequest;
use App\Http\Requests\Applicant\CreatePersonalInformation;
use App\Http\Requests\Applicant\CreateVoucherRequest;
use App\Http\Requests\Applicant\UpdatePersonalInformationRequest;
use App\Models\ApplicantDocuments;
use App\Models\District;
use App\Models\Exam;
use App\Models\Municipality;
use App\Models\Province;
use App\Repositories\Applicant\ApplicantRepository;
use App\Repositories\ApplicantDocuments\ApplicantDocumentRepository;
use App\Repositories\ApplicantLog\ApplicantLogRepository;
use App\Repositories\FamilyInformation\FamilyInformationRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $applicant = Auth::user()->applicant;
        $data = $applicant->documents->where('type', 'PERSONAL');
        $districts = District::all();
        $provinces = Province::all();
        $municipalities = Municipality::all();
        return view('admin.pages.applicant.personal-detail-form', compact('applicant', 'data', 'districts', 'provinces', 'municipalities'));
    }

    public function guardianForm()
    {
        $data = Auth::user()->applicant->familyInformation;
        return view('admin.pages.applicant.guardian-form', compact('data'));
    }

    public function qualificationForm()
    {
        return view('admin.pages.applicant.qualification.index');
    }

    public function personalInformation(CreatePersonalInformation $createPersonalInformation)
    {
        $data = $createPersonalInformation->all();
        DB::beginTransaction();
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
            DB::commit();
            session()->flash('success', 'Exam created successfully');
            return redirect()->route('student.guardianForm');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }


    public function personalInformationUpdate(UpdatePersonalInformationRequest $createPersonalInformation, $id)
    {

        $data = $createPersonalInformation->all();
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
            return redirect()->route('student.guardianForm');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            DB::rollBack();
            return redirect()->back()->withInput();
        }
    }

    public function guardianInformation(CreateFamilyInformationRequest $createFamilyInformation)
    {
        $data = $createFamilyInformation->all();
        $applicant = Auth::user()->applicant;
        $data['applicant_id'] = $applicant->id;
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
            session()->flash('success', 'Family Information created successfully');
            return redirect()->route('qualification.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function guardianInformationUpdate(CreateFamilyInformationRequest $createFamilyInformation, $id)
    {
        $data = $createFamilyInformation->all();
        $applicant = Auth::user()->applicant;
        $data['applicant_id'] = $applicant->id;
        try {
            $guardian = $this->familyInformationRepository->update($data, $id);
            if (!$applicant) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $log['status'] = 'Updated';
            $log['state'] = 'FILLED';
            $log['remarks'] = 'Family Information updated by the student';
            $log['applicant_id'] = $applicant->id;
            $this->logReport($log);
            session()->flash('success', 'Family Information updated successfully');
            return redirect()->route('qualification.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }


    public function applyExam(CreateVoucherRequest $request)
    {
        $data = $request->all();
        $applicant = Auth::user()->applicant;
        $exam = Exam::all()->where('status', 'Open')->first();
        DB::beginTransaction();
        try {
            // Check if the applicant is already attached to the exam.
            if ($applicant->exams->contains($exam)) {
                // If attached, update the document path for the existing attachment.
                $existingAttachment = $applicant->documents->where('exam_id', $exam->id)->first();
                $existingAttachment->update(['path' => $data['voucher']]);
            } else {
                // If not attached, create a new attachment.
                $document = new ApplicantDocuments();
                $document->document_name = 'voucher';
                $document->path = $data['voucher'];
                $document->applicant_id = $applicant->id;
                $document->exam_id = $exam->id;
                $document->type = DocumentTypeEnum::VOUCHER;
                $document->save();
                $applicant->exams()->attach($exam);
            }
            DB::commit();
            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            DB::rollBack();
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
