<?php

namespace App\Policies;

use App\Models\Applicant;
use App\Models\User;

class ApplicantPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function read(User $user, Applicant $applicant)
    {
        return $user->isAdmin()->name === "admin" || $user->id === $applicant->user_id;
    }

    public function create(User $user, Applicant $applicant)
    {
        return $user->isAdmin()->name === "admin" || $user->id === $applicant->user_id;
    }
    public function show(User $user, Applicant $applicant)
    {
        return $user->isAdmin()->name === "admin" || $user->id === $applicant->user_id;
    }
    public function status(User $user, Applicant $applicant)
    {
        return $user->isAdmin()->name === "admin" || $user->id === $applicant->user_id;
    }

    public function update(User $user, Applicant $applicant)
    {
        return $user->isAdmin()->name === "admin" || $user->id === $applicant->user_id;
    }

    public function edit(User $user, Applicant $applicant)
    {
        return $user->isAdmin()->name === "admin" || $user->id === $applicant->user_id;
    }

    public function destroy(User $user, Applicant $applicant)
    {
        return $user->isAdmin()->name === "admin" || $user->id === $applicant->user_id;
    }

    public function store(User $user, Applicant $applicant)
    {
        return $user->isAdmin()->name === "admin" || $user->id === $applicant->user_id;
    }
}
