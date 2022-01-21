<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $appends = ['isStaffChecked'];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'salon_id',
        'price_tier_id',
        'profile_photo',
        'first_name',
        'last_name',
        'username',
        'email',
        'email_verified',
        'email_verified_at',
        'phone_number',
        'phone_number_verified',
        'phone_number_verified_at',
        'address',
        'street',
        'suburb',
        'state',
        'postcode',
        'calendar_booking',
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
        return $this->belongsTo(Salons::class, 'salon_id', 'id');
    }

    public function pricetier()
    {
        return $this->belongsTo(PriceTier::class, 'price_tier_id', 'id');
    }

    public function staffservices()
    {
        return $this->hasMany(StaffServices::class, 'staff_id', 'id')->select('service_id');
    }

    public function staffworkinghours()
    {
        return $this->hasMany(StaffWorkingHours::class, 'staff_id', 'id');
    }

    public function getIsStaffCheckedAttribute()
    {
        $service_id = isset($_REQUEST['service_id']) && $_REQUEST['service_id'] ? $_REQUEST['service_id'] : 0;
        if ($service_id) {
            $AddOnStaff = StaffServices::where(['service_id' => $service_id, 'staff_id' => $this->id])->count();
            return $this->attributes['isStaffChecked'] = $AddOnStaff ? true : false;
        }
        return $this->attributes['isStaffChecked'] = false;
    }
}