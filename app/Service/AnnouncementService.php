<?php

namespace App\Service;

use App\Contract\AnnouncementContract;
use App\Model\Announcement;
use Illuminate\Database\Eloquent\Model;

class AnnouncementService extends BaseService implements AnnouncementContract
{

    protected Model $model;

    public function __construct(Announcement $model)
    {
        $this->model = $model;
    }
}