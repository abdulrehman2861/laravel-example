<?php

namespace App\Http\Requests\Dashboard;

use App\Models\AdjustmentProduct;
use Illuminate\Foundation\Http\FormRequest;

class AdjustmentRequest extends FormRequest
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
        $rules = [
            'adjustment_date' => [
                'required',
                'string',
                'between:3,50',
            ],
            'note' => [
                'nullable',
                'string',
                'between:3,350',
            ]
        ];

        $rules = array_merge(
            $rules,
            $this->adjustmentProductsRules(),
        );

        return $rules;
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [

            'adjustment_date' => 'Date',
            'note' => 'Notes',

            'adjustmentProducts.*.product_id' => 'Product',
            'adjustmentProducts.*.type' => 'Type',
            'adjustmentProducts.*.quantity' => 'Quantity',
        ];
    }

    /**
     * adjustmentProductsRules
     *
     * @return array
     */
    private function adjustmentProductsRules(): array
    {
        return [
            'adjustmentProducts.*.product_fitting_id' => [
                'required',
                'exists:product_fittings,id',
            ],
            'adjustmentProducts.*.product_id' => [
                'nullable',
                'exists:products,id',
            ],
            'adjustmentProducts.*.type' => [
                'required',
                'in:'.AdjustmentProduct::TYPE_ADD.','.AdjustmentProduct::TYPE_SUBTRACT,
            ],
            'adjustmentProducts.*.quantity' => [
                'required',
                'numeric',
                'gt:0',
                'between:0,10000000000'
            ],
        ];
    }
}
