<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonModules extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'salon_modules';

    protected $appends = ['isNewRecord'];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'panel',
        'controller',
        'action',
        'icon',
        'functionality',
        'type',
        'parent_menu_id',
        'parent_submenu_id',
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
}