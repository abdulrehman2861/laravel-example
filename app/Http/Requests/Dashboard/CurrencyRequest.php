<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

     // this function is used to authorize the user to make this request
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:3|unique:currencies',
            'symbol' => 'required|string|max:1',
            'thousand_separator' => 'required|string|max:5',
            'decimal_separator' => 'required|string|max:5',
            'exchange_rate' => 'required|numeric'
        ];

        if ($this->route()->getName() === 'dashboard.currency.update') {

            $currencyId = $this->route('id');

            $rules['code'] = [
                'required',
                'string',
                'max:3',
                Rule::unique('currencies')->ignore($currencyId),
            ];
        }

        return $rules;
    }
}
