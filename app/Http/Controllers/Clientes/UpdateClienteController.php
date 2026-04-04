<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clientes\UpdateClienteRequest;
use App\Domains\Clientes\Dto\ClienteData;
use App\Domains\Clientes\Actions\UpdateClientesAction;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Schema(
 * schema="ClienteRequestUpd",
 * type="object",
 * required={"nome", "email"},
 * @OA\Property(property="nome", type="string", example="Zeca"),
 * @OA\Property(property="email", type="string", format="email", example="teste@teste.com"),
 * @OA\Property(property="telefone", type="string", nullable=true, example="5598785")
 * )
 */
class UpdateClienteController extends Controller
{
    /**
     * @OA\Put(
     * path="/api/clientes/{id}",
     * summary="Cadastrar um novo cliente",
     * tags={"Clientes"},
     * @OA\Parameter(
     * name="id",
     * in="path",
     * description="ID do cliente que será atualizado",
     * required=true,
     * @OA\Schema(type="integer", example=1)
     * ),
     * @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(ref="#/components/schemas/ClienteRequest")
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
        UpdateClienteRequest $request,
        UpdateClientesAction $action
    ): JsonResponse {

        $cliente = $action->handle(ClienteData::from($request->validated()));

        return response()->json($cliente->toArray(), 200);
    }
}
