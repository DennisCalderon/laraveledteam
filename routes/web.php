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
    return view('welcome', ['mensaje' => 'Hola a todos', 'html' => '<h1>Lalal</h1>']);
});

#Crear una ruta
#Route::accion(...);

# "resource" apunta a : GET -POST - PUT - DELETE - SHOW  (crea todas esas rutas de peticiones HTTP - las fusiona en una)
Route::resource('estudiantes', 'EstudianteController'); 

/*
#ruta simple
//Route::get('/tareas/buscar', 'TareasController@buscar')->name('tareas.buscar'); //el "name" es para crear un nombre del controlador

#ruta con parámetro
Route::get('/tareas/{id}/ver', 'TareasController@ver')->name('tareas.ver');
#ruta con parámetro opcional --> signo de "?"
Route::get('/tareas/{id}/ver/{limitar?}', 'TareasController@ver')->name('tareas.verlimite');
*/

// tambien podemos llamar a una vista
Route::get('/info', function () {
    return view('welcome');
});

/*
#laraveledteam.test/admin/*     // se agrega un grupo que puede contener varias rutas qué pasaran previamente por un middleware
                                                //parámetro usado en el KERNEL
Route::group(['prefix' => 'admin', 'middleware' => 'is_admin', 'as' => 'admin.'], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
});
*/

# si no se desea crear un grupo se puede usar el middleware en una ruta individual
//Route::get('/dashboard', 'DashboardController@create')->middleware('is_admin');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

// GET, POST, PUT, DELETE, PATCH
route::resource('tareas', 'TareasController');

#Manejo de Errores
Route::get('errores', function(){
    abort(404); // típico error cuando no encontramos una página
});