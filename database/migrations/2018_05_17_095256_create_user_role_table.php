<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_role', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('role_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->timestamps();
      });

      Schema::table('user_role', function ($table) {

          $table->foreign('role_id' , 'role_user_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('user_id' , 'user_role_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_role');
    }
}
