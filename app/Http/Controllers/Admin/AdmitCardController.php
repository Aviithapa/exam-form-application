<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\ApplicantExam;
use App\Models\Exam;
use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdmitCardController extends Controller
{



    public function index(Request $request)
    {
        // $this->authorize('show', $this->applicantRepository->getModel());
        $countsByExamCenter = Province::withCount(['examCenter'])->where('status', 'active')->get();
        return view('admin.pages.admit.index', compact('countsByExamCenter'));
    }

    public function show($id)
    {
        $applicants = Applicant::join('applicant_exam', 'applicant.id', '=', 'applicant_exam.applicant_id')
            ->whereIn('applicant_exam.status', ['READY-FOR-ADMIT-CARD', 'GENERATED'])
            ->where('applicant_exam.exam_id', 3)
            ->where('applicant_exam.province_id', $id) // To ensure unique applicants
            ->select([
                'applicant.*',
                'applicant_exam.status as applicant_exam_status',
                'applicant_exam.created_at as applicant_exam_created_at',
                'applicant_exam.symbol_number as symbol_number'
            ])
            ->distinct()
            ->paginate(50);


        return view('admin.pages.admit.applicant-list', compact('applicants', 'id'));
    }


    public function generateAdmitCard($id)
    {
        // Step 1: Get the current Nepali year
        $gregorianDate = Carbon::now();
        $nepaliYear = $gregorianDate->year + 57;

        // Step 2: Get the latest exam created ID
        $latestExamId = Exam::latest('created_at')->value('name');

        // Step 3: Get the latest SRN
        $latestSrn = 0;


        // Step 4: Update the remaining symbol numbers after the last one
        $applicantExams = ApplicantExam::where('status', 'GENERATED')->where('province_id', $id)->where('exam_id', '3')->get();
        // dd($applicantExams, $latestSrn, $latestExamId);

        foreach ($applicantExams as $index => $applicant) {
            $latestSrn++; // Increment SRN within the loop
            $paddedSrn = str_pad($latestSrn, 4, '0', STR_PAD_LEFT);
            $data = [
                'srn' => $latestSrn,
                'symbol_number' => $latestExamId . '-' . $nepaliYear . '-' . $paddedSrn,
                'status' => 'GENERATED',
            ];

            // Update the applicant record
            $applicant->update($data);
        }

        session()->flash('success', 'Admit Cards have been generated.');

        return redirect()->route('admit.show', ['admit' => $id]);
    }

    public function admit()
    {
        $applicant = Auth::user()->applicant;
        $exam = ApplicantExam::all()->where('applicant_id', $applicant->id)->where('status', 'GENERATED')->first();
        $exam_name = Exam::all()->where('id', $exam->exam_id)->first();
        return view('admin.pages.admit.admit-card', compact('applicant', 'exam', 'exam_name'));
    }


    public function centerData($id)
    {
        $applicants = Applicant::join('applicant_exam', 'applicant.id', '=', 'applicant_exam.applicant_id')
            ->where('applicant_exam.status', 'GENERATED')
            ->where('applicant_exam.province_id', $id) // To ensure unique applicants
            ->select([
                'applicant.*',
                'applicant_exam.status as applicant_exam_status',
                'applicant_exam.created_at as applicant_exam_created_at',
                'applicant_exam.symbol_number as symbol_number',
                'applicant_exam.srn as srn'
            ])
            ->orderBy('srn')
            ->distinct()
            ->paginate(50);


        $exam = Exam::latest('created_at')->first();
        $applicants = ApplicantExam::all()->where('exam_id', $exam->id)->where('status', 'GENERATED');
        return view('admin.pages.admin.center', compact('applicants', 'exam'));
    }
}
