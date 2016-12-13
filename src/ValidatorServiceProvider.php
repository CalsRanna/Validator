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
        $this->publishes([$this->configPath()=>config_path('validator.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Cals\Validator\AjaxValidator',function (){
            return new AjaxValidator();
        });
    }

    private function configPath()
    {
        return __DIR__.'/../config/validator.php';
    }
}
