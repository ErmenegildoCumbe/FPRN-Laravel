<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprestimoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dataAprovacao');
            $table->double('montanteDisponibilizado');
            $table->integer('tempoPagamento');
            $table->integer('tempoPagamentoInicial');
            $table->integer('emprestimoestado');
            $table->double('valorMensal');
            $table->integer('pedidoemprestimos_id')->unsigned();
            $table->foreign('pedidoemprestimos_id')->references('id')->on('pedidoemprestimos');
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
        Schema::dropIfExists('emprestimos');
    }
}
