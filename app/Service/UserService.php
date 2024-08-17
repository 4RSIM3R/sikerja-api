<?php 

namespace App\Service;

use App\Contract\UserContract;
use App\Model\User;
use Illuminate\Database\Eloquent\Model;

class UserService extends BaseService implements UserContract
{

    protected Model $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}