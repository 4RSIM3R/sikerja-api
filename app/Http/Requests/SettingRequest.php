<?php

namespace App\Http\Requests;

class SettingRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'application_name' => 'required|string|max:255',
            'application_version' => 'required|string|max:255',
            'application_description' => 'required|string|max:255',
            'start_working_hour' => ['required', 'string', 'regex:/^([01][0-9]|2[0-3]):[0-5][0-9]$/'],
            'grace_period_minutes' => 'required|numeric|min:0|max:60',
            'chief_name' => 'required|string|max:255',
            'chief_nip' => 'required|string|max:255',
            'latitude' => 'required|numeric|min:-90|max:90',
            'longitude' => 'required|numeric|min:-180|max:180',
        ];
    }
}
