<?php

namespace App\Models\Api;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'dateof',
        'start_time',
        'end_time',
        'start_datetime',
        'end_datetime',
        'repeats',
        'repeat_time',
        'repeat_time_option',
        'weekday',
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

    protected function dateof(): Attribute
    {
        return Attribute::make(
            get:fn($value) => $this->datetimevalue($value, "date"),
            set:fn($value) => $value
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
            get:fn($value) => $value ? Carbon::parse($value, 'UTC')->setTimezone(localtimezone())->format('Y-m-d') : "",
            set:fn($value) => $value
        );
    }

    protected function startTime(): Attribute
    {
        return Attribute::make(
            // get:fn($value) => Carbon::parse($value, 'UTC')->setTimezone(localtimezone())->format('H:i:s'),
            get:fn($value) => $this->datetimevalue($value, "start"),
            set:fn($value) => $value
        );
    }

    protected function endTime(): Attribute
    {
        return Attribute::make(
            // get:fn($value) => Carbon::parse($value, 'UTC')->setTimezone(localtimezone())->format('H:i:s'),
            get:fn($value) => $this->datetimevalue($value, "end"),
            set:fn($value) => $value
        );
    }

    protected function startDatetime(): Attribute
    {
        return Attribute::make(
            get:fn($value) => Carbon::parse($value, 'UTC')->setTimezone(localtimezone())->format('Y-m-d H:i:s'),
            set:fn($value) => $value
        );
    }

    protected function endDatetime(): Attribute
    {
        return Attribute::make(
            get:fn($value) => Carbon::parse($value, 'UTC')->setTimezone(localtimezone())->format('Y-m-d H:i:s'),
            set:fn($value) => $value
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
            return Carbon::parse($time)->format('Y-m-d');
        }
        return Carbon::parse($time)->format('H:i:s');
    }
}
