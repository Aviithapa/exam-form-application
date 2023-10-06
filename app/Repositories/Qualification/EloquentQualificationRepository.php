<?php

namespace App\Repositories\Qualification;

use App\Models\Qualification;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentQualificationRepository extends RepositoryImplementation implements QualificationRepository
{

    public function getModel()
    {
        return new Qualification();
    }

    public function getPaginatedList(Request $request, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->getModel()->newQuery()
            ->latest()
            ->paginate($limit);
    }
}
