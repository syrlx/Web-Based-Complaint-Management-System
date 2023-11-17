<x-menu_side_admin>

@include('partials.admin_banner')
<div class="container mx-auto">
    <div class="grid grid-cols-1 gap-2 mt-4 ml-4 mr-4 mb-4 p-4 border-4 border-gray-500/50 rounded-lg text-center" style="background:#E1E1E1;">
        <h1 class="text-4xl font-bold uppercase text-black font-mono">
            Admin Dashboard
        </h1>
    </div>
</div>

<div class="container mx-auto">

    @unless(count($listings) == 0)

        @foreach($listings as $listing)
            <div class="grid grid-cols-3 gap-4 mt-4 ml-4 mr-4 mb-4 p-4 border-4 border-blue-500/50 rounded-lg">
                <x-listing-card-admin :listing="$listing" />
            </div>
        @endforeach

    @else

        <p>No Complaints found</p>
        
    @endunless

</div>

<div class="mt-6 p-4">
    {{$listings->links()}}
</div>

</x-menu_side_admin>