<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Clientphoto extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'client_photos';

    protected $appends = ['photo_url'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'salon_id',
        'client_id',
        'name',
        'is_profile_photo',
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

    public function getPhotoUrlAttribute()
    {
        $photo_url = asset('storage/client');
        return $this->attributes['photo_url'] = $this->name && Storage::disk('public')->exists('client/' . $this->name) ? $photo_url . '/' . $this->name : "";
    }

    public function salon()
    {
        // return $this->hasOne(Salons::class, 'salon_id', 'id');
        return $this->belongsTo(Salons::class);
    }
}