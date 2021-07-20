@extends("layout.app")


@section("content")
<div class="movie-info border-b border-gray-800">
<div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
<div class="flex-none">
  <img src={{'https://image.tmdb.org/t/p/w500/' .$actor['profile_path']}} alt="" class="w-64 md:w-96" >

</div>

<div class="ml-24">
  <h2 class="text-4xl font-semibold">{{$actor['name']}}</h2>

  <div class="flex flex-wrap items-center text-gray-400 text-sm">
    <span class="text-yellow-500"><i class="fa fa-star" aria-hidden="true"></i></span>
    <span class="ml-1">{{$actor['popularity']* 10 . '%'}}</span>
          <span class="mx-2">|</span>
          <span >{{\Carbon\Carbon::parse($actor['birthday'])->format('M d, Y')}}</span>
          <span class="mx-2">|</span>
          <span class="mx-2">
            @foreach ($social as $media)
            {{-- <a href="https://web.facebook.com/{{ $media["facebook_id"]}}">            <i class="fa fa-facebook-official" aria-hidden="true"></i>
            </a>
            <a href="https://www.instagram.com/{{ $media["instagram_id"]}}">            <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <a href="https://twitter.com/{{ $media["twitter_id"]}}">            <i class="fa fa-twitter" aria-hidden="true"></i>
            </a> --}}

            @endforeach
          </span>

  </div>


  <p class="p-text-gray-300 mt-8">
 {{$actor['biography']}}
  </p>









</div>



</div>

</div> <!----- end movie info ---->


<div class="movie-cast border-b border-gray-800 pt-2">
  <h2 class="text-4xl text-center font-semibold">
    Featured Movies
  </h2>



  <div class="grid  grid-cols-1 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-5 gap-8">


    
  @foreach ($fmovie["cast"] as $cast)
    
  @if ($cast['popularity'] > 80)
      <div class="mt-8">

        <a href="/movies/{{$cast['id']}}">
          <img src={{'https://image.tmdb.org/t/p/w300/' .$cast['poster_path'] ?? ""}} alt="" class="hover:opacity-75 tranisition ease-in-out duration-500"> 
        </a>        
        <div class="mt-2">
          <a href="/movies/{{$cast['id']}}" class="text-lh-mt-2 hover:text-gray:30">{{$cast['title'] ?? ""}}</a>
        </div>
    </div> 

  @endif
  
  @endforeach
   
  
  </div>
</div>
<!----- end cast info ---->




@endsection