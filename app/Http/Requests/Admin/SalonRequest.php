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
        if (decode($this->id)) {
            $id = $this->id;
            return [
                'business_name' => 'required',
                'owner_name' => 'required',
                'business_phone_number' => 'required',
                'business_address' => 'required',
                'salon_type' => 'required',
                'timezone' => 'required',
            ];
        } else {
            return [
                'business_name' => 'required',
                'owner_name' => 'required',
                'business_email' => 'required|email|unique:salons',
                'password' => 'required',
                'business_phone_number' => 'required',
                'business_address' => 'required',
                'salon_type' => 'required',
                'timezone' => 'required',
                'password' => 'required|min:6',
                'password_confirmation' => 'required|required_with:password|same:password|min:6',
                'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            ];
        }
    }
}
