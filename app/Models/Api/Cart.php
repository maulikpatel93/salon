<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cart';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'sale_id',
        'appointment_id',
        'service_id',
        'staff_id',
        'product_id',
        'voucher_to_id',
        'type',
        'cost',
        'qty',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'sale_id',
        'appointment_id',
        'service_id',
        'staff_id',
        'product_id',
        'voucher_to_id',
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

    public function sale()
    {
        return $this->hasOne(Sale::class, 'id', 'sale_id');
    }

    public function services()
    {
        return $this->hasOne(Services::class, 'id', 'service_id')->select('id', 'name');
    }

    public function staff()
    {
        return $this->hasOne(Users::class, 'id', 'staff_id')->select('id', 'first_name', 'last_name');
    }

    public function products()
    {
        return $this->hasOne(Products::class, 'id', 'product_id')->select('id', 'name');
    }

    public function membership()
    {
        return $this->hasOne(Membership::class, 'id', 'membership_id')->select('id', 'name', 'credit', 'cost');
    }

    public function voucherto()
    {
        return $this->hasOne(VoucherTo::class, 'id', 'voucher_to_id');
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class, 'id', 'subscription_id')->select('id', 'name', 'amount', 'repeats', 'repeat_time', 'repeat_time_option');
    }

}
