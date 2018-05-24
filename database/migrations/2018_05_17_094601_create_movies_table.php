<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('movies', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('active')->unsigned();
          $table->integer('new')->unsigned();
          $table->string('name')->nullable();
          $table->string('slug')->nullable();
          $table->text('description');
          $table->string('image')->nullable();
          $table->string('trailerLink')->nullable();

          $table->timestamps();
      });

      Schema::table('movies', function ($table) {

          $table->foreign('active' , 'movie_active_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('new' , 'movie_new_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('movies');
    }
}
