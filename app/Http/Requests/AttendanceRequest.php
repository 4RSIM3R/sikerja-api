<?php

namespace App\Http\Requests;

class AttendanceRequest extends ApiRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'photo' => 'required|mimes:jpeg,png,jpg,svg|max:5000',
            'latitude' => 'required',
            'longitude' => 'required',
            'work_hour' => [
                'required',
                'regex:/^([01][0-9]|2[0-3]):([0-5][0-9])$/',
            ],
        ];
    }
}
