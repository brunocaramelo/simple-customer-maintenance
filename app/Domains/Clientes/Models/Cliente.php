<?php

declare(strict_types=1);

namespace App\Domains\Clientes\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'telefone'
    ];

    public $incrementing = false;

    protected $keyType = 'string';

}
