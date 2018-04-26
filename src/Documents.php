<?php

namespace Igrejanet\Support;

/**
 * Documents
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @since   26/04/2018
 * @package Igrejanet\Support
 * @see     https://forum.imasters.com.br/topic/400293-validate_br/
 */
class Documents
{
    /**
     * @param   string  $cpf
     * @return  bool
     */
    public function CPF($cpf) : bool
    {
        $cpf = sprintf('%011s', preg_replace('{\D}', '', $cpf));

        if ( (strlen($cpf) != 11)
            || ($cpf == '00000000000')
            || ($cpf == '11111111111')
            || ($cpf == '22222222222')
            || ($cpf == '33333333333')
            || ($cpf == '44444444444')
            || ($cpf == '55555555555')
            || ($cpf == '66666666666')
            || ($cpf == '77777777777')
            || ($cpf == '88888888888')
            || ($cpf == '99999999999') ) {
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
    public function CNPJ($cnpj) : bool
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
    public function PIS($pis) : bool
    {
        $pis = sprintf('%011s', preg_replace('{\D}', '', $pis));

        if ( (strlen($pis) != 11) || (intval($pis) == 0) ) {
            return false;
        }

        for ( $d = 0, $p = 2, $c = 9; $c >= 0; $c--, ($p < 9) ? $p++ : $p = 2 ) {
            $d += $pis[$c] * $p;
        }

        return ( $pis[10] == (((10 * $d) % 11) % 10) );
    }

    /**
     * @param   string  $cnh
     * @return  bool
     */
    public function CNH($cnh) : bool
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
    public function tituloEleitoral($te) : bool
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