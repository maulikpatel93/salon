<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salons extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'salons';

    protected $appends = ['isNewRecord'];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'business_name',
        'owner_name',
        'business_email',
        'business_email_verified',
        'business_email_verified_at',
        'password',
        'business_phone_number',
        'business_phone_number_verified',
        'business_phone_number_verified_at',
        'business_address',
        'salon_type',
        'number_of_staff',
        'logo',
        'timezone',
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
        'business_email_verified_at' => 'datetime',
        'business_phone_number_verified_at' => 'datetime',
        'is_active_at' => 'datetime',
    ];

    public function getIsNewRecordAttribute()
    {
        return $this->attributes['isNewRecord'] = ($this->created_at != $this->updated_at) ? false : true;
    }
}
