<?php

namespace App\Repositories\Exam;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface ExamRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
