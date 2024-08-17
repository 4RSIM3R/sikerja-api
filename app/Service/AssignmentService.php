<?php 

namespace App\Service;

use App\Contract\AssignmentContract;
use App\Models\Assignment;
use Illuminate\Database\Eloquent\Model;

class AssignmentService extends BaseService implements AssignmentContract
{

    protected Model $model;

    public function __construct(Assignment $model)
    {
        $this->model = $model;
    }
}