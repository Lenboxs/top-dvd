<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
      public function top()
      {
          return view( 'pages.top-10' );
      }

      public function rated()
      {
          $title = "top rated";
          return view( 'pages.top-rated' )->withTitle($title);
      }
}
