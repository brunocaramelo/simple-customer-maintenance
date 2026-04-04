<?php

declare(strict_types=1);

use App\Domains\Clientes\Models\Cliente;

use Illuminate\Support\Facades\Cache;


it('retorna lista vazia de clientes', function () {

    Cliente::truncate();

    Cache::flush();

    $response = $this->getJson('/api/clientes?page=1');

    $response->assertStatus(200);
    $response->assertJsonStructure(['data']);
    expect($response->json('data'))->toBeArray()->toHaveCount(0);
});

it('retorna lista preenchida de clientes', function () {

    $clienteRandom = Cliente::factory()->make();

    $response = $this->postJson('/api/clientes/' . $clienteRandom->id, $clienteRandom->toArray());


    $response = $this->getJson('/api/clientes?page=1');

    $countNodes = 1;

    $response->assertStatus(200);
    $response->assertJsonStructure(['data']);
    expect($response->json('data'))->toBeArray()->toHaveCount($countNodes);
});


it('retorna cliente existente', function () {

    $clienteRandom = Cliente::factory()->make();
    $clienteRandom->save();

    $response = $this->getJson('/api/clientes/'.$clienteRandom->id);

    $response->assertStatus(200);

    $response->assertJsonStructure(['nome',
                                    'email',
                                    'telefone'
            ])->assertJson([
            'nome'  => $clienteRandom->nome,
            'email' => $clienteRandom->email,
        ]);
});

it('atualizando cliente', function () {

    $nomeNovo = 'Zeca';

    $clienteRandom = Cliente::factory()->make();
    $clienteRandom->save();

    $response = $this->getJson('/api/clientes/'.$clienteRandom->id);

    $response->assertStatus(200);

    $response->assertJsonStructure(['nome'])
        ->assertJson([
            'nome'  => $clienteRandom->nome,
        ]);

    $novoNomeBody = $clienteRandom->toArray();
    $novoNomeBody['nome'] = $nomeNovo;

    $response = $this->putJson('/api/clientes/' . $clienteRandom->id, $novoNomeBody);
    $response->assertJsonStructure(['nome'])
        ->assertJson([
            'nome'  => $novoNomeBody['nome'],
        ]);

});

it('remover cliente', function () {

    $clienteRandom = Cliente::factory()->make();
    $clienteRandom->save();

    $response = $this->deleteJson('/api/clientes/'.$clienteRandom->id);

    $response->assertStatus(200);

    $response->assertJsonStructure(['status'])
        ->assertJson([
            'status'  => 'success'
        ]);
});

it('criando novo cliente', function () {

    $clienteRandom = Cliente::factory()->make();

    $response = $this->postJson('/api/clientes/' . $clienteRandom->id, $clienteRandom->toArray());

    $response->assertJsonStructure(['nome',
                                    'email',
                                    'telefone'
            ])->assertJson([
            'nome'  => $clienteRandom->nome,
            'email' => $clienteRandom->email,
        ]);

});
