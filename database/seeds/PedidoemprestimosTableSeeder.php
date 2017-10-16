<?php

use Illuminate\Database\Seeder;

class PedidoemprestimosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedidoemprestimos')->insert([
           'montante' => '50000',
           'data' => '2017-01-25',
           'rendimento' => '15000',
           'tempoProposto' => '8',
           'observacao' => 'que fala,estrovertida,confusa!!mas hey está a m carinho transmitido ontemdia do ',
           'pedidoestado' => '1',
           'combatentes_id' => '1',
           'linhacreditos_id' => '1',
           'projectos_id' => '1',
           'users_id' => '1'          
       ]);

         DB::table('pedidoemprestimos')->insert([
           'montante' => '500000',
           'data' => '2017-01-20',
           'rendimento' => '20000',
           'tempoProposto' => '18',
           'observacao' => 'que fala,estrovertida,confusa!!mas hey estárever o vosso carinho transmitido ontem dia do ',
           'pedidoestado' => '1',
           'combatentes_id' => '2',
           'linhacreditos_id' => '2',
           'projectos_id' => '2',
           'users_id' => '1'          
       ]);

    }
}
