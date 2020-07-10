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
        $this->call(PrioridadesTableSeeder::class);
        // se debe tener mucho cuidado con el orden de ingresar de los datos, es decir el orden de los Seeders
    }
}
