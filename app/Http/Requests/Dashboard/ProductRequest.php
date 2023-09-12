<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Product;
use App\Models\ProductFitting;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        // dd(request()->all());
        $rules = [
            'part_name' => [
                'nullable',
                'string',
            ],
            'part_number' => [
                'required',
                'string',
            ],
            'shelf' => [
                'nullable',
                'string',
            ],
            'warehouse_id' => [
                'nullable',
                'exists:warehouses,id',
            ],
            'supplier_id' => [
                'nullable',
                'exists:suppliers,id',
            ],
            'price' => [
                'nullable',
                'numeric',
                'between:0,10000000000'
            ],
            'cost' => [
                'nullable',
                'numeric',
                'between:0,10000000000'
            ],
            'quantity' => [
                'nullable',
                'numeric',
                'between:0,10000000000'
            ],
            'alert_quantity' => [
                'nullable',
                'numeric',
                'between:0,10000000000'
            ],
            'apply_tax' => [
                'sometimes',
                'boolean',
            ],
            'tax' => [
                'nullable',
                'numeric',
                'between:0,100'
            ],
            'tax_type' => [
                Rule::requiredIf(function () {
                    return request()->has('apply_tax') && request()->apply_tax == true;
                }),
                'in:' . Product::TAX_EXCLUSIVE . ',' . Product::TAX_INCLUSIVE,
            ],
            'unit' => [
                'nullable',
                'string',
            ],
            'note' => [
                'nullable',
                'string',
            ],
        ];

        $rules = array_merge(
            $rules,
            $this->productFittingsRules(),
            $this->imageRules()
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

            'part_name' => 'Part Name',
            'part_number' => 'Part Number',
            'shelf' => 'Product Shelf Number',
            'warehouse_id' => 'Warehouse ',
            'supplier_id' => 'Supplier',
            'price' => 'Price',
            'cost' => 'Cost',
            'quantity' => 'Quantity',
            'alert_quantity' => 'Alert Quantity',
            'apply_tax' => 'Tax Applied',
            'tax' => 'Tax(%)',
            'tax_type' => 'Tax type',
            'unit' => 'Unit ',
            'note' => 'Notes',

            'product_fittings' => 'Product detail (Model, Glass...)',
            'product_fittings.*.category_id' => 'Sub Category',
            'product_fittings.*.year_type' => 'Year Type',
            'product_fittings.*.year_from_id' => 'Year From',
            'product_fittings.*.year_to_id' => 'Year To',
            'product_fittings.*.car_id' => 'Model',
            'product_fittings.*.body_style_id' => 'Body Style',
            'product_fittings.*.glass_id' => 'Glass',
            'product_fittings.*.feature_id' => 'Feature',

            'product_fittings.*.calibration_price' => 'Calibration Price',

            'images' => 'Product Images',
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
            'product_fittings.required' => 'Please specify Atleast one Model and Glass type',
        ];
    }


    /**
     * productFittingsRules
     *
     * @return array
     */
    private function productFittingsRules(): array
    {
        return [
            'product_fittings' => [
                'required',
            ],
            'product_fittings.*.category_id' => [
                'nullable',
                'exists:categories,id',
            ],
            'product_fittings.*.year_type' => [
                'required',
                'in:' . ProductFitting::YEAR_SINGLE . ',' . ProductFitting::YEAR_RANGE,
            ],
            'product_fittings.*.year_from_id' => [
                'required',
                'exists:years,id',
            ],
            'product_fittings.*.year_to_id' => [
                'required_if:product_fittings.*.year_type,' . ProductFitting::YEAR_RANGE,
                'exists:years,id',
            ],
            'product_fittings.*.car_id' => [
                'required',
                'exists:cars,id',
            ],
            'product_fittings.*.body_style_id' => [
                'required',
                'exists:body_styles,id',
            ],
            'product_fittings.*.glass_id' => [
                'required',
                'exists:glasses,id',
            ],
            'product_fittings.*.feature_id' => [
                'nullable',
                'exists:features,id',
            ],
            'product_fittings.*.calibration' => [
                'sometimes',
                'boolean',
            ],
            'product_fittings.*.calibration_price' => [
                'nullable',
                'numeric',
                'between:0,10000000000'
            ],
        ];
    }

    /**
     * imageRules
     *
     * @return array
     */
    private function imageRules(): array
    {
        $imageRules =  [
            'images' => [
                'nullable',
                'array',
            ],
        ];

        if (request()->routeIs('*.update')) {
            $imageRules['imagesToDelete'] = 'nullable|array';
        }

        return $imageRules;
    }
}
