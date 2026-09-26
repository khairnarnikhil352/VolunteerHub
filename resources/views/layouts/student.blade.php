
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VolunteerHub - Student Portal</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">

<!-- Student Navbar -->
<nav class="bg-white shadow-md sticky top-0 z-50 border-b border-green-100">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <a href="/dashboard" class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-600 rounded-xl flex items-center justify-center text-white text-xl">
                🌿
            </div>

            <div>
                <h2 class="font-bold text-green-700 text-xl">VolunteerHub</h2>
                <p class="text-xs text-gray-500">Student Portal</p>
            </div>
        </a>

        <!-- Menu -->
        <div class="hidden lg:flex items-center gap-6 font-medium text-gray-700">

            <a href="/dashboard" class="hover:text-green-600">🏠 Dashboard</a>

            <a href="{{route('events.index')}}" class="hover:text-green-600">
                🌍 Browse Events
            </a>

            <a href="{{ route('saved.events') }}"
            class="hover:text-green-600">
            ❤️ Saved Events
            </a>

            <a href="{{ route('my.events') }}"
            class="hover:text-green-600 font-semibold">
                📅 My Events
            </a>

            <a href="{{ route('profile') }}"
            class="hover:text-green-600 font-semibold">
              👤 Profile
            </a>

          
        </div>

        <!-- Right -->
        <div class="flex items-center gap-3">

            @auth
            <div class="hidden md:flex items-center gap-2 bg-green-50 px-3 py-2 rounded-full">

                <div class="w-9 h-9 rounded-full bg-green-600 text-white flex items-center justify-center font-bold">
                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                </div>

                <div>
                    <p class="text-sm font-semibold text-green-700">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="text-xs text-gray-500">Volunteer</p>
                </div>

            </div>
            @endauth

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full">
                    Logout
                </button>
            </form>

        </div>

    </div>
</nav>

<!-- Page Content -->
<main>
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-white border-t mt-10">
    <div class="max-w-7xl mx-auto px-6 py-5 text-center text-gray-500 text-sm">
        🌿 VolunteerHub Student Portal © 2026 • Designed & Developed by Nikhil Khairnar

    </div>
</footer>

</body>
</html>
