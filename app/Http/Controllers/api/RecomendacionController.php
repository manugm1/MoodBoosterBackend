<?php
namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Input, Redirect, Auth, Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Recomendacion;
use App\Historial;

class RecomendacionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // todas las recomendaciones
        $recomendaciones =  Recomendacion::all();

        return response()->json(['status'=>'ok','data'=>$recomendaciones], 200);
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
            $recomendacionesHistorial =  Historial::where(['usuario' => $request['email']])->orderBy('fecha', 'DESC')->orderBy('hora', 'DESC')->get();
            $recomendaciones = array();
            foreach($recomendacionesHistorial as $lineaHistorial){
                $recomendaciones[] = Recomendacion::where('id', $lineaHistorial->recomendacion)->get();
            }
            return response()->json(['status'=>'ok','data'=>$recomendaciones],200);
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
        $recomendacion=Recomendacion::find($id);

        // Si no existe ese fabricante devolvemos un error.
        if (!$recomendacion)
        {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra una recomendación con esa id.'])],404);
        }

        return response()->json(['status'=>'ok','data'=>$recomendacion],200);
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