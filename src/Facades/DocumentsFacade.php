<?php

namespace Igrejanet\Support\Facades;

use Igrejanet\Support\Documentos;
use Illuminate\Support\Facades\Facade;

/**
 * DocumentsFacade
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @since   26/04/2018
 * @package Igrejanet\Support\Facades
 */
class DocumentsFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Documentos::class;
    }
}