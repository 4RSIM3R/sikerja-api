<?php

namespace App\Http\Controllers;

use App\Contract\AttendanceContract;
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
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

}
