<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Input, Redirect, Auth, Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Recomendacion;
use App\EstadoAnimo;

class RecomendacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the musica
        $datos = Recomendacion::all();

        // load the view and pass the nerds
        return view('recomendaciones.ver')
            ->with('var', $datos);
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

        return view('recomendaciones.crear')->with('estadosAnimo', $estadosAnimo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validacion
        $reglas = array(
            'titulo' => 'required',
            'autor' => 'required',
            'descripcion' => 'required',
            'duracion' => 'required',
            'rutaImagen' => 'image',
            'rutaOrigen' => 'string',
            'estadoAnimo' => 'string',
            'tipoRecomendacion' => 'numeric'
        );


        $validator = Validator::make(Input::all(), $reglas);
        // validamos
        if ($validator->fails()) { //Si falla
            Session::flash('message', "Hay algún error en los datos introducidos.");
            return Redirect::to('recomendacion/create');
        } else {
            // store
            $objeto = new Recomendacion();
            $objeto->titulo = Input::get('titulo');
            $objeto->autor = Input::get('autor');
            $objeto->descripcion = Input::get('descripcion');
            $objeto->duracion = Input::get('duracion');
            $objeto->rutaOrigen = Input::get('rutaOrigen');
            $objeto->estadoAnimo = Input::get('estadoAnimo');
            $objeto->tipo = Input::get('tipoRecomendacion'); //{1,2,3}

            //Sacamos la recomendación que acabamos de insertar para obtener su id
            $recomendacion=Recomendacion::all();
            $ultimaRecomendacion=$recomendacion->last();

            //Tratamos la imagen
            $file = Input::file('rutaImagen');
            $destinationPath = public_path().'/imagenes/';
            $filename = (++$ultimaRecomendacion->id).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);

            if(Input::hasFile('rutaImagen')) {
                $objeto->rutaImagen = '/imagenes/' . $filename;
            }

            //Guardamos la recomendación en la base de datos
            $objeto->save();


            // redirect
            Session::flash('message', 'Recomendación creada correctamente');
            return Redirect::to('recomendacion');
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
