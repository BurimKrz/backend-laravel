<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name'            => 'required|string|max:255',
            'keywords'        => 'required|string|max:255',
            'country'         => 'required|string|max:255',
            'web_address'     => 'required|string|max:255',
            'more_info'       => 'required|string|max:255',
            'budged'          => 'required|string|max:255',
            'type'            => 'required|string|max:255',
            'taxpayer_office' => 'required|string|max:255',
            'TIN'             => 'required|string|max:255',
            'category_id'     => 'required|integer',
            'subcategory_id'  => 'required|integer',

        ];
    }
}
