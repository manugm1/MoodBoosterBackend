<?php
namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Input, Redirect, Auth, Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EstadoAnimo;
use App\Usuario;
use App\Historial;

class EstadoAnimoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // todos los estados de animo
        $estadosAnimo = EstadoAnimo::all();

        return response()->json(['status'=>'ok','data'=>$estadosAnimo], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json(['errors'=>array(['code'=>401,'message'=>'Operación no permitida.'])],401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(['errors'=>array(['code'=>401,'message'=>'Operación no permitida.'])],401);
    }

    public function obtener(Request $request){

        // validacion
        $userdata = array(
            'email' => $request['email'],
            'password' => $request['password'],
            'nivel' => 2 //Deberá ser 2
        );

        if(Auth::attempt($userdata)){
            $estadosAnimoHistorial =  Historial::where(['usuario' => $request['email']])->get();
            $estadosAnimo = array();
            foreach($estadosAnimoHistorial as $lineaHistorial){
                $estadosAnimo[] = EstadoAnimo::where('nombre', $lineaHistorial->estadoAnimo)->get();
            }
            return response()->json(['status'=>'ok','data'=>$estadosAnimo],200);
        }
        else{
            return response()->json(['errors'=>array(['code'=>401,'message'=>'Sin acceso.'])],401);
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
        return response()->json(['errors'=>array(['code'=>401,'message'=>'Operación no permitida.'])],401);
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
        return response()->json(['errors'=>array(['code'=>401,'message'=>'Operación no permitida.'])],401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(['errors'=>array(['code'=>401,'message'=>'Operación no permitida.'])],401);
    }
}