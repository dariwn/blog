<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(NivelSeeder::class);
        $this->call(PerfilesSeeder::class);
        $this->call(JerarquiaSeeder::class);
        $this->call(IdiomaSeeder::class);
        $this->call(SexoSeeder::class);
    }
}
