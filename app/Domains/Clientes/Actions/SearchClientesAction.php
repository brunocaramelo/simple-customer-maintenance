<?php
declare(strict_types=1);

namespace App\Domains\Clientes\Actions;

use App\Domains\Clientes\Models\Cliente;

use Illuminate\Pagination\LengthAwarePaginator;

class SearchClientesAction
{

    public function handle(array $filters = [], int $page = 1, int $perPage = 15): LengthAwarePaginator
    {
        $cacheKey = 'search_clientes_' . md5(serialize($filters) . $perPage . $page);

        return cache()->tags(['clientes'])->remember($cacheKey, 90000, function () use ($filters, $perPage) {
            return Cliente::query()
                ->when(!empty($filters['search']), function ($query) use ($filters) {
                    $query->where('nome', 'like', "%{$filters['search']}%")
                        ->orWhere('email', 'like', "%{$filters['search']}%");
                })
                ->when(!empty($filters['nome']), function ($query) use ($filters) {
                    $query->where('nome', 'like', "%{$filters['nome']}%");
                })
                ->when(!empty($filters['email']), function ($query) use ($filters) {
                    $query->where('email', 'like', "%{$filters['email']}%");
                })
                ->orderBy('id', 'desc')
                ->paginate($perPage);
        });
    }
}
