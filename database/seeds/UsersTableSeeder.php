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
           'password' => bcrypt('123456789'),
           'apelido' => 'Cumbe',
           'telefone' => '823993952',
           'nivelAcesso' => '1',
           'nomeUtilizador' => 'Rafael'               
       ]);

        DB::table('users')->insert([
           'name' => 'Cheila Manuel',
           'email' => 'cheila@gmail.com',
           'password' => bcrypt('123456789'),
           'apelido' => 'Biquisa',
           'telefone' => '865493472',
           'nivelAcesso' => '0',
           'nomeUtilizador' => 'Cheila'               
       ]);
    }
}
