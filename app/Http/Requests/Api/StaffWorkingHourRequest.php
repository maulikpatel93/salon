<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StaffWorkingHourRequest extends FormRequest
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
            'days' => 'required|max:50',
            'start_time' => 'required|max:50',
            'end_time' => 'required|max:50',
        ];
    }
}
