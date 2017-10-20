<?php

namespace App;

use Eloquent;

use App\Recomendacion;


class Historial extends Eloquent  {

    protected $table = "historial";

    public $incrementing = false;

    public $timestamps = false;

    protected $primaryKey = array('estadoAnimo', 'usuario', 'fecha', 'hora', 'recomendacion') ;

    protected $fillable = array('estadoAnimo', 'usuario', 'fecha', 'hora', 'recomendacion');


    private static function recomendacionesUsuario($usuario){
        $lineasHistorial = Historial::where('usuario', $usuario)->get();

        $arrRecomendaciones = array();
        foreach($lineasHistorial as $linea){
            $arrRecomendaciones[] = $linea['recomendacion'];
        }
        return $arrRecomendaciones;
    }

    /**
     * Dado el usuario y el estado de ánimo, devuelve una recomendación asociada
     * Condición 1: Cumple la relación con un estado de ánimo
     * Condición 2: Dicha recomendación es única para el usuario (nunca antes se le ha proporcionado)
     * @param $usuario
     * @param $estadoAnimo
     * @return mixed
     */
    public static function obtenerNuevaRecomendacion($usuario, $estadoAnimo){
        $arrRecomendaciones = self::recomendacionesUsuario($usuario);
        $recomendaciones = Recomendacion::where('estadoAnimo', $estadoAnimo)->whereNotIn('id', $arrRecomendaciones)->get();
        if(count($recomendaciones)>0)
            return $recomendaciones[0]['id'];
        else return -1;
    }
}