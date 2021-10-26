<?php

return [
    'public_key'                        => env('RECAPTCHA_PUBLIC_KEY', ''),//Google reCaptcha Public Key
    'private_key'                       => env('RECAPTCHA_PRIVATE_KEY', ''),//Google reCaptcha Private Key
    'verify_api_url'                    => 'https://www.google.com/recaptcha/api/siteverify', // Don't change
    'bootstrap_float_class'             => '', // use bootstrap pull right or pull left classes to position your reCaptcha
    'lang'                              => env('RECAPTCHA_LANG','en'), //example: fr, ar, de ...
    'custom_error'                      => env('RECAPTCHA_ERROR_MESSAGE','Please ensure that you are human!')
];