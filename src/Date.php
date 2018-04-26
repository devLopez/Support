<?php

namespace Igrejanet\Support;

use Carbon\Carbon;
use InvalidArgumentException;

/**
 * Date
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @since   25/04/2018
 * @package Igrejanet\Support
 */
class Date
{
    const TIMEZONE = 'America/Sao_Paulo';

    /**
     * @param   null|string  $date
     * @param   string  $format
     * @return  null|string
     */
    public function toBr($date = null, $format = 'd/m/Y')
    {
        if ( $date ) {
            return $this->format($date, $format);
        }

        return $date;
    }

    /**
     * @param   null|string  $date
     * @param   string  $format
     * @return  null|string
     */
    public function toSql($date = null, $format = 'Y-m-d')
    {
        if ( $date ) {
            return $this->format($date, $format, 'd/m/Y');
        }

        return $date;
    }

    /**
     * @param   int|null $month
     * @return  array|mixed
     */
    public function months(int $month = null)
    {
        $months = [
            1   => 'Janeiro',
            2   => 'Fevereiro',
            3   => 'Março',
            4   => 'Abril',
            5   => 'Maio',
            6   => 'Junho',
            7   => 'Julho',
            8   => 'Agosto',
            9   => 'Setembro',
            10  => 'Outubro',
            11  => 'Novembro',
            12  => 'Dezembro'
        ];

        if ( $month ) {
            if ($month >= 1 && $month <= 12) {
                return $months[$month];
            }

            throw new InvalidArgumentException('Month number invalid');
        }

        return $months;
    }

    /**
     * @param   string  $format
     * @return  string
     */
    public function today($format = 'd/m/Y')
    {
        return Carbon::today(self::TIMEZONE)->format($format);
    }

    /**
     * @param   string  $format
     * @return  string
     */
    public function now($format = 'Y-m-d H:i:s')
    {
        return Carbon::now(self::TIMEZONE)->format($format);
    }

    /**
     * @param   string  $date
     * @param   string  $format
     * @param   string  $primaryFormat
     * @return  string
     */
    public function format($date, $format = 'd/m/Y', $primaryFormat = 'Y-m-d')
    {
        return Carbon::createFromFormat($primaryFormat, $date)->format($format);
    }
}