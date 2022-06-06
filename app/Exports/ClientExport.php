<?php

namespace App\Exports;

use App\Models\Api\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return [
            'id',
            'role_id',
            'salon_id',
            'price_tier_id',
            'panel',
            'auth_key',
            'first_name',
            'last_name',
            'username',
            'email',
            'email_otp',
            'email_verified',
            'email_verified_at',
            'password',
            'phone_number',
            'phone_number_otp',
            'phone_number_verified',
            'phone_number_verified_at',
            'profile_photo',
            'remember_token',
            'is_active',
            'is_active_at',
            'created_at',
            'updated_at',
            'gender',
            'date_of_birth',
            'address',
            'street',
            'suburb',
            'state',
            'postcode',
            'description',
            'send_sms_notification',
            'send_email_notification',
            'recieve_marketing_email',
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Client::all();
    }
}
