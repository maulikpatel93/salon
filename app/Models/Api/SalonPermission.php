<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonPermission extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'salon_permissions';
    protected $appends = ['access'];

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'panel',
        'salon_module_id',
        'title',
        'name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [];

    // public function salonmodule()
    // {
    //     return $this->belongsTo(SalonAccess::class, 'salon_id', 'id');
    // }

    public function getAccessAttribute()
    {
        $staff_id = isset($_REQUEST['staff_id']) && $_REQUEST['staff_id'] ? $_REQUEST['staff_id'] : 0;
        if ($staff_id) {
            $access = SalonAccess::where(['staff_id' => $staff_id, 'salon_permission_id' => $this->id])->count();
            return $this->attributes['access'] = $access ? true : false;
        }
        return $this->attributes['access'] = false;
    }

}