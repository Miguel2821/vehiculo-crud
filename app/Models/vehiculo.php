<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    protected $table = 'vehiculo';
    protected $fillable = [
        'tipovehiculo','descripcion'
    ];
}
