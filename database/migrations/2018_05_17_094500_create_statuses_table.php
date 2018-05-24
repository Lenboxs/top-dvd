<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('statuses', function (Blueprint $table) {
          $table->increments('id');
          $table->string('status')->nullable();
          $table->string('type')->nullable();
          $table->string('label')->nullable();
          $table->string('additional')->nullable();
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('statuses');
    }
}
