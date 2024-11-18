<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Models;

class vehiculos extends Models
{
    protected $tables = 'vehiculos';
    protected $fillable = [
        'tipovehiculos','descripcions'
    ];
}
