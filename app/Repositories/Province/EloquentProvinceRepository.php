<?php

namespace App\Repositories\Province;

use App\Models\Applicant;
use App\Models\Province;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentProvinceRepository extends RepositoryImplementation implements ProvinceRepository
{

    public function getModel()
    {
        return new Province();
    }

    public function getPaginatedList(Request $request, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->getModel()->newQuery()
            ->latest()
            ->paginate($limit);
    }
}
