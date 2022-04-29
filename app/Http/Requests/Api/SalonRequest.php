<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SalonRequest extends FormRequest
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
        $rules = [
            'business_name' => 'required',
            'business_phone_number' => "required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/|unique:salons,business_phone_number," . $id,
            'business_email' => 'nullable|email|unique:salons,business_email,' . $id,
            'business_address' => 'required',
            'salon_type' => 'required',
            'timezone' => 'nullable',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
        if (empty($id)) {
            $rules['terms'] = 'required';
        }
        return $rules;
    }
}