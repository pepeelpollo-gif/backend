<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'nomcli', 
        'genero', 
        'servicio', 
        'telefono', 
        'correo', 
        'alergias', 
        'notas',
        'estatusCliente',
        'costoEstimado'
    ];
}