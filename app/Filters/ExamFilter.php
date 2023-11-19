<?php
// app/Filters/ApplicantFilter.php

namespace App\Filters;

class ExamFilter
{
    public function applyFilters($query, $filters)
    {
        if (isset($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (isset($filters['bank_name'])) {
            $query->where('bank_name', $filters['bank_name']);
        }

        if (isset($filters['citizenship_number'])) {
            $query->where('applicant.citizenship_number', 'like', '%' .  $filters['citizenship_number'] . '%');
        }

        if (isset($filters['account_status'])) {
            $query->where('account_status',  $filters['account_status']);
        }
    }
}
