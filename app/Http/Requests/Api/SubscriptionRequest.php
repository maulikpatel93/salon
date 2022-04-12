<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
            'name' => 'required|max:150|unique:membership,name,' . $id . ',id,salon_id,' . $salon_id,
            'amount' => 'required',
            'repeats' => 'required',
            'repeat_time' => 'required',
            'repeat_time_option' => 'required',
        ];
    }
}