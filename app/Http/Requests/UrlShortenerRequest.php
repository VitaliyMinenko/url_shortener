<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UrlShortenerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url' => [
                'required',
                'regex:/^[a-zA-Z0-9-_=?&\/]+$/',
                Rule::unique('url_shortness', 'original_url')
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'url.required' => 'Slug is required.',
            'url.regex' => 'Slug can only contain letters, numbers, hyphens, underscores, equals signs, question marks, ampersands, and slashes.',
            'url.unique' => 'This slug is already in use. Please choose another one.',
        ];
    }
}
