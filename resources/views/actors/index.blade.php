@extends("layout.app")


@section("content")
<div class="continer x-auto px-4 pt-16">
<div class="popular-actors">
  <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">
    Popular Actors
  </h2>

  <div class="grid  grid-cols-1 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-5 gap-8">
 
@foreach ($actors as $actor)
    

<div class="actor mt-8">
  <a href="/actors/{{$actor["id"]}}">
    <img src={{'https://image.tmdb.org/t/p/w500/' .$actor['profile_path']}}  alt="{{$actor['name']}}" class="hover:opacity-75 tranisition ease-in-out duration-500"> 

  </a>

  <div class="mt-2">
    <a href="" class="text-lg hover:text-gray-300">
      {{$actor['name']}}
    </a>

{{-- <div class="text-sm truncate text-gray-400">
  @foreach ($known as $name)
  {{$name}}@if (!$loop->last),@endif
  @endforeach

</div> --}}

    
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