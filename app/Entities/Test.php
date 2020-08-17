<?php

namespace App\Entities;

//php artisan make:model 'App\Entities\Test'

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'faker'; 
    // se esta referenciando el nombre de la tabla para que busca una tabla en particular que nosotros le indicamos
}
