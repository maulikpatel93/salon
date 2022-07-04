<?php

namespace App\Models\Api;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'applied_voucher_to_id',
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
        'appointment_id',
        'applied_voucher_to_id',
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

    public function appliedvoucherto()
    {
        $withArray = ['voucher'];
        return $this->hasOne(VoucherTo::class, 'id', 'applied_voucher_to_id')->with($withArray);
    }

    public function cart()
    {
        $withArray = [
            'services',
            'staff',
            'products',
            'membership',
            'subscription',
            'voucherto',
        ];
        return $this->hasMany(Cart::class, 'sale_id', 'id')->with($withArray);
    }

    protected function invoicedate(): Attribute
    {
        return Attribute::make(
            get:fn($value) => $this->datetimevalue($value, "date"),
            set:fn($value) => $value
        );
    }

    public function datetimevalue($value, $type = "")
    {
        $time = $value;
        if ($type === "start") {
            $time = $this->start_datetime;
        } else if ($type === "end") {
            $time = $this->end_datetime;
        } else if ($type === "date") {
            // $time = Carbon::parse($value, localtimezone())->setTimezone('UTC')->format('Y-m-d H:i:s');
            return Carbon::parse($time, 'UTC')->setTimezone(localtimezone())->format('Y-m-d');
            // return $time;
        }
        return Carbon::parse($time)->format('H:i:s');
    }

}
