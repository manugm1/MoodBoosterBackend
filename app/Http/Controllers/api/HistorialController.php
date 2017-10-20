<?php
namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Input, Redirect, Auth, Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usuario;
use App\Historial;
use App\EstadoAnimo;
use App\Recomendacion;

class HistorialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['errors'=>array(['code'=>401,'message'=>'Operación no permitida.'])],401);
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
     * Guarda una entrada al historial (una entrada de un estado de ánimo) del usuario
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validamos la información
        $reglas = array(
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3', //password: alfanumérica y mínimo 3
            'estadoAnimo' => 'required'
        );
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $reglas);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return response()->json(['errors'=>array(['code'=>401,'message'=>'Error en los parámetros'])],401);
        } else {

            //Comprobamos si ya existe el usuario
            $usuarioExiste = $usuarioExiste=Usuario::find($request['email']);

            if($usuarioExiste){

                $userdata = array(
                    'email' => $request['email'],
                    'password' => $request['password'],
                    'nivel' => 2
                );

                if(Auth::attempt($userdata)){

                    //Para las recomendaciones, tenemos en cuenta
                    //que no se haya recomendado ya y también su último estado de ánimo introducido
                    //$historialRecomendacionesUsuario = Historial::find();
                    //$historial->recomendacion = ; //Calculada
                    $recomendacion = Historial::obtenerNuevaRecomendacion($request['email'], $request['estadoAnimo']);

                    //Si ha encontrado alguna recomendación asociada al estado de ánimo y ésta no se ha repetido
                    if($recomendacion != -1){
                        //Procedemos a guardar la entrada
                        //Desde el cliente (app) tendrán que hacer otra petición al servicio
                        //para obtener todas las recomendaciones del usuario
                        $historial = new Historial();
                        $historial->estadoAnimo = $request['estadoAnimo'];
                        $historial->usuario = $request['email'];
                        $historial->fecha = date("Y-m-d");
                        $historial->hora = date("H:i:s");
                        $historial->recomendacion = $recomendacion;
                        $historial->save();
                        return response()->json(['status'=>'ok','data'=>'Estado de ánimo insertado correctamente'], 200);
                    }
                    else{
                        return response()->json(['errors'=>array(['code'=>401,'message'=>'No hay más recomendaciones disponibles en este momento'])],401);
                    }
                }
                else{
                    return response()->json(['errors'=>array(['code'=>401,'message'=>'Sin acceso'])],401);
                }
            }
            else return response()->json(['errors'=>array(['code'=>401,'message'=>'Usuario no existe'])],401);
        }
    }

    /**
     * Obtiene la información de un solo usuario (pasado por get)
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function obtener(Request $request){

        // validacion
        $userdata = array(
            'email' => $request['email'],
            'password' => $request['password'],
            'nivel' => 2 //Deberá ser 2
        );

        if(Auth::attempt($userdata)){
            $lineasHistorial =  Historial::where(['usuario' => $request['email']])->orderBy('fecha', 'DESC')->orderBy('hora', 'DESC')->get();
            $lineasHistorialAux = $lineasHistorial;
            $i = 0;
            foreach($lineasHistorial as $lineaHistorial){
                $lineasHistorialAux[$i]['estadoAnimo'] = EstadoAnimo::where('nombre', $lineaHistorial->estadoAnimo)->get();
                $lineasHistorialAux[$i]['recomendacion'] = Recomendacion::where('id', $lineaHistorial->recomendacion)->get();
                $i++;
            }
            return response()->json(['status'=>'ok','data'=>$lineasHistorialAux],200);
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
        return response()->json(['errors'=>array(['code'=>401,'message'=>'Operación no permitida.'])],401);
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