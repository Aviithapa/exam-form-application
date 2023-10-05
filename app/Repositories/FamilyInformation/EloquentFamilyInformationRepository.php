<?php

namespace App\Repositories\FamilyInformation;

use App\Models\FamilyInformation;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentFamilyInformationRepository extends RepositoryImplementation implements FamilyInformationRepository
{

    public function getModel()
    {
        return new FamilyInformation();
    }

    public function getPaginatedList(Request $request, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->getModel()->newQuery()
            ->latest()
            ->paginate($limit);
    }
}
