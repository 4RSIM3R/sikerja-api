<?php

namespace App\Http\Controllers;

use App\Contract\UserContract;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    protected UserContract $service;

    public function __construct(UserContract $service)
    {
        $this->service = $service;
    }
    
    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 10);
        $search = $request->get('search');
        $where = $search ? ['name' => ['like', '%' . $search . '%']] : [];

        $data = $this->service->all(paginate: true, page: $page, dataPerPage: $limit, whereConditions: $where);
        return WebResponseUtils::response($data);
    }

    public function create()
    {
        
    }

    public function store(UserRequest $request)
    {
        $payload = $request->validated();
        $data = $this->service->create($payload);
        return WebResponseUtils::response($data);
    }

    public function show($id)
    {
        $data = $this->service->findById($id);
        return WebResponseUtils::response($data);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(UserRequest $request, $id)
    {
        $payload = $request->validated();
        $data = $this->service->update($payload, $id);
        return WebResponseUtils::response($data);
    }

    public function destroy(string $id)
    {
        $result = $this->service->delete($id);
        return WebResponseUtils::response($result);
    }
}
