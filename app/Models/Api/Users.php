<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Users extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $appends = ['isNewRecord', 'profile_photo_url'];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'role_id',
        'salon_id',
        'profile_photo',
        'first_name',
        'last_name',
        'username',
        'email',
        'email_verified',
        'email_verified_at',
        'phone_number',
        'phone_number_verified',
        'phone_number_verified_at',
        'password',
        'panel',
        'is_active',
        'is_active_at',
        'auth_key',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'profile_photo',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getIsNewRecordAttribute()
    {
        return $this->attributes['isNewRecord'] = ($this->created_at != $this->updated_at) ? false : true;
    }

    public function getProfilePhotoUrlAttribute()
    {
        if ($this->role_id == 4) {
            $profile_photo_url = asset('storage/owner');
        } else if ($this->role_id == 5) {
            $profile_photo_url = asset('storage/staff');
        } else if ($this->role_id == 6) {
            $profile_photo_url = asset('storage/client');
        } else {
            $profile_photo_url = "";
        }
        return $this->attributes['profile_photo_url'] = $this->profile_photo ? $profile_photo_url . '/' . $this->profile_photo : "";
    }

    public function role()
    {
        return $this->hasOne(Roles::class, 'id', 'role_id');
    }

    public function salon()
    {
        return $this->hasOne(Salons::class, 'id', 'salon_id');
    }
}