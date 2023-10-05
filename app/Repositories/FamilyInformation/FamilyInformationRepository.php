<?php

namespace App\Repositories\FamilyInformation;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface FamilyInformationRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
