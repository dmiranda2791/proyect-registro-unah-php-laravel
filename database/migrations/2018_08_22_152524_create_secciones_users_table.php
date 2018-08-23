<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secciones_users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('seccion_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->double('calificacion', null, 2);

            $table->foreign('seccion_id')->references('id')->on('secciones')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('secciones_users', function (Blueprint $table) {
            Schema::dropIfExists('secciones_users');
        });
    }
}
