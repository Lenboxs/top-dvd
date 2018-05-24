<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'movies';

    public function branches()
    {
        return $this->hasMany( 'App\Branch', 'movie_branch' );
    }

    public function topTen()
    {
        return $this->belongsToMany( 'App\TopTenPage', 'topten_movie', 'movie_id', 'topten_id' )->using( 'App\TopTenMovie' );
    }
	  
    public function rating()
    {
        return $this->hasMany( 'App\User', 'rating' );
    }
}
