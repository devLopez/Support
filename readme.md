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

## Utilização
Inicialmente, o pacote conta com alguns validadores, métodos para normatização de dados
e manipulação de dados

```php
<?php

namespace MeuNamespace;

use Igrejanet\Support\DataPatterns;
use Igrejanet\Support\Date;
use Igrejanet\Support\Documents;

class MyClass
{
    public function datas()
    {
        $date = new Date();
        
        // Converte para o Mysql
        $date->toSql('13/04/2017'); // Output: 2017-04-23
        
        // Converte para nosso padrão
        $date->toBr('2017-04-23'); // Output: 13/04/2017
        
        // Monta um array contendo os nomes e os números dos meses
        // Caso passe o número de um mês, me retorna o nome do mês
        $date->months();
    }
    
    public function validations()
    {
        $documents = new Documents();
        
        // Além destes métodos, ainda temos a validação da CNH e título eleitoral
        $documents->CPF('111.111.111-11');
        $documents->CNPJ('11.111.111/1111-11');
        $documents->PIS('111.11111.11-1');
    }
    
    public function dataNormatization()
    {
        $data = new DataPatterns();
     
        // Aqui ainda temos mascara para telefone (8 ou 9 dígitos)
        // CEP, PIS
        
        $data->maskCPF('11111111111'); // Output: 111.111.111-11
        $data->maskCNPJ('11111111111111'); // Output: 11.111.111/1111-11
        
        $nome = 'MathEUs LopÉS dos SANtos';
        
        $data->normatizeName($nome); // Output: Matheus Lopes dos Santos
        $data->normatizeName($nome, true); // Output: MATHEUS LOPES DOS SANTOS
    }
}
```