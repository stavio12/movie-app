<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class viewCorrectMovie extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Http::fake([
            'https://api.themoviedb.org//3/movie/popular'=>$this->fakePopularMovies(),
            'https://api.themoviedb.org//3/movie/popular'=>$this->fakeNowPlayingMovies(),
            // 'https://api.themoviedb.org//3/movie/popular'=>$this->fakeGenres(),
        ]);

        $response = $this->get('/');

        // $response->assertStatus(200);
        $response->assertSuccessful();
        $response->assertSee("Popular Movies");
        $response->assertSee("Now Playing Movies");
    }



    private function fakePopularMovies(){
        return Http::response([
            "results"=>[
                "popularity"	=> 16.465,
"poster_path"	=>"/pbHpZfjzF4hKomaSmSZWRWKhO0P.jpg",
"release_date"=>	"2007-07-26",
"title"=>	"Shoot 'Em Up",
"video"=>	false,
"vote_average"=>	6.5,
"vote_count"	=>1344,
"adult"=>	false,
"backdrop_path"=>	null,
"genre_ids"=>[	
0,	99,],
"id"=>	687625,
"original_language"	=>"en",
"original_title"=>	"Fake Movie",
"overview"=>	"A documentary about the trials and tribulations of being a entrepreneur and film maker in Finland from the makers of Iron Sky franchise."
            ]
],200);
    }



    private function fakeNowPlayingMovies(){
        return Http::response([
            "results"=>[
                "popularity"	=> 16.465,
"poster_path"	=>"/pbHpZfjzF4hKomaSmSZWRWKhO0P.jpg",
"release_date"=>	"2007-07-26",
"title"=>	"Shoot 'Em Up",
"video"=>	false,
"vote_average"=>	6.5,
"vote_count"	=>1344,
"adult"=>	false,
"backdrop_path"=>	null,
"genre_ids"=>[	
0,	99,],
"id"=>	687625,
"original_language"	=>"en",
"original_title"=>	"Fake Movie",
"overview"=>	"A documentary about the trials and tribulations of being a entrepreneur and film maker in Finland from the makers of Iron Sky franchise."
            ]
],200);
    }



}
