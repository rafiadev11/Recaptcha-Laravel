<?php

namespace Aracademia\LaravelRecaptcha;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class RecaptchaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //Define path to the views folder
        $this->loadViewsFrom(__DIR__.'/Views','recaptcha');

        //Add Validator
        $this->addValidator();

        $this->publishes([
            __DIR__.'/config/RecaptchaConfig.php' => config_path('Recaptcha.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Recaptcha',function($app)
        {
            return new Recaptcha();
        });

        //register our facades
        $this->app->booting(function()
        {
            AliasLoader::getInstance()->alias('Recaptcha','Aracademia\LaravelRecaptcha\Facades\RecaptchaFacade');
        });
    }

    //Extends Validator to include a recaptcha type
    public function addValidator()
    {
        $this->app->validator->extendImplicit('recaptcha', function ($attribute, $value, $parameters) {
            $captcha   = new Recaptcha();
            return $captcha->validate();
        }, config('Recaptcha.custom_error'));
    }
}
