<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'voucher';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'salon_id',
        'code',
        'name',
        'description',
        'amount',
        'valid',
        'used_online',
        'limit_uses',
        'limit_uses_value',
        'terms_and_conditions',
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

    public function voucherservices()
    {
        // return $this->hasMany(Voucherservices::class, 'voucher_id', 'id')->select('service_id');
        return $this->belongsToMany(Services::class, 'voucher_services', 'voucher_id', 'service_id');
        // return $this->hasMany(Voucherservices::class, 'service_id', 'id');
    }
}
