<?php

namespace App\Http\Controllers;

use App\Contract\AssignmentContract;
use App\Http\Requests\AssignmentRequest;
use App\Utils\WebResponseUtils;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{

    protected AssignmentContract $service;

    public function __construct(AssignmentContract $service)
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
        return WebResponseUtils::response($data, paginate: true);
    }

    public function create() {}

    public function store(AssignmentRequest $request)
    {
        $payload = $request->validated();
        dd($payload);
        $attachment = $request->file('attachment');
        unset($payload['attachment']);
        $data = $this->service->create($payload, image: ["attachment" => $attachment]);
        return WebResponseUtils::response($data);
    }

    public function show(string $id)
    {
        $data = $this->service->findById($id);
        return WebResponseUtils::response($data);
    }

    public function edit(string $id) {}

    public function update(AssignmentRequest $request, $id)
    {
        $payload = $request->validated();
        $attachment = $request->file('attachment');
        unset($payload['attachment']);
        $data = $this->service->update($payload, $id, image: ["attachment" => $attachment]);
        return WebResponseUtils::response($data);
    }

    public function destroy(string $id)
    {
        $result = $this->service->delete($id);
        return WebResponseUtils::response($result);
    }
}
