<?php
// app/Filters/ApplicantFilter.php

namespace App\Filters;

class ApplicantFilter
{
    public function applyFilters($query, $filters)
    {
        if (isset($filters['full_name_english'])) {
            $query->where('full_name_english', 'like', '%' . $filters['full_name_english'] . '%');
        }

        if (isset($filters['dob_nepali'])) {
            $query->where('dob_nepali', $filters['dob_nepali']);
        }

        if (isset($filters['citizenship_number'])) {
            $query->where('citizenship_number', 'like', '%' .  $filters['citizenship_number'] . '%');
        }

        if (isset($filters['status'])) {
            $query->whereIn('applicant_exam.status',  [$filters['status']]);
        }
    }
}
