<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function cargaServicios()
    {
        $servicios = Servicio::orderBy('nombre_servicio', 'asc')->get();
        return response()->json($servicios, 200);
    }

    public function obtenerServicios() {
        $servicios = DB::select('SELECT * FROM servicios ORDER BY id_servicio DESC');
        return response()->json($servicios, 200);
    }


    public function obtenerClientes() {
        // Consultamos todos los clientes
        $clientes = DB::select('SELECT * FROM clientes ORDER BY id_cliente DESC');
        return response()->json($clientes, 200);
    }

    

    public function modificaclientes(Request $request)
    {
        $consulta = Cliente::find($request->ide);
        $consulta->update($request->all());

        return response()->json($consulta, 200);
    }



    public function buscaclienteporide($idcliente)
    {
        $consulta = \DB::select("SELECT e.ide, e.nombre, e.apellidos, e.edad, e.sexo,
            a.nombre AS areatrabajo
            FROM empleados AS e
            INNER JOIN areas AS a ON a.ida = e.ida
            WHERE e.ide = $idcliente
            ORDER BY e.nombre ASC");

        return response()->json($consulta, 201);
    }

    public function obtenerClientePorId($id_cliente) {
            $cliente = DB::select('SELECT * FROM clientes WHERE id_cliente = ?', [$id_cliente]);
            
            if (!empty($cliente)) {
                return response()->json($cliente[0], 200);
            }
            return response()->json(['mensaje' => 'Cliente no encontrado'], 404);
        }

    // POST: Crear cliente nuevo (Ahora incluye foto)
    public function altaCliente(Request $request) {
        $query = "INSERT INTO clientes (
            nomcli, foto, genero, servicio, telefono, correo, alergias, notas, estatusCliente, costoEstimado, created_at, updated_at
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";

        $insertar = DB::insert($query, [
            $request->input('nomcli'), 
            $request->input('foto', 'fotos/chikito.jpg'), // <-- Foto por defecto si el form no manda una
            $request->input('genero'), 
            $request->input('servicio'),
            $request->input('telefono'), 
            $request->input('correo'), 
            $request->input('alergias'),
            $request->input('notas'), 
            $request->input('estatusCliente', 'Activo'), 
            $request->input('costoEstimado')
        ]);

        if ($insertar) {
            return response()->json(['mensaje' => 'Cliente creado correctamente'], 201);
        }
        return response()->json(['mensaje' => 'Error al crear'], 500);
    }

    // PUT: Modificar un cliente existente (Ahora incluye foto)
    public function modificaCliente(Request $request, $id_cliente) {
        $query = "UPDATE clientes SET 
            nomcli = ?, foto = ?, genero = ?, servicio = ?, telefono = ?, correo = ?, 
            alergias = ?, notas = ?, estatusCliente = ?, costoEstimado = ?, updated_at = NOW() 
            WHERE id_cliente = ?";

        $actualizado = DB::update($query, [
            $request->input('nomcli'), 
            $request->input('foto'), // <-- Actualiza foto
            $request->input('genero'), 
            $request->input('servicio'),
            $request->input('telefono'), 
            $request->input('correo'), 
            $request->input('alergias'),
            $request->input('notas'), 
            $request->input('estatusCliente'), 
            $request->input('costoEstimado'),
            $id_cliente
        ]);

        if ($actualizado) {
            return response()->json(['mensaje' => 'Cliente actualizado correctamente'], 200);
        }
        return response()->json(['mensaje' => 'No se pudo actualizar o no hubo cambios'], 404);
    }

    public function eliminaCliente($id_cliente) {
        $eliminado = DB::delete('DELETE FROM clientes WHERE id_cliente = ?', [$id_cliente]);

        if ($eliminado) {
            return response()->json(['mensaje' => 'Cliente eliminado'], 200); // El profe usaba 204, pero 200 te permite ver el mensaje JSON
        }
        return response()->json(['mensaje' => 'Cliente no encontrado'], 404);
    }


    public function obtenerServicioPorId($id_servicio) {
        $servicio = DB::select('SELECT * FROM servicios WHERE id_servicio = ?', [$id_servicio]);
        
        if (!empty($servicio)) {
            return response()->json($servicio[0], 200);
        }
        return response()->json(['mensaje' => 'Servicio no encontrado'], 404);
    }

    public function altaServicio(Request $request) {
        $query = "INSERT INTO servicios (nombre_servicio, precio, created_at, updated_at) 
                  VALUES (?, ?, NOW(), NOW())";

        $insertar = DB::insert($query, [
            $request->input('nombre_servicio'), 
            $request->input('precio')
        ]);

        if ($insertar) {
            return response()->json(['mensaje' => 'Servicio creado correctamente'], 201);
        }
        return response()->json(['mensaje' => 'Error al crear el servicio'], 500);
    }

    public function modificaServicio(Request $request, $id_servicio) {
        $query = "UPDATE servicios SET 
                  nombre_servicio = ?, precio = ?, updated_at = NOW() 
                  WHERE id_servicio = ?";

        $actualizado = DB::update($query, [
            $request->input('nombre_servicio'), 
            $request->input('precio'),
            $id_servicio
        ]);

        if ($actualizado) {
            return response()->json(['mensaje' => 'Servicio actualizado correctamente'], 200);
        }
        return response()->json(['mensaje' => 'No se pudo actualizar o no hubo cambios'], 404);
    }

    public function eliminaServicio($id_servicio) {
        $eliminado = DB::delete('DELETE FROM servicios WHERE id_servicio = ?', [$id_servicio]);

        if ($eliminado) {
            return response()->json(['mensaje' => 'Servicio eliminado correctamente'], 200);
        }
        return response()->json(['mensaje' => 'Servicio no encontrado'], 404);
    }


}