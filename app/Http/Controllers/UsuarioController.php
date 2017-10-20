<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Input, Redirect, Auth, Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the musica
        $datos = Usuario::all();

        // load the view and pass the nerds
        return view('usuarios.ver')
            ->with('var', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.crear');
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
            'email' => 'email',
            'password' => 'required|alphaNum|min:3', // password can only be alphanumeric and has to be greater than 3 characters
            'nombre' => 'string',
            'fechaNacimiento' => 'required|date',
            'sexo' => 'required',
            'nivel' => 'required',
            '_token' => 'string' //Se ignora
        );
       // dd(Input::all());

        $validator = Validator::make(Input::all(), $reglas);
        //dd($validator);
        // validamos
        if ($validator->fails()) { //Si falla
            Session::flash('message', "Hay algún error en los datos introducidos.");
            return Redirect::to('usuario/create');
        } else {
            // store
            $objeto = new Usuario();
            $objeto->email = Input::get('email');
            $objeto->password = bcrypt(Input::get('password'));
            $objeto->nombre = Input::get('nombre');
            $objeto->fechaNacimiento = Input::get('fechaNacimiento');
            $objeto->sexo = Input::get('sexo');
            $objeto->nivel = Input::get('nivel');

            //Guardamos la recomendación en la base de datos
            $objeto->save();

            // redirect
            Session::flash('message', 'Usuario creado correctamente');
            return Redirect::to('usuario');
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
