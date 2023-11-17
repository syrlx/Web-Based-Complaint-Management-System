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
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4 bg-Navbar text-white"> <!-- Apply the color to the navbar -->
        @auth
            <a href="/user_dashboard">
                <img class="w-24" src="{{asset('images/water2.png')}}" alt="" class="logo" />
            </a>
        @else
            <a href="/">
                <img class="w-24" src="{{asset('images/water2.png')}}" alt="" class="logo" />
            </a>
        @endauth
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
            <li>
                <span class="font-bold font-mono text-black">
                    Welcome&nbsp;{{ auth()->user()->name }}
                </span>
            </li>

            <li>
                <a href="/listings/create" class="hover:text-laravel font-semibold text-black">
                    <i class="fa-solid fa-paper-plane"  style="margin-right: 0.5em;"></i>
                    <span class="font-mono">Post Complaint</span>
                </a>
            </li>

            <li>
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="font-semibold text-black">
                        <i class="fa-solid fa-door-closed"  style="margin-right: 0.5em;"></i>
                        <span class="font-mono">Logout</span>
                    </button>
                </form>
            </li>

            @else

            <li>
                <a href="/register" class="hover:text-laravel font-mono text-black">
                    <i class="fa-solid fa-user-plus"  style="margin-right: 0.5em;"></i>Register</a>
            </li>
            <li>
                <a href="/login" class="hover:text-laravel font-mono text-black">
                    <i class="fa-solid fa-arrow-right-to-bracket"  style="margin-right: 0.5em;"></i>Login</a>
            </li>

            @endauth
        </ul>
    </nav>

    <main>
        <x-flash-message />
        {{$slot}}
    </main>

</body>

</html>
