<?php

namespace App\Repositories\Qualification;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface QualificationRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
