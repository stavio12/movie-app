@extends("layout.app")


@section("content")
<div class="continer x-auto px-4 pt-16">
<div class="popular-actors">
  <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">
    Popular Tv Shows
  </h2>

  <div class="grid  grid-cols-1 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-5 gap-8">
 
@foreach ($tvshows as $show)
    

<div>
  <div class="mt-8">

      <a href="/movies/{{$show['id']}}"}>
        <img src={{'https://image.tmdb.org/t/p/w500/' .$show['poster_path']}} alt="" class="hover:opacity-75 tranisition ease-in-out duration-500"> 
      </a> 
         
    <div class="mt-2">
      <a href="/movies/{{$show['id']}}" class="text-lh-mt-2 hover:text-gray:30">{{$show['name']}}</a>
      <div class="flex items-center text-gray-400 text-sm mt-1">
        <span>start</span>
        <span class="ml-1">{{$show['vote_average']* 10 . '%'}}</span>
        <span class="mx-2">|</span>
        <span >{{\Carbon\Carbon::parse($show['first_air_date'])->format('M d, Y')}}</span>
      </div>
    
      {{-- <div class="text-gray-400 text-sm">
      @foreach ($show['genre_ids'] as $genre)
          {{$genres->get($genre)}} @if (!$loop->last),@endif
    
      @endforeach
      </div> --}}
    </div>
    </div> 
  
</div>
@endforeach

  </div> 

</div><!------End of Popular Actors ---->

<div class="flex justify-between mt-1 mt-16">
  <a href="#">previous</a>
  <a href="#">next</a>
</div>


</div>
@endsection