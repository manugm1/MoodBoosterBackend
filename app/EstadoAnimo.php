<?php

namespace App;

use Eloquent;


class EstadoAnimo extends Eloquent  {

    protected $table = "estadoanimo";

    public $timestamps = false;

    protected $primaryKey = 'nombre';

    protected $fillable = array('marca');
}