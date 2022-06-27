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
    protected $appends = ["TotalQuantity", "TotalValue", "TotalValueRedeemed"];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'salon_id',
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
        'expiry_at',
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
        'expiry_at' => 'datetime',
    ];

    public function salon()
    {
        return $this->belongsTo(Salons::class, 'salon_id', 'id');
    }
    public function voucherto()
    {
        return $this->hasMany(VoucherTo::class, 'voucher_id', 'id');
    }

    // public function voucherservices()
    // {
    //     // return $this->hasMany(Voucherservices::class, 'voucher_id', 'id')->select('service_id');
    //     return $this->belongsToMany(Services::class, 'voucher_services', 'voucher_id', 'service_id');
    //     // return $this->hasMany(Voucherservices::class, 'service_id', 'id');
    // }

    public function getTotalQuantityAttribute()
    {
        $voucherCart = VoucherTo::where(['voucher_id' => $this->id, "salon_id" => $this->salon_id])->whereNotNull('voucher_id');
        if ($this->startdate && $this->enddate) {
            $voucherCart->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate);
        }
        $total = $voucherCart->count();
        return $total;
    }

    public function getTotalValueAttribute()
    {
        $voucherCart = VoucherTo::where(['voucher_id' => $this->id, "salon_id" => $this->salon_id])->whereNotNull('voucher_id');
        if ($this->startdate && $this->enddate) {
            $voucherCart->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate);
        }
        $total = $voucherCart->sum("amount");
        return $total;
    }

    public function getTotalValueRedeemedAttribute()
    {
        $voucherCart = VoucherTo::where(['voucher_id' => $this->id, "salon_id" => $this->salon_id])->whereNotNull('voucher_id');
        if ($this->startdate && $this->enddate) {
            $voucherCart->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate);
        }
        $total = $voucherCart->sum("remaining_balance");
        return $total;
    }
}
