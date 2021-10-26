<?php

namespace Aracademia\LaravelRecaptcha\Facades;


use Illuminate\Support\Facades\Facade;

class RecaptchaFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'Recaptcha';
    }

} 