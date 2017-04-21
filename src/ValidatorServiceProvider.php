<?php

namespace Cals\Validator;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/validator.php' => config_path('validator.php')
        ],'validator');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/default.php', 'validator'
        );
        $this->app->singleton('Cals\Validator\AjaxValidator', function () {
            return new AjaxValidator();
        });
    }
}
