<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clientes\StoreClienteRequest;
use App\Domains\Clientes\Dto\ClienteData;
use App\Domains\Clientes\Actions\StoreClientesAction;
use Illuminate\Http\JsonResponse;

class StoreClienteController extends Controller
{
    /**
     * @OA\Post(
     * path="/api/clientes",
     * summary="Cadastrar um novo cliente",
     * tags={"Clientes"},
     * @OA\RequestBody(
     * required=true,
     * description="Dados do cliente para criação",
     * @OA\JsonContent(ref="#/components/schemas/ClienteRequest")
     * ),
     * @OA\Response(
     * response=201,
     * description="Cliente criado com sucesso",
     * @OA\JsonContent(
     * @OA\Property(property="id", type="integer", example=1),
     * @OA\Property(property="nome", type="string", example="Zeca"),
     * @OA\Property(property="email", type="string", example="teste@teste.com"),
     * @OA\Property(property="telefone", type="string", example="5598785")
     * )
     * ),
     * @OA\Response(
     * response=422,
     * description="Erro de validação"
     * )
     * )
     */
    public function __invoke(
        StoreClienteRequest $request,
        StoreClientesAction $action
    ): JsonResponse {

        $cliente = $action->handle(ClienteData::from($request->validated()));

        return response()->json($cliente->toArray(), 201);
    }
}
