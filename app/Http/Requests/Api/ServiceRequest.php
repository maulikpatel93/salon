<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        $category_id = $this->category_id;
        return [
            'salon_id' => 'required|integer',
            'category_id' => 'required|integer',
            'tax_id' => 'required|integer',
            'name' => 'required|max:150|unique:services,name,' . $id . ',id,salon_id,' . $salon_id . ',category_id,' . $category_id,
            'description' => 'required',
            'duration' => 'required|max:6',
            'padding_time' => 'required|max:6',
            'color' => 'required|max:7',
            'deposit_booked_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
}
