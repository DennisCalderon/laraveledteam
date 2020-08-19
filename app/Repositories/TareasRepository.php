<?php
namespace App\Repositories;
use App\Entities\Tarea;

class TareasRepository {
    public function porUsuario($id) {
        return Tarea::where('usuario_id', $id)->orderBy('created_at', 'asc')->get();
    }

    public function porPrioridad($id, $prioridad_id) {
        //leftjoin, rightjoin, innerJoin
        // tabla1 - campos de union - tabla 2
        return Tarea::where('usuario_id', $id)
                            ->where('prioridad_id', $prioridad_id)
                            //->leftJoin('prioridades', 'prioridades.id', '=', 'tareas.prioridad_id')
                            ->orderBy('created_at', 'asc')
                            ->get();
    }
}

?>