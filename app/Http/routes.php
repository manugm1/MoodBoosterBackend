<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Función para las clases activas
 */
if (!function_exists('classActivePath')) {
    function classActivePath($path, $active = 'active')
    {
        return Request::is($path) ? $active : '';
    }
}

/**
 * Rutas Panel Admin
 */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index'); // Vista de inicio
    Route::resource('estadoanimo', 'EstadoAnimoController');
    Route::resource('recomendacion', 'RecomendacionController');
    Route::resource('usuario', 'UsuarioController');
});

/*
 * Rutas de login
 */
Route::get('login',  ['as' => 'login', 'uses' =>'Auth\LoginController@getLogin']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@getLogout']);


/**
 * Rutas API
 */
Route::group(['prefix' => 'api', 'namespace' => 'api'], function () {

    // Estados de ánimo

    Route::get('estadoAnimo/porUsuario', 'EstadoAnimoController@obtener');

    Route::resource('estadoAnimo', 'EstadoAnimoController'); //Se permite también ver todos y solo uno

    // Recomendaciones

    Route::get('recomendacion/porUsuario', 'RecomendacionController@obtener');

    Route::resource('recomendacion', 'RecomendacionController'); //Se permite también ver todos y solo uno

    // Usuarios

    Route::post('usuario/login', 'UsuarioController@login'); //login

    Route::resource('usuario', 'UsuarioController'); //Store hace el registro (creación del usuario)


    //Historial

    Route::get('historial/porUsuario', 'HistorialController@obtener');

    Route::resource('historial', 'HistorialController'); //Store hace el registro (creación del usuario)

    ///Route::resource('estadoanimo', 'EstadoAnimoController');
   // Route::resource('frase','FraseController');//Falta definir herencia??
   // Route::resource('pelicula','PeliculaController');//Falta definir controlador/index
   // Route::resource('musica','MusicaController'); //Falta definir controlador/index
});

//crear usuario
/*
$usuario = new \App\Usuario();

$usuario->email = "lucas@gmail.com";
$usuario->password = Hash::make("lucas123");
$usuario->fechaNacimiento = '1990-01-01';
$usuario->nivel = 2;
$usuario->save();
*/



//Falta definir el logout
//Investigar auth2
//Realizar vistas y formularios Ver todos/Crear
//Middleware
//Corregir la plantilla base app.blade.php para que sea más dinámica