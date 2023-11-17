@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left-0 flex items-center justify-center w-screen h-screen">
        <div class="grid grid-cols-1 gap-2 mt-4 ml-4 mr-4 mb-4 p-10 border-4 border-gray-500/50 rounded-lg text-center text-black bg-white">
            <p class="font-bold text-xl">
                {{session('message')}}
            </p>
        </div>
    </div>
@endif