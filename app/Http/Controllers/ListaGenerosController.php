<?php

namespace App\Http\Controllers;

use App\ListaGeneros;
use Illuminate\Http\Request;

class ListaGenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = ListaGeneros::join('movies_and_genders','genders.id_gender','=','movies_and_genders.Movie_gender')
            ->select('id_gender','name_gender')
            ->groupBy('id_gender','name_gender')
            ->orderBy('name_gender','asc')
            ->get();
        return $lista;
        echo "puto";
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
     * @param  \App\ListaGeneros  $listaGeneros
     * @return \Illuminate\Http\Response
     */
    public function show(ListaGeneros $listaGeneros)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListaGeneros  $listaGeneros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListaGeneros $listaGeneros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListaGeneros  $listaGeneros
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListaGeneros $listaGeneros)
    {
        //
    }
}
