<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class NotifyDetailRequest extends FormRequest
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
            'form_id' => 'required_if:nofify,SMS',
            'title' => 'required',
            'nofify' => 'required',
            'type' => 'required',
            'short_description' => 'required',
            'appointment_times_description' => 'required',
            'cancellation_description' => 'required',
            'sms_template' => 'required_if:nofify,SMS',
            'preview' => 'nullable',
        ];
    }
}
