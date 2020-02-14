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
});

