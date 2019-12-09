<?php

namespace Igrejanet\Support\ServiceProviders;

use Igrejanet\Support\DataPatterns;
use Igrejanet\Support\Datas;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

/**
 * SupportServiceProvider
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.1.0
 * @package Igrejanet\Support\ServiceProviders
 */
class SupportServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        Blade::directive('toSql', function($date)
        {
            return Datas::toSql($date);
        });

        Blade::directive('toBr', function ($date)
        {
            return Datas::toBr($date);
        });
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DataPatterns::class, function()
        {
            return new DataPatterns();
        });
    }
}