<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicantDocuments;
use App\Repositories\ApplicantDocuments\ApplicantDocumentRepository;
use App\Repositories\ApplicantLog\ApplicantLogRepository;
use App\Repositories\University\UniversityRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UniversityController extends Controller
{
    //
    protected $universityRepository, $log;

    public function __construct(
        UniversityRepository $universityRepository,
        Log $log
    ) {
        $this->universityRepository = $universityRepository;
        $this->log = $log;
    }


    public function index()
    {
        $university =  $this->universityRepository->getAll();
        return view('admin.pages.university.index', compact('university'));
    }

    public function create()
    {
        // $this->authorize('create', $this->universityRepository->getModel());
        return view('admin.pages.university.create');
    }

    public function store(Request $createExamRequest)
    {

        $data = $createExamRequest->all();
        try {
            $university = $this->universityRepository->create($data);
            if ($university == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'university has been created successfully');
            return redirect()->route('university.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        // $this->authorize('edit', $this->universityRepository->getModel());
        $university = $this->universityRepository->findById($id);
        return view('admin.pages.university.edit', compact('university'));
    }

    public function update(Request $createExamRequest, $id)
    {
        // $this->authorize('update', $this->universityRepository->getModel());
        $data = $createExamRequest->all();
        DB::beginTransaction();

        try {
            $data = $createExamRequest->all();
            $university = $this->universityRepository->findById($id);

            $university->update($data);

            session()->flash('success', 'university has been  updated successfully');
            DB::commit(); // Commit the transaction
            return redirect()->route('university.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            DB::rollBack(); // Rollback the transaction
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        // $this->authorize('update', $this->universityRepository->getModel());
        try {
            $exam = $this->universityRepository->findById($id);

            if (!$exam) {
                session()->flash('danger', 'Oops! Exam Not Found.');
                return redirect()->back()->withInput();
            }
            $exam->delete();
            session()->flash('success', 'university removed successfully.');
            return redirect()->route('university.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
}
