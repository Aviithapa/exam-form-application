<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Province\ProvinceRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExamCenterController extends Controller
{
    //
    protected $provinceRepository, $log;

    public function __construct(ProvinceRepository $provinceRepository, Log $log)
    {
        $this->provinceRepository = $provinceRepository;
        $this->log = $log;
    }


    public function index()
    {
        // $this->authorize('read', $this->provinceRepository->getModel());
        $exams =  $this->provinceRepository->getAll();
        return view('admin.pages.exam-center.index', compact('exams'));
    }



    public function update(Request $createExamRequest, $id)
    {

        try {
            $province = $this->provinceRepository->findById($id);
            if ($province['status'] === 'in-active')
                $data['status'] = 'active';
            else
                $data['status'] = 'in-active';
            $banner = $this->provinceRepository->update($data, $id);
            if ($banner == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Exam center updated successfully');
            return redirect()->route('exam-center.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
}
