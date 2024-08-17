<?php

namespace App\Service;

use App\Contract\UserContract;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserService extends BaseService implements UserContract
{

    protected Model $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(array $params, $image = null, string|null $guard = null, string|null $foreignKey = null)
    {
        try {
            DB::beginTransaction();

            $model = $this->model->create($params);
            $model->assignRole('user');

            DB::commit();
            return $model->fresh();
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }
}
