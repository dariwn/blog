<?php

use Illuminate\Database\Seeder;
use App\Idioma;
class IdiomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $idioma = Idioma::create([
            'ididioma'=> '1',
            'idioma' => 'Inglés',

        ]);
$idioma = Idioma::create([
            'ididioma'=> '2',
            'idioma' => 'Español',

        ]);
 $idioma = Idioma::create([
            'ididioma'=> '3',
            'idioma' => 'Frances',

        ]);
 $idioma = Idioma::create([
            'ididioma'=> '4',
            'idioma' => 'Alemán',

        ]);  
    }
}
