<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tituloProjecto', 50);
            $table->text('objectivo');
            $table->string('publicoAlvo', 50);
            $table->string('duracaoProjecto', 50);
            $table->double('custoProjecto');
            $table->string('anexo',100)->nullable();
            $table->integer('areaactuacaos_id')->unsigned();
            $table->foreign('areaactuacaos_id')->references('id')->on('areaactuacaos');
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
        Schema::dropIfExists('projectos');
    }
}
