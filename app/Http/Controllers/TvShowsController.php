<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvShowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tvshows = Http::withToken(config("services.tmdb.token"))
        ->get('https://api.themoviedb.org/3/tv/popular')
        ->json()["results"];


        return view("tvshows.index",["tvshows"=>$tvshows]);

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
        $show = Http::withToken(config("services.tmdb.token"))
        ->get('https://api.themoviedb.org/3/tv/'.$id)
        ->json();



        $cast = Http::withToken(config("services.tmdb.token"))
        ->get('https://api.themoviedb.org/3/tv/'.$id."/credits")
        ->json();


        $genresList = Http::withToken(config("services.tmdb.token"))
->get('https://api.themoviedb.org/3/genre/movie/list')
->json()["genres"];




$genres = collect($genresList)->mapWithKeys((function($genre){
    return [$genre['id']=>$genre["name"]];
}));



        return view("tvshows.show",["shows"=>$show, "casts"=>$cast,"genres"=>$genres]);
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
