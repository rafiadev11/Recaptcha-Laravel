<?php

namespace Aracademia\LaravelRecaptcha;


use Illuminate\Support\Facades\Request;

class Recaptcha {

    protected $public_key;
    protected $private_key;
    protected $verifyURL;
    public $position;

    public function __construct()
    {
        $this->public_key = config('Recaptcha.public_key');
        $this->private_key = config('Recaptcha.private_key');
        $this->verifyURL = config('Recaptcha.verify_api_url');
        $this->position = config('Recaptcha.bootstrap_float_class');

    }

    public function inputField()
    {
        $params = [
            'position'      =>  $this->position,
            'public_key'    =>  $this->public_key
        ];
        return view("recaptcha::recaptchaView", compact('params'));
    }

    public function validate()
    {
        $json = json_decode(file_get_contents($this->verifyURL.'?secret='.$this->private_key.'&response='.Request::get('g-recaptcha-response')),true);
        if($json["success"]==false)
        {
            return false;
        }
        return true;
    }
}