<?php
// app/Filters/ApplicantFilter.php

namespace App\Filters;

class UserFilter
{
    public function applyFilters($query, $filters)
    {
        if (isset($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (isset($filters['email'])) {
            $query->where('email', 'like', '%' . $filters['email'] . '%');
        }
        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        if (isset($filters['role'])) {
            $roleName = $filters['role'];
            $query->whereHas('roles', function ($query) use ($roleName) {
                $query->where('name', $roleName); // Replace $roleName with the role you're interested in
            });
        }
    }
}
