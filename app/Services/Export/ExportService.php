<?php

namespace App\Services\Export;

use Exception;

class ExportService
{
    public function generateStudentCsv($tasks, $columns)
    {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($tasks as $key => $task) {
            try {
                // Ensure that $task->applicant and related data are available
                if ($task->applicant && $task->applicant->familyInformation) {
                    $row['S.N.'] = ++$key;
                    $row['Symbol Number'] = $task->symbol_number;
                    $row['Student Name Nepali'] = $task->applicant->full_name_nepali;
                    $row['Student Name English'] = $task->applicant->full_name_english;
                    $row['Qualification'] =  $task->applicant->qualifications->isNotEmpty() ? $task->applicant->qualifications->first()->law_type : null;
                    $row['Exam Center'] = $task->province->name;
                    $row['gender'] = $task->applicant->gender;
                    $row['Mother Name Nepali'] = $task->applicant->familyInformation->mother_name_nepali;
                    $row['Mother Name English'] = $task->applicant->familyInformation->mother_name_english;
                    $row['Father Name Nepali'] = $task->applicant->familyInformation->father_name_nepali;
                    $row['Father Name English'] = $task->applicant->familyInformation->father_name_english;
                    $row['District'] = $task->applicant->district->name;
                    $row['Municipality'] = $task->applicant->municipality->name;
                    $row['Ward No'] = $task->applicant->ward_no;
                    $row['Province'] = $task->applicant->province->name;
                    $row['Date of Birth'] = $task->applicant->dob_nepali;
                    $row['Citizenship Number'] = $task->applicant->citizenship_number;
                    $row['Contact Number'] = $task->applicant->contact_number;
                    $row['Bank Name'] = $task->bank_name;
                    $row['Working'] = $task->applicant->working;
                    $row['Collage'] = $task->applicant->qualifications->isNotEmpty() ? $task->applicant->qualifications->first()->name : null;
                    $row['University Name'] = $task->applicant->qualifications->isNotEmpty() ? $task->applicant->qualifications->first()->university_name : null;




                    fputcsv($file, array(
                        $row['S.N.'],
                        $row['Symbol Number'],
                        $row['Student Name Nepali'],
                        $row['Student Name English'],
                        $row['Qualification'],
                        $row['Exam Center'],
                        $row['gender'],
                        $row['Mother Name Nepali'],
                        $row['Mother Name English'],
                        $row['Father Name Nepali'],
                        $row['Father Name English'],
                        $row['District'],
                        $row['Municipality'],
                        $row['Ward No'],
                        $row['Province'],
                        $row['Date of Birth'],
                        $row['Citizenship Number'],
                        $row['Contact Number'],
                        $row['Bank Name'],
                        $row['Working'],
                        $row['Collage'],
                        $row['University Name']
                    ));
                } else {
                    // Log or handle the case where data is missing
                    // You might want to skip this record or log an error
                    // depending on your application logic.
                    dd('You are here');
                }
            } catch (Exception $e) {
                // Log or handle any exceptions that might occur during processing
                dd($e);
            }
        }

        fclose($file);
    }
}
