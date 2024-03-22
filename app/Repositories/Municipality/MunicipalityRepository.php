<?php

namespace App\Repositories\Municipality;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface MunicipalityRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
