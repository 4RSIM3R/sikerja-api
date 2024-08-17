<?php

namespace App\Service;

use App\Contract\ActivityContract;
use App\Model\Activity;
use Illuminate\Database\Eloquent\Model;

class ActivityService extends BaseService implements ActivityContract
{

    protected Model $model;

    public function __construct(Activity $model)
    {
        $this->model = $model;
    }
}
