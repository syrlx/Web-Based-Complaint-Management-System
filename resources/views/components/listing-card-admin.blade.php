@props(['listing'])

<div class="col-span-1 flex justify-center border-2 border-black p-2">
    <img class="hidden w-48 mr-6 md:block" src="{{$listing->picture ? asset('storage/' . $listing->picture) : asset('/images/water1.png')}}" alt="" />
</div>
<div class="col-span-2 p-2">
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-8">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{route('admin.show',[$listing->id])}}">{{$listing->subject}}</a>
            <div class="text-xl font-bold mb-4 mt-4">
                User Name : {{$listing->user->name}}
            </div>
            <div class="text-xl mb-4 mt-4">
                Contact Number : {{$listing->phone_number}}
            </div>
            <div class="text-xl mt-4">
                <i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;{{$listing->location}}
            </div>
            <div class="text-xl mt-4">
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
        </div>
        <div class="col-span-4">
            <a href="{{route('admin.edit', [$listing->id])}}" class="flex bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded justify-center items-center">
                <i class="fa-solid fa-pencil"></i>&nbsp;&nbsp;Edit / Update Status
            </a><br>
            <form method="POST" action="{{route('admin.delete', [$listing->id])}}">
            @csrf
            @method('DELETE')
            <button class="w-full flex bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded justify-center items-center">
                <i class="fa-solid fa-trash"></i>&nbsp;&nbsp;Delete
            </button>
            </form>
        </div>
    </div>
</div>
