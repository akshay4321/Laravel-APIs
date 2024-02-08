<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormComponent extends Model
{
    use HasFactory;

    protected $fillable = ['form_id', 'type', 'label', 'options', 'position'];

    protected $casts = [
        'options' => 'array',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
