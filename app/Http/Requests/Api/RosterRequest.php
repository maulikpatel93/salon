<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RosterRequest extends FormRequest
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
            'start_time' => 'date_format:H:i|required',
            'end_time' => 'date_format:H:i|after:start_time|required',
        ];
    }
}