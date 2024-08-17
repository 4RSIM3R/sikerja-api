<?php

namespace App\Service;

use App\Contract\ActivityContract;
use App\Models\Activity;
use App\Models\Evidence;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivityService extends BaseService implements ActivityContract
{

    protected Model $model;
    protected Model $evidence;

    public function __construct(Activity $model, Evidence $evidence)
    {
        $this->model = $model;
        $this->evidence = $evidence;
    }

    public function evidence(string $id, bool $show, array $photo)
    {
        try {
            $activity = $this->model->find($id);

            DB::beginTransaction();

            $evidence = $this->evidence->create([
                "activity_id" => $activity->id,
                "show_on_report" => $show,
                "user_id" => Auth::guard('api')->user()->id,
            ]);

            if (!is_null($photo)) {
                foreach ($photo as $key => $value) {
                    $evidence->addMultipleMediaFromRequest([$key])->each(function ($image) use ($key) {
                        $image->toMediaCollection($key);
                    });
                }
            }

            DB::commit();
            return $evidence;
        } catch (Exception $e) {
            return $e;
        }
    }
}
