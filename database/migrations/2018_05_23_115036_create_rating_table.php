<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('rating', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('movie_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->integer('rating');

          $table->timestamps();
      });

      Schema::table('rating', function ($table) {

          $table->foreign('movie_id' , 'movie_user_id')->references('id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('user_id' , 'user_movie_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating');
    }
}
