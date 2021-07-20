@extends("layout.app")


@section("content")
<div class="tvshow-info border-b border-gray-800" style=" background: rgb(0,0,0);
background: linear-gradient(90deg, rgba(0,0,0,0.5102240725391719) 0%, rgba(0,0,0,0.5) 0%),url('https://image.tmdb.org/t/p/w500/{{ $shows['backdrop_path']}}'); background-size:cover; background-repeat:no-repeat; ">
<div class="container mx-auto px-4 py-10 flex flex-col md:flex-row" >
<div class="flex-none items-center">
  <img src={{'https://image.tmdb.org/t/p/w500/' .$shows['poster_path' ?? "http://via.placeholder.com/500"]}} alt="{{$shows['name']}}" class="w-64 " >

</div>

<div class="ml-24">
  <h2 class="text-4xl font-semibold">{{$shows['name']}}</h2>

  <div class="flex flex-wrap items-center text-gray-400 text-sm">
    <span class="text-yellow-500"><i class="fa fa-star" aria-hidden="true"></i></span>
    <span class="ml-1">{{$shows['vote_average']* 10 . '%'}}</span>
          <span class="mx-2">|</span>
          <span >{{\Carbon\Carbon::parse($shows['first_air_date'])->format('M d, Y')}}</span>
          <span class="mx-2">|</span>
          <span class="mx-2">
            {{-- @foreach ($shows['genres'] as $genre)
            {{$genres->get($genre)}} @if (!$loop->last),@endif
      
        @endforeach --}}
          </span>

  </div>


  <div class="pt-4">
    <span class="pb-1">{{$shows["tagline"]}}</span>
    <p class="p-text-gray-300 mt-8">
      {{$shows['overview']}}
     
      <h6 class="pt-5">
        @foreach ($shows["created_by"] as $creator)
        <a href="/actors/{{$creator["id"]}}" class="hover:text-gray:50">        {{$creator["name"]}}
        </a>
        <br> 
<span class="text-gray-400 text-sm">    Creator
</span>
        @endforeach
     </h6>
       </p>
  </div>











</div>



</div>

</div> <!----- end movie info ---->

<div class="movie-cast border-b border-gray-800 pt-2">
  <h2 class="text-4xl text-center font-semibold">
Casts  </h2>



  <div class="grid  grid-cols-1 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-5 gap-8">


    
  @foreach ($casts["cast"] as $cast)
    
      <div class="mt-8">

        <a href="/actors/{{$cast['id']}}">
          <img src={{'https://image.tmdb.org/t/p/w300/' .$cast['profile_path'] ?? ""}} alt="" class="hover:opacity-75 tranisition ease-in-out duration-500"> 
        </a>        
        <div class="mt-2">
          <a href="/movies/{{$cast['id']}}" class="text-lh-mt-2 hover:text-gray:30">{{$cast['name'] ?? ""}}</a>
          <br>
          <small class="text-gray-400">{{$cast['character'] ?? ""}}</small>
        </div>
    </div> 

  
  @endforeach
   
  
  </div>
</div>

<!----- end cast info ---->




@endsection