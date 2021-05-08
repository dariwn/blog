<?php

use App\User;
//use App\RegistroEgresadoNuevo;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'origen' => 'Administradora',
            'password' => '12345678',
            'email' => 'SuperAdmin@gmail.com',
            'username' => 'SuperAdmin',       	            
            'tipo'=> '0',
            'curriculo' => '0',
        ]);

        // $user = User::create([
        //     'origen' => 'Pendiente',
        //     'username' => 'pruebauser',
        //     'password' => bcrypt('12345678'),
        //     'email' => 'pruebauser@gmail.com',
        //     'tipo'=> '0',
        //     'curriculo' => '0',
        //     'created_at' => '2021-03-24 21:22:02',
        //     'updated_at' => '2021-03-24 21:22:02',
        // ]);

        // $user = RegistroEgresadoNuevo::create([
        //     'validacion' => 'No',
        //     'email' => 'pruebauser@gmail.com',
        //     'nombres' => 'prueba',
        //     'apellido_paterno' => 'aknsjnsja',
        //     'apellido_materno' => 'kansjnas',
        //     'numero_control' => 12345678,
        //     'created_at' => '2021-03-24 21:22:02',
        //     'updated_at' => '2021-03-24 21:22:02',
        // ]);

    }
}
