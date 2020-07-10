<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id');       // id de la tabla
            $table->string('titulo', 50);   // campos, se cran los campos y tipos como si fuera lenguaje SQL
            $table->text('description');
            $table->integer('prioridad_id')->unsigned();    // "->unsigned();" para poder dejar vacio la columna
            $table->integer('usuario_id')->unsigned();  // para poder relacionar con los usuarios
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
}
