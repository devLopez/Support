# Igrejanet Support

[![Build Status](https://travis-ci.org/devLopez/Support.svg?branch=master)](https://travis-ci.org/devLopez/Support)

Este *package* foi desenvolvido com o intuito de melhorar alguns processos em
sistemas internos. Inicialmente coisas simples, mas que todos sabem o quanto isso
ajuda no desenvolvimento;

## Instalação

Para instalar, utilize o composer

```sh
$ composer require igrejanet/support
``` 

Para versões do Laravel <5.7, utilizar a versão 2.1.4

## Utilização
Inicialmente, o pacote conta com alguns validadores, métodos para normatização de dados
e manipulação de dados

```php
<?php

namespace MeuNamespace;

use Igrejanet\Support\Padroniza;
use Igrejanet\Support\Datas;
use Igrejanet\Support\Documentos;

class MyClass
{
    public function datas()
    {
        // Converte para o Mysql
        Datas::toSql('13/04/2017'); // Output: 2017-04-23
        
        // Converte para nosso padrão
        Datas::toBr('2017-04-23'); // Output: 13/04/2017
        
        // Monta um array contendo os nomes e os números dos meses
        // Caso passe o número de um mês, me retorna o nome do mês
        Datas::meses();
    }
    
    public function validations()
    {
        // Além destes métodos, ainda temos a validação da CNH e título eleitoral
        Documentos::cpf('111.111.111-11');
        Documentos::cnpj('11.111.111/1111-11');
        Documentos::pis('111.11111.11-1');
    }
    
    public function dataNormatization()
    {
        // Aqui ainda temos mascara para telefone (8 ou 9 dígitos)
        // CEP, PIS
        
        Padroniza::cpf('11111111111'); // Output: 111.111.111-11
        Padroniza::cnpj('11111111111111'); // Output: 11.111.111/1111-11
        
        $nome = 'MathEUs LopÉS dos SANtos';
        
        Padroniza::nome($nome); // Output: Matheus Lopes dos Santos
        Padroniza::nome($nome, true); // Output: MATHEUS LOPES DOS SANTOS
    }
}
```