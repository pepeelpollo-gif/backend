<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    // Le indicamos a Laravel cómo se llamará nuestra tabla real en MySQL
    protected $table = 'servicios';
    protected $primaryKey = 'id_servicio';

    // Los campos que vamos a permitir llenar
    protected $fillable = ['nombre_servicio', 'precio'];
}