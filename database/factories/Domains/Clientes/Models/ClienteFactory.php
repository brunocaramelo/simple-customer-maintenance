<?php

declare(strict_types=1);

namespace Database\Factories\Domains\Clientes\Models;

use App\Domains\Clientes\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClienteFactory extends Factory
{

    protected $model = Cliente::class;


    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefone' => $this->faker->numerify('###########'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
