<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Input, Redirect, Auth, Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

// Necesitaremos el modelo EstadoAnimo
use App\EstadoAnimo;

class EstadoAnimoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // get all the nerds
        $estadosAnimo = EstadoAnimo::all();

        // load the view and pass the nerds
        return view('estadosanimo.ver')->with('var', $estadosAnimo);

        //PARA EL API REST return (HABILITADO PARA CHAMIT)
        //return response()->json(['status'=>'ok','data'=>EstadoAnimo::all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadosanimo/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $reglas = array(
            'nombre'       => 'required',
            'marca'      => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $reglas);

        // validamos
        if ($validator->fails()) {
            return Redirect::to('estadoanimo/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $objeto = new EstadoAnimo();
            $objeto->nombre = Input::get('nombre');
            $objeto->marca = Input::get('marca');
            $objeto->save();

            // redirect
            Session::flash('message', 'Estado de ánimo creado correctamente');
            return Redirect::to('estadoanimo');
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
        // return "Se muestra Fabricante con id: $id";
        // Buscamos un fabricante por el id.
        $estadoAnimo=EstadoAnimo::find($id);

        // Si no existe ese fabricante devolvemos un error.
        if (!$estadoAnimo)
        {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un estado de animo con ese nombre.'])],404);
        }

        return response()->json(['status'=>'ok','data'=>$estadoAnimo],200);
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
