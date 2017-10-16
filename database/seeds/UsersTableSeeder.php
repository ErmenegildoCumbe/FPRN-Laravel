<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'name' => 'Ermenegildo',
           'email' => 'ermenegildocumbe@outlook.com',
           'password' => '123456789',
           'apelido' => 'Cumbe',
           'telefone' => '823993952',
           'nivelAcesso' => '1',
           'nomeUtilizador' => 'Rafael'               
       ]);
    }
}
