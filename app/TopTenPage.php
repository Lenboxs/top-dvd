<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopTenPage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'top_ten_page';

    public function movies()
    {
        return $this->belongsToMany( 'App\Movie', 'topten_movie', 'topten_id', 'movie_id' )->using( 'App\TopTenMovie' );
    }
	
    public function series()
    {
        return $this->hasMany( 'App\Series' );
    }
}
