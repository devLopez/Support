<?php

namespace Tests;

use Igrejanet\Support\Documentos;
use PHPUnit\Framework\TestCase;

class DocumentsTest extends TestCase
{
    /**
     * @see https://www.4devs.com.br/gerador_de_cpf
     */
    public function testCPFValidation()
    {
        $this->assertTrue(Documentos::cpf('631.198.266-85'));
        $this->assertTrue(Documentos::cpf('474.026.570-27'));
        $this->assertTrue(Documentos::cpf('170.752.171-94'));

        $this->assertFalse(Documentos::cpf('111.111.111-11'));
        $this->assertFalse(Documentos::cpf('222.222.222-22'));
    }

    /**
     * @see https://www.4devs.com.br/gerador_de_cnpj
     */
    public function testCNPJValidation()
    {
        $this->assertTrue(Documentos::cnpj('81.406.683/0001-83'));
        $this->assertTrue(Documentos::cnpj('47.438.427/0001-30'));
        $this->assertTrue(Documentos::cnpj('39.047.313/0001-30'));
        $this->assertTrue(Documentos::cnpj('27.835.512/0001-24'));
        $this->assertTrue(Documentos::cnpj('96.110.584/0001-27'));
        $this->assertTrue(Documentos::cnpj('12.238.424/0001-78'));
        $this->assertTrue(Documentos::cnpj('34.394.214/0001-01'));
        $this->assertTrue(Documentos::cnpj('46.251.513/0001-76'));

        $this->assertFalse(Documentos::cnpj('46.251.513'));
        $this->assertFalse(Documentos::cnpj(''));
        $this->assertFalse(Documentos::cnpj('11.111.111/1111-11'));

    }

    /**
     * @see https://www.4devs.com.br/gerador_de_pis_pasep
     */
    public function testPISValidation()
    {
        $this->assertTrue(Documentos::pis('299.87371.00-0'));
        $this->assertTrue(Documentos::pis('130.84961.99-8'));
        $this->assertTrue(Documentos::pis('485.71839.74-0'));
        $this->assertTrue(Documentos::pis('134.14311.69-0'));
        $this->assertTrue(Documentos::pis('119.53784.10-5'));
        $this->assertTrue(Documentos::pis('455.35135.95-5'));

        $this->assertFalse(Documentos::pis('455.35135.95'));
        $this->assertFalse(Documentos::pis('111.11111.11-1'));
    }

    /**
     * @see https://www.4devs.com.br/gerador_de_cnh
     */
    public function testCNHValidation()
    {
        $this->assertTrue(Documentos::cnh('48448295506'));
        $this->assertTrue(Documentos::cnh('77962110704'));
        $this->assertTrue(Documentos::cnh('14555865592'));
        $this->assertTrue(Documentos::cnh('27486010301'));
        $this->assertTrue(Documentos::cnh('51277914379'));
        $this->assertTrue(Documentos::cnh('45736120401'));

        $this->assertFalse(Documentos::cnh('457361204'));
        $this->assertFalse(Documentos::cnh(''));
    }

    /**
     * @see https://www.4devs.com.br/gerador_de_titulo_de_eleitor
     */
    public function testTituloValidation()
    {
        $this->assertTrue(Documentos::tituloEleitoral('080854650264'));
        $this->assertTrue(Documentos::tituloEleitoral('677066720248'));
        $this->assertTrue(Documentos::tituloEleitoral('872247101244'));
        $this->assertTrue(Documentos::tituloEleitoral('544078142640'));
        $this->assertTrue(Documentos::tituloEleitoral('581673770787'));
        $this->assertTrue(Documentos::tituloEleitoral('431137142453'));

        $this->assertFalse(Documentos::tituloEleitoral('43113714245'));
        $this->assertFalse(Documentos::tituloEleitoral(''));
    }
}
