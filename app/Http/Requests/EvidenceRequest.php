<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvidenceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'photo' => 'required|mimes:jpeg,jpg,png,gif,svg|max:5000',
            'show_in_report' => 'required|boolean',
        ];
    }
}
