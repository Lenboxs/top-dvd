<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('movie_branch', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('movie_id')->unsigned();
          $table->integer('branch_id')->unsigned();

          $table->timestamps();
      });

      Schema::table('movie_branch', function ($table) {

          $table->foreign('movie_id' , 'movie_branch_id')->references('id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('branch_id' , 'branch_movie_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('movie_branch');
    }
}
