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
    public function __invoke(
        SearchClienteRequest $request,
        SearchClientesAction $action
    ): JsonResponse {

        return ClienteResource::collection(
            $action->handle($request->validated())
        )->response();
    }
}
