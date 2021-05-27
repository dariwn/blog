<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sexo')->insert([
            'idgenero'=> '1',
            'sexo' => 'Hombre',
        ]);

        DB::table('sexo')->insert([
            'idgenero'=> '2',
            'sexo' => 'Mujer',
        ]);

        DB::table('sexo')->insert([
            'idgenero'=> '3',
            'sexo' => 'Indistinto',
        ]);
    }
}
