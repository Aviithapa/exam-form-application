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

        if (isset($filters['phone_number'])) {
            $query->where('phone_number', 'like', '%' .  $filters['phone_number'] . '%');
        }

        if (isset($filters['status'])) {
            $query->whereIn('applicant_exam.status',  [$filters['status']]);
        }

        if (isset($filters['exam_center'])) {
            $query->where('applicant_exam.province_id',  $filters['exam_center']);
        }

        if (isset($filters['exam_id'])) {
            $query->where('applicant_exam.exam_id',  $filters['exam_id']);
        }
    }
}
