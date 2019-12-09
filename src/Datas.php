<?php

namespace Igrejanet\Support;

use Carbon\Carbon;
use InvalidArgumentException;

/**
 * Datas
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 2.0.0
 * @package Igrejanet\Support
 */
class Datas
{
    const TIMEZONE = 'America/Sao_Paulo';

    /**
     * @param string|null $date
     * @param string      $format
     * @return string
     */
    public static function toBr(string $date = null, $format = 'd/m/Y')
    {
        if ( $date ) {
            return static::format($date, $format);
        }

        return $date;
    }

    /**
     * @param string|null $date
     * @param string      $format
     * @return string
     */
    public static function toSql(string $date = null, $format = 'Y-m-d')
    {
        if ( $date ) {
            return static::format($date, $format, 'd/m/Y');
        }

        return $date;
    }

    /**
     * @param int|null $month
     * @return array|mixed
     */
    public static function months(int $month = null)
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
            if ( $month >= 1 && $month <= 12 ) {
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
    public static function today($format = 'd/m/Y')
    {
        return Carbon::today(self::TIMEZONE)->format($format);
    }

    /**
     * @param   string  $format
     * @return  string
     */
    public static function now($format = 'Y-m-d H:i:s')
    {
        return Carbon::now(self::TIMEZONE)->format($format);
    }

    /**
     * @param string $date
     * @param string $format
     * @param string $oldFormat
     * @return string
     */
    public static function format($date, $format = 'd/m/Y', $oldFormat = 'Y-m-d')
    {
        return Carbon::createFromFormat($oldFormat, $date)->format($format);
    }
}