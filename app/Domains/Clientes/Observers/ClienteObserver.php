<?php

declare(strict_types=1);

namespace App\Domains\Clientes\Observers;

use App\Domains\Clientes\Models\Cliente;

use Godruoyi\Snowflake\Snowflake;

class ClienteObserver
{
    public function creating(Cliente $cliente): void
    {
        if (!$cliente->id) {
            $snowflake = new Snowflake();
            $cliente->id = (string) $snowflake->id();
        }
    }

    public function created(Cliente $cliente): void
    {
        cache()->tags(['clientes'])->flush();
    }

    public function updated(Cliente $cliente): void
    {
        cache()->tags(['clientes'])->flush();
        cache()->tags(['clientes'])->forget('cliente_'.$cliente->id);
    }

    public function saving(Cliente $cliente): void
    {
        cache()->tags(['clientes'])->flush();
        cache()->tags(['clientes'])->forget('cliente_'.$cliente->id);
    }

    public function saved(Cliente $cliente): void
    {
        cache()->tags(['clientes'])->flush();
        cache()->tags(['clientes'])->forget('cliente_'.$cliente->id);
    }

    public function deleted(Cliente $cliente): void
    {
        cache()->tags(['clientes'])->flush();
        cache()->tags(['clientes'])->forget('cliente_'.$cliente->id);
    }

}
