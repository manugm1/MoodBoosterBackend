<?php

namespace App;

use Eloquent;


class Recomendacion extends Eloquent  {

    protected $table = "recomendacion";

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = array('titulo', 'autor', 'descripcion', 'duracion', 'rutaImagen', 'rutaOrigen', 'estadoAnimo', 'tipo');

}