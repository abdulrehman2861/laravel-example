<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
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
                    'between:3,50',
                ],
                'glass_id' => [
                    'required',
                    'exists:glasses,id',
                ],
            ];
    }

     /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [

            'name' => 'Name',
            'glass_id' => 'Glass',
        ];
    }
}
