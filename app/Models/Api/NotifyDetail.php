<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifyDetail extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nofify_detail';

    protected $appends = ['isNewRecord'];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'salon_id',
        'form_id',
        'icon',
        'title',
        'nofify',
        'type',
        'short_description',
        'appointment_times_description',
        'cancellation_description',
        'preview',
        'sms_template',
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

    public function getIsNewRecordAttribute()
    {
        return $this->attributes['isNewRecord'] = ($this->created_at != $this->updated_at) ? false : true;
    }

    public function salon()
    {
        return $this->belongsTo(Salons::class, 'salon_id', 'id');
    }

    public function form()
    {
        return $this->hasOne(Form::class, 'id', 'form_id');
    }
}
