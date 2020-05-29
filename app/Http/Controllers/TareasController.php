<?php

#php artisan make:controller TareasController   
/* comando para crear un controlador en blanco */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function buscar() {
        echo "Buscar en Tareas Controller";
    }
    public function ver($id, $limitar = null) {
        echo "Id de la tarea".$id;
    }
}
