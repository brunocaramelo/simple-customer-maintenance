<?php

declare(strict_types=1);

namespace App\Domain\Clientes;

use Illuminate\Database\Eloquent\Model;
use Godruoyi\Snowflake\Snowflake;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'telefone'
    ];
    
    public $incrementing = false;
    
    protected $keyType = 'string';

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->id) {
                $snowflake = new Snowflake();
                $model->id = (string) $snowflake->id();
            }
        });
    }

}