<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class BusytimeRequest extends FormRequest
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
        return [
            'salon_id' => 'required|integer',
            'staff_id' => 'required|integer',
            'dateof' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'repeats' => 'required',
            'repeat_time' => 'required_if:repeats,Yes',
            'repeat_time_option' => 'required_if:repeats,Yes',
            'ending' => 'nullable',
            'reason' => 'required',
        ];
    }
}