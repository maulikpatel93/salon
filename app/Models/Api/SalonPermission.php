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

    public function salonmodule()
    {
        return $this->belongsTo(SalonModules::class, 'salon_module_id', 'id');
    }

    public function getAccessAttribute()
    {
        $role_id = isset($_REQUEST['role_id']) && $_REQUEST['role_id'] ? $_REQUEST['role_id'] : 0;
        $salon_id = isset($_REQUEST['salon_id']) && $_REQUEST['salon_id'] ? $_REQUEST['salon_id'] : 0;
        if ($role_id && $salon_id) {
            $access = SalonAccess::where(['salon_id' => $salon_id, 'role_id' => $role_id, 'salon_permission_id' => $this->id, 'access' => '1'])->count();
            return $this->attributes['access'] = $access ? true : false;
        }
        return $this->attributes['access'] = false;
    }

}