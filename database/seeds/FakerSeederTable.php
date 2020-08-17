<?php

use Illuminate\Database\Seeder;

//php artisan make:seed FakerSeederTablephp

class FakerSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Entities\Test', 50)->create(); //modelo: Test y cantidad de datos que se insertaran en la tabla
        // de está manera se hace la unión entre un Factory y un seed
        // seguidamente se usa el comando para ejecutar el seed y este llena la tabla de la base de datos indicada
    }
}
