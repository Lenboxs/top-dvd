<?php

namespace App\Helpers\Impl;

use App\Recaptcha;
use App\Settings;
use App\Helpers\RecaptchaService;
use App\Helpers\AlertService;
use App\Http\Requests;
use App\Http\Requests\Admin\AdminRecaptchaFormRequest;
use Illuminate\Support\Facades\Auth;

class RecaptchaServiceImpl implements RecaptchaService
{
    protected $alertService;
    
    protected $privatekey;
    
    public function setAlertService( $alertService )
    {
        $this->alertService = $alertService;
        return $this;
    }
        
    public function verify( $request, $contactUsMail )
    {
        if( !empty( $request->input( 'g-recaptcha-response' ) ) )
        {
            /**
             * Call to Api to verify the key 
             */
            $captcha = $request->input( 'g-recaptcha-response' );
            $this->privatekey = $contactUsMail->getRecaptchaSecretKey();
        
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array(
                'secret' => $this->privatekey,
                'response' => $captcha,
                'remoteip' => $_SERVER['REMOTE_ADDR']
            );

            $curlConfig = array(
                CURLOPT_URL => $url,
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POSTFIELDS => $data
            );

            $ch = curl_init();
            curl_setopt_array($ch, $curlConfig);
            $response = curl_exec($ch);
            curl_close($ch);

            $responseData = json_decode($response);
            
            /**
             * Check if response | success == true
             */
            if( !$responseData->success )
            {
                $contactUsMail->setStatus( false );
                $this->alertService->setAlert( 'Robot verification failed, please try again.', 'danger', $request );
            }
        }
        else
        {
            $contactUsMail->setStatus( false );
            $this->alertService->setAlert( 'Please click on the reCAPTCHA box.', 'danger', $request );
        }
        
        return $contactUsMail;
    }
}