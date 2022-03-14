<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SalonWorkingHoursRequest extends FormRequest
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
        $id = decode($this->id);

        $rules = [
            'days.*' => 'required',
            'start_time.*' => 'nullable|required_if:dayoff.*,1',
            'end_time.*' => 'nullable|required_if:dayoff.*,1|date_format:H:i|after:start_time.*',
        ];
        // echo '<pre>';
        // print_r($rules);
        // echo '<pre>';
        // dd();

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 'working_hours.start_time.*.required' => 'Start time is required',
            // 'working_hours.end_time.*.required' => 'End time is required',
            'working_hours.*.end_time.after' => 'End time must be a date after start time',
        ];
    }
}