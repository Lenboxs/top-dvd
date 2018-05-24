<?php

namespace App\Helpers;

Interface RecaptchaService
{
    public function setAlertService( $alertService );

    public function verify( $request, $contactUsMail );
}