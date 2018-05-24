<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function contact()
    {
        return view( 'pages.contact' );
    }

    public function terms()
    {
        return view( 'pages.terms' );
    }

    public function policy()
    {
        return view( 'pages.policy' );
    }
}
