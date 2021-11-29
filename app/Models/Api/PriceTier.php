<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceTier extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'price_tier';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'salon_id',
        'name',
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

    public function staff()
    {
        return $this->hasMany(Staff::class, 'price_tier_id', 'id');
    }
}
