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
        $salon_id = $this->salon_id;
        $supplier_id = $this->supplier_id;
        return [
            'salon_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'tax_id' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|max:150|unique:products,name,' . $id . ',id,salon_id,' . $salon_id . ',supplier_id,' . $supplier_id,
            'sku' => 'required|max:150|unique:products,sku,' . $id . ',id,salon_id,' . $salon_id . ',supplier_id,' . $supplier_id,
            'description' => 'required',
            'cost_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'retail_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'stock_quantity' => 'required_if:manage_stock,1',
            'low_stock_threshold' => 'required_if:manage_stock,1',
        ];
    }
}
