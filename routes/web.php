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
    Route::get('/consulta-genero/{genre}', 'ConsultaGeneroController@index');
    Route::get('/lista-generos', 'ListaGenerosController@index');
    Route::get('/validar-codigo', 'ValidarCodigoController@index');
    Route::get('/validarcodigo/{code}', 'ValidarCodigoController@store');
    Route::get('/suscripcion', 'SuscripcionController@index');
    Route::get('/suscripcion-ac', 'SuscripcionController@store');
    Route::post('/responsepayu', 'SuscripcionController@responsepayu');
    Route::get('/valsuscripcion', 'SuscripcionController@valsuscripcion');
    Route::get('/search/{query}', 'SearchController@index');
    Route::get('/contactar', 'EmailController@contact')->name('contact');
    Route::post('/restablecer-password', 'EmailController@resetPassword');
    Route::post('/bienvenido', 'EmailController@welcome');
    Route::post('/pedir-pelicula', 'EmailController@movie');
});

