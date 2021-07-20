<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class movieViewPage extends ViewModel
{
    public function __construct($popularMovies, $nowPlaying, $genres)
    {
    $this->popularMovies = $popularMovies;
    $this->nowPlaying = $nowPlaying;
    $this->genres = $genres;
    }


public function popularMovies(){
    return $this->popularMovies;
}


public function nowPlaying(){
    return $this->nowPlaying;
}


public function genres(){
    return $this->genres;
}

}
