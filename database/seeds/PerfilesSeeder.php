<?php

use Illuminate\Database\Seeder;
use App\Perfil;

class PerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $perfiles = Perfil::create([
            'idperfiles'=> '1',
            'carrera' => 'Ingeniería en Sistemas Computacionales',
            'nivel' => ' 1',

        ]);

        $perfiles = Perfil::create([
            'idperfiles'=> '2',
            'carrera' => 'Ingeniería Eléctrica',
            'nivel' => ' 1',

        ]);

        $perfiles = Perfil::create([
            'idperfiles'=> '3',
            'carrera' => 'Ingeniería Electrónica',
            'nivel' => ' 1',

        ]);

        $perfiles = Perfil::create([
            'idperfiles'=> '4',
            'carrera' => 'Ingeniería en Gestión Empresarial',
            'nivel' => ' 1',

        ]);

        $perfiles = Perfil::create([
            'idperfiles'=> '5',
            'carrera' => 'Ingeniería Bioquímica',
            'nivel' => ' 1',

        ]);

        $perfiles = Perfil::create([
            'idperfiles'=> '6',
            'carrera' => 'Ingeniería Industrial',
            'nivel' => ' 1',

        ]);

        $perfiles = Perfil::create([
            'idperfiles'=> '7',
            'carrera' => 'Ingeniería Logística',
            'nivel' => ' 1',

        ]);

        $perfiles = Perfil::create([
            'idperfiles'=> '8',
            'carrera' => 'Ingeniería Mécanica',
            'nivel' => ' 1',

        ]);

        $perfiles = Perfil::create([
            'idperfiles'=> '9',
            'carrera' => 'Ingeniería Química',
            'nivel' => ' 1',

        ]);

        $perfiles = Perfil::create([
            'idperfiles'=> '71',
            'carrera' => 'Maestría en Ciencias en Ingeniería Mecatrónica',
            'nivel' => ' 2',

        ]);

        $perfiles = Perfil::create([
            'idperfiles'=> '72',
            'carrera' => 'Maestría en Ciencias en Ingeniería Bioquímica',
            'nivel' => ' 2',

        ]);

        $perfiles = Perfil::create([
            'idperfiles'=> '91',
            'carrera' => 'Doctorado en Ciencias de los Alimentos y Biotecnología',
            'nivel' => ' 3',

        ]);

        $perfiles = Perfil::create([
            'idperfiles'=> '92',
            'carrera' => 'Doctorado en Ciencias de la Ingeniería',
            'nivel' => ' 3',
        ]);
    }
}
