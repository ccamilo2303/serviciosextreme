<?php

namespace App\Http\Controllers;

use App\trailer;
use Illuminate\Http\Request;

class TrailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idtrailer)
    {
        $urlTrailer = trailer::
            where('id_Tmdb', '=', $idtrailer)->
            select("url_Trailer")->get();
        return $urlTrailer;
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
     * @param  \App\trailer  $trailer
     * @return \Illuminate\Http\Response
     */
    public function show(trailer $trailer)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\trailer  $trailer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, trailer $trailer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\trailer  $trailer
     * @return \Illuminate\Http\Response
     */
    public function destroy(trailer $trailer)
    {
        //
    }
}
