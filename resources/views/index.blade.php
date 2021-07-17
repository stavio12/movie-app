@extends("layout.app")


@section("content")
<div class="continer x-auto px-4 pt-16">
<div class="popular-movies">
  <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">
    Popular Movies
  </h2>

  <div class="grid  grid-cols-1 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-5 gap-8">
 
 @foreach ($popularMovies as $movie )
<x-movie-card :movie="$movie" :genres="$genres"/> 
 @endforeach
  
  </div> 

</div><!------End of Popular movies ---->

<div class="now-playing py-24">
  <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">
Now Playing  </h2>

  <div class="grid  grid-cols-1 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-5 gap-8">
 
 @foreach ($nowPlaying as $movie )
 <x-movie-card :movie="$movie" :genres="$genres"/> 

 @endforeach
  
  </div> 

</div><!------End of Now Playing movies ---->





</div>
@endsection