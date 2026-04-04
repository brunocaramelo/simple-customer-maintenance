<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clientes\StoreClienteController;
use App\Http\Controllers\Clientes\ListClienteController;


Route::prefix('clientes')->group(function () {
    Route::get('/', ListClienteController::class);
    Route::post('/', StoreClienteController::class);
});
