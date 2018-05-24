<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToptenMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('topten_movie', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('topten_id')->unsigned();
          $table->integer('movie_id')->unsigned();
          $table->integer('sort');
          $table->timestamps();
      });

      Schema::table('topten_movie', function ($table) {

          $table->foreign('movie_id' , 'movie_topten_id')->references('id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('topten_id' , 'topten_movie_id')->references('id')->on('topten')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topten_movie');
    }
}
