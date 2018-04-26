<?php

namespace Igrejanet\Support\ServiceProviders;

use Igrejanet\Support\DataPatterns;
use Igrejanet\Support\Date;
use Igrejanet\Support\Documents;
use Illuminate\Support\ServiceProvider;

/**
 * SupportServiceProvider
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @since   26/04/2018
 * @package Igrejanet\Support\ServiceProviders
 */
class SupportServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {

    }

    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DataPatterns::class, function() {
            return new DataPatterns();
        });

        $this->app->singleton(Date::class, function() {
            return new Date();
        });

        $this->app->singleton(Documents::class, function () {
            return new Documents();
        });
    }
}