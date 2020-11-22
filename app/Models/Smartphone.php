<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Smartphone extends Model
{
    protected $fillable = [
        'name',
        'model',
        'tv',
        'tss',
        'radio',
        'average_current',
        'power_of_lock',
        'observations',
        'current_measurement',
        'esim'
    ];

}
