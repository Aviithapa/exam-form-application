<?php
// app/Filters/ApplicantFilter.php

namespace App\Filters;

class MunicipalityFilter
{
    public function applyFilters($query, $filters)
    {
        if (isset($filters['name'])) {
            $query->where('municipality.name', 'like', '%' . $filters['name'] . '%');
        }
    }
}
