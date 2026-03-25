<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importamos nuestros modelos modernos
use App\Models\Servicio;
use App\Models\Cliente;

class ApiController extends Controller
{
    // Función 1: Traer la lista de servicios para llenar tu combo desplegable
    public function cargaServicios()
    {
        $servicios = Servicio::orderBy('nombre_servicio', 'asc')->get();
        return response()->json($servicios, 200);
    }

    // Función 2: Traer todos los clientes registrados para tu Reportecita.js
    public function cargaClientes()
    {
        $clientes = Cliente::orderBy('nomcli', 'asc')->get();
        return response()->json($clientes, 200);
    }
}