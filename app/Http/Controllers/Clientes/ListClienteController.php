<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clientes\SearchClienteRequest;
use App\Domains\Clientes\Dto\ClienteData;
use App\Domains\Clientes\Actions\SearchClientesAction;
use App\Domains\Clientes\Resources\ClienteResource;
use Illuminate\Http\JsonResponse;

class ListClienteController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/clientes",
     * summary="Listar e filtrar clientes",
     * tags={"Clientes"},
     * @OA\Parameter(
     * name="page",
     * in="query",
     * required=false,
     * @OA\Schema(type="integer", example=1)
     * ),
     * @OA\Parameter(
     * name="search",
     * in="query",
     * required=false,
     * @OA\Schema(type="string")
     * ),
     * @OA\Parameter(
     * name="nome",
     * in="query",
     * required=false,
     * @OA\Schema(type="string")
     * ),
     * @OA\Parameter(
     * name="email",
     * in="query",
     * required=false,
     * @OA\Schema(type="string")
     * ),
     * @OA\Response(
     * response=200,
     * description="Sucesso",
     * @OA\JsonContent(
     * type="object",
     * @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/ClienteRequest")),
     * @OA\Property(property="meta", type="object"),
     * @OA\Property(property="links", type="object")
     * )
     * )
     * )
     */
    public function __invoke(
        SearchClienteRequest $request,
        SearchClientesAction $action
    ): JsonResponse {

        return ClienteResource::collection(
            $action->handle($request->validated())
        )->response();
    }
}
