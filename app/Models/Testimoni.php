<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $fillable = [
        'title',
        'heading',
        'sub_heading',
        'name',
        'profile',
        'rating',
        'image'
    ];
}
