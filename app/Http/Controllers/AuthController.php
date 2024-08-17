<?php

namespace App\Http\Controllers;

use App\Contract\AuthContract;
use App\Http\Requests\LoginRequest;
use App\Utils\WebResponseUtils;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected AuthContract $service;

    public function __construct(AuthContract $service)
    {
        $this->service = $service;
    }

    public function login(LoginRequest $request)
    {
        $payload = $request->validated();
        $result = $this->service->login($payload);
        return WebResponseUtils::response($result);
    }

    public function logout()
    {
        $result = $this->service->logout();
        return WebResponseUtils::response($result);
    }
}
