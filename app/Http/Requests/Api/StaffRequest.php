<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'role_id' => 'required|integer',
            'salon_id' => 'required|integer',
            'price_tier_id' => 'required|integer',
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email|unique:users,email,' . $id . ',id,salon_id,' . $salon_id,
            // 'auth_key' => 'nullable|required|unique:users,auth_key,' . $id . ',id',
            'phone_number' => "required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // 'address' => 'required',
            // 'street' => 'required|max:100',
            // 'suburb' => 'required|max:50',
            // 'state' => 'required|max:50',
            // 'postcode' => 'required|max:10',
        ];
    }
}