<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'salon_id',
        'category_id',
        'tax_id',
        'name',
        'description',
        'duration',
        'padding_time',
        'color',
        'service_booked_online',
        'deposit_booked_online',
        'deposit_booked_price',
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
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class, 'tax_id', 'id');
    }

    public function serviceprice()
    {
        return $this->hasMany(ServicesPrice::class, 'service_id', 'id');
    }

    public function addonservices()
    {
        return $this->hasMany(AddOnServices::class, 'service_id', 'id')->select('add_on_service_id');
    }

    public function staffservices()
    {
        return $this->hasMany(StaffServices::class, 'service_id', 'id')->select('staff_id');
    }

    public function voucherservice()
    {
        return $this->belongsToMany(Voucher::class, 'voucher_services', 'service_id', 'voucher_id')->select('voucher_id', 'name');
    }
}
