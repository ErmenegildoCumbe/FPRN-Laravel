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
           'sexo' => 'Masculino',
           'tipoMutuario' => 'Antigo Combatente',
           'rendimento' => 7850,
           'numeroCombatente' => '142',
           'provincias_id' => '1'          
       ]);

         DB::table('combatentes')->insert([
           'nome' => 'Carla',
           'apelido' => 'Tembe',
           'telefone' => '845241632',
           'sexo' => 'Feminino',
           'tipoMutuario' => 'Desmobilizado de Guerra',
           'rendimento' => 10850,
           'numeroCombatente' => '441',
           'provincias_id' => '2'          
       ]);

    }
}
