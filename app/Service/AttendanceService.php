<?php

namespace App\Service;

use App\Contract\AttendanceContract;
use App\Models\Attendance;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceService extends BaseService implements AttendanceContract
{

    protected Model $model;

    public function __construct(Attendance $model)
    {
        $this->model = $model;
    }

    public function create(array $params, $image = null, ?string $guard = null, ?string $foreignKey = null)
    {
        try {
            if ($this->today() != null) throw new Exception('Attendance already exists for today');

            DB::beginTransaction();

            $model = $this->model->create($params);

            if (!is_null($image)) {
                foreach ($image as $key => $value) {
                    $model->addMultipleMediaFromRequest([$key])->each(function ($image) use ($key) {
                        $image->toMediaCollection($key);
                    });
                }
            }

            DB::commit();
            return $model->fresh();
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }

    public function today()
    {
        try {
            $user_id = Auth::guard('api')->user()->id;
            $attendance = Attendance::query()
                ->where('user_id', '=', $user_id)
                ->whereDate('created_at', Carbon::now())
                ->first();
            return $attendance;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
