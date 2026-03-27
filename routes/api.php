<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/cargaServicios', [ApiController::class, 'cargaServicios']);
Route::get('/cargaClientes', [ApiController::class, 'cargaClientes']);

// 2. LEER UNO POR ID (GET)
Route::get('/clientes/{id_cliente}', [ApiController::class, 'obtenerClientePorId']);

// 3. CREAR (POST) - (Esta ya la teníamos, pero le cambié la ruta a /clientes para estandarizar)
Route::post('/clientes', [ApiController::class, 'altaCliente']);

// 4. ACTUALIZAR (PUT)
Route::put('/clientes/{id_cliente}', [ApiController::class, 'modificaCliente']);

// 5. ELIMINAR (DELETE)
Route::delete('/clientes/{id_cliente}', [ApiController::class, 'eliminaCliente']);

// 2. LEER UNO POR ID (GET)
Route::get('/servicios/{id_servicio}', [ApiController::class, 'obtenerServicioPorId']);

// 3. CREAR (POST)
Route::post('/servicios', [ApiController::class, 'altaServicio']);

// 4. ACTUALIZAR (PUT)
Route::put('/servicios/{id_servicio}', [ApiController::class, 'modificaServicio']);

// 5. ELIMINAR (DELETE)
Route::delete('/servicios/{id_servicio}', [ApiController::class, 'eliminaServicio']);
