<?php

namespace App\Repositories\Applicant;

use App\Models\Applicant;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentApplicantRepository extends RepositoryImplementation implements ApplicantRepository
{

    public function getModel()
    {
        return new Applicant();
    }

    public function getPaginatedList(Request $request, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->getModel()->newQuery()
            ->latest()
            ->paginate($limit);
    }
}
