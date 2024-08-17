<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use AuthContract;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected AuthContract $service;

    public function __construct(AuthContract $service)
    {
        $this->service = $service;
    }

    public function login(LoginRequest $request) {
        
    }

    public function logout() {}
}
