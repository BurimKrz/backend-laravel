<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileTypeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'file_id'     => 'integer',
            'PDF'         => 'string|max:255',
            'cover_image' => 'string|max:255',
            'slide_image' => 'string|max:255',
        ];
    }
}
