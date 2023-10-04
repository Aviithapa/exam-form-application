<?php

namespace App\Policies;

use App\Models\Exam;
use App\Models\User;

class ExamPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function read(User $user, Exam $exam)
    {
        return $user->isAdmin()->name === "admin" || $user->id === $exam->user_id;
    }

    public function create(User $user, Exam $exam)
    {
        return $user->isAdmin()->name === "admin" || $user->id === $exam->user_id;
    }

    public function update(User $user, Exam $exam)
    {
        return $user->isAdmin()->name === "admin" || $user->id === $exam->user_id;
    }

    public function edit(User $user, Exam $exam)
    {
        return $user->isAdmin()->name === "admin" || $user->id === $exam->user_id;
    }

    public function destroy(User $user, Exam $exam)
    {
        return $user->isAdmin()->name === "admin" || $user->id === $exam->user_id;
    }

    public function store(User $user, Exam $exam)
    {
        return $user->isAdmin()->name === "admin" || $user->id === $exam->user_id;
    }
}
