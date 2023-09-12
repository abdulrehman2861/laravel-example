<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use App\Models\PurchaseTransaction;
use Illuminate\Foundation\Http\FormRequest;

class PurchaseTransactionRequest extends FormRequest
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

            'supplier_id' => [
                'nullable',
                'exists:suppliers,id',
            ],
            'issue_date' => [
                'nullable',
                'date',
            ],
            'expected_receipt_date' => [
                'nullable',
                'date',
            ],
            'status' => [
                'nullable',
                'in:' . PurchaseTransaction::TRANSACTION_STATUS_PENDING . ',' . PurchaseTransaction::TRANSACTION_STATUS_COMPLETE . ',' . PurchaseTransaction::TRANSACTION_STATUS_ORDERED,
            ],
            'ship_to_warehouse_id' => [
                'nullable',
                'exists:warehouses,id',
            ],
            'payment_method' => [
                'nullable',
                'in:' . PurchaseTransaction::PAYMENT_METHOD_TYPE_CASH . ',' . PurchaseTransaction::PAYMENT_METHOD_TYPE_CREDIT_CARD . ',' . PurchaseTransaction::PAYMENT_METHOD_TYPE_BANK_TRANSFER . ',' . PurchaseTransaction::PAYMENT_METHOD_TYPE_CHEQUE . ',' . PurchaseTransaction::PAYMENT_METHOD_TYPE_OTHER,
            ],
            'amount_paid' => [
                'required',
                'numeric',
                'between:0,10000000000'
            ],
            'billing_address' => [
                'nullable',
                'string',
                'between:1,350',
            ],
            'same_billing_address' => [
                'sometimes',
                'boolean',
            ],
            'shipping_address' => [
                'nullable',
                'string',
                'between:1,350',
            ],
            'discount' => [
                'nullable',
                'numeric',
                'between:0,100'
            ],
            'shipping' => [
                'nullable',
                'numeric',
                'between:0,10000000000'
            ],
            'tax_type' => [
                'nullable',
                'in:' . PurchaseTransaction::TAX_TYPE_DEFAULT . ',' . PurchaseTransaction::TAX_TYPE_EXEMPT,
            ],
            'order_tax' => [
                'nullable',
                'numeric',
                'between:0,100'
            ],
            'external_note' => [
                'nullable',
                'string',
                'between:1,350',
            ],
            'internal_note' => [
                'nullable',
                'string',
                'between:1,350',
            ],
        ];

        $rules = array_merge(
            $rules,
            $this->transactionDetailRules()
        );

        return $rules;
    }


    public function attributes()
    {
        return [

            'details' => 'Product/Part',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'details.required' => 'Please Add Atleast one Product for Transaction',
        ];
    }


    /**
     * transactionDetailRules
     *
     * @return array
     */
    private function transactionDetailRules(): array
    {
        return [
            'details' => [
                'required',
                'array',
            ],
            'details.*.product_fitting_id' => [
                'required',
                'exists:product_fittings,id',
            ],
            'details.*.cost' => [
                'required',
                'numeric',
                'gt:0',
                'between:0,10000000000'
            ],
            'details.*.quantity' => [
                'required',
                'numeric',
                'gt:0',
                'between:0,10000000000'
            ],
            'details.*.discount' => [
                'required',
                'numeric',
                'between:0,10000000000'
            ],
            'details.*.tax' => [
                'required',
                'numeric',
                'between:0,10000000000'
            ],
        ];
    }
}
