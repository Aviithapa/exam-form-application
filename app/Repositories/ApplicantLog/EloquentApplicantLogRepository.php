<?php

namespace App\Repositories\ApplicantLog;

use App\Models\ApplicantLogs;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentApplicantLogRepository extends RepositoryImplementation implements ApplicantLogRepository
{

    public function getModel()
    {
        return new ApplicantLogs();
    }

    public function getPaginatedList(Request $request, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->getModel()->newQuery()
            ->latest()
            ->paginate($limit);
    }
}
