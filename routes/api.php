<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/cargaServicios', [ApiController::class, 'cargaServicios']);
Route::get('/cargaClientes', [ApiController::class, 'cargaClientes']);