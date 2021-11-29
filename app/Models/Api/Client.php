<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'role_id',
        'salon_id',
        'first_name',
        'last_name',
        'username',
        'email',
        'email_verified',
        'email_verified_at',
        'password',
        'phone_number',
        'phone_number_verified',
        'phone_number_verified_at',
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
        'is_active',
        'is_active_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_active_at' => 'datetime',
    ];

    public function salon()
    {
        // return $this->hasOne(Salons::class, 'salon_id', 'id');
        return $this->belongsTo(Salons::class);
    }
}
