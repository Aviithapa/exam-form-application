<?php

namespace App\Repositories\Municipality;

use App\Models\Municipality;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentMunicipalityRepository extends RepositoryImplementation implements MunicipalityRepository
{

    public function getModel()
    {
        return new Municipality();
    }

    public function getPaginatedList(Request $request, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->getModel()->newQuery()
            ->latest()
            ->paginate($limit);
    }
}
