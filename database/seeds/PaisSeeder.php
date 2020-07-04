<?php

use Illuminate\Database\Seeder;
use App\Pais;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pais = Pais::create([
            'idpais' => '1',
            'nombre' => 'Mexico',
        ]);
    }
}
