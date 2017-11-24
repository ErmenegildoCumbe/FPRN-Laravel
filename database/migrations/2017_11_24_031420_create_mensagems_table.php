<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagems', function (Blueprint $table) {
            $table->increments('id');
            $table->double('valorpossivel');
            $table->string('assunto');
            $table->string('observacao');
            $table->integer('estado');
            $table->integer('remetente')->unsigned();
            $table->foreign('remetente')->references('id')->on('users');
            $table->integer('receptor')->unsigned();
            $table->foreign('receptor')->references('id')->on('users');
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
        Schema::dropIfExists('mensagems');
    }
}
