<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlShortenerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'url' => ['required', 'url'],
        ];
    }

    /**
     * Сообщения об ошибках валидации.
     */
    public function messages(): array
    {
        return [
            'url.required' => 'URL обязателен для ввода.',
            'url.url' => 'Пожалуйста, введите корректный URL.',
        ];
    }
}
