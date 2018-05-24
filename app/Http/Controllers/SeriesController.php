<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{

  public function series( $name )
  {
      return view( 'pages.series' );
  }

}
