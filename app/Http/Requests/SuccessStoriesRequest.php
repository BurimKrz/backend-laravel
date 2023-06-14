<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuccessStoriesRequest extends FormRequest
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
            'company_id'     => 'required|integer',
            'topic'          => 'required|string|max:255',
            'representative' => 'required|string|max:255',
            'position'       => 'required|string|max:255',
            'message'        => 'required|string|max:500',
            'image_URL'      => 'required|string|max:255',
        ];
    }
}
