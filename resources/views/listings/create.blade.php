<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
    
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">File a Complaint</h2>
            <p class="mb-4">Do report your complaint to get your problems fixed</p>
        </header>
    
        <form method="POST" action="/listings/store" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="subject" class="inline-block text-lg mb-2">Subject</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="subject" value="{{old('subject')}}" />
    
                @error('subject')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="phone_number" class="inline-block text-lg mb-2">Phone Number</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="phone_number"
                placeholder="Example:0123456789" value="{{old('phone_number')}}"/>
    
                @error('phone_number')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>
    
            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                placeholder="Example:Kelantan" value="{{old('location')}}"/>
    
                @error('location')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>
    
            <div class="mb-6">
                <label for="type_of_complaint" class="inline-block text-lg mb-2">Type of Complaint</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                 name="type_of_complaint" required>
                    <option value="">Please Select Type of Complaint</option>
                    <option value="dirty_water">Dirty Water</option>
                    <option value="no_water">No Water</option>
                    <option value="other">Other</option>
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
                <label for="description" class="inline-block text-lg mb-2">Complaint Description</label>
    
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Complaint Details"></textarea>
    
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>
    
            <div class="mb-6">
                <button class="bg-laravel text-black rounded py-2 px-4 hover:bg black">
                Submit Complaint
                </button>
    
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>    