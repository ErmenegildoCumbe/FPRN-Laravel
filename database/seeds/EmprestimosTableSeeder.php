<?php

use Illuminate\Database\Seeder;

class EmprestimosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emprestimos')->insert([
           'dataAprovacao' => '2017-10-16',
           'montanteDisponibilizado' => '50000',
           'tempoPagamento' => '8',
           'tempoPagamentoInicial' => '2',
           'emprestimoestado' => '1',
           'valorMensal' => '12500',
           'pedidoemprestimos_id' => '1'          
       ]);

          DB::table('emprestimos')->insert([
           'dataAprovacao' => '2017-02-16',
           'montanteDisponibilizado' => '40000',
           'tempoPagamento' => '9',
           'tempoPagamentoInicial' => '1',
           'emprestimoestado' => '1',
           'valorMensal' => '8500',
           'pedidoemprestimos_id' => '2'          
       ]);

    }
}
