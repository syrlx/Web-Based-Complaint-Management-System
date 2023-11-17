@props(['listing'])

<div class="col-span-1 flex justify-center border-2 border-black p-2">
    <img class="hidden w-48 mr-6 md:block" src="{{$listing->picture ? asset('storage/' . $listing->picture) : asset('/images/water1.png')}}" alt="" />
</div>
<div class=" col-span-2 p-2">
    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="/listings/{{$listing->id}}">{{$listing->subject}}</a>
    <div class="text-xl font-bold mb-4 mt-4">
        Contact Number : {{$listing->phone_number}}
    </div>

    <div class="text-lg mt-4">
        <i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;{{$listing->location}}
    </div>
</div>
