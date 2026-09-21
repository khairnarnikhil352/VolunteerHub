@extends('layouts.app')

@section('content')

<section class="min-h-screen relative overflow-hidden bg-gradient-to-br from-emerald-700 via-green-600 to-blue-700 flex items-center justify-center px-4">

    <!-- Background Glow -->
    <div class="absolute -top-24 -left-24 w-80 h-80 bg-green-300/30 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-300/30 rounded-full blur-3xl"></div>

    <div class="max-w-6xl w-full grid lg:grid-cols-2 items-center gap-12 relative z-10">

        <!-- Left Side -->
        <div class="hidden lg:block text-white">

            <div class="flex items-center gap-3 mb-6">
                <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-lg flex items-center justify-center text-3xl">
                    🌿
                </div>

                <div>
                    <h2 class="text-3xl font-black">VolunteerHub</h2>
                    <p class="text-green-100 text-sm">Make a Difference Together</p>
                </div>
            </div>

            <h1 class="text-5xl font-black leading-tight mb-6">
                Welcome Back,
                <span class="text-yellow-300">Volunteer!</span>
            </h1>

            <p class="text-lg text-green-100 leading-8 mb-8">
                Login to explore volunteer opportunities, join community events,
                track your volunteer hours, and earn certificates.
            </p>

            <!-- Features -->
            <div class="space-y-5">

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center text-2xl">📅</div>
                    <div>
                        <h3 class="font-semibold">Join Upcoming Events</h3>
                        <p class="text-green-100 text-sm">Tree plantation, blood donation and more.</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center text-2xl">🎯</div>
                    <div>
                        <h3 class="font-semibold">Choose Your Volunteer Role</h3>
                        <p class="text-green-100 text-sm">Volunteer, Coordinator or Organizer.</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center text-2xl">🏆</div>
                    <div>
                        <h3 class="font-semibold">Track Volunteer Hours</h3>
                        <p class="text-green-100 text-sm">Earn certificates after participation.</p>
                    </div>
                </div>

            </div>

        </div>

        <!-- Login Card -->
        <div class="bg-white/15 backdrop-blur-2xl rounded-[35px] shadow-2xl border border-white/20 p-8 lg:p-10">

            <div class="text-center mb-8">

            
                <div class="w-20 h-20 rounded-full bg-white mx-auto flex items-center justify-center text-4xl shadow-lg">
                    🌿
                </div>

                <h2 class="text-3xl font-black text-white mt-4">
                    Login
                </h2>

                <p class="text-green-100 mt-2">
                    Sign in to continue your volunteer journey.
                </p>

            </div>

             @if(session('success'))
                    <div class="mb-5 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl">
                        {{ session('success') }}
                    </div>
                @endif


            @if ($errors->any())
                <div class="mb-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="/login">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-white mb-2 font-medium">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="Enter your email"
                        required
                        class="w-full px-5 py-4 rounded-2xl bg-white/20 border border-white/30 text-white placeholder-green-100 focus:ring-2 focus:ring-yellow-300 focus:outline-none">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-white mb-2 font-medium">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                        class="w-full px-5 py-4 rounded-2xl bg-white/20 border border-white/30 text-white placeholder-green-100 focus:ring-2 focus:ring-yellow-300 focus:outline-none">
                </div>

                <!-- Remember + Forgot -->
                <div class="flex justify-between items-center text-sm">

                    <label class="flex items-center gap-2 text-white">
                        <input type="checkbox" name="remember" class="rounded text-green-600">
                        Remember Me
                    </label>

                    <a href="#" class="text-yellow-300 hover:underline">
                        Forgot Password?
                    </a>

                </div>

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full py-4 rounded-2xl bg-gradient-to-r from-yellow-400 to-orange-400 text-black font-bold text-lg hover:scale-105 transition shadow-xl">
                    Login
                </button>

            </form>

            <!-- Divider -->
            <div class="flex items-center my-6">

                <div class="flex-1 border-t border-white/30"></div>

                <span class="px-3 text-green-100 text-sm">
                    OR
                </span>

                <div class="flex-1 border-t border-white/30"></div>

            </div>

            <!-- Google Button -->
            <button
                class="w-full py-4 rounded-2xl bg-white text-gray-700 font-semibold flex items-center justify-center gap-3 hover:bg-gray-100 transition">

                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6">

                Continue with Google

            </button>

            <!-- Register -->
            <p class="text-center text-green-100 mt-8">

                Don't have an account?

                <a href="/register" class="text-yellow-300 font-semibold hover:underline">
                    Create Account
                </a>

            </p>

        </div>

    </div>

</section>

@endsection