<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

#Crear una ruta
#Route::accion(...);

# "resource" apunta a : GET -POST - PUT - DELETE - SHOW  (crea todas esas rutas de peticiones HTTP - las fusiona en una)
Route::resource('estudiantes', 'EstudianteController'); 

#ruta simple
Route::get('/tareas/buscar', 'TareasController@buscar')->name('tareas.buscar'); //el "name" es para crear un nombre del controlador

#ruta con parámetro
Route::get('/tareas/{id}/ver', 'TareasController@ver')->name('tareas.ver');
#ruta con parámetro opcional --> signo de "?"
Route::get('/tareas/{id}/ver/{limitar?}', 'TareasController@ver')->name('tareas.verlimite');

// tambien podemos llamar a una vista
Route::get('/info', function () {
    return view('welcome');
});