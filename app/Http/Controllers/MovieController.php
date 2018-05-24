<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;

class MovieController extends Controller
{
      public function movies()
       {
           return view( 'pages.movies' );
       }

     public function movie( $slug )
      {
          $movie = Movie::where( 'slug', $slug )->orderBy( 'id', 'desc' )->first();

          return view( 'pages.movie' )->withMovie( $movie );
      }
}
