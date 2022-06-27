<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormElement extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'form_element';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'salon_id',
        'form_element_type_id',
        'form_id',
        'section_type',
        'caption',
        'labeltext',
        'form_type',
        'position',
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

    public function form()
    {
        return $this->hasOne(Form::class, 'id', 'form_id');
    }

    public function form_element_type()
    {
        return $this->hasOne(FormElementType::class, 'id', 'form_element_type_id');
    }
}
