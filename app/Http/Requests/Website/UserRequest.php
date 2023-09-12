<?php

namespace App\Http\Requests\Website;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules =  [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
            ],
        ];

        if ($this->route()->getName() === 'dashboard.user.store') {


            $rules['password'] = [
                'required',
                'string',
                'min:6',
                'confirmed'
            ];
        }

        if ($this->route()->getName() === 'dashboard.user.update') {

            $userId = $this->route('id');

            $rules['email'] = [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($userId),
            ];

            $rules['password'] = [
                'nullable',
                'string',
                'min:6',
                'confirmed'
            ];
        }

        return $rules;
    }


}
