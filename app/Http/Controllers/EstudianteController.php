<?php

#php artisan make:controller EstudianteController --resource
/* comando para crear un controlador con un CRUD completo */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

#Forma extensa de integrar los modelos
/* #use App\Entities\NombreModelo;
 use App\Entities\Estudiante;
 use App\Entities\Tarea;
 use App\Entities\Usuario;
*/

#Forma simplificada de integrar los Modelos en una sola línea
use App\Entities\{Estudiante, Tarea, Usuario};


class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Seleccionar todo en nuestra Tabla
        // select * from tabla-estudiantes

        #Estudiante:operacion(); ==> Consultar, Eliminar, editar, insertar
        #Estudiante::all();                         == select * from estudiantes                        // son equivalentes
        #Estudiante::where('id_estado', 1)->get();  == select * from estudiantes where id_estado = 1;   // son equivalentes

        // Si no tuvieramos las tablas en objetos usariamos
        #DB::table('estudiantes')->where('id_estado', 1)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
