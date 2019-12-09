<?php

namespace Igrejanet\Support;

/**
 * Documents
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 2.0.0
 * @package Igrejanet\Support
 * @see     https://forum.imasters.com.br/topic/400293-validate_br/
 */
class Documentos
{
    /**
     * @var array
     */
    protected static $numerosInvalidos = [
        '00000000000',
        '11111111111',
        '22222222222',
        '33333333333',
        '44444444444',
        '55555555555',
        '66666666666',
        '77777777777',
        '88888888888',
        '99999999999',
    ];

    /**
     * @param   string  $cpf
     * @return  bool
     */
    public static function cpf($cpf) : bool
    {
        $cpf = sprintf('%011s', preg_replace('{\D}', '', $cpf));

        if ( (strlen($cpf) != 11) || intval($cpf) == 0 || in_array($cpf, static::$numerosInvalidos ) ) {
            return false;
        }

        for ( $t = 8; $t < 10; ) {
            for ( $d = 0, $p = 2, $c = $t; $c >= 0; $c--, $p++ ) {
                $d += $cpf[$c] * $p;
            }

            if ( $cpf[++$t] != ($d = ((10 * $d) % 11) % 10) ) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param   string  $cnpj
     * @return  bool
     */
    public static function cnpj($cnpj) : bool
    {
        $cnpj = sprintf('%014s', preg_replace('{\D}', '', $cnpj));

        if ( (strlen($cnpj) != 14) || (intval(substr($cnpj, -4)) == 0) ) {
            return false;
        }

        for ( $t = 11; $t < 13; ) {
            for ( $d = 0, $p = 2, $c = $t; $c >= 0; $c--, ($p < 9) ? $p++ : $p = 2 ) {
                $d += $cnpj[$c] * $p;
            }

            if ( $cnpj[++$t] != ($d = ((10 * $d) % 11) % 10) ) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param   string  $pis
     * @return  bool
     */
    public static function pis($pis) : bool
    {
        $pis = sprintf('%011s', preg_replace('{\D}', '', $pis));

        if ( strlen($pis) != 11 || intval($pis) == 0 ) {
            return false;
        }

        if ( in_array($pis, static::$numerosInvalidos) ) {
            return false;
        }

        $digitos    = [3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $soma       = 0;

        for ( $i = 0; $i < 10; $i++ ) {
            $soma += $pis[$i] * $digitos[$i];
        }

        $digitoVerificador = ( 11 - ($soma % 11) );

        if ( $digitoVerificador == 10 || $digitoVerificador == 11 ) {
            $digitoVerificador = 0;
        }

        return $pis[10] == $digitoVerificador;
    }

    /**
     * @param   string  $cnh
     * @return  bool
     */
    public static function cnh($cnh) : bool
    {
        $cnh = sprintf('%011s', preg_replace('{\D}', '', $cnh));

        if ( (strlen($cnh) != 11) || (intval($cnh) == 0) ) {
            return false;
        }

        for ( $c = $s1 = $s2 = 0, $p = 9; $c < 9; $c++, $p-- ) {
            $s1 += intval($cnh[$c]) * $p;
            $s2 += intval($cnh[$c]) * (10 - $p);
        }

        if ( $cnh[9] != (($dv1 = $s1 % 11) > 9) ? 0 : $dv1 ) {
            return false;
        }

        if ( $cnh[10] != ( ((($dv2 = ($s2 % 11) - (($dv1 > 9) ? 2 : 0)) < 0) ? $dv2 + 11 : $dv2) > 9) ? 0 : $dv2 ) {
            return false;
        }

        return true;
    }

    /**
     * @param   string  $te
     * @return  bool
     */
    public static function tituloEleitoral($te) : bool
    {
        $te = sprintf('%012s', preg_replace('{\D}', '', $te));
        $uf = intval(substr($te, 8, 2));

        // Validate length and invalid UFs
        if ( (strlen($te) != 12) || ($uf < 1) || ($uf > 28) ) {
            return false;
        }

        // Validate check digits using a slightly modified modulus 11 algorithm
        foreach ( [7, 8 => 10] as $s => $t ) {
            for ( $d = 0, $p = 2, $c = $t; $c >= $s; $c--, $p++ ) {
                $d += $te[$c] * $p;
            }

            if ( $te[($s) ? 11 : 10] != ((($d %= 11) < 2) ? (($uf < 3) ? 1 - $d : 0) : 11 - $d) ) {
                return false;
            }
        }

        return true;
    }
}
