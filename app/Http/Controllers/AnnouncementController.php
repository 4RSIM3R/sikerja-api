<?php

namespace App\Http\Controllers;

use App\Contract\AnnouncementContract;
use App\Http\Requests\AnnouncementRequest;
use App\Utils\WebResponseUtils;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    protected AnnouncementContract $service;

    public function __construct(AnnouncementContract $service)
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

    public function create() {}

    public function store(AnnouncementRequest $request)
    {
        $payload = $request->validated();
        $attachment = $request->file('thumbnail');

        unset($payload['thumbnail']);

        $data = $this->service->create($payload, image: ["thumbnail" => $attachment]);
        return WebResponseUtils::response($data);
    }

    public function show(string $id)
    {
        $data = $this->service->findById($id);
        return WebResponseUtils::response($data);
    }

    public function edit(string $id) {}

    public function update(AnnouncementRequest $request, $id)
    {
        $payload = $request->validated();
        $attachment = $request->file('thumbnail');

        unset($payload['thumbnail']);
        $data = $this->service->update($payload, $id, image: ["thumbnail" => $attachment]);
        return WebResponseUtils::response($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->service->delete($id);
        return WebResponseUtils::response($result);
    }
}
