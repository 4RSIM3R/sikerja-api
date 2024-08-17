<?php

namespace App\Http\Requests;

class AnnouncementRequest extends ApiRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:65535',
            'thumbnail' => 'required|image|max:2048|mimes:jpeg,png,jpg,gif',
        ];
    }
}
