<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clientes\StoreClienteRequest;
use App\Domains\Clientes\Dto\ClienteData;
use App\Domains\Clientes\Actions\CreateClienteAction;
use Illuminate\Http\JsonResponse;

class StoreClienteController extends Controller
{
    public function __invoke(
        StoreClienteRequest $request,
        CreateClienteAction $action
    ): JsonResponse {

        $cliente = $action->execute(ClienteData::fromArray($request->validated()));

        return response()->json($cliente, 201);
    }
}