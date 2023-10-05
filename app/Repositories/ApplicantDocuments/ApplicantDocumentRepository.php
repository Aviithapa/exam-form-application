<?php

namespace App\Repositories\ApplicantDocuments;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface ApplicantDocumentRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
