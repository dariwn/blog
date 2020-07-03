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
            'username' => 'Beatriz',       	            
            'tipo'=> '0',
            'curriculo' => '0',
        ]);

    }
}
