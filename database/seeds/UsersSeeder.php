<?php

use App\User;
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

    }
}
