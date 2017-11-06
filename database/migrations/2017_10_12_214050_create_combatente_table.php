<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombatenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combatentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->string('apelido', 50);
            $table->string('telefone', 40);
            $table->string('sexo', 40);
            $table->string('tipoMutuario', 50);
            $table->integer('numeroCombatente');
            $table->integer('provincias_id')->unsigned();
            $table->foreign('provincias_id')->references('id')->on('provincias');
            $table->integer('users_id')->unsigned()->nullable();
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('combatentes');
    }
}
