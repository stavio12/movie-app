@extends("layout.app")


@section("content")
<div class="movie-info border-b border-gray-800">
<div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
<div class="flex-none">
  <img src={{'https://image.tmdb.org/t/p/w500/' .$movie['poster_path'] ? "http://via.placeholder.com/500"}} alt="" class="w-64 md:w-96" >

</div>

<div class="ml-24">
  <h2 class="text-4xl font-semibold">{{$movie['title']}}</h2>

  <div class="flex flex-wrap items-center text-gray-400 text-sm">
    <span>start</span>
    <span class="ml-1">{{$movie['vote_average']* 10 . '%'}}</span>
          <span class="mx-2">|</span>
          <span >{{\Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}}</span>
          <span class="mx-2">|</span>
          <span>       @foreach ($movie['genres'] as $genre)
            {{$genre['name']}} @if (!$loop->last),@endif
      
        @endforeach</span>
  </div>


  <p class="p-text-gray-300 mt-8">
 {{$movie['overview']}}
  </p>


<div class="mt-12">
  <h4 class="text-white font-semibold">
    Featured Cast
  </h4>

@foreach ($movie['credits']['crew'] as $crew)
    
@if ($loop->index <2)
<div class="flex mt-4">
  <div class="mr-8">
    <div>{{$crew['name']}}</div>
    <div class="text-sm text-gray-400"> {{$crew["job"]}} </div>
  </div>
  {{-- for making permoance much better --}}
  @else
  @break
@endif

@endforeach

  
  </div>

  

</div>


@if (count($movie['videos']['results']) >0)
<div class="mt-12">
  <a href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key']}}" class="flex inline-flex items-center bg-yellow-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-500 transition ease-in-out duration-150">
    Play Trailer
  </a>
</div>

@endif



</div>



</div>

</div> <!----- end movie info ---->

<div class="movie-cast border-b border-gray-800 pt-2">
  <h2 class="text-4xl text-center font-semibold">
Cast
  </h2>



  <div class="grid  grid-cols-1 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-5 gap-8">


    
  @foreach ($movie['credits']['cast'] as $cast)
    
  @if ($loop->index <5)
      <div class="mt-8">

        <a href="/actors/{{$cast['id']}}">
          <img src={{'https://image.tmdb.org/t/p/w300/' .$cast['profile_path']}} alt="" class="hover:opacity-75 tranisition ease-in-out duration-500"> 
        </a>        
        <div class="mt-2">
          <a href="#" class="text-lh-mt-2 hover:text-gray:30">{{$cast['name']}}</a>
      
      
          <div class="text-gray-400 text-sm">
{{$cast['character']}}          </div>
        </div>
    </div>

  @endif
  
  @endforeach
   
  
  </div>
<!----- end cast info ---->
<div class="movie-cast">
  <div class="container mx-auto px-4 py-16">

  <h2 class="text-4xl text-center font-semibold">
Images  </h2>



  <div class="grid  grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">


    
  @foreach ($movie['images']['backdrops'] as $image)
    
  @if ($loop->index <10)
      <div class="mt-8">

        <a href="#">
          <img src={{'https://image.tmdb.org/t/p/w500/' .$image['file_path']}} alt="" class="hover:opacity-75 tranisition ease-in-out duration-500"> 
        </a>        
 
    </div>
      {{-- for making permoance much better --}}
  @else
  @break
  @endif
  
  @endforeach
   
  
  </div> 
 </div>



@endsection