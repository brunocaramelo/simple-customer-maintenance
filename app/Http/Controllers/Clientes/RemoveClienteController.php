<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clientes\FindClienteRequest;
use App\Domains\Clientes\Dto\ClienteData;
use App\Domains\Clientes\Actions\RemoveClientesAction;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Schema(
 * schema="ClienteRequestDel",
 * type="object",
 * required={"nome", "email"},
 * @OA\Property(property="nome", type="string", example="Zeca"),
 * @OA\Property(property="email", type="string", format="email", example="teste@teste.com"),
 * @OA\Property(property="telefone", type="string", nullable=true, example="5598785")
 * )
 */
class RemoveClienteController extends Controller
{
    /**
     * @OA\Delete(
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
        RemoveClientesAction $action
    ): JsonResponse {

        $cliente = $action->handle(ClienteData::from($request->validated()));

        return response()->json(['status' => 'success'], 200);
    }
}
