@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-blue-50">


<!-- ================= HERO SECTION ================= -->

<section class="bg-gradient-to-r from-green-700 via-emerald-600 to-blue-700 rounded-b-[40px] shadow-xl text-white">

    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="flex flex-col lg:flex-row justify-between items-center gap-8">

            <!-- Welcome Text -->

            <div class="flex-1">

                <span class="bg-white/20 px-4 py-2 rounded-full text-sm backdrop-blur">
                    🛡️ VolunteerHub Admin Portal
                </span>

                <h1 class="text-5xl lg:text-6xl font-black mt-5 leading-tight">

                    Welcome Back,

                    <span class="text-yellow-300">
                        {{ Auth::user()->name }}
                    </span>

                </h1>

                <p class="mt-5 text-green-100 text-lg leading-8 max-w-xl">

                    Manage volunteer events, applications, users and
                    community activities from your administration dashboard.

                </p>

                <div class="flex flex-wrap gap-4 mt-8">

                    <a href="#quick-actions"
                       class="bg-yellow-400 hover:bg-yellow-300
                              text-black px-7 py-3 rounded-full
                              font-bold transition shadow-lg">

                        ⚡ Quick Actions

                    </a>

                    <a href="#overview"
                       class="border border-white px-7 py-3
                              rounded-full hover:bg-white
                              hover:text-green-700 transition">

                        📊 View Overview

                    </a>

                </div>

            </div>


            <!-- Admin Profile Card -->

            <div class="w-full lg:w-80">

                <div class="bg-white/15 backdrop-blur-xl
                            rounded-3xl p-6
                            border border-white/20 shadow-2xl">

                    <div class="flex flex-col items-center">

                        <!-- Admin Avatar -->

                        <div class="w-24 h-24 rounded-full
                                    bg-white text-green-700
                                    flex items-center justify-center
                                    text-5xl font-black shadow-xl">

                            {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                        </div>

                        <h2 class="text-2xl font-bold mt-4">

                            {{ Auth::user()->name }}

                        </h2>

                        <p class="text-green-100 text-sm">

                            {{ Auth::user()->email }}

                        </p>

                        <span class="mt-3 bg-yellow-300
                                     text-green-900 text-xs
                                     px-4 py-2 rounded-full
                                     font-bold">

                            🛡️ Administrator

                        </span>

                    </div>


                    <!-- Admin Mini Stats -->

                    <div class="grid grid-cols-2 gap-4 mt-6">

                        <div class="bg-white/10 rounded-2xl p-4 text-center">

                            <h3 class="text-2xl font-black">
                                24
                            </h3>

                            <p class="text-xs text-green-100">
                                Events
                            </p>

                        </div>

                        <div class="bg-white/10 rounded-2xl p-4 text-center">

                            <h3 class="text-2xl font-black">
                                186
                            </h3>

                            <p class="text-xs text-green-100">
                                Volunteers
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= DASHBOARD CONTENT ================= -->

<div class="max-w-7xl mx-auto px-6 py-10">


    <!-- ================= TITLE ================= -->

    <div id="overview"
         class="flex flex-col md:flex-row
                justify-between md:items-center
                gap-4 mb-8">

        <div>

            <h2 class="text-3xl font-black text-gray-800">

                📊 Admin Dashboard

            </h2>

            <p class="text-gray-500 mt-2">

                Overview of VolunteerHub activities and platform performance.

            </p>

        </div>

        <span class="bg-green-100 text-green-700
                     px-4 py-2 rounded-full
                     font-semibold w-fit">

            📅 {{ now()->format('l, d M Y') }}

        </span>

    </div>


    <!-- ================= STAT CARDS ================= -->

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">


        <!-- Total Events -->

        <div class="bg-white rounded-3xl p-6
                    shadow-lg hover:-translate-y-2
                    hover:shadow-2xl transition">

            <div class="flex justify-between items-center">

                <div class="w-14 h-14 rounded-2xl
                            bg-green-100
                            flex items-center justify-center
                            text-3xl">

                    📅

                </div>

                <span class="text-green-600 text-sm font-bold">
                    Active
                </span>

            </div>

            <p class="mt-5 text-gray-500">
                Total Events
            </p>

            <h2 class="text-4xl font-black
                       text-green-600 mt-2">

                24

            </h2>

            <p class="text-green-600 text-sm mt-3">

                🌱 Volunteer opportunities

            </p>

        </div>


        <!-- Volunteers -->

        <div class="bg-white rounded-3xl p-6
                    shadow-lg hover:-translate-y-2
                    hover:shadow-2xl transition">

            <div class="flex justify-between items-center">

                <div class="w-14 h-14 rounded-2xl
                            bg-blue-100
                            flex items-center justify-center
                            text-3xl">

                    👥

                </div>

                <span class="text-blue-600 text-sm font-bold">
                    +18 New
                </span>

            </div>

            <p class="mt-5 text-gray-500">
                Total Volunteers
            </p>

            <h2 class="text-4xl font-black
                       text-blue-600 mt-2">

                186

            </h2>

            <p class="text-blue-600 text-sm mt-3">

                🤝 Registered volunteers

            </p>

        </div>


        <!-- Applications -->

        <div class="bg-white rounded-3xl p-6
                    shadow-lg hover:-translate-y-2
                    hover:shadow-2xl transition">

            <div class="flex justify-between items-center">

                <div class="w-14 h-14 rounded-2xl
                            bg-orange-100
                            flex items-center justify-center
                            text-3xl">

                    📝

                </div>

                <span class="text-orange-600 text-sm font-bold">
                    14 Pending
                </span>

            </div>

            <p class="mt-5 text-gray-500">
                Applications
            </p>

            <h2 class="text-4xl font-black
                       text-orange-500 mt-2">

                72

            </h2>

            <p class="text-orange-500 text-sm mt-3">

                📋 Registration requests

            </p>

        </div>


        <!-- Approved -->

        <div class="bg-white rounded-3xl p-6
                    shadow-lg hover:-translate-y-2
                    hover:shadow-2xl transition">

            <div class="flex justify-between items-center">

                <div class="w-14 h-14 rounded-2xl
                            bg-purple-100
                            flex items-center justify-center
                            text-3xl">

                    ✅

                </div>

                <span class="text-purple-600 text-sm font-bold">
                    80.5%
                </span>

            </div>

            <p class="mt-5 text-gray-500">
                Approved
            </p>

            <h2 class="text-4xl font-black
                       text-purple-600 mt-2">

                58

            </h2>

            <p class="text-purple-500 text-sm mt-3">

                🏆 Approved applications

            </p>

        </div>

    </div>


    <!-- ================= QUICK ACTIONS ================= -->

    <div id="quick-actions" class="mt-12">

        <div class="flex justify-between items-center mb-6">

            <div>

                <h2 class="text-3xl font-black text-gray-800">

                    ⚡ Quick Actions

                </h2>

                <p class="text-gray-500">

                    Manage the most important VolunteerHub operations.

                </p>

            </div>

        </div>


        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">


            <!-- Create Event -->

            <a href="{{ route('admin.events.create') }}"
               class="group bg-gradient-to-r
                      from-green-500 to-emerald-600
                      rounded-3xl p-6 text-white
                      shadow-lg hover:-translate-y-2
                      hover:shadow-2xl transition">

                <div class="text-5xl mb-5
                            group-hover:scale-110 transition">

                    ➕

                </div>

                <h3 class="text-xl font-bold">
                    Create Event
                </h3>

                <p class="text-green-100 text-sm mt-2">
                    Add a new volunteer event.
                </p>

            </a>


            <!-- Manage Events -->

            <a href="{{ route('admin.events.index') }}"
               class="group bg-gradient-to-r
                      from-blue-500 to-cyan-600
                      rounded-3xl p-6 text-white
                      shadow-lg hover:-translate-y-2
                      hover:shadow-2xl transition">

                <div class="text-5xl mb-5
                            group-hover:scale-110 transition">

                    📅

                </div>

                <h3 class="text-xl font-bold">
                    Manage Events
                </h3>

                <p class="text-blue-100 text-sm mt-2">
                    Edit, update or remove events.
                </p>

            </a>


            <!-- Volunteers -->

            <a href="#"
               class="group bg-gradient-to-r
                      from-purple-500 to-indigo-600
                      rounded-3xl p-6 text-white
                      shadow-lg hover:-translate-y-2
                      hover:shadow-2xl transition">

                <div class="text-5xl mb-5
                            group-hover:scale-110 transition">

                    👥

                </div>

                <h3 class="text-xl font-bold">
                    Manage Volunteers
                </h3>

                <p class="text-purple-100 text-sm mt-2">
                    View registered volunteers.
                </p>

            </a>


            <!-- Applications -->

            <a href="#"
               class="group bg-gradient-to-r
                      from-orange-400 to-red-500
                      rounded-3xl p-6 text-white
                      shadow-lg hover:-translate-y-2
                      hover:shadow-2xl transition">

                <div class="text-5xl mb-5
                            group-hover:scale-110 transition">

                    📝

                </div>

                <h3 class="text-xl font-bold">
                    Applications
                </h3>

                <p class="text-orange-100 text-sm mt-2">
                    Review volunteer applications.
                </p>

            </a>

        </div>

    </div>


    <!-- ================= MANAGEMENT OVERVIEW ================= -->

    <div class="mt-16">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h2 class="text-3xl font-black text-gray-800">

                    🛠️ Management Overview

                </h2>

                <p class="text-gray-500 mt-2">

                    Quickly monitor important platform activities.

                </p>

            </div>

        </div>


        <div class="grid lg:grid-cols-2 gap-8">


            <!-- Applications -->

            <div class="bg-white rounded-[28px]
                        shadow-xl overflow-hidden">

                <div class="p-7 border-b border-gray-100
                            flex justify-between items-center">

                    <div>

                        <h3 class="text-2xl font-bold text-gray-800">

                            📝 Recent Applications

                        </h3>

                        <p class="text-gray-500 text-sm mt-1">

                            Latest volunteer registrations.

                        </p>

                    </div>

                    <span class="bg-orange-100
                                 text-orange-700
                                 px-3 py-1 rounded-full
                                 text-xs font-bold">

                        14 Pending

                    </span>

                </div>


                <div class="p-6 space-y-4">


                    <!-- Application 1 -->

                    <div class="flex items-center
                                justify-between gap-4
                                bg-green-50 p-4 rounded-2xl">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-full
                                        bg-green-600 text-white
                                        flex items-center
                                        justify-center font-bold">

                                R

                            </div>

                            <div>

                                <h4 class="font-bold text-gray-800">
                                    Rahul Patil
                                </h4>

                                <p class="text-sm text-gray-500">
                                    Tree Plantation Drive
                                </p>

                            </div>

                        </div>

                        <span class="bg-yellow-100
                                     text-yellow-700
                                     px-3 py-1 rounded-full
                                     text-xs font-bold">

                            Pending

                        </span>

                    </div>


                    <!-- Application 2 -->

                    <div class="flex items-center
                                justify-between gap-4
                                bg-blue-50 p-4 rounded-2xl">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-full
                                        bg-blue-600 text-white
                                        flex items-center
                                        justify-center font-bold">

                                A

                            </div>

                            <div>

                                <h4 class="font-bold text-gray-800">
                                    Amit Sharma
                                </h4>

                                <p class="text-sm text-gray-500">
                                    Blood Donation Camp
                                </p>

                            </div>

                        </div>

                        <span class="bg-green-100
                                     text-green-700
                                     px-3 py-1 rounded-full
                                     text-xs font-bold">

                            Approved

                        </span>

                    </div>


                    <!-- Application 3 -->

                    <div class="flex items-center
                                justify-between gap-4
                                bg-purple-50 p-4 rounded-2xl">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-full
                                        bg-purple-600 text-white
                                        flex items-center
                                        justify-center font-bold">

                                S

                            </div>

                            <div>

                                <h4 class="font-bold text-gray-800">
                                    Sneha Joshi
                                </h4>

                                <p class="text-sm text-gray-500">
                                    Education Support Camp
                                </p>

                            </div>

                        </div>

                        <span class="bg-yellow-100
                                     text-yellow-700
                                     px-3 py-1 rounded-full
                                     text-xs font-bold">

                            Pending

                        </span>

                    </div>


                </div>

            </div>


            <!-- Event Status -->

            <div class="bg-white rounded-[28px]
                        shadow-xl p-7">

                <div class="flex justify-between items-center mb-7">

                    <div>

                        <h3 class="text-2xl font-bold text-gray-800">

                            📅 Event Status

                        </h3>

                        <p class="text-gray-500 text-sm mt-1">

                            Current event distribution.

                        </p>

                    </div>

                    <span class="text-4xl">
                        📊
                    </span>

                </div>


                <!-- Active -->

                <div class="mb-6">

                    <div class="flex justify-between mb-2">

                        <span class="font-semibold text-gray-700">
                            Active Events
                        </span>

                        <span class="font-bold text-green-600">
                            16
                        </span>

                    </div>

                    <div class="w-full bg-gray-200
                                rounded-full h-3">

                        <div class="bg-green-500
                                    h-3 rounded-full w-[67%]">
                        </div>

                    </div>

                </div>


                <!-- Upcoming -->

                <div class="mb-6">

                    <div class="flex justify-between mb-2">

                        <span class="font-semibold text-gray-700">
                            Upcoming Events
                        </span>

                        <span class="font-bold text-blue-600">
                            6
                        </span>

                    </div>

                    <div class="w-full bg-gray-200
                                rounded-full h-3">

                        <div class="bg-blue-500
                                    h-3 rounded-full w-[45%]">
                        </div>

                    </div>

                </div>


                <!-- Completed -->

                <div>

                    <div class="flex justify-between mb-2">

                        <span class="font-semibold text-gray-700">
                            Completed Events
                        </span>

                        <span class="font-bold text-purple-600">
                            2
                        </span>

                    </div>

                    <div class="w-full bg-gray-200
                                rounded-full h-3">

                        <div class="bg-purple-500
                                    h-3 rounded-full w-[25%]">
                        </div>

                    </div>

                </div>


                <!-- Summary -->

                <div class="mt-8
                            bg-gradient-to-r
                            from-green-50 to-blue-50
                            rounded-2xl p-5">

                    <p class="text-sm text-gray-500">
                        Platform Summary
                    </p>

                    <h3 class="text-2xl font-black
                               text-green-700 mt-1">

                        24 Total Events

                    </h3>

                    <p class="text-sm text-gray-500 mt-1">

                        Keep creating opportunities
                        for the community. 🌱

                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- ================= UPCOMING EVENTS ================= -->

    <div class="mt-16">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h2 class="text-3xl font-black text-gray-800">

                    🌱 Upcoming Events

                </h2>

                <p class="text-gray-500">

                    Events currently scheduled on VolunteerHub.

                </p>

            </div>

            <a href="#"
               class="text-green-700 font-semibold
                      hover:text-green-900">

                Manage All →

            </a>

        </div>


        <div class="grid lg:grid-cols-3 gap-8">


            <!-- Event 1 -->

            <div class="bg-white rounded-[28px]
                        overflow-hidden shadow-xl
                        hover:-translate-y-2
                        transition">

                <div class="h-48 bg-gradient-to-r
                            from-green-500 to-emerald-400
                            flex items-center
                            justify-center text-7xl">

                    🌳

                </div>

                <div class="p-6">

                    <span class="bg-green-100
                                 text-green-700
                                 px-3 py-1 rounded-full
                                 text-xs font-semibold">

                        Environment

                    </span>

                    <h3 class="text-2xl font-bold mt-4">

                        Tree Plantation Drive

                    </h3>

                    <div class="space-y-2 mt-4
                                text-gray-600 text-sm">

                        <p>📍 Nashik, Maharashtra</p>

                        <p>📅 20 September 2026</p>

                        <p>⏰ 9:00 AM – 1:00 PM</p>

                    </div>

                    <div class="mt-5">

                        <div class="flex justify-between
                                    text-sm mb-2">

                            <span>
                                Registration
                            </span>

                            <span class="font-semibold">
                                38 / 50
                            </span>

                        </div>

                        <div class="w-full bg-gray-200
                                    rounded-full h-2.5">

                            <div class="bg-green-600
                                        h-2.5 rounded-full
                                        w-3/4">
                            </div>

                        </div>

                    </div>

                    <button class="w-full mt-6
                                   bg-green-600
                                   hover:bg-green-700
                                   text-white py-3
                                   rounded-xl
                                   font-semibold">

                        Manage Event

                    </button>

                </div>

            </div>


            <!-- Event 2 -->

            <div class="bg-white rounded-[28px]
                        overflow-hidden shadow-xl
                        hover:-translate-y-2
                        transition">

                <div class="h-48 bg-gradient-to-r
                            from-red-500 to-pink-400
                            flex items-center
                            justify-center text-7xl">

                    ❤️

                </div>

                <div class="p-6">

                    <span class="bg-red-100
                                 text-red-700
                                 px-3 py-1 rounded-full
                                 text-xs font-semibold">

                        Healthcare

                    </span>

                    <h3 class="text-2xl font-bold mt-4">

                        Blood Donation Camp

                    </h3>

                    <div class="space-y-2 mt-4
                                text-gray-600 text-sm">

                        <p>📍 Pune, Maharashtra</p>

                        <p>📅 25 September 2026</p>

                        <p>⏰ 10:00 AM – 4:00 PM</p>

                    </div>

                    <div class="mt-5">

                        <div class="flex justify-between
                                    text-sm mb-2">

                            <span>
                                Registration
                            </span>

                            <span class="font-semibold">
                                45 / 50
                            </span>

                        </div>

                        <div class="w-full bg-gray-200
                                    rounded-full h-2.5">

                            <div class="bg-red-500
                                        h-2.5 rounded-full
                                        w-[90%]">
                            </div>

                        </div>

                    </div>

                    <button class="w-full mt-6
                                   bg-red-600
                                   hover:bg-red-700
                                   text-white py-3
                                   rounded-xl
                                   font-semibold">

                        Manage Event

                    </button>

                </div>

            </div>


            <!-- Event 3 -->

            <div class="bg-white rounded-[28px]
                        overflow-hidden shadow-xl
                        hover:-translate-y-2
                        transition">

                <div class="h-48 bg-gradient-to-r
                            from-blue-500 to-cyan-400
                            flex items-center
                            justify-center text-7xl">

                    📚

                </div>

                <div class="p-6">

                    <span class="bg-blue-100
                                 text-blue-700
                                 px-3 py-1 rounded-full
                                 text-xs font-semibold">

                        Education

                    </span>

                    <h3 class="text-2xl font-bold mt-4">

                        Education Support Camp

                    </h3>

                    <div class="space-y-2 mt-4
                                text-gray-600 text-sm">

                        <p>📍 Mumbai, Maharashtra</p>

                        <p>📅 30 September 2026</p>

                        <p>⏰ 11:00 AM – 3:00 PM</p>

                    </div>

                    <div class="mt-5">

                        <div class="flex justify-between
                                    text-sm mb-2">

                            <span>
                                Registration
                            </span>

                            <span class="font-semibold">
                                32 / 40
                            </span>

                        </div>

                        <div class="w-full bg-gray-200
                                    rounded-full h-2.5">

                            <div class="bg-blue-500
                                        h-2.5 rounded-full
                                        w-4/5">
                            </div>

                        </div>

                    </div>

                    <button class="w-full mt-6
                                   bg-blue-600
                                   hover:bg-blue-700
                                   text-white py-3
                                   rounded-xl
                                   font-semibold">

                        Manage Event

                    </button>

                </div>

            </div>

        </div>

    </div>


    <!-- ================= ADMIN MOTIVATION BANNER ================= -->

    <div class="mt-16">

        <div class="bg-gradient-to-r
                    from-green-700 via-emerald-600
                    to-blue-700
                    rounded-[32px] p-10
                    text-center text-white
                    shadow-2xl">

            <h2 class="text-4xl md:text-5xl
                       font-black leading-tight">

                🌿 Empower Volunteers,
                Create Impact!

            </h2>

            <p class="mt-5 text-lg text-green-100
                      max-w-3xl mx-auto leading-8">

                Manage meaningful opportunities,
                connect volunteers with communities
                and help make every event impactful.

            </p>

            <div class="flex flex-wrap
                        justify-center gap-4 mt-8">

                <a href="#"
                   class="bg-yellow-400 text-black
                          px-8 py-3 rounded-full
                          font-bold
                          hover:bg-yellow-300 transition">

                    ➕ Create New Event

                </a>

                <a href="#"
                   class="border border-white
                          px-8 py-3 rounded-full
                          hover:bg-white
                          hover:text-green-700
                          transition">

                    📋 Review Applications

                </a>

            </div>

        </div>

    </div>


</div>

</div>

@endsection
