<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Exam\CreateExamRequest;
use App\Repositories\Exam\ExamRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExamController extends Controller
{
    //
    protected $examRepository, $log;

    public function __construct(ExamRepository $examRepository, Log $log)
    {
        $this->examRepository = $examRepository;
        $this->log = $log;
    }


    public function index()
    {
        $this->authorize('read', $this->examRepository->getModel());
        $exams =  $this->examRepository->getAll();
        return view('admin.pages.exam.index', compact('exams'));
    }

    public function create()
    {
        $this->authorize('create', $this->examRepository->getModel());
        return view('admin.pages.exam.create');
    }

    public function store(CreateExamRequest $createExamRequest)
    {

        $this->authorize('create', $this->examRepository->getModel());
        $data = $createExamRequest->all();
        try {
            $banner = $this->examRepository->create($data);
            if ($banner == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Exam created successfully');
            return redirect()->route('dashboard.exam.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $this->authorize('edit', $this->examRepository->getModel());
        $exam = $this->examRepository->findById($id);
        return view('admin.pages.exam.edit', compact('exam'));
    }

    public function update(Request $createExamRequest, $id)
    {
        $this->authorize('update', $this->examRepository->getModel());
        $data = $createExamRequest->all();
        try {
            $banner = $this->examRepository->update($data, $id);
            if ($banner == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Exam updated successfully');
            return redirect()->route('dashboard.exam.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $this->authorize('update', $this->examRepository->getModel());
        try {
            $exam = $this->examRepository->findById($id);

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
            return redirect()->route('dashboard.exam.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
}
