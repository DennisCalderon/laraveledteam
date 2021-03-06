<?php

#php artisan make:model 'App\Entities\Usuario'
/* comando para crear un modelo dentro de una carpeta X */

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';

    public function tareas() {
        //muchas tareas - Uno a Varios
        return $this->hasMany(Tarea::class);
    }
}
