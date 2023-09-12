<?php

namespace App\Http\Requests\Dashboard;

use App\Models\SaleTransaction;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaleTransactionRequest extends FormRequest
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
            'transaction_type' => [
                'required',
                'in:' . SaleTransaction::TRANSACTION_TYPE_WORK_ORDER . ',' . SaleTransaction::TRANSACTION_TYPE_SALE_ORDER. ',' . SaleTransaction::TRANSACTION_TYPE_QUOTATION,
            ],
            'service_type' => [
                'nullable',
                'in:'.SaleTransaction::SERVICE_TYPE_MOBILE.','.SaleTransaction::SERVICE_TYPE_INSHOP,
            ],
            'appointment_time' => [
                'nullable',
                'in:'.SaleTransaction::APPOINTMENT_TYPE_FIRST.','.SaleTransaction::APPOINTMENT_TYPE_SECOND,
            ],
            'appointment_date' => [
                'nullable',
                'date',
            ],
            'quotation_no' => [
                'nullable',
                'string',
            ],
            'sale_order_no' => [
                'nullable',
                'string',
            ],
            'status' => [
                'required',
                'in:'.SaleTransaction::TRANSACTION_STATUS_PENDING.','.SaleTransaction::TRANSACTION_STATUS_COMPLETE,
            ],
            'note' => [
                'nullable',
                'string',
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
                'in:'.SaleTransaction::TAX_TYPE_DEFAULT.','.SaleTransaction::TAX_TYPE_EXEMPT,
            ],
            'order_tax' => [
                'nullable',
                'numeric',
                'between:0,10000000000'
            ],
            'windsheild_install_type' => [
                'nullable',
                'string',
            ],
            'installer_id' => [
                'nullable',
                'exists:installers,id',
            ],
            'existing_customer' => [
                'sometimes',
                'boolean',
            ],
            'customer_id' => [
                Rule::requiredIf(function () {
                    return request()->has('existing_customer') && request()->existing_customer == true;
                }),
                'exists:customers,id',
            ],
        ];

        $rules = array_merge(
            $rules,
            $this->newCustomerRules(),
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
            ],
            'details.*.product_id' => [
                'required',
                'exists:products,id',
            ],
            'details.*.product_fitting_id' => [
                'nullable',
            ],
            'details.*.rate' => [
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

    /**
     * newCustomerRules
     *
     * @return array
     */
    private function newCustomerRules(): array
    {
        $required = request()->existing_customer == true ? 'nullable' : 'required';

        return [
            'customer.name' => [
                $required,
                'string',
            ],
            'customer.contact_person' => [
                'nullable',
                'string',
            ],
            'customer.email' => [
                $required,
                'email',
            ],
            'customer.customer_Type_id' => [
                'nullable',
                'exists:customer_types,id',
            ],
            'customer.phone' => [
                $required,
                'string',
            ],
            'customer.phone_alternative' => [
                'nullable',
                'string',
            ],
            'customer.fax' => [
                'nullable',
                'string',
            ],
            'customer.discount_Type' => [
                'nullable',
                'string',
            ],
            'customer.discount' => [
                'nullable',
                'numeric',
                'between:0,10000000000'
            ],
            'customer.state' => [
                'nullable',
                'string',
            ],
            'customer.city' => [
                'nullable',
                'string',
            ],
            'customer.country' => [
                'nullable',
                'string',
            ],
            'customer.billing_address' => [
                'nullable',
                'string',
            ],
            'customer.service_address' => [
                'nullable',
                'string',
            ],
            'customer.note' => [
                'nullable',
                'string',
            ],
        ];
    }
}
