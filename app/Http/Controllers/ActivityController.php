<?php

namespace App\Http\Controllers;

use App\Contract\ActivityContract;
use App\Http\Requests\ActivityRequest;
use App\Utils\WebResponseUtils;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    protected ActivityContract $service;

    public function __construct(ActivityContract $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 10);
        $search = $request->get('search');
        $where = $search ? ['title' => ['like', '%' . $search . '%']] : [];

        $data = $this->service->all(paginate: true, page: $page, dataPerPage: $limit, whereConditions: $where);
        return WebResponseUtils::response($data);
    }

    public function create()
    {
        //
    }

    public function store(ActivityRequest $request)
    {
        $payload = $request->validated();
        $data = $this->service->create($payload);
        return WebResponseUtils::response($data);
    }

    public function show(string $id)
    {
        $data = $this->service->findById($id);
        return WebResponseUtils::response($data);
    }

    public function edit(string $id) {}

    public function update(ActivityRequest $request,  $id)
    {
        $result = $this->service->update($request->validated(), $id);
        return WebResponseUtils::response($result);
    }

    public function destroy(string $id)
    {
        $result = $this->service->delete($id);
        return WebResponseUtils::response($result);
    }
}
