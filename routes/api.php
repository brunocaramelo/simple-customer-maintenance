<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clientes\StoreClienteController;

Route::post('/clientes', StoreClienteController::class);