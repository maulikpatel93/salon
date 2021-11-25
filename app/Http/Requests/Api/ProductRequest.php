<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
        $id = $this->id;
        return [
            'salon_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'tax_id' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|max:150|unique:products,name,' . $id,
            'sku' => 'required|max:255',
            'description' => 'required',
            'cost_price' => 'required',
            'retail_price' => 'required',
            'stock_quantity' => 'required_if:manage_stock,1',
            'low_stock_threshold' => 'required_if:manage_stock,1',
        ];
    }
}
