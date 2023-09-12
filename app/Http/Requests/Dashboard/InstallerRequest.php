<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class InstallerRequest extends FormRequest
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
            'first_name' => [
                'required',
                'string',

            ],
            'last_name' => [
                'nullable',
                'string',

            ],
            'email' => [
                'nullable',
                'email',

            ],
            'phone' => [
                'nullable',
                'string',

            ],
            'social_security_number' => [
                'nullable',
                'string',

            ],
            'identity_number' => [
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
            'address' => [
                'nullable',
                'string',

            ],
        ];
    }
}
