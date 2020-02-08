<?php

namespace App\Http\Controllers;

use App\pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idpelicula)
    {
        $urlMovie = pelicula::
            where('id_Tmdb', '=', $idpelicula)->
            select("url_Movie")->get();
        return $urlMovie;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(pelicula $pelicula)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pelicula $pelicula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(pelicula $pelicula)
    {
        //
    }
}
