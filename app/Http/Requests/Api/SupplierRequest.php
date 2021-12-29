<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    protected $status = '422';
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
        $rules = [
            'salon_id' => 'required|integer',
            'name' => 'required|max:150|unique:suppliers,name,' . $id . ',id,salon_id,' . $salon_id,
            'first_name' => 'required|max:150',
            'last_name' => 'required|max:150',
            'phone_number' => "required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",
            'email' => 'required|email|unique:suppliers,email,' . $id . ',id,salon_id,' . $salon_id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'website' => 'required|url',
            'address' => 'required',
            'street' => 'required|max:100',
            'suburb' => 'required|max:50',
            'state' => 'required|max:50',
            'postcode' => 'required|max:10',
        ];
        if ($id) {
            $update_validate = [];
            return array_merge($update_validate, $rules);
        }
        return $rules;
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
            return $validator;
        } else {

        }
    }

}