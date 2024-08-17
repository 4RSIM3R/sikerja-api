<?php

namespace App\Http\Requests;


class EvidenceRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'photo' => 'required|array',
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
            'show_on_report' => 'required|boolean',
        ];
    }


    protected function prepareForValidation()
    {
        $this->merge([
            'show_on_report' => filter_var($this->show_on_report,  FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
        ]);
    }

}
