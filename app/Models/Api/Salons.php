<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Salons extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'salons';
    protected $appends = ['logo_url'];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'business_name',
        'business_email',
        'business_email_verified',
        'business_email_verified_at',
        'password',
        'business_phone_number',
        'business_phone_number_verified',
        'business_phone_number_verified_at',
        'business_address',
        'salon_type',
        'number_of_staff',
        'logo',
        'timezone',
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
        'business_email_verified_at' => 'datetime',
        'business_phone_number_verified_at' => 'datetime',
        'is_active_at' => 'datetime',
    ];

    public function getLogoUrlAttribute()
    {
        $profile_photo_url = asset('storage/salons');
        return $this->attributes['logo_url'] = $this->logo && Storage::disk('public')->exists('salons/' . $this->logo) ? $profile_photo_url . '/' . $this->logo : "";
    }

    public function suppliers()
    {
        return $this->hasMany(Suppliers::class, 'supplier_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Products::class, 'product_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(Categories::class, 'Category_id', 'id');
    }

    public function working_hours()
    {
        return $this->hasMany(SalonWorkingHours::class, 'salon_id', 'id');
    }

}