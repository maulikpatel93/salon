<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ServicePriceRequest extends FormRequest
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
        $service_id = $this->service_id;
        return [
            'service_id' => 'required|integer',
            'name' => 'required|max:150|unique:services,name,' . $id . ',id,service_id,' . $service_id,
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'add_on_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
}
