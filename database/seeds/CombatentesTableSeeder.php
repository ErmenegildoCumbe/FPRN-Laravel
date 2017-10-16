<?php

use Illuminate\Database\Seeder;

class CombatentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('combatentes')->insert([
           'nome' => 'Antonio',
           'apelido' => 'Langa',
           'telefone' => '845241630',
           'sexo' => 'M',
           'tipoMutuario' => 'Antigo Combatente',
           'numeroCombatente' => '142',
           'provincias_id' => '1'          
       ]);

         DB::table('combatentes')->insert([
           'nome' => 'Carla',
           'apelido' => 'Tembe',
           'telefone' => '845241632',
           'sexo' => 'F',
           'tipoMutuario' => 'Desmobilizado de Guerra',
           'numeroCombatente' => '441',
           'provincias_id' => '2'          
       ]);

    }
}
