<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\ApplicantDocuments;
use App\Models\University;
use App\Repositories\ApplicantDocuments\ApplicantDocumentRepository;
use App\Repositories\ApplicantLog\ApplicantLogRepository;
use App\Repositories\Qualification\QualificationRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QualificationController extends Controller
{
    //
    protected $qualificationRepository, $log, $applicantDocumentRepository, $applicantLogRepository;

    public function __construct(
        QualificationRepository $qualificationRepository,
        ApplicantDocumentRepository $applicantDocumentRepository,
        ApplicantLogRepository $applicantLogRepository,
        Log $log
    ) {
        $this->qualificationRepository = $qualificationRepository;
        $this->applicantDocumentRepository = $applicantDocumentRepository;
        $this->applicantLogRepository = $applicantLogRepository;
        $this->log = $log;
    }


    public function index()
    {
        // $this->authorize('read', $this->qualificationRepository->getModel());
        $qualifications =  $this->qualificationRepository->getAll()->where('applicant_id', Auth::user()->applicant->id);
        return view('admin.pages.applicant.qualification.index', compact('qualifications'));
    }

    public function create()
    {
        // $this->authorize('create', $this->qualificationRepository->getModel());
        $university = University::all();
        return view('admin.pages.applicant.qualification.create', compact('university'));
    }

    public function store(Request $createExamRequest)
    {

        // $this->authorize('create', $this->qualificationRepository->getModel());
        $data = $createExamRequest->all();

        $applicant = Auth::user()->applicant;
        $data['applicant_id'] = $applicant->id;
        DB::beginTransaction();
        try {
            $qualification = $this->qualificationRepository->create($data);
            if ($qualification == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            foreach ($data as $key => $value) {
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
                    $document->applicant_id = $applicant->id;
                    $document->qualification_id = $qualification->id;
                    $document->type = $documentTypes[$key];
                    $document->save();
                }
            }

            $log['status'] = $data['type'];
            $log['state'] = $data['type'] . ' ADDED';
            $log['remarks'] = $data['type'] . 'QUALIFICATION DETAILS ADDED';
            $log['applicant_id'] = $applicant->id;
            $log['created_by'] = Auth::user()->id;
            $this->logReport($log);
            DB::commit();
            session()->flash('success', 'Qualification has been created successfully');
            return redirect()->route('voucher.index');
        } catch (Exception $e) {
            dd($e);
            session()->flash('danger', 'Oops! Something went wrong.');
            DB::rollBack();
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        // $this->authorize('edit', $this->qualificationRepository->getModel());
        $qualification = $this->qualificationRepository->findById($id);
        $university = University::all();
        return view('admin.pages.applicant.qualification.edit', compact('qualification', 'university'));
    }

    public function update(Request $createExamRequest, $id)
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
            return redirect()->route('qualification.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            DB::rollBack(); // Rollback the transaction
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $this->authorize('update', $this->qualificationRepository->getModel());
        try {
            $exam = $this->qualificationRepository->findById($id);

            if (!$exam) {
                session()->flash('danger', 'Oops! Exam Not Found.');
                return redirect()->back()->withInput();
            }

            // if ($exam->applicant->count() > 0) {
            //     session()->flash('danger', 'Student have registrated for the exam .');
            //     return redirect()->back()->withInput();
            // }
            $exam->delete();
            session()->flash('success', 'Qualification removed successfully.');
            return redirect()->route('qualification.index');
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
