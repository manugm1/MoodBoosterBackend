<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Input, Redirect, Auth, Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pelicula;
use App\EstadoAnimo;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the peliculas
        $peliculas = Pelicula::where('tipo', 3)->get();

        // load the view and pass the nerds
        return view('recomendaciones.peliculas.ver')
            ->with('var', $peliculas);
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
        return view('recomendaciones.peliculas.crear')->with('estadosAnimo', $estadosAnimo);
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
            'autor' => 'required',
            'descripcion' => 'required',
            'duracion' => 'required',
            'rutaImagen' => 'required',
            'rutaOrigen' => 'required',
            'estadoAnimo' => 'required'
        );
        $validator = Validator::make(Input::all(), $reglas);
        // validamos
        if ($validator->fails()) { //Si falla
            Session::flash('message', "Faltan campos por rellenar.");
            return Redirect::to('pelicula/create');
        } else {
            // store
            $objeto = new Pelicula();
            $objeto->titulo = Input::get('titulo');
            $objeto->autor = Input::get('autor');
            $objeto->descripcion = Input::get('descripcion');
            $objeto->duracion = Input::get('duracion');
            $objeto->rutaOrigen = Input::get('rutaOrigen');
            $objeto->estadoAnimo = Input::get('estadoAnimo');
            $objeto->tipo = 3; //TIPO PELICULA


            //Sacamos la película que acabamos de insertar para obtener su id
            $peliculas= Pelicula::all();
            $ultimaPelicula=$peliculas->last();

            //Tratamos la imagen
            $file = Input::file('rutaImagen');
            $destinationPath = public_path().'/imagenes/';
            $filename = ++$ultimaPelicula->id.'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);

            if(Input::hasFile('rutaImagen')) {
                $objeto->rutaImagen = '/imagenes/' . $filename;
            }

            //Guardamos la recomendación en la base de datos
            $objeto->save();


            // redirect
            Session::flash('message', 'Película creada correctamente');
            return Redirect::to('pelicula');
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
