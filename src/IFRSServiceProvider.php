<?php

/**
 * Eloquent IFRS Accounting
 *
 * @author    Edward Mungai
 * @copyright Edward Mungai, 2020, Germany
 * @license   MIT
 */

namespace IFRS;

use Illuminate\Support\ServiceProvider;

class IFRSServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ifrs.php', 'ifrs');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang/', 'ifrs');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/ifrs.php' => app()->configPath('ifrs.php'),
        ]);
        $this->publishes([
            __DIR__ . '/../lang' => $this->app->langPath('vendor/ifrs'),
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadFactoriesFrom(__DIR__ . '/../database/factories');
    }
}
