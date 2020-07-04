<?php

use Illuminate\Database\Seeder;
use App\Jerarquia;

class JerarquiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jerarquia = Jerarquia::create([
            'idjerarquia'=> '1',
            'nivel' => ' Principiante',

        ]);
$jerarquia = Jerarquia::create([
            'idjerarquia'=> '2',
            'nivel' => 'Intermedio',

        ]);
$jerarquia = Jerarquia::create([
            'idjerarquia'=> '3',
            'nivel' => 'Profesional',

        ]);
    }
}
