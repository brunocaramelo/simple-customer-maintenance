<?php
declare(strict_types=1);

namespace App\Domains\Clientes\Actions;

use App\Domains\Clientes\Models\Cliente;
use App\Domains\Clientes\Dto\ClienteData;

class UpdateClientesAction
{

    public function handle(ClienteData $clienteData): ClienteData
    {
        $listParams = $clienteData->toArray();

        $updateInstance = Cliente::find($listParams['id']);
        $updateInstance->update($listParams);

        return ClienteData::from($updateInstance->toArray());
    }
}
