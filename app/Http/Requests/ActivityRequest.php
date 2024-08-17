<?php

namespace App\Http\Requests;

class ActivityRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'report_period_start' => 'required|date_format:Y-m-d',
            'report_period_end' => 'required|date_format:Y-m-d',
            'execution_task' => 'required|string',
            'result_plan' => 'required|string',
            'action_plan' => 'required|string',
            'output' => 'required|string',
            'budget' => 'nullable|numeric',
            'budget_source' => 'nullable',
        ];
    }
}
