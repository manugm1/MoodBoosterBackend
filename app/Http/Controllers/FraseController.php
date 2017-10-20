<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Input, Redirect, Auth, Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Frase;
use App\EstadoAnimo;

class FraseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the frases
        $frases = Frase::where('tipo', 1)->get();
        // load the view and pass the nerds
        return view('recomendaciones.frases.ver')
            ->with('var', $frases);
        // ESTO PARA EL API REST return response()->json(['status'=>'ok','data'=>Frase::all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Pasamos los estados de ánimo para el select
        $estadosAnimo = EstadoAnimo::all();

        return view('recomendaciones.frases.crear')->with('estadosAnimo', $estadosAnimo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validar
        $reglas = array(
            'titulo' => 'required',
            'descripcion' => 'required',
            'rutaImagen' => 'required',
            'rutaOrigen' => 'required',
            'estadoAnimo' => 'required'
        );
        $validator = Validator::make(Input::all(), $reglas);
        // validamos
        if ($validator->fails()) { //Si falla
            Session::flash('message', "Faltan campos por rellenar.");
            return Redirect::to('frase/create');
        } else {
            // store
            $objeto = new Frase();
            $objeto->titulo = Input::get('titulo');
            $objeto->autor = (Input::get('autor') != "")? Input::get('autor') : null;
            $objeto->descripcion = Input::get('descripcion');
            $objeto->rutaOrigen = Input::get('rutaOrigen');
            $objeto->estadoAnimo = Input::get('estadoAnimo');
            $objeto->tipo = 1; //TIPO FRASE

            //Sacamos la frase que acabamos de insertar para obtener su id
            $frases= Frase::all();
            $ultimaFrase=$frases->last();

            //Tratamos la imagen
            $file = Input::file('rutaImagen');
            $destinationPath = public_path().'/imagenes/';
            $filename = ++$ultimaFrase->id.'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);

            if(Input::hasFile('rutaImagen')) {
                $objeto->rutaImagen = '/imagenes/' . $filename;
            }

            //Guardamos la recomendación en la base de datos
            $objeto->save();


            // redirect
            Session::flash('message', 'Frase creada correctamente');
            return Redirect::to('frase');
        }
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
