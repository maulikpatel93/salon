<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Client extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $appends = ['profile_photo_url', "TotalSales", "TotalStaff", "TotalAppointments", "TotalProducts"];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'role_id',
        'salon_id',
        'panel',
        'profile_photo',
        'first_name',
        'last_name',
        'username',
        'email',
        'email_verified',
        'email_verified_at',
        'password',
        'phone_number',
        'phone_number_verified',
        'phone_number_verified_at',
        'gender',
        'date_of_birth',
        'address',
        'street',
        'suburb',
        'state',
        'postcode',
        'description',
        'send_sms_notification',
        'send_email_notification',
        'recieve_marketing_email',
        'is_active',
        'is_active_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'role_id',
        'salon_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_active_at' => 'datetime',
    ];

    public function getProfilePhotoUrlAttribute()
    {
        $profile_photo_url = asset('storage/client');
        return $this->attributes['profile_photo_url'] = $this->profile_photo && Storage::disk('public')->exists('client/' . $this->profile_photo) ? $profile_photo_url . '/' . $this->profile_photo : "";
    }

    public function salon()
    {
        // return $this->hasOne(Salons::class, 'salon_id', 'id');
        return $this->belongsTo(Salons::class);
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'client_id', 'id');
    }

    public function lastappointment()
    {
        return $this->hasOne(Appointment::class, 'client_id', 'id')->latest();
    }

    public function lastproduct()
    {
        return $this->hasOne(Cart::class, 'client_id', 'id')->latest();
    }

    public function getTotalSalesAttribute()
    {
        if ($this->service_id) {
            if ($this->startdate && $this->enddate) {
                return Cart::where('client_id', $this->id)->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate)->whereNotNull('service_id')->where('service_id', $this->service_id)->sum("cost");
            } else {
                return Cart::where('client_id', $this->id)->whereNotNull('service_id')->where('service_id', $this->service_id)->sum("cost");
            }
        } else if ($this->product_id) {
            if ($this->startdate && $this->enddate) {
                return Cart::where('client_id', $this->id)->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate)->whereNotNull('product_id')->where('product_id', $this->product_id)->sum(DB::raw('cost * qty'));
            } else {
                return Cart::where('client_id', $this->id)->whereNotNull('product_id')->where('product_id', $this->product_id)->sum(DB::raw('cost * qty'));
            }
        } else {
            if ($this->ScreenReport === "clients_by_service") {
                if ($this->startdate && $this->enddate) {
                    return Cart::where('client_id', $this->id)->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate)->whereNotNull('service_id')->sum("cost");
                } else {
                    return Cart::where('client_id', $this->id)->whereNotNull('service_id')->sum("cost");
                }
            } else if ($this->ScreenReport === "clients_by_product") {
                if ($this->startdate && $this->enddate) {
                    return Cart::where('client_id', $this->id)->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate)->whereNotNull('product_id')->sum(DB::raw('cost * qty'));
                } else {
                    return Cart::where('client_id', $this->id)->whereNotNull('product_id')->sum(DB::raw('cost * qty'));
                }
            } else {
                if ($this->startdate && $this->enddate) {
                    return Sale::where('client_id', $this->id)->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate)->sum("total_pay");
                } else {
                    return Sale::where('client_id', $this->id)->sum("total_pay");
                }
            }

        }

    }

    public function getTotalStaffAttribute()
    {
        if ($this->startdate && $this->enddate) {
            return Sale::where('sale.client_id', $this->id)->leftJoin('cart', 'cart.sale_id', '=', 'sale.id')->whereDate('sale.created_at', '>=', $this->startdate)->whereDate('sale.created_at', '<=', $this->enddate)->distinct('cart.staff_id')->count();
        } else {
            return Sale::where('sale.client_id', $this->id)->leftJoin('cart', 'cart.sale_id', '=', 'sale.id')->distinct('cart.staff_id')->count();
        }
    }

    public function getTotalAppointmentsAttribute()
    {
        if ($this->startdate && $this->enddate) {
            return Appointment::where('client_id', $this->id)->whereDate('dateof', '>=', $this->startdate)->whereDate('dateof', '<=', $this->enddate)->count();
        } else {
            return Appointment::where('client_id', $this->id)->count();
        }
    }

    public function getTotalProductsAttribute()
    {
        if ($this->startdate && $this->enddate) {
            return Cart::where('client_id', $this->id)->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate)->whereNotNull('product_id')->count();
        } else {
            return Cart::where('client_id', $this->id)->whereNotNull('product_id')->count();
        }
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'client_id', 'id');
    }
}
