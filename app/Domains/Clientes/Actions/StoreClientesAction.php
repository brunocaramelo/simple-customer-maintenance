<?php
declare(strict_types=1);

namespace App\Domains\Clientes\Actions;

use App\Domains\Clientes\Models\Cliente;
use App\Domains\Clientes\Dto\ClienteData;

class StoreClientesAction
{

    public function handle(ClienteData $clienteData): ClienteData
    {
        $createdInstance = Cliente::create($clienteData->toArray());

        return ClienteData::from($createdInstance->toArray());
    }
}
