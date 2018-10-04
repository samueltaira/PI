<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospedes', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('user_id')->unsigned;
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('nome');
            $table->string('cidade');
            $table->string('email')->unique();
            $table->string('contato');
            $table->string('documento');
            $table->date('dataNascimento');
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
        Schema::dropIfExists('hospedes');
    }
}
