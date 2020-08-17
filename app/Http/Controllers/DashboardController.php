<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\{Test, Usuario}; // llamando a las tablas
use DB; //usamos esto para trabajar directamente con la tabla sin usar Eloquent

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // todo
        $todos = Test::all(); //Todos los registros de está tabla, ej: 50 registros

        // mostrar datos para prueba
        #var_dump($todos); 
        /*foreach ($todos as $t) {
            echo $t->nombre. " ".$t->numero." <br/>";
        }*/

        //where
        $where = Test::where('numero', '>', 5)->get(); # select * from test where numero > 5;
        $where2 = Test::where('numero', '<', 5)
                        ->where('aleatorio', '<', 10)
                        ->get(); # select * from test where numero < 5 and aleatorio < 50;
        // Por Id
        $porID = Test::find(1);
        #$porUseridUsuario = Usuario::find(1);

        //count 
        $count = Test::count(); #select count(*) from usuarios;

        // máximo
        $max = Test::max('aleatorio');

        // consultas
        $like = Test::where('nombre', 'like', 'A%')->limit(10)->get();
        $between = Test::whereBetween('numero', [5, 15])->limit(10)->get();

        ### para motras la información podemos usar un arreglo o usar una nueva función llamada compact

        # usando compact
        return view('dashboard')->with(compact('like', 'where'));
                                            // definimos las variables que queremos usar

        #usando el arreglo
        /*$data = [
            'where' => $where,
            'like' => $like
        ];
        return view('dashboard', $data);*/
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
