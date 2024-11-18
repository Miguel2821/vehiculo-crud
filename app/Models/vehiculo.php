<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Models;

class vehiculo extends Models
{
    protected $tables = 'vehiculo';
    protected $fillable = [
        'tipovehiculo','descripcion'
    ];
}
