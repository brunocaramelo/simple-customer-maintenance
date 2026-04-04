<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clientes\StoreClienteController;
use App\Http\Controllers\Clientes\ListClienteController;

Route::get('/clientes', ListClienteController::class);
Route::post('/clientes', StoreClienteController::class);