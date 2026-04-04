<?php

declare(strict_types=1);

namespace App\Domains\Clientes\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone'
    ];

    public $casts = [
        'id' => 'string',
    ];

    public $incrementing = false;

    protected $keyType = 'string';

}
