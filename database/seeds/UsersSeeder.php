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
            'password' => '$2y$10$2EWxmeBmU7syCmJ29GpaKO9LsT.YGj5GZjIsk4az8W2sBWLF4Sqnq',
            'username' => 'Beatriz',       	            
            'tipo'=> '0',
            'curriculo' => '0',
        ]);

    }
}
