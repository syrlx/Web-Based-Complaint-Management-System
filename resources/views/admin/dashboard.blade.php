<x-menu_side_admin>

@include('partials.admin_banner')

<div class="container mx-auto">
    <div class="grid grid-cols-1 gap-2 mt-4 ml-4 mr-4 mb-4 p-4 border-4 border-gray-500/50 rounded-lg text-center" style="background:#E1E1E1;">
        <h1 class="text-4xl font-bold uppercase text-black font-mono">
            Admin Dashboard
        </h1>
    </div>
    <div class="grid grid-cols-2 gap-2 mt-4 ml-4 mr-4 mb-4 p-4 border-4 border-gray-500/50 rounded-lg text-center" style="background:white;">
        <div class="col-span-2 mt-4 ml-4 mr-4 mb-4 p-10 border-4 border-sky-800/50 rounded-lg text-center bg-sky-300">
            <div class="flex justify-center items-center">
                <i class="fa-solid fa-list-check text-4xl"></i>&nbsp;&nbsp;
                <font class="text-3xl">
                    Total Complaint
                </font>
            </div>
            <div class="flex justify-center items-center mt-4">
                <div class="p-5 border-4 border-orange-600 bg-orange-300 rounded-lg">
                    <font class="text-4xl font-bold">
                        {{$total_all}}
                    </font>
                </div>
            </div>
        </div>
        <div class="mt-4 ml-4 mr-4 mb-4 p-10 border-4 border-sky-800/50 rounded-lg text-center bg-sky-300">
            <div class="flex justify-center items-center">
                <i class="fa-solid fa-circle-check text-4xl"></i>&nbsp;&nbsp;
                <font class="text-3xl">
                    Completed Complaint
                </font>
            </div>
            <div class="flex justify-center items-center mt-4">
                <div class="p-5 border-4 border-green-600 bg-green-300 rounded-lg">
                    <font class="text-4xl font-bold">
                        {{$total_complete}}
                    </font>
                </div>
            </div>
        </div>
        <div class="mt-4 ml-4 mr-4 mb-4 p-10 border-4 border-sky-800/50 rounded-lg text-center bg-sky-300">
            <div class="flex justify-center items-center">
                <i class="fa-solid fa-circle-xmark text-4xl"></i>&nbsp;&nbsp;
                <font class="text-3xl">
                    Pending Complaint
                </font>
            </div>
            <div class="flex justify-center items-center mt-4">
                <div class="p-5 border-4 border-red-600 bg-red-300 rounded-lg">
                    <font class="text-4xl font-bold">
                        {{$total_pending}}
                    </font>
                </div>
            </div>
        </div>
    </div>
</div>

</x-menu_side_admin>


