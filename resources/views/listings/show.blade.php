<x-layout>

@include('partials._hero')

<a href="{{route('user.dashboard')}}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back </a>

<div class="mx-4">
  <x-card class="p-10">
    <div class="flex flex-col items-center justify-center text-center">
      <img class="w-48 mr-6 mb-6" src="{{$listing->picture ? asset('storage/' . $listing->picture) : asset('/images/water1.png')}}" alt="" />

      <h3 class="text-2xl mb-2">
        Subject : {{$listing->subject}}
      </h3>

      <div class="text-xl mb-2">
        Type of Complaint : <font class="font-bold">{{$listing->type_of_complaint}}</font>
      </div>

      {{-- <x-listing-tags :tagsCsv="$listing->tags"/> --}}

      <div class="text-lg mb-2">
          Location : <i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;{{$listing->location}}
      </div>
      <div class="text-lg mb-2">
          Status : 

          @if($listing->status == "Pending")
              <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">
                  {{$listing->status}}
              </span>
          @else
              <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                  {{$listing->status}}
              </span>
          @endif
          
      </div>
      <div class="border border-gray-200 w-full mb-2">
        
      </div>
      <div>
        <h3 class="text-2xl font-bold mb-2">Complaint Description</h3>
        <div class="text-lg space-y-6">
          {{$listing->description}}
        </div>
      </div>
    </div>
  </x-card>
</div> 

<div class="flex my-4 justify-center">
    <a href="/listings/{{$listing->id}}/edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      <i class="fa-solid fa-pencil"></i> Edit
    </a>

      {{-- <form method="POST" action="/listings/{{$listing->id}}">
      @csrf
      @method('DELETE')
      <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
      </form> --}}
</div>

</x-layout>