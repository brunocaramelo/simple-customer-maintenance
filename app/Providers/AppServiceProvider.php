<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Domains\Clientes\Models\Cliente;
use App\Domains\Clientes\Observers\ClienteObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cliente::observe(ClienteObserver::class);
    }
}
