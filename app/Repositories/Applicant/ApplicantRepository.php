<?php

namespace App\Repositories\Applicant;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface ApplicantRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
