<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class VoucherRequest extends FormRequest
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
        $rules = [
            'salon_id' => 'required|integer',
            'code' => 'max:16|unique:voucher,code,' . $id,
            'name' => 'required|max:150|unique:voucher,name,' . $id . ',id,salon_id,' . $salon_id,
            'description' => 'required',
            'amount' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'valid' => 'required|integer',
            'limit_uses_value' => 'required_if:limit_uses,1',
            'terms_and_conditions' => 'required',
        ];
        return $rules;
    }
}
