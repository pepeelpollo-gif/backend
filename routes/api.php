<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/cargaServicios', [ApiController::class, 'cargaServicios']);
Route::get('/clientes', [ApiController::class, 'obtenerClientes']);
Route::get('/servicios', [ApiController::class, 'obtenerServicios']);
Route::get('/clientes/{id_cliente}', [ApiController::class, 'obtenerClientePorId']);
Route::post('/clientes', [ApiController::class, 'altaCliente']);
Route::put('/clientes/{id_cliente}', [ApiController::class, 'modificaCliente']);
Route::delete('/clientes/{id_cliente}', [ApiController::class, 'eliminaCliente']);
Route::get('/servicios/{id_servicio}', [ApiController::class, 'obtenerServicioPorId']);
Route::post('/servicios', [ApiController::class, 'altaServicio']);
Route::put('/servicios/{id_servicio}', [ApiController::class, 'modificaServicio']);
Route::delete('/servicios/{id_servicio}', [ApiController::class, 'eliminaServicio']);

