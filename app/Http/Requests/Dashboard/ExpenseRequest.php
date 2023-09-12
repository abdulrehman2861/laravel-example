<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'expense_category_id' => 'required|integer|exists:expense_categories,id',
            'amount' => 'required|numeric|gt:0|between:0,10000000000',
            'date' => 'required|date',
            'detail' => 'nullable|string|between:3,350',
        ];
    }
}
