<?php

namespace App\Http\Requests\Admin;

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
        $id = decode($this->id);
        $rules = [
            'business_name' => 'required',
            'owner_name' => 'required',
            'business_phone_number' => "required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",
            'business_email' => 'required|email|unique:salons,business_email,' . $id,
            'business_address' => 'required',
            'salon_type' => 'required',
            'timezone' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
        return $rules;
    }
}
