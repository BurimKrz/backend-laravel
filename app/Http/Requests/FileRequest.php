<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            'files'  => 'required|mimes:pdf,jpg,png,jpeg|max:5120',
            'typeId' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'files.mimes' => 'Invalid file type. Allowed file types: pdf, jpg, png, jpeg',
        ];
    }
}
