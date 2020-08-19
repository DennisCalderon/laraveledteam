<?php

#php artisan make:model 'App\Entities\Tarea'
/* comando para crear un modelo dentro de una carpeta X */

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'prioridad_id', 'tags'];

    // relacion - Uno a Uno
    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }

    public function prioridad() {
        // relacionada a través de :   prioridad_id - id (prioridad)
        return $this->belongsTo(Prioridad::class); // es equivalente aun leftjoin
    }
}
