<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
            'thubmnail' => 'required|image|max:2048|mimes:jpeg,png,jpg,gif',
        ];
    }
}
