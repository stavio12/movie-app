<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {

        $actors = Http::withToken(config("services.tmdb.token"))
->get('https://api.themoviedb.org/3/person/popular?page='.$page)
->json()["results"];



//Loop and get what actors are known for
foreach ($actors as $actor)
$known = collect($actor['known_for'])->mapWithKeys((function($ko){
    return [$ko["id"]=>$ko["name"] ?? null];

}));




return view('actors.index',["actors"=>$actors, "known"=>$known]);
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
        $actor = Http::withToken(config("services.tmdb.token"))
        ->get('https://api.themoviedb.org/3/person/'.$id."&language=en-US")
        ->json();

        $fMovies = Http::withToken(config("services.tmdb.token"))
        ->get('https://api.themoviedb.org/3/person/'.$id.'/movie_credits')
        ->json();

        $social = Http::withToken(config("services.tmdb.token"))
        ->get('https://api.themoviedb.org/3/person/'.$id.'/external_ids')
        ->json();


        return view('actors.show',["actor"=>$actor, "fmovie"=>$fMovies,"social"=>$social]);
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
