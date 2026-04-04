<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clientes\FindClienteRequest;
use App\Domains\Clientes\Dto\ClienteData;
use App\Domains\Clientes\Actions\GetClientesAction;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Schema(
 * schema="ClienteRequestItem",
 * type="object",
 * )
 */
class GetClienteController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/clientes/{id}",
     * summary="Ver um novo cliente",
     * tags={"Clientes"},
     * @OA\Parameter(
     * name="id",
     * in="path",
     * description="ID do cliente que será atualizado",
     * required=true,
     * @OA\Schema(type="integer", example=1)
     * ),
     * @OA\Response(
     * response=200,
     * description="Sucesso",
     * @OA\JsonContent(
     * @OA\Property(property="id", type="integer", example=1),
     * @OA\Property(property="nome", type="string", example="Zeca")
     * )
     * )
     * )
     */
    public function __invoke(
        FindClienteRequest $request,
        GetClientesAction $action
    ): JsonResponse {

        $cliente = $action->handle(ClienteData::from($request->validated()));

        return response()->json($cliente->toArray(), 200);
    }
}
