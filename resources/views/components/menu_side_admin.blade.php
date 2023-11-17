<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <meta name="viewport" content="width-device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwOp6LFnl8zNdLGXu9YAA10vwINks4PhcEl05vqc:LD9aMhXd13uQjoXtEKNosOWaZqXgelog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        Laravel: '#ef3b2d',
                        Navbar: '#89CFF0', /* Add custom color for the navbar */
                    },
                },
            },
        }
    </script>
    <title>Water Complaint | Complaint about your water issue</title>

    <style>
        .bg-Navbar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 18rem;
            background-color: #000; /* Replace with your desired background color */
            color: #fff; /* Replace with your desired text color */
        }
        .main_slot {
            margin-left: 18rem; /* Adjust this value to match the width of the aside element */
        }

        .btn_menu{

            padding:10px !important;
            vertical-align:middle !important;
            border-radius: 10px !important;
            margin-top:5px !important;
            margin-bottom:5px !important;

        }
        .btn_menu:hover{

            padding:10px !important;
            vertical-align:middle !important;
            border-radius: 10px !important;
            color: white !important;
            background:black !important;

        }
        .active{
            color: #002B87 !important;
            background:white !important;
        }
    </style>

</head>

<body class="mb-48">
    <aside class="bg-Navbar text-white">
        <nav class="flex flex-col items-center">
            <a href="{{route('admin.dashboard')}}">
                <img class="w-24 mt-4" src="{{asset('images/water2.png')}}" alt="" class="logo" />
            </a>
            <ul class="flex flex-col mt-8 text-lg">
                @auth
                    <li>
                        <span class="font-bold font-mono text-black">
                            <h2>Welcome&nbsp;{{ auth()->user()->name }}</h2>
                        </span>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="btn_menu flex items-center hover:text-laravel font-semibold text-black {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="fa-solid fa-gauge" style="margin-right: 0.5em;"></i>
                            <span class="font-mono">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.manage')}}" class="btn_menu align-middle flex items-center hover:text-laravel font-semibold text-black {{ request()->routeIs('admin.manage') || request()->routeIs('admin.show') ? 'active' : '' }}">
                            <i class="fa-solid fa-list-check" style="margin-right: 0.5em;"></i>
                            <span class="font-mono">Manage Complaint</span>
                        </a>
                    </li>
                    <li>
                        <form class="inline" method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="w-full font-semibold text-black flex items-center btn_menu align-middle">
                                <i class="fa-solid fa-door-closed" style="margin-right: 0.5em;"></i>
                                <span class="font-mono">Logout</span>
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>
    </aside>

    <main class="main_slot">
        {{$slot}}
    </main>


    <x-flash-message />
</body>

</html>
