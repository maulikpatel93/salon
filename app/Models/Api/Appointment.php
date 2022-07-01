<?php

namespace App\Models\Api;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
    protected $appends = ['listview', 'sale'];
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
        'dateof',
        'start_time',
        'end_time',
        'start_datetime',
        'end_datetime',
        'duration',
        'cost',
        'repeats',
        'repeat_time',
        'repeat_time_option',
        'ending',
        'booking_notes',
        'status',
        'cancellation_reason',
        'reschedule',
        'reschedule_at',
        'is_active',
        'is_active_at',
        'status_manage',
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
        return $this->attributes['listview'] = 'Appointment';
    }
    public function getSaleAttribute()
    {
        $sale = Sale::where(['salon_id' => $this->salon_id, 'client_id' => $this->client_id, 'appointment_id' => $this->id, 'eventdate' => $this->showdate])->first();
        return $this->attributes['sale'] = $sale ? $sale->toArray() : [];
    }
    public function salon()
    {
        return $this->belongsTo(Salons::class, 'salon_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id')->where(["role_id" => 6]);
    }

    public function service()
    {
        return $this->belongsTo(Services::class, 'service_id', 'id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'id')->where(["role_id" => 5]);
    }

    protected function dateof(): Attribute
    {
        return Attribute::make(
            get:fn($value) => $this->datetimevalue($value, "date"),
        );
    }

    protected function showdate(): Attribute
    {
        return Attribute::make(
            get:fn($value) => $this->datetimevalue($value, "date"),
            set:fn($value) => $value
        );
    }

    protected function end(): Attribute
    {
        return Attribute::make(
            get:fn($value) => $value ? Carbon::parse($value . " 00:00:00", 'UTC')->setTimezone(localtimezone())->format('Y-m-d') : "",
        );
    }

    protected function startTime(): Attribute
    {
        return Attribute::make(
            // get:fn($value) => Carbon::parse($value, 'UTC')->setTimezone(localtimezone())->format('H:i:s'),
            get:fn($value) => $this->datetimevalue($value, "start"),
        );
    }

    protected function endTime(): Attribute
    {
        return Attribute::make(
            // get:fn($value) => Carbon::parse($value, 'UTC')->setTimezone(localtimezone())->format('H:i:s'),
            get:fn($value) => $this->datetimevalue($value, "end"),
        );
    }

    protected function startDatetime(): Attribute
    {
        return Attribute::make(
            get:fn($value) => Carbon::parse($value, 'UTC')->setTimezone(localtimezone())->format('Y-m-d H:i:s'),
        );
    }

    protected function endDatetime(): Attribute
    {
        return Attribute::make(
            get:fn($value) => Carbon::parse($value, 'UTC')->setTimezone(localtimezone())->format('Y-m-d H:i:s'),
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
            $time = $this->start_datetime;
            return Carbon::parse($time, 'UTC')->setTimezone(localtimezone())->format('Y-m-d');
        }
        return Carbon::parse($time)->format('H:i:s');

    }
}
