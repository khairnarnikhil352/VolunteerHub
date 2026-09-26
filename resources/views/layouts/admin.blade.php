<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VolunteerHub - Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">

<!-- Admin Navbar -->
<nav class="bg-white shadow-md sticky top-0 z-50 border-b border-green-100">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3">

            <div class="w-10 h-10 bg-green-600 rounded-xl
                        flex items-center justify-center
                        text-white text-xl shadow-sm">
                🌿
            </div>

            <div>
                <h2 class="font-bold text-green-700 text-xl">
                    VolunteerHub
                </h2>

                <p class="text-xs text-gray-500">
                    Admin Panel
                </p>
            </div>

        </a>


        <!-- Admin Menu -->
        <div class="hidden lg:flex items-center gap-6
                    font-medium text-gray-700">

            <a href="{{ route('admin.dashboard') }}"
               class="hover:text-green-600 transition">
                🏠 Dashboard
            </a>

            <a href="{{ route('admin.events.index') }}"
                class="hover:text-green-600 transition">
                    📅 Events
            </a>
           <a href="{{ route('admin.volunteers.index') }}"
            class="hover:text-green-600 transition">
                👥 Volunteers
            </a>
            
            <a href="{{ route('admin.applications.index') }}"
            class="hover:text-green-600 transition flex items-center gap-2">
                📄 Applications
            </a>

            <a href="{{ route('admin.profile.show') }}"
            class="hover:text-green-600 transition flex items-center gap-2">
                👤 My Profile
            </a>

            

        </div>


        <!-- Right Side -->
        <div class="flex items-center gap-3">

            @auth

            <div class="hidden md:flex items-center gap-2
                        bg-green-50 px-3 py-2 rounded-full">

                <!-- Avatar -->
                <div class="w-9 h-9 rounded-full
                            bg-green-600 text-white
                            flex items-center justify-center
                            font-bold">

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </div>


                <!-- Admin Name -->
                <div>

                    <p class="text-sm font-semibold text-green-700">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-xs text-gray-500">
                        Administrator
                    </p>

                </div>

            </div>

            @endauth


            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button
                    class="bg-red-500 hover:bg-red-600
                           text-white px-4 py-2
                           rounded-full transition shadow-sm">

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

    <div class="max-w-7xl mx-auto px-6 py-5
                text-center text-gray-500 text-sm">

        🌿 VolunteerHub Student Portal © 2026 • Designed & Developed by Nikhil Khairnar


    </div>

</footer>


</body>
</html>