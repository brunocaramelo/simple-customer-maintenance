<?php

declare(strict_types=1);

namespace App\Http\Requests\Clientes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SearchClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => [
                'nullable',
                'string',
            ],
            'nome' => [
                'nullable',
                'string',
            ],
            'email' => [
                'nullable',
                'string',
            ],
            'telefone' => [
                'nullable',
                'string',
            ],
        ];
    }
}
