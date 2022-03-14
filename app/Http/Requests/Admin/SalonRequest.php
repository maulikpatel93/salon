<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SalonRequest extends FormRequest
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
            'business_name' => 'required',
            'business_phone_number' => "required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",
            'business_email' => 'required|email|unique:salons,business_email,' . $id,
            'business_address' => 'required',
            'salon_type' => 'required',
            'timezone' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'working_hours.*.days' => 'required',
            'working_hours.*.dayoff' => 'boolean',
            // 'working_hours.*.start_time' => 'required_if:working_hours[0][dayoff],1',
            // 'working_hours.*.end_time' => 'required_if:working_hours[0][dayoff],1|date_format:H:i|after:working_hours[0][start_time]',
        ];
        // if ($this->working_hours) {
        //     for ($x = 0; $x < count($this->working_hours); $x++) {
        //         $rules['working_hours[' . $x . '][days]'] = 'required';
        //         $rules['working_hours[' . $x . '][dayoff]'] = 'boolean';
        //         $rules['working_hours[' . $x . '][start_time]'] = 'required_if:working_hours[' . $x . '][dayoff],1|date_format:H:i';
        //         $rules['working_hours[' . $x . '][end_time]'] = 'required_if:working_hours[' . $x . '][dayoff],1|date_format:H:i|after:working_hours[' . $x . '][start_time]';
        //     }
        // }
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