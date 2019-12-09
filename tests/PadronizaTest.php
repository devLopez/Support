<?php

namespace Tests;

use Igrejanet\Support\Padroniza;
use PHPUnit\Framework\TestCase;

class PadronizaTest extends TestCase
{
    public function testMaskCPF()
    {
        $cpf        = '93469825602';
        $formatted  = '934.698.256-02';

        $this->assertEquals($formatted, Padroniza::cpf($cpf));
    }

    public function testMaskCNPJ()
    {
        $cnpj   = '73330992000199';
        $masked = '73.330.992/0001-99';

        $this->assertEquals($masked, Padroniza::cnpj($cnpj));
    }

    public function testMaskFone()
    {
        $fone   = '38991801234';
        $masked = '(38)99180-1234';

        $this->assertEquals($masked, Padroniza::fone($fone));
    }

    public function testMaskPIS()
    {
        $pis    = '32530719760';
        $masked = '325.30719.76/0';

        $this->assertEquals($masked, Padroniza::pis($pis));
    }

    public function testMaskCEP()
    {
        $cep    = '39400000';
        $masked = '39400-000';

        $this->assertEquals($masked, Padroniza::cep($cep));
    }

    public function testNormatizeName()
    {
        $nome = 'MathEUs LopÉS dos SANtos';

        $this->assertEquals('Matheus Lopes dos Santos', Padroniza::nome($nome));
        $this->assertEquals('MATHEUS LOPES DOS SANTOS', Padroniza::nome($nome, true));
    }
}
