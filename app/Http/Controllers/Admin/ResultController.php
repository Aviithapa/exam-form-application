<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\CreateResultRequest;
use App\Models\Applicant;
use App\Models\ApplicantExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.pages.exam.result-upload');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(CreateResultRequest $request)
    {
        $data = $request->all();
        $matchingApplicants = Applicant::join('applicant_exam', 'applicant_exam.applicant_id', 'applicant.id')
            ->where('applicant.dob_nepali', $data['date_of_birth'])
            ->where('applicant_exam.symbol_number', $data['symbol_number'])
            ->select([
                'applicant_exam.result as result',
                'applicant_exam.subject1 as subject1',
                'applicant_exam.subject2 as subject2',
                'applicant_exam.subject3 as subject3',
                'applicant_exam.percentage as percentage',
                'applicant.full_name_english as full_name_english',
                'applicant.dob_nepali as dob_nepali',
                'applicant_exam.symbol_number as symbol_number',
            ])
            ->first();

        if (
            !$matchingApplicants
        ) {
            session()->flash('danger', 'Oops! No record Found.');
            return redirect()->back()->withInput();
        }

        return view('website.mark-sheet', compact('matchingApplicants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function importResult(Request $request)
    {
        try {
            $data = $request->all();


            $file = $data['file'];
            $filePath = $file->store('temp');

            // Load the Excel file
            $spreadsheet = IOFactory::load(storage_path('app/' . $filePath));
            $worksheet = $spreadsheet->getActiveSheet();

            $noStudentFound = [];

            // Loop through the rows
            foreach ($worksheet->getRowIterator() as $row) {
                // Skip the header row
                if ($row->getRowIndex() === 1) {
                    continue;
                }

                // Get the question data
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false); // Loop through all cells, even empty ones

                $cellValues = iterator_to_array($cellIterator);
                // Assuming the cell index matches the expected array index
                // dd($cellValues['B']->getValue());
                $symbol_number = $cellValues['A']->getValue();
                $subject1 = $cellValues['B']->getValue();
                $subject2 = $cellValues['C']->getValue();
                $subject3 = $cellValues['D']->getValue();
                $total = $cellValues['E']->getValue();
                $percentage = $cellValues['F']->getValue();
                $result = $cellValues['G']->getValue();

                $student = ApplicantExam::where('symbol_number', $symbol_number)->first();

                if (!$student) {
                    $noStudentFound[] = $symbol_number;
                } else {
                    $student->update([
                        'subject1' => $subject1,
                        'subject2' => $subject2,
                        'subject3' => $subject3,
                        'total' => $total,
                        'percentage' => $percentage,
                        'result' => $result
                    ]);
                }
            }

            // Delete the temporary file
            Storage::delete($filePath);

            // Return any students not found

            session()->flash('success', 'Result has been uploaded successfully.');
            return redirect()->route('dashboard.exam.index');
        } catch (\Exception $e) {
            dd($e);
            // Handle exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
