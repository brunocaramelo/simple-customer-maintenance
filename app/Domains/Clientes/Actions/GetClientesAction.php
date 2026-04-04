<?php
declare(strict_types=1);

namespace App\Domains\Clientes\Actions;

use App\Domains\Clientes\Models\Cliente;
use App\Domains\Clientes\Dto\ClienteData;

class GetClientesAction
{

    public function handle(ClienteData $clienteData): ClienteData
    {
        $listParams = $clienteData->toArray();

        $updateInstance = cache()->tags(['clientes'])->remember('cliente_'.$listParams['id'], 90000, function () use ($listParams) {
            return Cliente::find($listParams['id']);
        });

        return ClienteData::from($updateInstance->toArray());
    }
}
