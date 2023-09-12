<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
                'required',
                'email',
            ],
            'customer_Type_id' => [
                'nullable',
                'exists:customer_types,id',
            ],
            'phone' => [
                'required',
                'string',
            ],
            'phone_alternative' => [
                'nullable',
                'string',
            ],
            'fax' => [
                'nullable',
                'string',
            ],
            'discount_Type' => [
                'nullable',
                'string',
            ],
            'discount' => [
                'nullable',
                'numeric',
                'gt:0',
                'between:0,10000000000'
            ],
            'state' => [
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
            'billing_address' => [
                'nullable',
                'string',
            ],
            'service_address' => [
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
