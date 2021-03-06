<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoemprestimoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidoemprestimos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('montante');
            $table->date('data');
            $table->integer('tempoProposto');
            $table->text('observacao');
            //$table->double('rendimento');
            $table->integer('pedidoestado');
            $table->integer('combatentes_id')->unsigned();
            $table->foreign('combatentes_id')->references('id')->on('combatentes');
            $table->integer('linhacreditos_id')->unsigned();
            $table->foreign('linhacreditos_id')->references('id')->on('linhacreditos');
            $table->integer('projectos_id')->unsigned()->nullable();
            $table->foreign('projectos_id')->references('id')->on('projectos');
            $table->integer('users_id')->unsigned();
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
        Schema::dropIfExists('pedidoemprestimos');
    }
}
