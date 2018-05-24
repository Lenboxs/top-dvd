<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('series', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('active')->unsigned();
        $table->integer('new')->unsigned();
        $table->string('name')->nullable();
        $table->string('slug')->nullable();
        $table->text('description');
        $table->string('image');
        $table->string('trailerLink');
        $table->integer('season');

        $table->timestamps();
      });

      Schema::table('series', function ($table) {

          $table->foreign('active' , 'series_active_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('new' , 'series_new_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('series');
    }
}
