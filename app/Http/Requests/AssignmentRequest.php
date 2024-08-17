<?php

namespace App\Http\Requests;


class AssignmentRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'number' => 'required|max:255',
            'description' => 'required|max:65535',
            'date' => 'required|date',
            'attachment' => 'required|mimes:pdf,docx,doc,ppt,pptx|max:20000',
        ];
    }
}
