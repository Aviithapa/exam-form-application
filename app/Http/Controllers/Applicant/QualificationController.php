<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\ApplicantDocuments;
use App\Repositories\ApplicantDocuments\ApplicantDocumentRepository;
use App\Repositories\Qualification\QualificationRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QualificationController extends Controller
{
    //
    protected $qualificationRepository, $log, $applicantDocumentRepository;

    public function __construct(QualificationRepository $qualificationRepository, ApplicantDocumentRepository $applicantDocumentRepository, Log $log)
    {
        $this->qualificationRepository = $qualificationRepository;
        $this->applicantDocumentRepository = $applicantDocumentRepository;
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
        return view('admin.pages.applicant.qualification.create');
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
                $documentTypes = [
                    'provisional' => $data['type'],
                    'character'  => $data['type'],
                    'transcript' => $data['type'],
                ];

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
            DB::commit();
            session()->flash('success', 'Exam created successfully');
            return redirect()->route('qualification.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            DB::rollBack();
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        // $this->authorize('edit', $this->qualificationRepository->getModel());
        $qualification = $this->qualificationRepository->findById($id);
        return view('admin.pages.applicant.qualification.edit', compact('qualification'));
    }

    public function update(Request $createExamRequest, $id)
    {
        // $this->authorize('update', $this->qualificationRepository->getModel());
        $data = $createExamRequest->all();
        try {
            $banner = $this->qualificationRepository->update($data, $id);
            if ($banner == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Exam updated successfully');
            return redirect()->route('qualification.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
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
            session()->flash('success', 'Exam updated successfully');
            return redirect()->route('qualification.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
}
