<?php
namespace App\Http\Controllers\Api;
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
     * Registro del usuario
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
            'nombre' => 'required',
            'fechaNacimiento' => 'required',
            'sexo' => 'required'
        );
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $reglas);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return response()->json(['errors'=>array(['code'=>401,'message'=>'Error en los parámetros'])],401);
        } else {
            // create our user data for the authentication
            /*$userdata = array(
                'email' => $request['email'],
                'password' => $request['password'],
                'nivel' => 2
            );*/

            //Comprobamos si ya existe el usuario
            $usuarioExiste = $usuarioExiste=Usuario::find($request['email']);

            if(!$usuarioExiste){
                $usuario = new Usuario();

                $usuario->email = $request['email'];
                $usuario->password = bcrypt($request['password']);
                $usuario->nombre = $request['nombre'];
                $usuario->fechaNacimiento =  $request['fechaNacimiento'];
                $usuario->sexo = $request['sexo'];
                $usuario->nivel = 2;
                $usuario->save();

                return response()->json(['status'=>'ok','data'=>'Registro correcto'], 200);
            }
            else return response()->json(['errors'=>array(['code'=>401,'message'=>'Usuario ya existente'])],401);
        }
    }

    public function login(Request $request){

        // validamos la información
        $reglas = array(
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3', //password: alfanumérica y mínimo 3
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
                    return response()->json(['status'=>'ok','data'=>'Login correcto'], 200);
                }
                else{
                    return response()->json(['errors'=>array(['code'=>401,'message'=>'Sin acceso'])],401);
                }
            }
            else return response()->json(['errors'=>array(['code'=>401,'message'=>'Usuario no existe'])],401);
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