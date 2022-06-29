<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormElementOptions extends Model
{
    use HasFactory;

    public $timestamps = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'form_element_options';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'salon_id',
        'form_element_id',
        'optvalue',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'salon_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [];

    public function salon()
    {
        return $this->belongsTo(Salons::class, 'salon_id', 'id');
    }
    public function form_element()
    {
        return $this->hasOne(FormElement::class, 'id', 'form_element_id');
    }
}
