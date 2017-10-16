<?php

use Illuminate\Database\Seeder;

class PagamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pagamentos')->insert([
           'dataPagamento' => '2017-11-01',
           'emprestimos_id' => '1'                 
       ]);
        DB::table('pagamentos')->insert([
           'dataPagamento' => '2017-04-01',
           'emprestimos_id' => '2'                 
       ]);

    }
}
