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
            'idioma' => 'Inglés - Nivel Principiante',
        ]);

        $idioma = Idioma::create([
            'ididioma'=> '2',
            'idioma' => 'Inglés - Nivel Intermedio',
        ]);

        $idioma = Idioma::create([
            'ididioma'=> '3',
            'idioma' => 'Inglés - Nivel Avanzado',
        ]);

        $idioma = Idioma::create([
            'ididioma'=> '4',
            'idioma' => 'Español - Nivel Principiante',
        ]);

        $idioma = Idioma::create([
            'ididioma'=> '5',
            'idioma' => 'Español - Nivel Intermedio',
        ]);

        $idioma = Idioma::create([
            'ididioma'=> '6',
            'idioma' => 'Español - Nivel Avanzado',
        ]);

        $idioma = Idioma::create([
            'ididioma'=> '7',
            'idioma' => 'Frances - Nivel Principiante',
        ]);

        $idioma = Idioma::create([
            'ididioma'=> '8',
            'idioma' => 'Frances - Nivel Intermedio',
        ]);

        $idioma = Idioma::create([
            'ididioma'=> '9',
            'idioma' => 'Frances - Nivel Avanzado',
        ]);

        $idioma = Idioma::create([
            'ididioma'=> '10',
            'idioma' => 'Aleman - Nivel Principiante',
        ]);

        $idioma = Idioma::create([
            'ididioma'=> '11',
            'idioma' => 'Aleman - Nivel Intermedio',
        ]);

        $idioma = Idioma::create([
            'ididioma'=> '12',
            'idioma' => 'Aleman - Nivel Avanzado',
        ]);

        //lenguas indigenas de chiapas
        $idioma = Idioma::create([
            'ididioma'=> '13',
            'idioma' => 'Mam - Lengua Materna',
        ]);
        $idioma = Idioma::create([
            'ididioma'=> '14',
            'idioma' => 'Jakalteco - Lengua Materna',
        ]);
        $idioma = Idioma::create([
            'ididioma'=> '15',
            'idioma' => 'Tsotsil - Lengua Materna',
        ]);
        $idioma = Idioma::create([
            'ididioma'=> '16',
            'idioma' => 'Tojolabal - Lengua Materna',
        ]);
        $idioma = Idioma::create([
            'ididioma'=> '17',
            'idioma' => 'Teko - Lengua Materna',
        ]);
        $idioma = Idioma::create([
            'ididioma'=> '18',
            'idioma' => 'Qato´k - Lengua Materna',
        ]);
        $idioma = Idioma::create([
            'ididioma'=> '19',
            'idioma' => 'Tseltal - Lengua Materna',
        ]);
        $idioma = Idioma::create([
            'ididioma'=> '20',
            'idioma' => 'Lacandón - Lengua Materna',
        ]);
        $idioma = Idioma::create([
            'ididioma'=> '21',
            'idioma' => 'Zoque - Lengua Materna',
        ]);
        $idioma = Idioma::create([
            'ididioma'=> '22',
            'idioma' => 'Ch´ol - Lengua Materna',
        ]);
        $idioma = Idioma::create([
            'ididioma'=> '23',
            'idioma' => 'Chuj - Lengua Materna',
        ]);
        $idioma = Idioma::create([
            'ididioma'=> '24',
            'idioma' => 'Q´anjob´al - Lengua Materna',
        ]);
         //fin
        
    }
}
