<?php

namespace Igrejanet\Support;

use JansenFelipe\Utils\{
    Utils,
    Mask
};

/**
 * Padroniza
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 2.0.0
 * @package Igrejanet\Support
 */
class Padroniza
{
    /**
     * @param string|null $cpf
     * @return string|null
     */
    public static function cpf(string $cpf = null)
    {
        return ( $cpf )
            ? Utils::mask(Utils::unmask($cpf), '###.###.###-##')
            : null;
    }

    /**
     * @param string|null $cnpj
     * @return string|null
     */
    public static function cnpj(string $cnpj = null)
    {
        return ( $cnpj )
            ? Utils::mask(Utils::unmask($cnpj), '##.###.###/####-##')
            : null;
    }

    /**
     * @param string|null $fone
     * @return string|null
     */
    public static function fone(string $fone = null)
    {
        return ( $fone )
            ? Utils::mask(Utils::unmask($fone), Mask::TELEFONE)
            : null;
    }

    /**
     * @param string|null $pis
     * @return string|null
     */
    public static function pis(string $pis = null)
    {
        return ( $pis )
            ? Utils::mask(Utils::unmask($pis), '###.#####.##/#')
            : null;
    }

    /**
     * @param string|null $cep
     * @return string|null
     */
    public static function cep(string $cep = null)
    {
        return ( $cep )
            ? Utils::mask(Utils::unmask($cep), '#####-###')
            : null;
    }

    /**
     * @param string|null $name
     * @param bool        $asUpperCase
     * @return string
     */
    public static function nome(string $name = null, bool $asUpperCase = false)
    {
        if ( ! $name ) {
            return $name;
        }
        
        $name   = Utils::normatizeName($name, 'de,do,da,e,dos');
        $name   = Utils::unaccents($name);

        return ( $asUpperCase ) ? strtoupper($name) : $name;
    }
}
