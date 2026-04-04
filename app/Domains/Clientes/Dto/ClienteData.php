<?php

declare(strict_types=1);

namespace App\Domains\Clientes\Dto;

use Spatie\LaravelData\Data;

class ClienteData extends Data
{
    public function __construct(
        public string $nome,
        public string $email,
        public ?string $telefone,
    ) {}
}