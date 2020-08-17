<?php

#php artisan make:controller TareasController   
/* comando para crear un controlador en blanco */

namespace App\Http\Controllers;
use App\Entities\Tarea;

use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function index() {
        #pruebas
        /*$tareas = Tarea::all();
        var_dump($tareas);*/

        $tareas = Tarea::where('usuario_id', 1)->get();
        foreach ($tareas as $tarea) {
            echo $tarea->titulo."<br />";
        }
    }
    public function buscar() {
        echo "Buscar en Tareas Controller";
    }
    public function ver($id, $limitar = null) {
        echo "Id de la tarea".$id;
    }
}
