<?php

use Illuminate\Database\Seeder;

class LinhacreditosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('linhacreditos')->insert([
           'designacao' => 'Linha Simplificada',
           'valorMinimo' => '1000',
           'valorMaximo' => '100000'             
       ]);

         DB::table('linhacreditos')->insert([
           'designacao' => 'Linha Empreendedor',
           'valorMinimo' => '100000',
           'valorMaximo' => '1000000'             
       ]);

    }
}
