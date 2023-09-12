<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseReturnRequest extends FormRequest
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
            'date' => [
                'nullable',
                'date',
            ],
            'return_amount' => [
                'required',
                'numeric',
                'gt:0',
                'between:0,10000000000'
            ],
            'note' => [
                'nullable',
                'string',
                'between:3,350',
            ],
            'purchase_transaction_id' => [
                'required',
                'exists:purchase_transactions,id',
            ],
            'details' => [
                'required',
                'array',
            ],
        ];
    }
}
