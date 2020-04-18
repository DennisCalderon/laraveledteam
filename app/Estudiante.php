<?php

#php artisan make:model Estudiante
/* comando para crear un modelo */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    #DB -> Tabla con nombre estudiantes //Laravel busca una tabla con el mismo nombre del modelo
    #protected $table = 'students'; //asignando un nombre de tabla X

    # Supervisor -> Superversors
    #protected $table = 'supervisores'; //asignando un nombre de tabla X
    //
}
