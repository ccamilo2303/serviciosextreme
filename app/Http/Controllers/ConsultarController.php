<?php

namespace App\Http\Controllers;
use App\consultar;
use Illuminate\Http\Request;
class ConsultarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return consultar::orderBy ('release_Date', 'desc')->
        select("name_Movie","id_Tmdb","url_Trailer")->get();

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
     * @param  \App\consultar  $consultar
     * @return \Illuminate\Http\Response
     */
    public function show(consultar $consultar)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\consultar  $consultar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, consultar $consultar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\consultar  $consultar
     * @return \Illuminate\Http\Response
     */
    public function destroy(consultar $consultar)
    {
        //
    }
}
