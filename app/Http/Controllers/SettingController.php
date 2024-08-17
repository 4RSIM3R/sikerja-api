<?php

namespace App\Http\Controllers;

use App\Contract\SettingContract;
use App\Http\Requests\SettingRequest;
use App\Utils\WebResponseUtils;

class SettingController extends Controller
{

    protected SettingContract $service;

    public function __construct(SettingContract $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $data = $this->service->all(paginate: false);
        return WebResponseUtils::response($data);
    }

    public function store(SettingRequest $request)
    {
        $payload = $request->validated();
        $data = $this->service->createOrUpdateFirst($payload);
        return WebResponseUtils::response($data);
    }
}
