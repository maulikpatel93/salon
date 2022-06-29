<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormElementType extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'form_element_type';
    protected $appends = ['question', "options"];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'icon',
        'section_type',
        'can_repeat',
        'questionholder',
        'form_type',
        'is_edit',
        'is_active',
        'is_active_at',
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
    protected $casts = [
        'is_active_at' => 'datetime',
    ];

    public function getQuestionAttribute()
    {
        return $this->attributes['question'] = "";
    }
    public function getOptionsAttribute()
    {
        return $this->attributes['question'] = [];
    }
}
