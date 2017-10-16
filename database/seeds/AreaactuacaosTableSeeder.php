<?php

use Illuminate\Database\Seeder;

class AreaactuacaosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areaactuacaos')->insert([
           'areaactuacaofundo' => 'Comércio'
           
       ]);

        DB::table('areaactuacaos')->insert([
           'areaactuacaofundo' => 'Avicultura'
           
       ]);

    }
}
