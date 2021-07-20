<?php

namespace App\Http\Controllers;

use App\ViewModels\movieViewPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

$popularMovies = Http::withToken(config("services.tmdb.token"))
->get('https://api.themoviedb.org/3/movie/popular')
->json()["results"];


$nowPlaying = Http::withToken(config("services.tmdb.token"))
->get('https://api.themoviedb.org/3/movie/now_playing')
->json()["results"];


$genresList = Http::withToken(config("services.tmdb.token"))
->get('https://api.themoviedb.org/3/genre/movie/list')
->json()["genres"];




$genres = collect($genresList)->mapWithKeys((function($genre){
    return [$genre['id']=>$genre["name"]];
}));




// MAking things much simpliar 
$viewModel = new movieViewPage(
    $popularMovies, 
     $genres,
     $nowPlaying,
);


// dump($nowPlaying);

// return view("index",$viewModel);



return view("index",[
    "popularMovies"=>$popularMovies,
    "genres"=>$genres, 
    "nowPlaying"=>$nowPlaying
]);



    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::withToken(config("services.tmdb.token"))
->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
->json();


        return view('show',["movie"=>$movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
