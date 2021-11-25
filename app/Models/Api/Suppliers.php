<?php

namespace App\Models\Api;

// use App\Models\Api\Salons;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'suppliers';

    protected $appends = ['isNewRecord'];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'salon_id',
        'name',
        'first_name',
        'last_name',
        'email',
        'email_verified',
        'email_verified_at',
        'phone_number',
        'phone_number_verified',
        'phone_number_verified_at',
        'logo',
        'website',
        'address',
        'street',
        'suburb',
        'state',
        'postcode',
        'description',
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

    public function getIsNewRecordAttribute()
    {
        return $this->attributes['isNewRecord'] = ($this->created_at != $this->updated_at) ? false : true;
    }

    public function salon()
    {
        return $this->hasOne(Salons::class, 'salon_id', 'id');
    }
}
