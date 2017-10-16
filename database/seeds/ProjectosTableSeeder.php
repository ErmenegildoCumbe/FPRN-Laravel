<?php

use Illuminate\Database\Seeder;

class ProjectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('projectos')->insert([
           'tituloProjecto' => 'Criacao e comercializacao de Galinhas',
           'objectivo' => 'a agradecer todos Vos pelo carinho em disponibilizar',
           'publicoAlvo' => 'rinho em dis',
           'duracaoProjecto' => '24',
           'custoProjecto' => '600000',
           'anexo' => '',
           'areaactuacaos_id' => '1'               
       ]);

        DB::table('projectos')->insert([
           'tituloProjecto' => 'Abertura de Lanchonete',
           'objectivo' => 'a agradecer todos Vos pelo carinho em disponibilizar',
           'publicoAlvo' => 'Alunos e professores',
           'duracaoProjecto' => '34',
           'custoProjecto' => '100000',
           'anexo' => '',
           'areaactuacaos_id' => '1'               
       ]);

    }
}
