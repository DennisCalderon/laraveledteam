<?php

use Illuminate\Database\Seeder;

// comando para crear el sedd: php artisan make:seed FakerSeederTable
class PrioridadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Se llenara la tabla con esta información
        $prioridades = [
            [
                'prioridad' => 'Alta',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'prioridad' => 'Media',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'prioridad' => 'Baja',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
        ];
        // se le asgina el nombr de la tabla y se hace referencia a los datos que se agregaran
        DB::table('prioridades')->insert($prioridades);
    }
}
