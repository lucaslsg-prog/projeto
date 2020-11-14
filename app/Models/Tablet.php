<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tablet extends Model
{
    protected $fillable = [
        'name',
        'model',
        'tv',
        'radio',
        'average_current',
        'power_of_lock'
    ];

}
