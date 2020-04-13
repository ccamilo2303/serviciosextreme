<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::group(['middleware' => ['cors']], function () {
    Route::get('/trailer/{idtrailer}', 'TrailerController@index');
    Route::get('/pelicula/{idpelicula}', 'PeliculaController@index');
    Route::get('/consulta', 'ConsultaController@index');
    Route::get('/consulta-genero/{genre}', 'ConsultaGeneroController@index');
    Route::get('/lista-generos', 'ListaGenerosController@index');
    Route::get('/validar-codigo', 'ValidarCodigoController@index');
    Route::get('/validarcodigo/{code}', 'ValidarCodigoController@store');
    Route::get('/suscripcion', 'SuscripcionController@index');
    Route::get('/suscripcion-ac', 'SuscripcionController@store');
    Route::post('/responsepayu', 'SuscripcionController@responsepayu');
    Route::get('/valsuscripcion', 'SuscripcionController@valsuscripcion');
    Route::get('/search/{query}', 'SearchController@index');
    Route::get('/', function () {
        return view('test');
    }); //Esta ruta la ponemos en la raiz para que nada mas ejecutar nuestra aplicación aparezca nuestro formulario
    
    Route::post('/contactar', 'EmailController@contact')->name('contact');
    Route::post('/bienvenido', 'EmailController@welcome');
});


