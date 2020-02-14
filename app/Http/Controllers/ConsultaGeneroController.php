<?php

namespace App\Http\Controllers;

use App\ConsultaGenero;
use Illuminate\Http\Request;

class ConsultaGeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($genre)
    {
        $obj = ConsultaGenero::where('Movie_gender','=',$genre)
            ->leftJoin('descriptions', 'movies.id_Tmdb', '=', 'descriptions.fk_id_Tmdb')
            ->leftJoin('movies_and_genders', 'movies.id_Tmdb', '=', 'movies_and_genders.Movie_Tmdb')
            ->select('movies.name_Movie', 'movies.id_Tmdb', 'descriptions.url_Img', 'descriptions.duracion','descriptions.vote_average','descriptions.vote_count')
            ->orderBy('movies.release_Date','desc')
            ->get();
        return $obj;
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
     * @param  \App\ConsultaGenero  $consultaGenero
     * @return \Illuminate\Http\Response
     */
    public function show(ConsultaGenero $consultaGenero)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConsultaGenero  $consultaGenero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConsultaGenero $consultaGenero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConsultaGenero  $consultaGenero
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsultaGenero $consultaGenero)
    {
        //
    }
}
