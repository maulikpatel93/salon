<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class NotifyRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'client_id' => 'required|integer',
            'appointment_id' => 'required|integer',
            'type' => 'required',
        ];
    }
}
