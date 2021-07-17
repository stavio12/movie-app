<div>
    <div class="flex flex-col md:flex-row items-center">
        <div class="relative mt-3 md:mt-0">
          <input wire:model.debounce.500ms="search" type="text" class="bg-gray-800 rounded-full w-64 px-4 pl-8 focus:outline-none focus:shadow-outline py-1" placeholder="Search">
        </div>
      </div>


@if (strlen($search)>2)
<div class="absolute bg-gray-800 text-sm rounded w-64 mt-4">
    <ul>

@if ($searchResults->count() > 0)
@foreach ($searchResults as $result)

<li class="border-b border-gray-700">
<a href="/movies/{{$result['id']}}" class="block hover:bg-gray-700 px-3 py-3 flex items-center">
    
    <img src={{'https://image.tmdb.org/t/p/w92/'.$result['poster_path']}} class="w-8" alt="">
    
    
    {{$result['title']}}</a>
</li>
@endforeach
@else
<div class="px-3 py-3">No results for{{$search}}</div>

@endif



    </ul>
</div>
@endif


      </div>
