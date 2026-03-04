<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cta extends Model
{
    protected $fillable = [
        'heading',
        'sub_heading',
        'button_text',
        'whatsapp'
    ];
}
