<x-layout>

@include('partials._hero')

<div class="container mx-auto">

    @unless(count($listings) == 0)

        @foreach($listings as $listing)
            <div class="grid grid-cols-3 gap-4 mt-4 ml-4 mr-4 mb-4 p-4 border-4 border-blue-500/50 rounded-lg">
                <x-listing-card :listing="$listing" />
            </div>
        @endforeach

    @else

        <p>No listings  found</p>
        
    @endunless

</div>

<div class="mt-6 p-4">
    {{$listings->links()}}
</div>

</x-layout>