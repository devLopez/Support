<?php

namespace Igrejanet\Support;

use JansenFelipe\Utils\Utils;
use JansenFelipe\Utils\Mask;

/**
 * DataPatterns
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @since   26/04/2018
 * @package Igrejanet\Support
 */
class DataPatterns
{
    /**
     * @param   null|string  $cpf
     * @return  null|string
     */
    public function maskCPF($cpf = null)
    {
        return ( $cpf )
            ? Utils::mask(Utils::unmask($cpf), '###.###.###-##')
            : null;
    }

    /**
     * @param   null|string  $cnpj
     * @return  null|string
     */
    public function maskCNPJ($cnpj = null)
    {
        return ( $cnpj )
            ? Utils::mask(Utils::unmask($cnpj), '##.###.###/####-##')
            : null;
    }

    /**
     * @param   null|string  $fone
     * @return  null|string
     */
    public function maskFone($fone = null)
    {
        return ( $fone )
            ? Utils::mask(Utils::unmask($fone), Mask::TELEFONE)
            : null;
    }

    /**
     * @param   null|string  $pis
     * @return  null|string
     */
    public function maskPIS($pis = null)
    {
        return ( $pis )
            ? Utils::mask(Utils::unmask($pis), '###.#####.##/#')
            : null;
    }

    /**
     * @param   null|string  $cep
     * @return  null|string
     */
    public function maskCEP($cep = null)
    {
        return ( $cep )
            ? Utils::mask(Utils::unmask($cep), '#####-###')
            : null;
    }

    /**
     * @param   string  $name
     * @param   bool  $asUpperCase
     * @return  string
     */
    public function normatizeName(string $name = null, bool $asUpperCase = false)
    {
        if ( ! $name ) {
            return $name;
        }
        
        $name   = Utils::normatizeName($name, 'de,do,da,e,dos');
        $name   = Utils::unaccents($name);

        return ( $asUpperCase ) ? strtoupper($name) : $name;
    }
}
