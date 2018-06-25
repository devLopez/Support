<?php

namespace Tests;

use Igrejanet\Support\DataPatterns;
use PHPUnit\Framework\TestCase;

class DataPatternsTest extends TestCase
{
    public function testMaskCPF()
    {
        $patterns = new DataPatterns();

        $cpf        = '93469825602';
        $formatted  = '934.698.256-02';

        $this->assertEquals($formatted, $patterns->maskCPF($cpf));
    }

    public function testMaskCNPJ()
    {
        $patterns = new DataPatterns();

        $cnpj   = '73330992000199';
        $masked = '73.330.992/0001-99';

        $this->assertEquals($masked, $patterns->maskCNPJ($cnpj));
    }

    public function testMaskFone()
    {
        $patterns = new DataPatterns();

        $fone   = '38991801234';
        $masked = '(38)99180-1234';

        $this->assertEquals($masked, $patterns->maskFone($fone));
    }

    public function testMaskPIS()
    {
        $patterns = new DataPatterns();

        $pis    = '32530719760';
        $masked = '325.30719.76/0';

        $this->assertEquals($masked, $patterns->maskPIS($pis));
    }

    public function testMaskCEP()
    {
        $patterns = new DataPatterns();

        $cep    = '39400000';
        $masked = '39400-000';

        $this->assertEquals($masked, $patterns->maskCEP($cep));
    }

    public function testNormatizeName()
    {
        $patterns = new DataPatterns();

        $nome = 'MathEUs LopÉS dos SANtos';

        $this->assertEquals('Matheus Lopes dos Santos', $patterns->normatizeName($nome));
        $this->assertEquals('MATHEUS LOPES DOS SANTOS', $patterns->normatizeName($nome, true));
    }
}
