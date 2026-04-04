<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clientes\StoreClienteController;
use App\Http\Controllers\Clientes\UpdateClienteController;
use App\Http\Controllers\Clientes\ListClienteController;
use App\Http\Controllers\Clientes\GetClienteController;
use App\Http\Controllers\Clientes\RemoveClienteController;



Route::prefix('clientes')->group(function () {
    Route::put('/{id}', UpdateClienteController::class);
    Route::get('/{id}', GetClienteController::class);
    Route::delete('/{id}', RemoveClienteController::class);
    Route::get('/', ListClienteController::class);
    Route::post('/', StoreClienteController::class);
});
