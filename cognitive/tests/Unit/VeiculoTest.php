<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;

use App\Veiculo;
use App\Pessoa;
use App\Marca;
use App\User;

class VeiculoTest extends TestCase
{
    /**
    * Testa se é possível inserir um veículo sem um token de autenticação, agindo como se fosse um usuário não logado tentando criar
    * Se o teste falhar, é pq é possível inserir sem estar autenticado.
    */
    public function testCreateVeiculoWithoutMiddleware()
    {
        $data = [
            'idpessoa' => "5",
            'idmarca' => "1",
            'modelo' => "Uno",
            'placa' => "ABC-1A23",
            'ano' => "2015"
        ];
        
        $response = $this->json('POST', '/veiculo', $data);
        $response->assertStatus(401);
        $response->assertJson(['message' => "Unauthenticated."]);
    }
    
    public function testGettingAllVeiculos()
    {
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->json('GET', '/veiculo');
        $response->assertStatus(200);
        
        
    }

    public function testCreateVeiculo()
    {
        $data = [
            'idpessoa' => "5",
            'idmarca' => "1",
            'modelo' => "Bravo",
            'placa' => "ABC-1A23",
            'ano' => "2015"
        ];
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->json('POST', '/veiculo',$data);
        $response->assertStatus(302);
    }
    
    /**
    * Testa se existem veiculos que estão vinculados a pessoas inativas ou inexistentes.
    * Se o teste falhar, é pq existem cadastros com problema
    */
    public function testVeiculoPertencePessoa()
    {
        $veiculos = Veiculo::paginate();
        foreach ($veiculos as $veiculo)
        {
            $this->assertNotNull(Pessoa::find($veiculo->idpessoa), 'Algum veiculo ativo está vinculado a uma pessoa inativa ou inexistente, rode a query: SELECT * FROM veiculos WHERE idpessoa IN (SELECT id FROM pessoas WHERE deleted_at IS NOT null)');
        }
    }
    
    /**
    * Testa se existem veiculos que estão vinculados a marcas inativas ou inexistentes.
    * Se o teste falhar, é pq existem cadastros com problema
    */
    public function testVeiculoPertenceMarca()
    {
        $veiculos = Veiculo::paginate();
        foreach ($veiculos as $veiculo)
        {
            $this->assertNotNull(Marca::find($veiculo->idmarca), 'Algum veiculo ativo está vinculado a uma marca inativa ou inexistente: rode a query: SELECT * FROM veiculos WHERE idmarca IN (SELECT id FROM marcas WHERE deleted_at IS NOT null)');
        }
    }
}
        