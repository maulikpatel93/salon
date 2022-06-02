<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
        return [
            'salon_id' => 'required|integer',
            'client_id' => 'required|integer',
            'applied_voucher_to_id' => 'nullable',
            'eventdate' => 'nullable|date',
            'invoicedate' => 'nullable|date',
            'totalprice' => 'nullable',
            'status' => 'nullable',
            'description' => 'nullable',
            'voucher_discount' => 'nullable',
            'total_pay' => 'nullable',
        ];
    }
}
