<?php

namespace App\Repositories\ApplicantDocuments;

use App\Models\ApplicantDocuments;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentApplicantDocumentRepository extends RepositoryImplementation implements ApplicantDocumentRepository
{

    public function getModel()
    {
        return new ApplicantDocuments();
    }

    public function getPaginatedList(Request $request, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->getModel()->newQuery()
            ->latest()
            ->paginate($limit);
    }
}
