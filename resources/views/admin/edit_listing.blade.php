<x-menu_side_admin>

@include('partials.admin_banner')
<div class="container mx-auto">
    <div class="grid grid-cols-1 gap-2 mt-4 ml-4 mr-4 mb-4 p-4 border-4 border-gray-500/50 rounded-lg text-center" style="background:#E1E1E1;">
        <h1 class="text-4xl font-bold uppercase text-black font-mono">
            Admin Dashboard
        </h1>
    </div>
</div>

    <x-card class="p-10 rounded max-w-lg mx-auto mt-10">
    
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Admin Edit Complaint</h2>
        </header>
    
        <form method="POST" action="{{route('admin.update', [$listing->id])}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="subject" class="inline-block text-lg mb-2">Subject</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="subject" value="{{$listing->subject}}" />
    
                @error('subject')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="user" class="inline-block text-lg mb-2">User Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="user" value="{{$listing->user->name}}" readonly />
    
                @error('user')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="phone_number" class="inline-block text-lg mb-2">Phone Number</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="phone_number" placeholder="Example:0123456789" value="{{$listing->phone_number}}"/>
    
                @error('phone_number')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>
    
            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" placeholder="Example:Kelantan" value="{{$listing->location}}"/>
    
                @error('location')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>
    
            <div class="mb-6">
                <label for="type_of_complaint" class="inline-block text-lg mb-2">Type of Complaint</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                name="type_of_complaint" required>
                    <option value="dirty_water" {{ $listing->type_of_complaint === 'dirty_water' ? 'selected' : '' }}>Dirty Water</option>
                    <option value="no_water" {{ $listing->type_of_complaint === 'no_water' ? 'selected' : '' }}>No Water</option>
                    <option value="other" {{ $listing->type_of_complaint === 'other' ? 'selected' : '' }}>Other</option>
                </select>
    
                @error('type_of_complaint')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>
    
            <div class="mb-6">
                <label for="picture" class="inline-block text-lg mb-2">Picture</label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="picture"/>
    
                @error('picture')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>
            <div class="mb-6">
                <label for="pre_picture" class="text-lg mb-2">Previous Picture</label>
                @if($listing->picture != null)
                    <img class="hidden w-48 mr-6 md:block" src="{{$listing->picture ? asset('storage/' . $listing->picture) : asset('/images/water1.png')}}" alt="" />
                @else
                    <div class="text-red-500 text-xl">No Picture Upload Previous</div>
                @endif
            </div>
    
            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Complaint Description</label>
    
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Complaint Details">{{$listing->description}}</textarea>
    
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
                <label for="status" class="inline-block text-lg mb-2">Status</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                name="status" required>
                    <option value="Pending" {{ $listing->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ $listing->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
    
                @error('type_of_complaint')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>
    
            <div class="mb-6">
                <button class="bg-laravel text-black rounded py-2 px-4 hover:bg black">
                    Update Complaint
                </button>
    
                <a href="{{route('admin.manage')}}" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
    </x-menu_side_admin>
            