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

    public function vouchers()
    {
        return $this->hasOne(Voucher::class, 'id', 'voucher_id')->select('id', 'name', 'code');
    }

    public function membership()
    {
        return $this->hasOne(Membership::class, 'id', 'membership_id')->select('id', 'name', 'credit', 'cost');
    }

    public function voucherto()
    {
        return $this->hasMany(VoucherTo::class, 'cart_id', 'id');
    }

}