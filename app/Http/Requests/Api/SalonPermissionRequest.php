<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SalonPermissionRequest extends FormRequest
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
        $module = $this->module;
        return [
            'type' => 'required',
            'module' => 'required',
            'title' => 'required|max:150',
            'name' => 'required|max:150|unique:salon_permissions,name,' . $id . ',id,module,' . $module,
        ];
    }
}