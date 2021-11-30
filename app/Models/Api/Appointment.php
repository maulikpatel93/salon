<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'appointment';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'salon_id',
        'client_id',
        'service_id',
        'staff_id',
        'date',
        'start_time',
        'end_time',
        'duration',
        'cost',
        'repeats',
        'booking_notes',
        'status',
        'cancellation_reason',
        'reschedule',
        'reschedule_at',
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

    public function client()
    {
        return $this->belongsTo(Users::class, 'client_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Services::class, 'service_id', 'id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'id');
    }
}
