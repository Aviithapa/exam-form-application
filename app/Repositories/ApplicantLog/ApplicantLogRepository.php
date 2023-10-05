<?php

namespace App\Repositories\ApplicantLog;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface ApplicantLogRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
