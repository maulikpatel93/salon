<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class FormElementRequest extends FormRequest
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
            'form_element_type_id' => 'required|integer',
            'form_id' => 'required|integer',
            'section_type' => 'required',
            'is_edit' => 'integer',
            'form_type' => 'required',
            'question' => 'required_if:is_edit,1',
        ];
    }
}
