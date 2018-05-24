<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactUsFormRequest;
use App\Mail\ContactMail;

use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Email the contact us details.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( ContactUsFormRequest $request )
    {
        Mail::to( 'elton.bucky@gmail.com' )->send( new ContactMail( $request ) );

        Session::flash( 'success', "Thank You! Your message was delevired successfully." );

        return redirect( 'contact-us' );
    }
}
