<?php

namespace App\Models\Api;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Staff extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $appends = ['isStaffChecked', 'profile_photo_url', "TotalCustomer", "NewCustomer", "TotalAppointment", "TotalServicesBooked", "Retained", "OnlineBookings", "TotalValue", "ServicesInvoiced", "ProductsInvoiced", "SalesTotal"];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'role_id',
        'salon_id',
        'auth_key',
        'panel',
        'price_tier_id',
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

    public function getProfilePhotoUrlAttribute()
    {
        $profile_photo_url = asset('storage/staff');
        return $this->attributes['profile_photo_url'] = $this->profile_photo && Storage::disk('public')->exists('staff/' . $this->profile_photo) ? $profile_photo_url . '/' . $this->profile_photo : "";
    }

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
        return $this->belongsToMany(Services::class, 'staff_services', 'staff_id', 'service_id');
        // return $this->hasMany(StaffServices::class, 'staff_id', 'id')->select('service_id');
    }

    public function staffworkinghours()
    {
        return $this->hasMany(StaffWorkingHours::class, 'staff_id', 'id');
    }

    public function rosterfield()
    {
        return $this->hasMany(Roster::class, 'staff_id', 'id');
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'staff_id', 'id');
    }

    public function busytime()
    {
        return $this->hasMany(Busytime::class, 'staff_id', 'id');
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

    public function getTotalCustomerAttribute()
    {
        return Appointment::where('staff_id', $this->id)->count();
    }

    public function getNewCustomerAttribute()
    {
        return Appointment::where('staff_id', $this->id)->whereDate('created_at', '>', Carbon::now())->count();
    }

    public function getTotalAppointmentAttribute()
    {
        return $this->appointment()->count();
    }

    public function getTotalServicesBookedAttribute()
    {
        return Appointment::where('staff_id', $this->id)->distinct('service_id')->count();
    }

    public function getRetainedAttribute()
    {
        return $this->appointment()->count();
    }

    public function getOnlineBookingsAttribute()
    {
        return Appointment::where('staff_id', $this->id)->where(["status" => "Scheduled"])->count();
    }

    public function getTotalValueAttribute()
    {
        return Appointment::where('staff_id', $this->id)->sum('cost');
    }

    public function getServicesInvoicedAttribute()
    {
        return Cart::where('staff_id', $this->id)->whereNotNull("staff_id")->whereNotNull("service_id")->sum('cost');
    }

    public function getProductsInvoicedAttribute()
    {
        return Cart::where('staff_id', $this->id)->whereNotNull("staff_id")->whereNotNull("product_id")->sum('cost');
    }

    public function getSalesTotalAttribute()
    {
        return Cart::where('staff_id', $this->id)->whereNotNull("staff_id")->sum('cost');
    }
}
