<?php

namespace Igrejanet\Support\Facades;

use Igrejanet\Support\Date;
use Illuminate\Support\Facades\Facade;

/**
 * DateFacade
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @since   26/04/2018
 * @package Igrejanet\Support\Facades
 */
class DateFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Date::class;
    }
}