<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProvinciasTableSeeder::class);
        $this->call(CombatentesTableSeeder::class);
        $this->call(LinhacreditosTableSeeder::class);
        $this->call(AreaactuacaosTableSeeder::class);
        $this->call(ProjectosTableSeeder::class);
        $this->call(PedidoemprestimosTableSeeder::class);
        $this->call(EmprestimosTableSeeder::class);
        $this->call(PagamentosTableSeeder::class);
    }
}
