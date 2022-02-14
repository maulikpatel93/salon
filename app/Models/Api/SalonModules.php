<?php

namespace App\Models\Api;

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
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'controller',
        'action',
        'icon',
        'functionality',
        'type',
        'parent_menu_id',
        'parent_submenu_id',
    ];

    public function salonpermission()
    {
        return $this->hasMany(SalonPermission::class, 'salon_module_id', 'id');
    }
}