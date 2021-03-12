<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Venda;
use App\Pessoa;
use App\Veiculo;
use App\Servico;
use App\Produto;

class VendaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateVendaWithoutMiddleware()
    {
        $data = [
            'idpessoa' => "5",
            'idveiculo' => "8",
            'idservico' => "1",
            'vlservico' => "10",
            'idproduto' => "1",
            'vlproduto' => "10",
            'qtdeproduto' => "1",
            'vltotal' => "20",
            'vlpago' => "0",
            'situacao' => "A"
        ];
        
        $response = $this->json('POST', '/venda', $data);
        $response->assertStatus(401);
        $response->assertJson(['message' => "Unauthenticated."]);
    }

    public function testGetPessoa()
    {
        $data = [
            'idpessoa' => "5",
            'idveiculo' => "8",
            'idservico' => "1",
            'vlservico' => "10",
            'idproduto' => "1",
            'vlproduto' => "10",
            'qtdeproduto' => "1",
            'vltotal' => "20",
            'vlpago' => "0",
            'situacao' => "A"
        ];

        $venda = Venda::create($data);
        $this->assertEquals( $venda->idpessoa, $venda->pessoa->id );   
    }

    /**
     * Se alguma venda possuir valor pago maior que valor total, retorna erro
     */
    public function testValorTotalSuperiorOuIgualValorPago()
    {
        $vendas = Venda::paginate();
        foreach ($vendas as $venda)
        {
            $this->assertTrue( $venda->vltotal >= $venda->vlpago);
        }
    }

    /**
     * Se houver vendas com valor pago igual ao valor total e situação diferente de pago, retorna erro
     * OU
     * Se houver vendas com valor pago inferior ao valor total e situação diferente de aberto, retorna erro
     */
    public function testSituacao()
    {
        $vendas = Venda::paginate();
        foreach ($vendas as $venda)
        {
            if($venda->vltotal == $venda->vlpago)
            {
                $this->assertTrue( $venda->situacao == "P");
            }
            else
            {
                $this->assertTrue( $venda->situacao == "A");
            }
        }
    }

    /**
     * Se alguma venda tiver quantidade negativa ou zero, retorna erro
     */
    public function testQuantidadePositiva()
    {
        $vendas = Venda::paginate();
        foreach ($vendas as $venda)
        {
            $this->assertTrue($venda->qtdeproduto > 0);
        }
    }

    /**
     * Se alguma venda tiver valor negativo ou zero, retorna erro
     */
    public function testValorPositivo()
    {
        $vendas = Venda::paginate();
        foreach ($vendas as $venda)
        {
            $this->assertTrue($venda->vlservico > 0);
            $this->assertTrue($venda->vlproduto > 0);
            $this->assertTrue($venda->vltotal > 0);
        }
    }
}
