<?php

use Faker\Generator as Faker;

// comando para crear el faker: php artisan make:factory TestFactory

//$factory->define(Model::class, function (Faker $faker) {    
$factory->define(App\Entities\Test::Class, function (Faker $faker) {
              // ubicamos el archivo de origen en nuestra carpeta Entities
    return [
        //rellenamos los datos que se llenaran
        'nombre' => $faker->name,
        'correo' => $faker->unique()->safeEmail, // unique () -> para generar un dato único y no repetir el CORREO
        'token' => str_random(10), //generar un token random
        'descripcion' => $faker->text,
        'telefono' => $faker->phoneNumber,
        'direccion' => $faker->address,
        'numero' => $faker->randomDigit,
        'fecha' => \Carbon\Carbon::now()->format('Y-m-d'), // '2018-01-30',
        'hora' => \Carbon\Carbon::now()->format('H:i:s'), // '10:00:00',
        'username' => $faker->userName,
        'hex' => $faker->hexcolor,
        'imagen' => $faker->ImageUrl(300, 300, 'cats', true, 'Faker'), //'http://lorempixel.com/300/300/cats/Faker' - generar una imagen 
        'aleatorio' => $faker->numberBetween(1,500), // 1-500 - número aleatorio entre 1 y 500

        /* la tabla para este ejemplo se crea por separado
        DROP TABLE IF EXISTS `faker`;
        CREATE TABLE `faker` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `nombre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `correo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `token` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `descripcion` text COLLATE utf8mb4_unicode_ci,
        `telefono` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `direccion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `numero` int(10) DEFAULT NULL,
        `fecha` date DEFAULT NULL,
        `hora` time DEFAULT NULL,
        `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `hex` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `imagen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `aleatorio` int(25) DEFAULT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

        */
    ];
});
