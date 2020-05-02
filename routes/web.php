<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['cors']], function () {
    Route::get('/trailer/{idtrailer}', 'TrailerController@index');
    Route::get('/pelicula/{idpelicula}', 'PeliculaController@index');
    Route::get('/consulta', 'ConsultaController@index');
    Route::get('/consulta2', 'ConsultaController@index2');
    Route::get('/consulta-genero/{genre}', 'ConsultaGeneroController@index');
    Route::get('/consulta-genero2/{genre}', 'ConsultaGeneroController@index2');
    Route::get('/lista-generos', 'ListaGenerosController@index');
    Route::get('/validar-codigo', 'ValidarCodigoController@index');
    Route::get('/validarcodigo/{code}', 'ValidarCodigoController@store');
    Route::get('/suscripcion', 'SuscripcionController@index');
    Route::get('/suscripcion-ac', 'SuscripcionController@store');
    Route::get('/suscripcion-ac2', 'SuscripcionController@store2');
    Route::post('/responsepayu', 'SuscripcionController@responsepayu');
    Route::get('/valsuscripcion', 'SuscripcionController@valsuscripcion');
    Route::get('/search/{query}', 'SearchController@index');
    Route::get('/contactar/{infoContacto}', 'EmailController@contact');
    Route::get('/restablecer-password/{infoResetPassword}', 'EmailController@resetPassword');
    Route::get('/bienvenido/{infoBienvenida}', 'EmailController@welcome');
    Route::get('/pedir-pelicula/{infoMovie}', 'EmailController@movie');
});

