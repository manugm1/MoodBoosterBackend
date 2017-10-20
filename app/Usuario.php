<?php

namespace App;

use Eloquent;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class Usuario extends Eloquent implements AuthenticatableContract, CanResetPasswordContract {
    //Utilizamos los traits para no implementar las interfaces manualmente
    use Authenticatable, CanResetPassword;

    protected $table = "usuario";

    public $timestamps = false;

    protected $primaryKey = 'email';

    protected $fillable = array('email', 'nombre', 'fechaNacimiento', 'sexo', 'nivel');

    protected $hidden = array('password', 'remember_token');

}