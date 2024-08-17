<?php 

namespace App\Service;

use App\Contract\AttendanceContract;
use App\Model\Attendance;
use Illuminate\Database\Eloquent\Model;

class AttendanceService extends BaseService implements AttendanceContract
{

    protected Model $model;

    public function __construct(Attendance $model)
    {
        $this->model = $model;
    }
}