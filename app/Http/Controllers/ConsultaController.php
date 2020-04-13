<?php

namespace App\Http\Controllers;
use App\Genre;
use App\Insertar;
use App\Consulta;
use Illuminate\Http\Request;
Use Exception;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $datos = Consulta:: whereNull('descriptions.description_Movie')
            ->leftJoin('descriptions', 'movies.id_Tmdb', '=', 'descriptions.fk_id_Tmdb')
            ->select('movies.id_Tmdb')->get();
            foreach ($datos as $obj ){
                $json = json_decode(file_get_contents('https://api.themoviedb.org/3/movie/'.$obj ->id_Tmdb.'?language=es-ES&api_key=e38bdcb99eda95bae467ac8f3dd8684f'), true);
                Insertar:: insert(['fk_id_Tmdb' => $obj ->id_Tmdb,'url_Img' => 'http://www.cinextreme.co/resources/cartelera/'. $obj ->id_Tmdb.'/0.jpg', 'description_Movie' => $json['overview'], 'duracion' => $json['runtime'], 'vote_average' => $json['vote_average'], 'vote_count' => $json['vote_count']]);
                foreach ($json['genres'] as $id){
                    Genre::insert(['Movie_Tmdb'=>$obj ->id_Tmdb, 'Movie_gender'=> $id['id']]);
                }
            }
            $peliculas = Consulta::leftJoin('descriptions', 'movies.id_Tmdb', '=', 'descriptions.fk_id_Tmdb')
                    ->select('movies.name_Movie', 'movies.id_Tmdb', 'descriptions.url_Img', 'descriptions.duracion','descriptions.vote_average','descriptions.vote_count','url_Trailer')
                    ->orderBy('movies.release_Date','desc')
                    ->paginate(12);
                return $peliculas;
            }
            catch(Exception $e){
                echo $e->getMessage();
            }


    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consulta $consulta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consulta $consulta)
    {
        //
    }
}
