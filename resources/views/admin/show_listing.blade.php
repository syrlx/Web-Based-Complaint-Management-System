<x-menu_side_admin>

@include('partials.admin_banner')
<div class="container mx-auto">
    <div class="grid grid-cols-1 gap-2 mt-4 ml-4 mr-4 mb-4 p-4 border-4 border-gray-500/50 rounded-lg text-center" style="background:#E1E1E1;">
        <h1 class="text-4xl font-bold uppercase text-black font-mono">
            Admin Dashboard
        </h1>
    </div>
</div>

<a href="{{route('admin.manage')}}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back </a>

<div class="mx-4">
  <x-card class="p-10">
    <div class="flex flex-col items-center justify-center text-center">
      <img class="w-48 mr-6 mb-6" src="{{$listing->picture ? asset('storage/' . $listing->picture) : asset('/images/water1.png')}}" alt="" />

      <h3 class="text-2xl mb-2">
        Subject : {{$listing->subject}}
      </h3>

      <div class="text-xl mb-2 font-bold">
        User Name : {{$listing->user->name}}
      </div>
      <div class="text-xl mb-2">
        Contact Number : {{$listing->phone_number}}
      </div>
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
    <a href="{{route('admin.edit', [$listing->id])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      <i class="fa-solid fa-pencil"></i> Edit
    </a>
    &nbsp;&nbsp;
    <form method="POST" action="{{route('admin.delete', [$listing->id])}}">
    @csrf
    @method('DELETE')
    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-trash"></i>Delete</button>
    </form>
</div>

</x-menu_side_admin>