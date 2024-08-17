<?php

namespace App\Service;

use App\Contract\AnnouncementContract;
use App\Models\Annoucement;
use Illuminate\Database\Eloquent\Model;

class AnnouncementService extends BaseService implements AnnouncementContract
{

    protected Model $model;

    public function __construct(Annoucement $model)
    {
        $this->model = $model;
    }
}