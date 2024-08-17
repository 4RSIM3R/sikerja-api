<?php

namespace App\Http\Controllers;

use App\Contract\AttendanceContract;
use App\Http\Requests\AttendanceRequest;
use App\Utils\WebResponseUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    protected AttendanceContract $service;

    public function __construct(AttendanceContract $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $user_id = Auth::guard('api')->user()->id;
        $where = [["user_id", "=", $user_id]];
        $data = $this->service->all(paginate: true, whereConditions: $where);
        return WebResponseUtils::response($data);
    }

    public function store(AttendanceRequest $request)
    {
        $payload = $request->validated();
        $photo = $request->file('photo');
        $payload['user_id'] = Auth::guard('api')->user()->id;
        unset($payload['photo']);
        $data = $this->service->create($payload, ["photo" => $photo]);
        return WebResponseUtils::response($data);
    }

    public function today()
    {
        $result = $this->service->today();
        return WebResponseUtils::response($result);
    }
}
