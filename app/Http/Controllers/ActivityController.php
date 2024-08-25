<?php

namespace App\Http\Controllers;

use App\Contract\ActivityContract;
use App\Http\Requests\ActivityRequest;
use App\Http\Requests\EvidenceRequest;
use App\Models\Attendance;
use App\Models\Setting;
use App\Utils\DateUtils;
use App\Utils\WebResponseUtils;
use App\Utils\WordUtils;
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

    public function evidence(string $id, EvidenceRequest $request)
    {
        $show = $request->get('show_in_report', false);
        $photo = $request->file('photo');
        $result = $this->service->evidence($id, $show, ["photo" => $photo]);
        return WebResponseUtils::response($result);
    }

    public function export($id)
    {
        $template = base_path('report.docx');
        $output_name = 'output_' . time() . '.docx';
        $data = $this->service->findById($id);
        $setting = WebSetting::query()->first();

        $thumbnails = [];

        $data = [
            '${report_period}' => sprintf(
                "%s \n %s - %s",
                DateUtils::week_count($data->report_period_start),
                DateUtils::date_format($data->report_period_start),
                DateUtils::date_format($data->report_period_end)
            ),
            '${execution_task}' => $data->execution_task,
            '${result_plan}' => $data->result_plan,
            '${action_plan}' => $data->action_plan,
            '${output}' => $data->output,
            '${budget}' => $data->budget,
            '${budget_source}' => $data->budget_source,
            '${chief_name}' => $setting->chief_name,
            '${chief_nip}' => $setting->chief_nip,
        ];

        $attendances = Attendance::query()->where('activity_id', $id)
            ->where('status', 'present')
            ->where('show_in_report', true)
            ->take(2)
            ->get();


        foreach ($attendances as $attendance) {
            foreach ($attendance->getMedia('image') as $media) {
                $thumbnails[] = $media->getPath();
            }
        }

        if (count($thumbnails) == 0) return redirect()->back()->withErrors(["error" => "Belum ada yang melakukan absensi perserta."]);

        if (count($thumbnails) < 2) {
            $data['Gambar1'] = [
                'type' => 'image',
                'path' => StringUtils::normalize_path($thumbnails[0]),
                'width' => 150,
                'height' => 150,
            ];

            $data['${Gambar2}'] = "";
        } else {
            foreach ($thumbnails as $key => $value) {
                $data[sprintf('Gambar%s', $key + 1)] =  [
                    'type' => 'image',
                    'path' => StringUtils::normalize_path($value),
                ];
            }
        }

        try {
            WordUtils::process($template, $output_name, $data);
        } catch (Exception $e) {
            return WebResponseUtils::response($e->getMessage(), 'error');
        }
    }
}
