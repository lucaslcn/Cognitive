<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Produto;

class ProdutoTest extends TestCase
{
    /**
     * Caso algum produto tenha valor de venda inferior ou igual ao valor de custo, retorna erro
     */
    public function testValorVendaSuperiorValorCusto()
    {
        $produtos = Produto::paginate();
        foreach ($produtos as $produto)
        {
            $this->assertTrue( $produto->vlvenda > $produto->vlcusto);
        }
    }
}