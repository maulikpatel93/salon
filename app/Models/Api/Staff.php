<?php

namespace App\Models\Api;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
    protected $appends = ['isStaffChecked', 'profile_photo_url', "TotalCustomer", "NewCustomer", "TotalAppointment", "TotalServicesBooked", "Retained", "OnlineBookings", "TotalValue", "ServicesInvoiced", "ProductsInvoiced", "SalesTotal", "TotalServiceSold", "TotalProductSold", "TotalNetSale", "TotalTax", "TotalGrossSale"];
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
        if ($this->startdate && $this->enddate) {
            return Appointment::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate)->count();
        } else {
            return Appointment::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->count();
        }
    }

    public function getNewCustomerAttribute()
    {
        return Appointment::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->whereDate('created_at', '>', Carbon::now())->count();
    }

    public function getTotalAppointmentAttribute()
    {
        return $this->appointment()->count();
    }

    public function getTotalServicesBookedAttribute()
    {
        if ($this->startdate && $this->enddate) {
            return Appointment::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate)->distinct('service_id')->count();
        } else {
            return Appointment::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->distinct('service_id')->count();
        }
    }

    public function getRetainedAttribute()
    {
        return $this->appointment()->count();
    }

    public function getOnlineBookingsAttribute()
    {
        if ($this->startdate && $this->enddate) {
            return Appointment::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate)->where(["status" => "Scheduled"])->count();
        } else {
            return Appointment::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->where(["status" => "Scheduled"])->count();
        }
    }

    public function getTotalValueAttribute()
    {
        if ($this->startdate && $this->enddate) {
            return Appointment::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate)->sum('cost');
        } else {
            return Appointment::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->sum('cost');
        }
    }

    public function getServicesInvoicedAttribute()
    {
        if ($this->startdate && $this->enddate) {
            return Cart::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate)->whereNotNull("staff_id")->whereNotNull("service_id")->sum('cost');
        } else {
            return Cart::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->whereNotNull("staff_id")->whereNotNull("service_id")->sum('cost');
        }
    }

    public function getProductsInvoicedAttribute()
    {
        if ($this->startdate && $this->enddate) {
            return Cart::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate)->whereNotNull("staff_id")->whereNotNull("product_id")->sum(DB::raw('cost * qty'));
        } else {
            return Cart::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->whereNotNull("staff_id")->whereNotNull("product_id")->sum(DB::raw('cost * qty'));
        }
    }

    public function getSalesTotalAttribute()
    {
        if ($this->startdate && $this->enddate) {
            return Cart::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate)->whereNotNull("staff_id")->sum('cost');
        } else {
            return Cart::where(['staff_id' => $this->id, 'salon_id' => $this->salon_id])->whereNotNull("staff_id")->sum('cost');
        }
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'staff_id', 'id');
    }

    public function getTotalServiceSoldAttribute()
    {
        $serviceCart = Cart::where(['staff_id' => $this->id])->whereNotNull('staff_id')->whereNotNull('service_id');
        if ($this->startdate && $this->enddate) {
            $serviceCart->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate);
        }
        $service_item_sold = $serviceCart->count();
        return $service_item_sold;
    }

    public function getTotalProductSoldAttribute()
    {
        $productCart = Cart::where(['staff_id' => $this->id])->whereNotNull('staff_id')->whereNotNull('product_id');
        if ($this->startdate && $this->enddate) {
            $productCart->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate);
        }
        $product_item_sold = $productCart->count();
        return $product_item_sold;
    }

    public function getTotalNetSaleAttribute()
    {
        $staffCart = Cart::where(['staff_id' => $this->id])->whereNotNull('staff_id')->whereNotNull('service_id');
        if ($this->startdate && $this->enddate) {
            $staffCart->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate);
        }
        $staff_gross_sale = $staffCart->sum('cost');

        $tax = Tax::where(['name' => 'GST', 'is_active' => 1])->first();
        $taxpercentage = $tax ? $tax->percentage : 0;
        $staff_taxvalue = ($staff_gross_sale / $taxpercentage);
        $staff_net_sales = ($staff_gross_sale - $staff_taxvalue);
        return $staff_net_sales;
    }

    public function getTotalTaxAttribute()
    {
        $staffCart = Cart::where(['staff_id' => $this->id])->whereNotNull('staff_id')->whereNotNull('service_id');
        if ($this->startdate && $this->enddate) {
            $staffCart->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate);
        }
        $staff_gross_sale = $staffCart->sum('cost');

        $tax = Tax::where(['name' => 'GST', 'is_active' => 1])->first();
        $taxpercentage = $tax ? $tax->percentage : 0;
        $staff_taxvalue = ($staff_gross_sale / $taxpercentage);
        return $staff_taxvalue;
    }

    public function getTotalGrossSaleAttribute()
    {
        $staffCart = Cart::where(['staff_id' => $this->id])->whereNotNull('staff_id')->whereNotNull('service_id');
        if ($this->startdate && $this->enddate) {
            $staffCart->whereDate('created_at', '>=', $this->startdate)->whereDate('created_at', '<=', $this->enddate);
        }
        $staff_gross_sale = $staffCart->sum("cost");
        return $staff_gross_sale;
    }
}
