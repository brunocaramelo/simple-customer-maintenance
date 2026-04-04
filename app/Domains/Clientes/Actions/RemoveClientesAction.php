<?php
declare(strict_types=1);

namespace App\Domains\Clientes\Actions;

use App\Domains\Clientes\Models\Cliente;
use App\Domains\Clientes\Dto\ClienteData;

class RemoveClientesAction
{

    public function handle(ClienteData $clienteData): bool
    {
        $listParams = $clienteData->toArray();

        $updateInstance = Cliente::find($listParams['id']);
        $updateInstance->delete($listParams);

        return true;
    }
}
