<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Busytime extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'busy_time';
    protected $appends = ['listview'];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'salon_id',
        'staff_id',
        'date',
        'start_time',
        'end_time',
        'repeats',
        'repeat_time',
        'repeat_time_option',
        'ending',
        'reason',
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

    public function getListViewAttribute()
    {
        return $this->attributes['listview'] = 'BusyTime';
    }

    public function salon()
    {
        return $this->belongsTo(Salons::class, 'salon_id', 'id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'id')->where(["role_id" => 5]);
    }
}