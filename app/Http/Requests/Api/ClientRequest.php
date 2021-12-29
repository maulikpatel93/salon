<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        $role_id = $this->role_id;
        $rules = [
            'role_id' => 'required|integer',
            'salon_id' => 'required|integer',
            'first_name' => 'required|max:150',
            'last_name' => 'required|max:150',
            'phone_number' => "required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",
            'username' => 'username|unique:users,username,' . $id . ',id,salon_id,' . $salon_id . ',role_id,' . $role_id,
            'email' => 'required|email|unique:users,email,' . $id . ',id,salon_id,' . $salon_id . ',role_id,' . $role_id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'street' => 'required|max:100',
            'suburb' => 'required|max:50',
            'state' => 'required|max:50',
            'postcode' => 'required|max:10',
            'description' => 'required|max:10',
        ];
        return $rules;
    }
}