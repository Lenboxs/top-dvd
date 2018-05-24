<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('series_branch', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('series_id')->unsigned();
          $table->integer('branch_id')->unsigned();

          $table->timestamps();
      });

      Schema::table('series_branch', function ($table) {

          $table->foreign('series_id' , 'series_branch_id')->references('id')->on('series')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('branch_id' , 'branch_series_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('series_branch');
    }
}
