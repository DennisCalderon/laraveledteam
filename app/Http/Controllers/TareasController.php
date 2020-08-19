<?php

#php artisan make:controller TareasController   
/* comando para crear un controlador en blanco */

namespace App\Http\Controllers;
use App\Entities\Tarea;
use App\Repositories\TareasRepository;

use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function __construct(TareasRepository $tareas) {
        $this->tareas = $tareas;
    }

    public function index() {
        #pruebas
        /*$tareas = Tarea::all();
        var_dump($tareas);*/

        //$tareas = Tarea::where('usuario_id', 1)->get();
        $tareasPrioridad = $this->tareas->porPrioridad(1,3);
        #$tareas = $this->tareas->porUsuario(1);
        foreach ($tareasPrioridad as $tarea) {
            //echo $tarea->titulo." ".$tarea->prioridad."<br />";
            echo $tarea->titulo;
            echo $tarea->prioridad['id'];
            echo $tarea->prioridad['prioridad'];
        }
        
        
    }
    public function buscar() {
        echo "Buscar en Tareas Controller";
    }
    public function ver($id, $limitar = null) {
        echo "Id de la tarea".$id;
    }
}
