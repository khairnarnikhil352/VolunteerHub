@extends('layouts.admin')

@section('content')

@php
    $isAdmin = auth()->user()->role === 'admin';

    $memberSince = $user->created_at
        ? $user->created_at->format('M Y')
        : 'N/A';

    $createdAt = $user->created_at
        ? $user->created_at->format('d M Y • h:i A')
        : 'N/A';

    $updatedAt = $user->updated_at
        ? $user->updated_at->format('d M Y • h:i A')
        : 'N/A';

    $dob = $user->dob
        ? \Carbon\Carbon::parse($user->dob)->format('d M Y')
        : 'Not Available';

    $profileImage = $user->profile_photo
        ? asset('storage/' . $user->profile_photo)
        : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=10b981&color=fff&size=200';
@endphp


<div class="min-h-screen bg-slate-50">

    {{-- ========================================================= --}}
    {{-- PREMIUM HERO --}}
    {{-- ========================================================= --}}

    <section class="relative overflow-hidden bg-gradient-to-br from-green-800 via-emerald-700 to-teal-600">

        {{-- Decorative Shapes --}}
        <div class="absolute -top-32 -right-32 w-[450px] h-[450px] bg-white/10 rounded-full blur-3xl"></div>

        <div class="absolute -bottom-40 -left-32 w-[500px] h-[500px] bg-teal-300/10 rounded-full blur-3xl"></div>

        <div class="absolute top-20 right-1/3 w-40 h-40 bg-emerald-300/10 rounded-full blur-2xl"></div>

        <div class="absolute inset-0 opacity-[0.06]"
             style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 24px 24px;">
        </div>


        <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 pt-12 pb-28">

            

            {{-- Hero Content --}}
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8">

                <div>

                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                                bg-white/10 border border-white/20 backdrop-blur-md
                                text-white text-sm font-semibold shadow-lg">

                        <span class="w-2 h-2 bg-green-300 rounded-full animate-pulse"></span>

                        VolunteerHub Admin Portal

                    </div>


                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black
                               text-white tracking-tight mt-5">

                        Admin Profile

                    </h1>


                    <p class="mt-4 max-w-2xl text-green-100 text-base md:text-lg leading-8">

                        Manage your administrator information, account details
                        and VolunteerHub platform access from one place.

                    </p>

                </div>


                {{-- Hero Action --}}
                <a href="{{ route('admin.profile.edit') }}"
                   class="group inline-flex items-center gap-3
                          bg-white text-emerald-700
                          px-7 py-4 rounded-2xl
                          font-black shadow-2xl
                          hover:-translate-y-1 hover:shadow-3xl
                          transition duration-300">

                    <span class="text-xl">✏️</span>

                    Edit Profile

                    <span class="group-hover:translate-x-1 transition">
                        →
                    </span>

                </a>

            </div>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- PROFILE HEADER CARD --}}
    {{-- ========================================================= --}}

    <div class="max-w-7xl mx-auto px-6 lg:px-8 -mt-20 relative z-20">

        <div class="bg-white rounded-[32px] shadow-2xl
                    border border-slate-200 overflow-hidden">


            {{-- Cover --}}
            <div class="h-32 md:h-40 bg-gradient-to-r
                        from-green-600 via-emerald-500 to-teal-500 relative">

                <div class="absolute inset-0 bg-black/5"></div>

                <div class="absolute right-8 top-6
                            px-4 py-2 rounded-full
                            bg-white/15 backdrop-blur-md
                            border border-white/20
                            text-white text-xs font-bold">

                    🛡️ ADMIN ACCOUNT

                </div>

            </div>


            <div class="px-6 md:px-10 pb-8">


                <div class="flex flex-col lg:flex-row
                            items-center lg:items-end
                            gap-6 -mt-16">


                    {{-- PROFILE PHOTO --}}
                    <div class="relative shrink-0">

                        <div class="w-36 h-36 md:w-40 md:h-40
                                    rounded-[30px]
                                    bg-white p-2
                                    shadow-2xl">

                            <img src="{{ $profileImage }}"
                                 alt="{{ $user->name }}"
                                 class="w-full h-full object-cover rounded-[24px]">

                        </div>


                        {{-- Online Badge --}}
                        <div class="absolute -bottom-2 -right-2
                                    w-11 h-11
                                    bg-white rounded-full
                                    flex items-center justify-center
                                    shadow-lg">

                            <div class="w-7 h-7 bg-green-500
                                        rounded-full
                                        border-4 border-white
                                        flex items-center justify-center">

                                <span class="w-2 h-2 bg-white rounded-full"></span>

                            </div>

                        </div>

                    </div>



                    {{-- PROFILE INFO --}}
                    <div class="flex-1 text-center lg:text-left">

                        <div class="flex flex-wrap items-center
                                    justify-center lg:justify-start gap-3">

                            <h2 class="text-3xl md:text-4xl font-black
                                       text-slate-800">

                                {{ $user->name }}

                            </h2>


                            <span class="inline-flex items-center gap-2
                                         px-4 py-2
                                         bg-emerald-100
                                         text-emerald-700
                                         rounded-full
                                         text-sm font-bold">

                                🛡️ Administrator

                            </span>

                        </div>


                        <p class="text-slate-500 mt-2">

                            VolunteerHub System Administrator

                        </p>


                        {{-- Contact Pills --}}
                        <div class="flex flex-wrap
                                    justify-center lg:justify-start
                                    gap-3 mt-5">

                            <div class="flex items-center gap-2
                                        bg-slate-50
                                        border border-slate-200
                                        px-4 py-2.5
                                        rounded-xl text-sm text-slate-600">

                                📧

                                <span class="break-all">
                                    {{ $user->email }}
                                </span>

                            </div>


                            <div class="flex items-center gap-2
                                        bg-slate-50
                                        border border-slate-200
                                        px-4 py-2.5
                                        rounded-xl text-sm text-slate-600">

                                📱

                                {{ $user->phone ?? 'Not Available' }}

                            </div>


                            <div class="flex items-center gap-2
                                        bg-emerald-50
                                        border border-emerald-200
                                        px-4 py-2.5
                                        rounded-xl text-sm
                                        text-emerald-700 font-semibold">

                                📅

                                Joined {{ $memberSince }}

                            </div>

                        </div>

                    </div>


                    {{-- DESKTOP BUTTON --}}
                    <div class="hidden lg:block">

                        <a href="{{ route('admin.profile.edit') }}"
                           class="inline-flex items-center gap-2
                                  bg-gradient-to-r
                                  from-green-600 to-emerald-600
                                  text-white
                                  px-6 py-3.5
                                  rounded-2xl
                                  font-bold shadow-lg
                                  hover:shadow-xl
                                  hover:-translate-y-1
                                  transition">

                            ✏️ Edit Profile

                        </a>

                    </div>

                </div>

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- QUICK STATS --}}
        {{-- ========================================================= --}}

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4
                    gap-5 mt-8">


            {{-- STATUS --}}
            <div class="group bg-white rounded-3xl
                        border border-slate-200
                        p-6 shadow-sm
                        hover:shadow-xl
                        hover:-translate-y-1
                        transition duration-300">

                <div class="flex items-center justify-between">

                    <div class="w-12 h-12 rounded-2xl
                                bg-green-100
                                flex items-center justify-center
                                text-2xl">

                        🟢

                    </div>

                    <span class="text-xs font-bold
                                 text-green-600
                                 bg-green-50
                                 px-3 py-1.5
                                 rounded-full">

                        ACTIVE

                    </span>

                </div>


                <p class="text-sm text-slate-500 mt-5">
                    Account Status
                </p>

                <h3 class="text-2xl font-black text-slate-800 mt-1">
                    Active
                </h3>

            </div>



            {{-- ROLE --}}
            <div class="group bg-white rounded-3xl
                        border border-slate-200
                        p-6 shadow-sm
                        hover:shadow-xl
                        hover:-translate-y-1
                        transition duration-300">

                <div class="w-12 h-12 rounded-2xl
                            bg-emerald-100
                            flex items-center justify-center
                            text-2xl">

                    🛡️

                </div>

                <p class="text-sm text-slate-500 mt-5">
                    Account Role
                </p>

                <h3 class="text-2xl font-black text-slate-800 mt-1">
                    {{ ucfirst($user->role) }}
                </h3>

            </div>



            {{-- MEMBER SINCE --}}
            <div class="group bg-white rounded-3xl
                        border border-slate-200
                        p-6 shadow-sm
                        hover:shadow-xl
                        hover:-translate-y-1
                        transition duration-300">

                <div class="w-12 h-12 rounded-2xl
                            bg-teal-100
                            flex items-center justify-center
                            text-2xl">

                    📅

                </div>

                <p class="text-sm text-slate-500 mt-5">
                    Member Since
                </p>

                <h3 class="text-2xl font-black text-slate-800 mt-1">
                    {{ $memberSince }}
                </h3>

            </div>



            {{-- ACCESS --}}
            <div class="group bg-white rounded-3xl
                        border border-slate-200
                        p-6 shadow-sm
                        hover:shadow-xl
                        hover:-translate-y-1
                        transition duration-300">

                <div class="w-12 h-12 rounded-2xl
                            bg-blue-100
                            flex items-center justify-center
                            text-2xl">

                    🔐

                </div>

                <p class="text-sm text-slate-500 mt-5">
                    Platform Access
                </p>

                <h3 class="text-2xl font-black text-slate-800 mt-1">
                    Full Access
                </h3>

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- MAIN CONTENT --}}
        {{-- ========================================================= --}}

        <div class="grid lg:grid-cols-3 gap-8 mt-8">


            {{-- ===================================================== --}}
            {{-- LEFT COLUMN --}}
            {{-- ===================================================== --}}

            <div class="lg:col-span-2 space-y-8">


                {{-- PERSONAL INFORMATION --}}
                <div class="bg-white rounded-[30px]
                            border border-slate-200
                            shadow-sm overflow-hidden">


                    {{-- Header --}}
                    <div class="relative overflow-hidden
                                bg-gradient-to-r
                                from-green-700
                                via-emerald-600
                                to-teal-500
                                px-7 py-6
                                text-white">

                        <div class="absolute -right-10 -top-16
                                    w-40 h-40
                                    bg-white/10 rounded-full"></div>

                        <div class="relative z-10">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11
                                            rounded-xl
                                            bg-white/15
                                            flex items-center justify-center
                                            text-xl">

                                    👤

                                </div>

                                <div>

                                    <h3 class="text-xl md:text-2xl font-black">
                                        Personal Information
                                    </h3>

                                    <p class="text-green-100 text-sm mt-1">
                                        Your administrator account details
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- Information Grid --}}
                    <div class="p-6 md:p-7">

                        <div class="grid md:grid-cols-2 gap-5">


                            {{-- NAME --}}
                            <div class="group rounded-2xl
                                        border border-green-100
                                        bg-green-50/70
                                        p-5
                                        hover:border-green-300
                                        hover:shadow-md
                                        transition">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10
                                                bg-green-100
                                                rounded-xl
                                                flex items-center justify-center">

                                        👤

                                    </div>

                                    <div>

                                        <p class="text-xs uppercase
                                                  tracking-wider
                                                  font-bold
                                                  text-green-600">

                                            Full Name

                                        </p>

                                        <h4 class="text-lg font-black
                                                   text-slate-800 mt-1">

                                            {{ $user->name }}

                                        </h4>

                                    </div>

                                </div>

                            </div>



                            {{-- EMAIL --}}
                            <div class="group rounded-2xl
                                        border border-emerald-100
                                        bg-emerald-50/70
                                        p-5
                                        hover:border-emerald-300
                                        hover:shadow-md
                                        transition">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10
                                                bg-emerald-100
                                                rounded-xl
                                                flex items-center justify-center">

                                        📧

                                    </div>

                                    <div class="min-w-0">

                                        <p class="text-xs uppercase
                                                  tracking-wider
                                                  font-bold
                                                  text-emerald-600">

                                            Email Address

                                        </p>

                                        <h4 class="text-base font-black
                                                   text-slate-800
                                                   mt-1 break-all">

                                            {{ $user->email }}

                                        </h4>

                                    </div>

                                </div>

                            </div>



                            {{-- PHONE --}}
                            <div class="group rounded-2xl
                                        border border-teal-100
                                        bg-teal-50/70
                                        p-5
                                        hover:border-teal-300
                                        hover:shadow-md
                                        transition">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10
                                                bg-teal-100
                                                rounded-xl
                                                flex items-center justify-center">

                                        📱

                                    </div>

                                    <div>

                                        <p class="text-xs uppercase
                                                  tracking-wider
                                                  font-bold
                                                  text-teal-600">

                                            Phone Number

                                        </p>

                                        <h4 class="text-lg font-black
                                                   text-slate-800 mt-1">

                                            {{ $user->phone ?? 'Not Available' }}

                                        </h4>

                                    </div>

                                </div>

                            </div>



                            {{-- GENDER --}}
                            <div class="group rounded-2xl
                                        border border-blue-100
                                        bg-blue-50/70
                                        p-5
                                        hover:border-blue-300
                                        hover:shadow-md
                                        transition">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10
                                                bg-blue-100
                                                rounded-xl
                                                flex items-center justify-center">

                                        ⚧️

                                    </div>

                                    <div>

                                        <p class="text-xs uppercase
                                                  tracking-wider
                                                  font-bold
                                                  text-blue-600">

                                            Gender

                                        </p>

                                        <h4 class="text-lg font-black
                                                   text-slate-800 mt-1">

                                            {{ $user->gender ?? 'Not Available' }}

                                        </h4>

                                    </div>

                                </div>

                            </div>



                            {{-- DOB --}}
                            <div class="group rounded-2xl
                                        border border-purple-100
                                        bg-purple-50/70
                                        p-5
                                        hover:border-purple-300
                                        hover:shadow-md
                                        transition">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10
                                                bg-purple-100
                                                rounded-xl
                                                flex items-center justify-center">

                                        🎂

                                    </div>

                                    <div>

                                        <p class="text-xs uppercase
                                                  tracking-wider
                                                  font-bold
                                                  text-purple-600">

                                            Date of Birth

                                        </p>

                                        <h4 class="text-lg font-black
                                                   text-slate-800 mt-1">

                                            {{ $dob }}

                                        </h4>

                                    </div>

                                </div>

                            </div>



                            {{-- ROLE --}}
                            <div class="group rounded-2xl
                                        border border-orange-100
                                        bg-orange-50/70
                                        p-5
                                        hover:border-orange-300
                                        hover:shadow-md
                                        transition">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10
                                                bg-orange-100
                                                rounded-xl
                                                flex items-center justify-center">

                                        🛡️

                                    </div>

                                    <div>

                                        <p class="text-xs uppercase
                                                  tracking-wider
                                                  font-bold
                                                  text-orange-600">

                                            System Role

                                        </p>

                                        <h4 class="text-lg font-black
                                                   text-slate-800 mt-1">

                                            {{ ucfirst($user->role) }}

                                        </h4>

                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>



                {{-- ACCOUNT TIMELINE --}}
                <div class="bg-white rounded-[30px]
                            border border-slate-200
                            shadow-sm overflow-hidden">


                    <div class="px-7 py-6
                                border-b border-slate-100">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11
                                        bg-emerald-100
                                        rounded-xl
                                        flex items-center justify-center
                                        text-xl">

                                🕒

                            </div>

                            <div>

                                <h3 class="text-xl md:text-2xl
                                           font-black text-slate-800">

                                    Account Timeline

                                </h3>

                                <p class="text-sm text-slate-500 mt-1">

                                    Important account activity

                                </p>

                            </div>

                        </div>

                    </div>



                    <div class="p-7">


                        {{-- Timeline Item --}}
                        <div class="relative flex gap-5 pb-8">


                            {{-- Line --}}
                            <div class="absolute left-5 top-12
                                        w-0.5 h-full
                                        bg-gradient-to-b
                                        from-green-300
                                        to-emerald-100">
                            </div>


                            <div class="relative z-10 w-11 h-11
                                        rounded-full
                                        bg-green-100
                                        flex items-center
                                        justify-center
                                        text-lg shrink-0">

                                🎉

                            </div>


                            <div class="pt-1">

                                <h4 class="font-black text-slate-800">
                                    Account Created
                                </h4>

                                <p class="text-sm text-slate-500 mt-1">
                                    {{ $createdAt }}
                                </p>

                                <span class="inline-block mt-3
                                             px-3 py-1.5
                                             rounded-full
                                             bg-green-50
                                             text-green-700
                                             text-xs font-bold">

                                    Account Activated

                                </span>

                            </div>

                        </div>



                        {{-- Timeline Item --}}
                        <div class="relative flex gap-5">


                            <div class="relative z-10 w-11 h-11
                                        rounded-full
                                        bg-blue-100
                                        flex items-center
                                        justify-center
                                        text-lg shrink-0">

                                ✏️

                            </div>


                            <div class="pt-1">

                                <h4 class="font-black text-slate-800">
                                    Last Profile Update
                                </h4>

                                <p class="text-sm text-slate-500 mt-1">
                                    {{ $updatedAt }}
                                </p>

                                <span class="inline-block mt-3
                                             px-3 py-1.5
                                             rounded-full
                                             bg-blue-50
                                             text-blue-700
                                             text-xs font-bold">

                                    Profile Information

                                </span>

                            </div>

                        </div>


                    </div>

                </div>


            </div>



            {{-- ===================================================== --}}
            {{-- RIGHT COLUMN --}}
            {{-- ===================================================== --}}

            <div class="space-y-8">


                {{-- ACCOUNT STATUS --}}
                <div class="bg-white rounded-[30px]
                            border border-slate-200
                            shadow-sm overflow-hidden">


                    <div class="bg-gradient-to-r
                                from-green-700
                                via-emerald-600
                                to-teal-500
                                p-6 text-white">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11
                                        bg-white/15
                                        rounded-xl
                                        flex items-center justify-center">

                                🟢

                            </div>

                            <div>

                                <h3 class="text-xl font-black">
                                    Account Status
                                </h3>

                                <p class="text-green-100 text-xs mt-1">
                                    Current account state
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="p-7 text-center">


                        <div class="relative w-28 h-28 mx-auto">


                            <div class="absolute inset-0
                                        bg-green-100
                                        rounded-full
                                        animate-pulse
                                        opacity-60">
                            </div>


                            <div class="relative w-28 h-28
                                        rounded-full
                                        bg-gradient-to-br
                                        from-green-100
                                        to-emerald-100
                                        flex items-center
                                        justify-center
                                        border-8 border-white
                                        shadow-lg">

                                <span class="text-5xl">
                                    🟢
                                </span>

                            </div>

                        </div>


                        <h2 class="text-2xl font-black
                                   text-green-700 mt-6">

                            Active Administrator

                        </h2>


                        <p class="text-sm text-slate-500
                                  leading-6 mt-3">

                            Your administrator account is active
                            and ready to manage VolunteerHub.

                        </p>


                        <div class="mt-6
                                    bg-green-50
                                    border border-green-200
                                    rounded-2xl
                                    p-4">

                            <div class="flex items-center
                                        justify-center gap-2
                                        text-green-700
                                        font-bold text-sm">

                                <span class="w-2.5 h-2.5
                                             bg-green-500
                                             rounded-full">
                                </span>

                                All Systems Access Enabled

                            </div>

                        </div>

                    </div>

                </div>



                {{-- QUICK ACTIONS --}}
                <div class="bg-white rounded-[30px]
                            border border-slate-200
                            shadow-sm overflow-hidden">


                    <div class="px-6 py-5
                                bg-slate-900 text-white">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10
                                        bg-white/10
                                        rounded-xl
                                        flex items-center justify-center">

                                ⚡

                            </div>

                            <div>

                                <h3 class="text-xl font-black">
                                    Quick Actions
                                </h3>

                                <p class="text-slate-400 text-xs mt-1">
                                    Manage your account
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="p-6 space-y-3">


                        <a href="{{ route('admin.profile.edit') }}"
                           class="group flex items-center justify-between
                                  w-full p-4 rounded-2xl
                                  bg-green-50
                                  border border-green-100
                                  hover:bg-green-100
                                  hover:border-green-200
                                  transition">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11
                                            rounded-xl
                                            bg-green-600
                                            text-white
                                            flex items-center justify-center">

                                    ✏️

                                </div>

                                <div>

                                    <p class="font-bold text-slate-800">
                                        Edit Profile
                                    </p>

                                    <p class="text-xs text-slate-500">
                                        Update account details
                                    </p>

                                </div>

                            </div>

                            <span class="text-green-600
                                         group-hover:translate-x-1
                                         transition">

                                →

                            </span>

                        </a>



                        <a href="{{ route('admin.profile.edit') }}#password"
                           class="group flex items-center justify-between
                                  w-full p-4 rounded-2xl
                                  bg-orange-50
                                  border border-orange-100
                                  hover:bg-orange-100
                                  transition">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11
                                            rounded-xl
                                            bg-orange-500
                                            text-white
                                            flex items-center justify-center">

                                    🔒

                                </div>

                                <div>

                                    <p class="font-bold text-slate-800">
                                        Change Password
                                    </p>

                                    <p class="text-xs text-slate-500">
                                        Secure your account
                                    </p>

                                </div>

                            </div>

                            <span class="text-orange-600
                                         group-hover:translate-x-1
                                         transition">

                                →

                            </span>

                        </a>



                        <a href="{{ route('admin.dashboard') }}"
                           class="group flex items-center justify-between
                                  w-full p-4 rounded-2xl
                                  bg-slate-50
                                  border border-slate-200
                                  hover:bg-slate-100
                                  transition">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11
                                            rounded-xl
                                            bg-slate-800
                                            text-white
                                            flex items-center justify-center">

                                    🏠

                                </div>

                                <div>

                                    <p class="font-bold text-slate-800">
                                        Dashboard
                                    </p>

                                    <p class="text-xs text-slate-500">
                                        Return to admin panel
                                    </p>

                                </div>

                            </div>

                            <span class="text-slate-600
                                         group-hover:translate-x-1
                                         transition">

                                →

                            </span>

                        </a>


                    </div>

                </div>



               
                </div>


            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- SECURITY / INFORMATION BANNER --}}
        {{-- ========================================================= --}}

        <div class="mt-10
                    bg-gradient-to-r
                    from-slate-900
                    via-slate-800
                    to-emerald-950
                    rounded-[30px]
                    p-7 md:p-9
                    text-white
                    shadow-xl
                    overflow-hidden
                    relative">


            <div class="absolute -right-20 -top-20
                        w-64 h-64
                        rounded-full
                        bg-emerald-500/10">
            </div>


            <div class="relative z-10
                        flex flex-col
                        md:flex-row
                        items-center
                        justify-between
                        gap-6">


                <div class="flex items-start gap-4">

                    <div class="w-14 h-14
                                rounded-2xl
                                bg-emerald-500/20
                                border border-emerald-400/20
                                flex items-center
                                justify-center
                                text-2xl shrink-0">

                        🔐

                    </div>


                    <div>

                        <p class="text-emerald-400
                                  text-xs font-bold
                                  uppercase tracking-widest">

                            Account Security

                        </p>


                        <h3 class="text-xl md:text-2xl
                                   font-black mt-1">

                            Keep your administrator account secure

                        </h3>


                        <p class="text-slate-400
                                  text-sm mt-2 max-w-2xl">

                            Use a strong password and keep your
                            administrator information up to date.

                        </p>

                    </div>

                </div>


                <a href="{{ route('admin.profile.edit') }}#password"
                   class="shrink-0
                          inline-flex items-center gap-2
                          bg-emerald-500
                          hover:bg-emerald-400
                          text-white
                          px-6 py-3.5
                          rounded-2xl
                          font-bold
                          transition
                          shadow-lg">

                    🔒 Security Settings

                </a>

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- BOTTOM CTA --}}
        {{-- ========================================================= --}}

        <div class="mt-10 mb-12
                    relative overflow-hidden
                    rounded-[35px]
                    bg-gradient-to-r
                    from-green-700
                    via-emerald-600
                    to-teal-600
                    text-white
                    shadow-2xl">


            <div class="absolute -right-20 -top-20
                        w-72 h-72
                        rounded-full
                        bg-white/10">
            </div>


            <div class="absolute -left-16 -bottom-24
                        w-64 h-64
                        rounded-full
                        bg-white/10">
            </div>


            <div class="relative z-10
                        p-8 md:p-10
                        flex flex-col
                        lg:flex-row
                        items-center
                        justify-between
                        gap-7">


                <div>

                    <p class="text-green-200
                              text-xs font-bold
                              uppercase tracking-widest">

                        VolunteerHub Admin Panel

                    </p>


                    <h2 class="text-3xl md:text-4xl
                               font-black mt-2">

                        Ready to manage your platform?

                    </h2>


                    <p class="text-green-100
                              mt-3 max-w-2xl
                              leading-7">

                        Manage volunteers, events, applications,
                        certificates and platform activities
                        from your admin dashboard.

                    </p>

                </div>


                <a href="{{ route('admin.dashboard') }}"
                   class="group shrink-0
                          inline-flex items-center gap-3
                          bg-white
                          text-emerald-700
                          px-8 py-4
                          rounded-2xl
                          font-black
                          shadow-xl
                          hover:-translate-y-1
                          hover:shadow-2xl
                          transition">

                    <span class="text-xl">
                        🚀
                    </span>

                    Go to Dashboard

                    <span class="group-hover:translate-x-1 transition">
                        →
                    </span>

                </a>


            </div>

        </div>


    </div>

</div>

@endsection