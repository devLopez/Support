<?php

namespace Tests;

use Igrejanet\Support\Documents;
use PHPUnit\Framework\TestCase;

class DocumentsTest extends TestCase
{
    /**
     * @see https://www.4devs.com.br/gerador_de_cpf
     */
    public function testCPFValidation()
    {
        $docs = new Documents();

        // $this->assertTrue($docs->CPF('637.704.371-60'));
        $this->assertTrue($docs->CPF('631.198.266-85'));
        $this->assertTrue($docs->CPF('474.026.570-27'));
        $this->assertTrue($docs->CPF('170.752.171-94'));

        $this->assertFalse($docs->CPF('111.111.111-11'));
        $this->assertFalse($docs->CPF('222.222.222-22'));
    }

    /**
     * @see https://www.4devs.com.br/gerador_de_cnpj
     */
    public function testCNPJValidation()
    {
        $docs = new Documents();

        $this->assertTrue($docs->CNPJ('81.406.683/0001-83'));
        $this->assertTrue($docs->CNPJ('47.438.427/0001-30'));
        $this->assertTrue($docs->CNPJ('39.047.313/0001-30'));
        $this->assertTrue($docs->CNPJ('27.835.512/0001-24'));
        $this->assertTrue($docs->CNPJ('96.110.584/0001-27'));
        $this->assertTrue($docs->CNPJ('12.238.424/0001-78'));
        $this->assertTrue($docs->CNPJ('34.394.214/0001-01'));
        $this->assertTrue($docs->CNPJ('46.251.513/0001-76'));

        $this->assertFalse($docs->CNPJ('46.251.513'));
        $this->assertFalse($docs->CNPJ(''));
        $this->assertFalse($docs->CNPJ('11.111.111/1111-11'));
    }

    /**
     * @see https://www.4devs.com.br/gerador_de_pis_pasep
     */
    public function testPISValidation()
    {
        $docs = new Documents();

        $this->assertTrue($docs->PIS('299.87371.00-0'));
        $this->assertTrue($docs->PIS('130.84961.99-8'));
        $this->assertTrue($docs->PIS('485.71839.74-0'));
        $this->assertTrue($docs->PIS('134.14311.69-0'));
        $this->assertTrue($docs->PIS('119.53784.10-5'));
        $this->assertTrue($docs->PIS('455.35135.95-5'));

        $this->assertFalse($docs->PIS('455.35135.95'));
        $this->assertFalse($docs->PIS('111.11111.11-1'));
    }

    /**
     * @see https://www.4devs.com.br/gerador_de_cnh
     */
    public function testCNHValidation()
    {
        $docs = new Documents();

        $this->assertTrue($docs->CNH('48448295506'));
        $this->assertTrue($docs->CNH('77962110704'));
        $this->assertTrue($docs->CNH('14555865592'));
        $this->assertTrue($docs->CNH('27486010301'));
        $this->assertTrue($docs->CNH('51277914379'));
        $this->assertTrue($docs->CNH('45736120401'));

        $this->assertFalse($docs->CNH('457361204'));
        $this->assertFalse($docs->CNH(''));
    }

    /**
     * @see https://www.4devs.com.br/gerador_de_titulo_de_eleitor
     */
    public function testTituloValidation()
    {
        $docs = new Documents();

        $this->assertTrue($docs->tituloEleitoral('677066720248'));
        $this->assertTrue($docs->tituloEleitoral('080854650264'));
        $this->assertTrue($docs->tituloEleitoral('872247101244'));
        $this->assertTrue($docs->tituloEleitoral('544078142640'));
        $this->assertTrue($docs->tituloEleitoral('581673770787'));
        $this->assertTrue($docs->tituloEleitoral('431137142453'));

        $this->assertFalse($docs->tituloEleitoral('43113714245'));
        $this->assertFalse($docs->tituloEleitoral(''));
    }
}
