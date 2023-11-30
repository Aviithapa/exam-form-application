<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\ApplicantExam;
use App\Models\Exam;
use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmitCardController extends Controller
{
    //
    // protected ;
    // public function __construct(

    // ) {

    // }

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
            ->where('applicant_exam.province_id', $id) // To ensure unique applicants
            ->select([
                'applicant.*',
                'applicant_exam.status as applicant_exam_status',
                'applicant_exam.created_at as applicant_exam_created_at',
                'applicant_exam.symbol_number as symbol_number'
            ])
            ->distinct()
            ->paginate(50);


        return view('admin.pages.admit.applicant-list', compact('applicants'));
    }


    public function generateAdmitCard()
    {
        $gregorianDate = Carbon::now();
        $nepaliYear = $gregorianDate->year + 57;

        // Step 1: Get the latest exam created ID
        $latestExamId = Exam::latest('created_at')->value('id');

        // Step 2: Use the latest exam ID to generate the initial symbol number
        $initialSymbolNumber = $latestExamId . '-' . $nepaliYear . '-' . str_pad($latestExamId + 1, 3, '0', STR_PAD_LEFT);

        // Step 3: Check for existing generated symbol numbers
        $existingSymbolNumbers = ApplicantExam::where('status', 'GENERATED')->pluck('symbol_number')->toArray();


        // Step 4: Update the remaining symbol numbers after the last one
        ApplicantExam::where('status', 'READY-FOR-ADMIT-CARD')
            ->whereNotIn('symbol_number', $existingSymbolNumbers)
            ->update([
                'status' => 'GENERATED',
                'symbol_number' => DB::raw("CONCAT($latestExamId, '-' , $nepaliYear, '-', LPAD(ROW_NUMBER() OVER (ORDER BY id) + $latestExamId, 3, '0'))"),
            ]);

        session()->flash('success', 'Admit Cards have been generated.');
        return redirect()->route('applicant.admit.list');
    }
}
