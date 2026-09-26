@extends('layouts.student')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-emerald-50">

    {{-- =========================================================
         HERO SECTION
    ========================================================== --}}
    <section class="relative overflow-hidden rounded-b-[45px] bg-gradient-to-br from-green-800 via-emerald-700 to-teal-600 text-white">

        {{-- Background Decorations --}}
        <div class="absolute -top-32 -right-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

        <div class="absolute -bottom-40 -left-20 w-96 h-96 bg-emerald-300/10 rounded-full blur-3xl"></div>

        <div class="absolute top-20 right-1/3 w-16 h-16 bg-white/5 rounded-2xl rotate-12"></div>

        <div class="absolute bottom-16 left-1/3 w-12 h-12 bg-white/5 rounded-full"></div>


        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-14 relative z-10">

            <div class="flex flex-col lg:flex-row items-center justify-between gap-10">


                {{-- =================================================
                     HERO CONTENT
                ================================================== --}}
                <div class="text-center lg:text-left">

                    {{-- Badge --}}
                    <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-md border border-white/20 px-5 py-2 rounded-full text-sm font-semibold shadow-lg">

                        👤

                        <span>
                            VolunteerHub Profile
                        </span>

                    </div>


                    {{-- Heading --}}
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black tracking-tight mt-5">

                        My Profile

                    </h1>


                    <p class="mt-4 text-green-100 text-base md:text-lg max-w-xl">

                        Manage your volunteer information, view your details and keep your profile up to date.

                    </p>


                    {{-- Status Badges --}}
                    <div class="flex flex-wrap justify-center lg:justify-start gap-3 mt-7">

                        <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-4 py-2 rounded-xl text-sm">

                            🟢 Active Volunteer

                        </span>


                        <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-4 py-2 rounded-xl text-sm">

                            🌿 VolunteerHub Member

                        </span>

                    </div>

                </div>


                {{-- =================================================
                     PROFILE PHOTO
                ================================================== --}}
                <div class="relative">

                    {{-- Glow --}}
                    <div class="absolute inset-0 bg-white/20 rounded-full blur-3xl scale-110"></div>


                    {{-- Photo Container --}}
                    <div class="relative bg-white/10 backdrop-blur-md p-2 rounded-full border border-white/30 shadow-2xl">

                        @if(Auth::user()->profile_photo)

                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                 class="w-36 h-36 md:w-44 md:h-44 rounded-full object-cover border-4 border-white shadow-2xl">

                        @else

                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ffffff&color=16a34a&size=256"
                                 class="w-36 h-36 md:w-44 md:h-44 rounded-full object-cover border-4 border-white shadow-2xl">

                        @endif

                    </div>


                    {{-- Online Status --}}
                    <div class="absolute bottom-3 right-2 bg-white text-green-700 w-12 h-12 rounded-full flex items-center justify-center shadow-xl border-4 border-green-700">

                        ✓

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- =========================================================
         MAIN CONTENT
    ========================================================== --}}
    <section class="max-w-6xl mx-auto px-5 lg:px-8 py-10">


        {{-- =====================================================
             SUCCESS MESSAGE
        ====================================================== --}}
        @if(session('success'))

            <div class="mb-8 bg-emerald-50 border border-emerald-200 rounded-3xl p-5 shadow-sm">

                <div class="flex items-center gap-4">

                    <div class="w-11 h-11 bg-emerald-100 rounded-2xl flex items-center justify-center text-xl">

                        ✅

                    </div>

                    <div>

                        <h3 class="font-black text-emerald-700 text-lg">

                            Profile Updated Successfully

                        </h3>

                        <p class="text-sm text-emerald-600 mt-1">

                            {{ session('success') }}

                        </p>

                    </div>

                </div>

            </div>

        @endif



        {{-- =====================================================
             VALIDATION ERRORS
        ====================================================== --}}
        @if ($errors->any())

            <div class="mb-8 bg-red-50 border border-red-200 rounded-3xl p-6 shadow-sm">

                <div class="flex items-start gap-4">

                    <div class="w-11 h-11 bg-red-100 rounded-2xl flex items-center justify-center text-xl">

                        ⚠️

                    </div>


                    <div class="flex-1">

                        <h3 class="font-black text-red-700 text-lg">

                            Please check the following errors

                        </h3>


                        <ul class="mt-3 space-y-2 text-sm text-red-600">

                            @foreach ($errors->all() as $error)

                                <li class="flex items-start gap-2">

                                    <span>•</span>

                                    <span>
                                        {{ $error }}
                                    </span>

                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif



        {{-- =====================================================
             PROFILE OVERVIEW CARD
        ====================================================== --}}
        <div class="bg-white rounded-[35px] shadow-xl shadow-green-100/40 border border-gray-100 overflow-hidden">


            {{-- Card Header --}}
            <div class="px-6 md:px-10 py-7 border-b border-gray-100 bg-gradient-to-r from-white to-green-50">

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-5">


                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-green-600 to-emerald-500 text-white flex items-center justify-center text-2xl shadow-lg">

                            👤

                        </div>


                        <div>

                            <h2 class="text-2xl md:text-3xl font-black text-gray-800">

                                Personal Information

                            </h2>

                            <p class="text-gray-500 mt-1 text-sm">

                                Your registered volunteer details

                            </p>

                        </div>

                    </div>


                    {{-- Edit Button --}}
                    <a href="{{ route('profile.edit') }}"
                       class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-green-600 to-emerald-500 hover:from-green-700 hover:to-emerald-600 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-green-200 transition hover:-translate-y-0.5">

                        ✏️

                        <span>
                            Edit Profile
                        </span>

                    </a>

                </div>

            </div>



            {{-- =================================================
                 INFORMATION GRID
            ================================================== --}}
            <div class="p-6 md:p-10">

                <div class="grid md:grid-cols-2 gap-6">


                    {{-- =================================================
                         NAME
                    ================================================== --}}
                    <div class="group bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-6 border border-green-100 hover:shadow-lg hover:-translate-y-1 transition duration-300">

                        <div class="flex items-center justify-between">

                            <div class="w-11 h-11 bg-white rounded-xl flex items-center justify-center shadow-sm text-xl">

                                👤

                            </div>

                            <span class="text-xs font-bold text-green-600 bg-green-100 px-3 py-1 rounded-full">

                                Name

                            </span>

                        </div>


                        <p class="text-gray-500 text-sm font-semibold mt-5">

                            Full Name

                        </p>


                        <h3 class="text-xl md:text-2xl font-black text-gray-800 mt-2">

                            {{ Auth::user()->name }}

                        </h3>

                    </div>



                    {{-- =================================================
                         EMAIL
                    ================================================== --}}
                    <div class="group bg-gradient-to-br from-blue-50 to-cyan-50 rounded-3xl p-6 border border-blue-100 hover:shadow-lg hover:-translate-y-1 transition duration-300">

                        <div class="flex items-center justify-between">

                            <div class="w-11 h-11 bg-white rounded-xl flex items-center justify-center shadow-sm text-xl">

                                📧

                            </div>

                            <span class="text-xs font-bold text-blue-600 bg-blue-100 px-3 py-1 rounded-full">

                                Contact

                            </span>

                        </div>


                        <p class="text-gray-500 text-sm font-semibold mt-5">

                            Email Address

                        </p>


                        <h3 class="text-lg md:text-xl font-black text-gray-800 mt-2 break-all">

                            {{ Auth::user()->email }}

                        </h3>

                    </div>



                    {{-- =================================================
                         PHONE
                    ================================================== --}}
                    <div class="group bg-gradient-to-br from-orange-50 to-amber-50 rounded-3xl p-6 border border-orange-100 hover:shadow-lg hover:-translate-y-1 transition duration-300">

                        <div class="flex items-center justify-between">

                            <div class="w-11 h-11 bg-white rounded-xl flex items-center justify-center shadow-sm text-xl">

                                📱

                            </div>

                            <span class="text-xs font-bold text-orange-600 bg-orange-100 px-3 py-1 rounded-full">

                                Phone

                            </span>

                        </div>


                        <p class="text-gray-500 text-sm font-semibold mt-5">

                            Phone Number

                        </p>


                        <h3 class="text-xl font-black text-gray-800 mt-2">

                            {{ Auth::user()->phone ?: 'Not provided' }}

                        </h3>

                    </div>



                    {{-- =================================================
                         DOB
                    ================================================== --}}
                    <div class="group bg-gradient-to-br from-purple-50 to-violet-50 rounded-3xl p-6 border border-purple-100 hover:shadow-lg hover:-translate-y-1 transition duration-300">

                        <div class="flex items-center justify-between">

                            <div class="w-11 h-11 bg-white rounded-xl flex items-center justify-center shadow-sm text-xl">

                                🎂

                            </div>

                            <span class="text-xs font-bold text-purple-600 bg-purple-100 px-3 py-1 rounded-full">

                                Birthday

                            </span>

                        </div>


                        <p class="text-gray-500 text-sm font-semibold mt-5">

                            Date of Birth

                        </p>


                        <h3 class="text-xl font-black text-gray-800 mt-2">

                            @if(Auth::user()->dob)

                                {{ \Carbon\Carbon::parse(Auth::user()->dob)->format('d F Y') }}

                            @else

                                Not provided

                            @endif

                        </h3>

                    </div>



                    {{-- =================================================
                         GENDER
                    ================================================== --}}
                    <div class="group bg-gradient-to-br from-pink-50 to-rose-50 rounded-3xl p-6 border border-pink-100 hover:shadow-lg hover:-translate-y-1 transition duration-300">

                        <div class="flex items-center justify-between">

                            <div class="w-11 h-11 bg-white rounded-xl flex items-center justify-center shadow-sm text-xl">

                                ⚧

                            </div>

                            <span class="text-xs font-bold text-pink-600 bg-pink-100 px-3 py-1 rounded-full">

                                Personal

                            </span>

                        </div>


                        <p class="text-gray-500 text-sm font-semibold mt-5">

                            Gender

                        </p>


                        <h3 class="text-xl font-black text-gray-800 mt-2">

                            {{ Auth::user()->gender ?: 'Not provided' }}

                        </h3>

                    </div>



                    {{-- =================================================
                         STATUS
                    ================================================== --}}
                    <div class="group bg-gradient-to-br from-emerald-50 to-teal-50 rounded-3xl p-6 border border-emerald-100 hover:shadow-lg hover:-translate-y-1 transition duration-300">

                        <div class="flex items-center justify-between">

                            <div class="w-11 h-11 bg-white rounded-xl flex items-center justify-center shadow-sm text-xl">

                                🌿

                            </div>

                            <span class="text-xs font-bold text-emerald-600 bg-emerald-100 px-3 py-1 rounded-full">

                                Status

                            </span>

                        </div>


                        <p class="text-gray-500 text-sm font-semibold mt-5">

                            Volunteer Status

                        </p>


                        <div class="mt-2">

                            <span class="inline-flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-sm">

                                <span class="w-2 h-2 bg-white rounded-full"></span>

                                Active Volunteer

                            </span>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     PROFILE PHOTO CARD
                ================================================== --}}
                <div class="mt-10">


                    <div class="flex items-center gap-3 mb-5">

                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center text-xl">

                            📷

                        </div>


                        <div>

                            <h3 class="text-xl font-black text-gray-800">

                                Profile Photo

                            </h3>

                            <p class="text-sm text-gray-500">

                                Your VolunteerHub profile picture

                            </p>

                        </div>

                    </div>


                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500 p-6 md:p-8 text-white shadow-xl">


                        {{-- Decoration --}}
                        <div class="absolute -right-20 -top-20 w-56 h-56 bg-white/10 rounded-full blur-2xl"></div>


                        <div class="relative z-10 flex flex-col sm:flex-row items-center gap-6">


                            {{-- Photo --}}
                            <div class="relative">

                                @if(Auth::user()->profile_photo)

                                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                         class="w-28 h-28 rounded-full object-cover border-4 border-white shadow-2xl">

                                @else

                                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ffffff&color=16a34a&size=256"
                                         class="w-28 h-28 rounded-full object-cover border-4 border-white shadow-2xl">

                                @endif


                                <span class="absolute bottom-0 right-0 w-9 h-9 bg-white text-green-600 rounded-full flex items-center justify-center border-4 border-green-600">

                                    ✓

                                </span>

                            </div>


                            {{-- User Info --}}
                            <div class="text-center sm:text-left">

                                <h4 class="text-2xl font-black">

                                    {{ Auth::user()->name }}

                                </h4>


                                <p class="text-green-100 mt-1">

                                    {{ Auth::user()->email }}

                                </p>


                                <div class="flex flex-wrap justify-center sm:justify-start gap-2 mt-4">

                                    <span class="bg-white/15 border border-white/20 px-4 py-1.5 rounded-full text-xs font-bold">

                                        🌿 VolunteerHub Member

                                    </span>


                                    <span class="bg-white/15 border border-white/20 px-4 py-1.5 rounded-full text-xs font-bold">

                                        🟢 Active

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     ACCOUNT SECURITY
                ================================================== --}}
                <div class="mt-8 bg-slate-50 border border-gray-100 rounded-3xl p-6">

                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-5">


                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center text-xl">

                                🔐

                            </div>


                            <div>

                                <h3 class="font-black text-gray-800 text-lg">

                                    Account Security

                                </h3>

                                <p class="text-sm text-gray-500">

                                    Keep your account information secure

                                </p>

                            </div>

                        </div>


                        <a href="{{ route('profile.edit') }}"
                           class="inline-flex items-center justify-center gap-2 bg-white border border-green-200 text-green-700 px-5 py-3 rounded-xl font-bold hover:bg-green-50 transition">

                            🔑 Change Password

                        </a>

                    </div>

                </div>



                {{-- =================================================
                     BOTTOM ACTIONS
                ================================================== --}}
                <div class="mt-10 pt-8 border-t border-gray-100 flex flex-col sm:flex-row gap-4 justify-between">


                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-7 py-4 rounded-2xl font-bold transition">

                        ←

                        <span>
                            Back to Dashboard
                        </span>

                    </a>


                    <a href="{{ route('profile.edit') }}"
                       class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-green-600 to-emerald-500 hover:from-green-700 hover:to-emerald-600 text-white px-9 py-4 rounded-2xl font-black shadow-xl shadow-green-200 hover:shadow-2xl hover:-translate-y-0.5 transition">

                        ✏️

                        <span>
                            Edit My Profile
                        </span>

                    </a>

                </div>

            </div>

        </div>


        {{-- Bottom Note --}}
        <div class="mt-6 flex items-center justify-center gap-2 text-sm text-gray-500 text-center">

            <span>🔒</span>

            <span>
                Your VolunteerHub profile information is securely managed.
            </span>

        </div>

    </section>

</div>

@endsection