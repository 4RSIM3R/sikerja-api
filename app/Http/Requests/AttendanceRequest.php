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
            'photo' => 'required|mimes:jpeg,png,jpg,svg|max:2048',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ];
    }
}
