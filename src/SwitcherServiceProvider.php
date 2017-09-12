<?php
namespace Etermed\Switcher;

use Illuminate\Support\ServiceProvider;

class SwitcherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Switcher::class, function () {
            return new Switcher();
        });
        $this->app->alias(Switcher::class, 'switcher');
    }
}