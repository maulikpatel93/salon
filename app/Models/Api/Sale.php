<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'salon_id',
        'client_id',
        'eventdate',
        'invoicedate',
        'totalprice',
        'paidby',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'salon_id',
        'client_id',
        'appointment_id',
        'voucher_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
    ];

    public function salon()
    {
        return $this->hasOne(Salons::class, 'id', 'salon_id');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function appointment()
    {
        return $this->hasOne(Appointment::class, 'id', 'appointment_id');
    }

    public function cart()
    {
        $withArray = [
            'services',
            'staff',
            'products',
            'vouchers',
            'membership',
            'subscription',
            'voucherto',
        ];
        return $this->hasMany(Cart::class, 'sale_id', 'id')->with($withArray);
    }

}