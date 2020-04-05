<?php

namespace App\Http\Controllers;

use App\search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($query)
    {
        $query_Movie = search::where('name_Movie','like','%'.$query.'%')
                    ->leftJoin('descriptions', 'movies.id_Tmdb', '=', 'descriptions.fk_id_Tmdb')
                    ->select('movies.name_Movie', 'movies.id_Tmdb', 'descriptions.url_Img', 'descriptions.duracion','descriptions.vote_average','descriptions.vote_count','url_Trailer')
                    ->orderBy('movies.release_Date','desc')
                    ->paginate(12);
                return $query_Movie;
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
     * @param  \App\search  $search
     * @return \Illuminate\Http\Response
     */
    public function show(search $search)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\search  $search
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, search $search)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\search  $search
     * @return \Illuminate\Http\Response
     */
    public function destroy(search $search)
    {
        //
    }
}
