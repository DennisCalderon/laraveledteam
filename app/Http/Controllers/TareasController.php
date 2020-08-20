<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
// creado con el comando php artisan make::controller TareasController --resource
// el anterior se renombro para trabajar en limpio

use App\Entities\{Tarea, Prioridad}; // llamando a los modelos de las bases de datos que vamos a utilizar.

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::all('-'); // modicamos: $tareas = Tarea::all(); y le agregamos el parámetro '-' para generar un error y verificar nuestra vista de error custom
        return view('tareas.index')->with(compact('tareas')); // la data tamien la podemos enviar con un arreglo -> $data['']
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prioridades = Prioridad::all();
        $action = route('tareas.store'); // se encarga de hacer la inserción de datos del formulario
        $tarea =  new Tarea();
        return view('tareas.crear')->with(compact('prioridades', 'action', 'tarea')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #Validación
        list($rules, $messages) = $this->_rules();
        $this->validate($request, $rules, $messages);
        
        #Opción 01 - guardar cada parámetro que resive desde el formulario
        $tarea = new Tarea(); // busca su tabla en MySQL y le agrega la "S" 
        $tarea->titulo = $request->input('titulo');
        $tarea->description = $request->input('description');
        $tarea->prioridad_id = $request->input('prioridad_id');
        $tarea->usuario_id = 1; // para este caso le pasamos un valor estático porque no estamos trabajando con un login
        $tarea->save(); // este método se conecta con la base de datos y guarda los valores, adicionalmente se agrega la fecha del ordendor en los registros de 'created_at' y 'updated_at'

        return redirect()->route('tareas.index');  // este es uno de los métodos de redirección que se puede usar
        

        /*
        #Opcion 02 - igual a la opción 01 pero usamos un arreglo, para este método tenemos que agregar los parámetros de 'created_at' y 'updated_at' por lo cual usamos la librería "CARBON" la cual incluimos en la cabecera del controllador
        $titulo = $request->input('titulo');
        $description = $request->input('description');
        $prioridad_id = $request->input('prioridad_id');
        $usuario_id = 1;

        $tarea = [
            'titulo' => $titulo,
            'description' => $description,
            'prioridad_id' => $prioridad_id,
            'usuario_id' => $usuario_id,
            'created_at' => Carbon::now(),
            'updated_at' =>Carbon::now()
        ];
        Tarea::insert($tarea);
        return redirect()->route('tareas.index');
        */

        /*
        #Opcion 03 - Se recomienda cuando tienes un formulario muy grande
        $tarea = new Tarea($request->input());  // está línea de código trae todos los valores que se reciben y las iguala al objeto
        // a diferencia de los métodos anteriores aqui tanto el nombre de las columnas como el nombre de los campos se deben de llamar de las misma forma caso contrario dara un error
        $tarea->usuario_id = 1; // como no usamos el login seguimos dando el usuario como un valor estático
        $tarea->save();

        return redirect()->route('tareas.index');
        */
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
        //laraveledteam.test/tareas/edit/{id}
        $tarea = Tarea::find($id); //id - $id
        $prioridades = Prioridad::all();
        $put = True;
        $action = route('tareas.update', ['id' => $id]);
        return view ('tareas.actualizar')->with(compact('tarea', 'action', 'prioridades', 'put'));
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
        $tarea = Tarea::find($id);
        // $tarea = new Tarea(); // omitimos está linea para que solo actulice una fila ya existente en lugar de crear una nueva
        $tarea->titulo = $request->input('titulo');
        $tarea->description = $request->input('description');
        $tarea->prioridad_id = $request->input('prioridad_id');
        $tarea->usuario_id = 1; // para este caso le pasamos un valor estático porque no estamos trabajando con un login
        $tarea->save(); // este método se conecta con la base de datos y guarda los valores, adicionalmente se agrega la fecha del ordendor en los registros de 'created_at' y 'updated_at'

        return redirect()->route('tareas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete(); // metodo para borrar

        return back(); // retroceder a la dirección web anterior
    }

    #Reglas de validación
    private function _rules() {
        $messages = [
            'titulo.required' => 'El titulo es requerido', //nombre del campo y el atributo de "required"
            'titulo.min' => 'Mínimo 5 caracteres', //nombre del campo y el atributo
            'description.required' => 'Escribe una descripción para tu tarea', //nombre del campo y el atributo
            'prioridad_id.not_in' => 'No puede ser 0',
            'prioridad_id.required' => 'Selecciona una prioridad'
        ]; // estas son las respuestas de error, este campo es opcional pero se recomienda crear 

        $rules = [
            'titulo' => 'required|min:5',
            'description' => 'required',
            'prioridad_id' => 'required|not_in:0'
        ];

        return array($rules, $messages); // una vez customizadas las respuestas a las reglas regrasmos todo como un arreglo
    }
}
