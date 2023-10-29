<?php

namespace App\Repositories\Province;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface ProvinceRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
