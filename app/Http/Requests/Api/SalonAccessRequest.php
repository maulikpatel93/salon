<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SalonAccessRequest extends FormRequest
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
        return [
            'salon_id' => 'required',
            'salon_permission_id' => 'required',
            'staff_id' => 'required|max:150',
            'type' => 'required',
            'access' => 'required|max:150|unique:salon_access,salon_permission_id,' . $id,
        ];
    }
}