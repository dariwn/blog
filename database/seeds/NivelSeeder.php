<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('nivel')->insert([
            'idnivel' => '1',
            'nivel' => '1',
        ]);

        DB::table('nivel')->insert([
            'idnivel' => '2',
            'nivel' => '2',
        ]);

        DB::table('nivel')->insert([
            'idnivel' => '3',
            'nivel' => '3',
        ]);
    }
}
