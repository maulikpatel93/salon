<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PriceTierRequest extends FormRequest
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
            'name' => 'required|max:100|unique:price_tier,name,' . $id . ',id,salon_id,' . $salon_id,
        ];
    }
}
