<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
            ],
            'contact_person' => [
                'nullable',
                'string',
            ],
            'email' => [
                'nullable',
                'email',
            ],
            'address' => [
                'nullable',
                'string',
            ],
            'phone' => [
                'nullable',
                'string',
            ],
            'phone_alternative' => [
                'nullable',
                'string',
            ],
            'city' => [
                'nullable',
                'string',
            ],
            'country' => [
                'nullable',
                'string',
            ],
            'website' => [
                'nullable',
                'string',
            ],
            'fax' => [
                'nullable',
                'string',
            ],
            'note' => [
                'nullable',
                'string',
            ],
        ];
    }
}
