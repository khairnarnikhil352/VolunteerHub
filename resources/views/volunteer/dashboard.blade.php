@extends('layouts.student')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-50">


    {{-- ========================================================= --}}
    {{-- HERO SECTION --}}
    {{-- ========================================================= --}}

    <section class="relative overflow-hidden bg-gradient-to-r from-green-800 via-emerald-700 to-teal-700 text-white rounded-b-[45px] shadow-2xl">

        {{-- Decorative Background --}}
        <div class="absolute -top-28 -right-20 w-80 h-80 bg-white/10 rounded-full"></div>

        <div class="absolute -bottom-32 -left-20 w-80 h-80 bg-emerald-400/10 rounded-full"></div>

        <div class="absolute top-1/2 right-1/3 w-32 h-32 bg-teal-300/10 rounded-full blur-2xl"></div>


        <div class="relative max-w-7xl mx-auto px-6 py-12">

            <div class="grid lg:grid-cols-3 gap-10 items-center">


                {{-- ================================================= --}}
                {{-- HERO TEXT --}}
                {{-- ================================================= --}}

                <div class="lg:col-span-2">

                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-4 py-2 rounded-full text-sm font-semibold">

                        <span class="w-2 h-2 bg-green-300 rounded-full animate-pulse"></span>

                        Student Volunteer Portal

                    </div>


                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black mt-6 leading-tight">

                        Welcome Back,

                        <span class="text-yellow-300">

                            {{ $user->name }}

                        </span>

                        👋

                    </h1>


                    <p class="mt-5 text-green-100 text-lg max-w-2xl leading-8">

                        Continue your volunteering journey, track your impact,
                        manage your events and build a better community with
                        VolunteerHub.

                    </p>


                    <div class="flex flex-wrap gap-4 mt-8">

                        <a href="{{ route('events.index') }}"
                           class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-gray-900 px-7 py-3.5 rounded-full font-bold shadow-xl transition hover:-translate-y-1">

                            🌍 Browse Events

                        </a>


                        <a href="#schedule"
                           class="inline-flex items-center gap-2 border border-white/50 hover:bg-white hover:text-green-800 px-7 py-3.5 rounded-full font-bold transition">

                            📅 My Schedule

                        </a>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- PROFILE CARD --}}
                {{-- ================================================= --}}

                <div>

                    <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-[30px] p-7 shadow-2xl">

                        <div class="text-center">


                            {{-- Profile --}}
                            @if($user->profile_photo)

                                <img
                                    src="{{ asset('storage/' . $user->profile_photo) }}"
                                    alt="Profile Photo"
                                    class="w-24 h-24 mx-auto rounded-full object-cover border-4 border-white shadow-xl">

                            @else

                                <div class="w-24 h-24 mx-auto rounded-full bg-white text-green-700 flex items-center justify-center text-4xl font-black shadow-xl">

                                    {{ strtoupper(substr($user->name, 0, 1)) }}

                                </div>

                            @endif


                            <h2 class="text-2xl font-bold mt-4">

                                {{ $user->name }}

                            </h2>


                            <p class="text-green-100 text-sm break-all">

                                {{ $user->email }}

                            </p>


                            <div class="inline-flex items-center gap-2 mt-4 bg-green-300 text-green-950 px-4 py-2 rounded-full text-xs font-bold">

                                {{ $badgeIcon }}

                                {{ $badge }}

                            </div>

                        </div>


                        {{-- Mini Stats --}}
                        <div class="grid grid-cols-2 gap-4 mt-7">


                            <div class="bg-white/10 rounded-2xl p-4 text-center border border-white/10">

                                <div class="text-2xl font-black">

                                    {{ number_format($volunteerHours, 0) }}

                                </div>

                                <div class="text-xs text-green-100 mt-1">

                                    Volunteer Hours

                                </div>

                            </div>


                            <div class="bg-white/10 rounded-2xl p-4 text-center border border-white/10">

                                <div class="text-2xl font-black">

                                    {{ $eventsJoined }}

                                </div>

                                <div class="text-xs text-green-100 mt-1">

                                    Events Joined

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================================= --}}

    <main class="max-w-7xl mx-auto px-6 py-12">


        {{-- ===================================================== --}}
        {{-- DASHBOARD HEADER --}}
        {{-- ===================================================== --}}

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5 mb-8">

            <div>

                <div class="inline-flex items-center gap-2 text-green-700 text-sm font-bold mb-2">

                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>

                    VOLUNTEER OVERVIEW

                </div>


                <h2 class="text-3xl md:text-4xl font-black text-gray-900">

                    My Volunteer Dashboard

                </h2>


                <p class="text-gray-500 mt-2">

                    Overview of your volunteering journey and activities.

                </p>

            </div>


            <div class="bg-white border border-green-100 shadow-sm px-5 py-3 rounded-2xl">

                <div class="text-xs text-gray-400 font-semibold">

                    TODAY

                </div>

                <div class="text-green-700 font-bold">

                    {{ now()->format('l, d M Y') }}

                </div>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- STAT CARDS --}}
        {{-- ===================================================== --}}

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">


            {{-- Upcoming --}}
            <div class="group bg-white rounded-[28px] p-6 border border-green-100 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition">

                <div class="flex justify-between items-start">

                    <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">

                        📅

                    </div>

                    <span class="text-xs font-bold bg-green-50 text-green-700 px-3 py-1.5 rounded-full">

                        Upcoming

                    </span>

                </div>


                <p class="text-gray-500 mt-6">

                    Upcoming Events

                </p>


                <h3 class="text-4xl font-black text-green-600 mt-1">

                    {{ $upcomingEvents }}

                </h3>


                <p class="text-sm text-gray-400 mt-2">

                    Approved events coming up.

                </p>

            </div>



            {{-- Joined --}}
            <div class="group bg-white rounded-[28px] p-6 border border-blue-100 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition">

                <div class="flex justify-between items-start">

                    <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">

                        🤝

                    </div>

                    <span class="text-xs font-bold bg-blue-50 text-blue-700 px-3 py-1.5 rounded-full">

                        Active

                    </span>

                </div>


                <p class="text-gray-500 mt-6">

                    Events Joined

                </p>


                <h3 class="text-4xl font-black text-blue-600 mt-1">

                    {{ $eventsJoined }}

                </h3>


                <p class="text-sm text-gray-400 mt-2">

                    Total approved/completed events.

                </p>

            </div>



            {{-- Hours --}}
            <div class="group bg-white rounded-[28px] p-6 border border-orange-100 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition">

                <div class="flex justify-between items-start">

                    <div class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center text-3xl">

                        ⏱️

                    </div>

                    <span class="text-xs font-bold bg-orange-50 text-orange-700 px-3 py-1.5 rounded-full">

                        {{ $hoursProgress }}%

                    </span>

                </div>


                <p class="text-gray-500 mt-6">

                    Volunteer Hours

                </p>


                <h3 class="text-4xl font-black text-orange-500 mt-1">

                    {{ number_format($volunteerHours, 0) }}

                </h3>


                <p class="text-sm text-gray-400 mt-2">

                    Goal: {{ $hoursGoal }} hours

                </p>

            </div>



            {{-- Certificates --}}
            <div class="group bg-white rounded-[28px] p-6 border border-purple-100 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition">

                <div class="flex justify-between items-start">

                    <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-3xl">

                        🏆

                    </div>

                    <span class="text-xs font-bold bg-purple-50 text-purple-700 px-3 py-1.5 rounded-full">

                        {{ $badge }}

                    </span>

                </div>


                <p class="text-gray-500 mt-6">

                    Certificates Earned

                </p>


                <h3 class="text-4xl font-black text-purple-600 mt-1">

                    {{ $certificates }}

                </h3>


                <p class="text-sm text-gray-400 mt-2">

                    Based on completed events.

                </p>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- QUICK ACTIONS --}}
        {{-- ===================================================== --}}

        <section class="mt-14">

            <div class="mb-6">

                <span class="text-green-600 text-sm font-bold">

                    QUICK ACCESS

                </span>


                <h2 class="text-3xl font-black text-gray-900 mt-1">

                    Everything You Need ⚡

                </h2>


                <p class="text-gray-500 mt-2">

                    Quickly access your most important volunteer activities.

                </p>

            </div>


            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">


                {{-- Browse --}}
                <a href="{{ route('events.index') }}"
                   class="group relative overflow-hidden bg-gradient-to-br from-green-500 to-emerald-700 rounded-[28px] p-7 text-white shadow-xl hover:-translate-y-2 transition">

                    <div class="absolute -right-8 -top-8 w-28 h-28 rounded-full bg-white/10"></div>


                    <div class="text-5xl group-hover:scale-110 transition">

                        🌍

                    </div>


                    <h3 class="text-xl font-bold mt-5">

                        Browse Events

                    </h3>


                    <p class="text-green-100 text-sm mt-2">

                        Explore available volunteer opportunities.

                    </p>

                </a>



                {{-- Schedule --}}
                <a href="#schedule"
                   class="group relative overflow-hidden bg-gradient-to-br from-teal-500 to-cyan-700 rounded-[28px] p-7 text-white shadow-xl hover:-translate-y-2 transition">

                    <div class="text-5xl group-hover:scale-110 transition">

                        📅

                    </div>


                    <h3 class="text-xl font-bold mt-5">

                        My Schedule

                    </h3>


                    <p class="text-teal-100 text-sm mt-2">

                        View your approved upcoming events.

                    </p>

                </a>



                {{-- Certificates --}}
                <a href="#activity"
                   class="group relative overflow-hidden bg-gradient-to-br from-indigo-500 to-purple-700 rounded-[28px] p-7 text-white shadow-xl hover:-translate-y-2 transition">

                    <div class="text-5xl group-hover:scale-110 transition">

                        📜

                    </div>


                    <h3 class="text-xl font-bold mt-5">

                        Certificates

                    </h3>


                    <p class="text-indigo-100 text-sm mt-2">

                        Track your completed volunteer activities.

                    </p>

                </a>



                {{-- Progress --}}
                <a href="#progress"
                   class="group relative overflow-hidden bg-gradient-to-br from-orange-400 to-red-600 rounded-[28px] p-7 text-white shadow-xl hover:-translate-y-2 transition">

                    <div class="text-5xl group-hover:scale-110 transition">

                        📈

                    </div>


                    <h3 class="text-xl font-bold mt-5">

                        My Progress

                    </h3>


                    <p class="text-orange-100 text-sm mt-2">

                        Track your volunteer goals.

                    </p>

                </a>

            </div>

        </section>



        {{-- ===================================================== --}}
        {{-- PROGRESS --}}
        {{-- ===================================================== --}}

        <section id="progress" class="mt-16">


            <div class="mb-7">

                <span class="text-green-600 text-sm font-bold">

                    YOUR JOURNEY

                </span>


                <h2 class="text-3xl font-black text-gray-900 mt-1">

                    Volunteer Progress 🎯

                </h2>


                <p class="text-gray-500 mt-2">

                    See how far you have progressed as a volunteer.

                </p>

            </div>



            <div class="grid lg:grid-cols-3 gap-7">


                {{-- Progress --}}
                <div class="lg:col-span-2 bg-white rounded-[30px] p-8 shadow-xl border border-gray-100">


                    <div class="flex justify-between items-center mb-8">

                        <div>

                            <h3 class="text-2xl font-black text-gray-800">

                                Community Impact

                            </h3>

                            <p class="text-gray-500 text-sm mt-1">

                                Based on your completed volunteering activities.

                            </p>

                        </div>


                        <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center text-2xl">

                            📊

                        </div>

                    </div>



                    {{-- Hours --}}
                    <div class="mb-9">

                        <div class="flex justify-between mb-3">

                            <span class="font-bold text-gray-700">

                                Volunteer Hours

                            </span>


                            <span class="font-black text-green-600">

                                {{ number_format($volunteerHours, 0) }}
                                /
                                {{ $hoursGoal }}

                            </span>

                        </div>


                        <div class="w-full h-4 bg-gray-100 rounded-full overflow-hidden">

                            <div
                                class="h-full bg-gradient-to-r from-green-500 to-emerald-600 rounded-full transition-all duration-700"
                                style="width: {{ $hoursProgress }}%">
                            </div>

                        </div>


                        <p class="text-sm text-gray-500 mt-2">

                            @if($remainingHours > 0)

                                {{ $remainingHours }} more hours to reach your goal.

                            @else

                                🎉 You completed your hours goal!

                            @endif

                        </p>

                    </div>



                    {{-- Events --}}
                    <div>

                        <div class="flex justify-between mb-3">

                            <span class="font-bold text-gray-700">

                                Event Participation

                            </span>


                            <span class="font-black text-blue-600">

                                {{ $eventsJoined }}
                                /
                                {{ $eventGoal }}

                            </span>

                        </div>


                        <div class="w-full h-4 bg-gray-100 rounded-full overflow-hidden">

                            <div
                                class="h-full bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full transition-all duration-700"
                                style="width: {{ $eventProgress }}%">
                            </div>

                        </div>


                        <p class="text-sm text-gray-500 mt-2">

                            @if($remainingEvents > 0)

                                {{ $remainingEvents }} more events to reach your goal.

                            @else

                                🎉 You completed your event goal!

                            @endif

                        </p>

                    </div>

                </div>



                {{-- Badge --}}
                <div class="relative overflow-hidden bg-gradient-to-br from-green-700 via-emerald-600 to-teal-700 rounded-[30px] p-8 text-white shadow-xl">


                    <div class="absolute -right-16 -top-16 w-44 h-44 rounded-full bg-white/10"></div>


                    <div class="relative">

                        <p class="text-green-100 text-sm font-semibold">

                            CURRENT ACHIEVEMENT

                        </p>


                        <div class="text-7xl mt-8">

                            {{ $badgeIcon }}

                        </div>


                        <h3 class="text-3xl font-black mt-5">

                            {{ $badge }}

                        </h3>


                        <p class="text-green-100 mt-3 leading-7">

                            Keep participating in community activities
                            and continue building your volunteer journey.

                        </p>


                        <div class="mt-8 bg-white/10 rounded-2xl p-4">


                            <div class="flex justify-between text-sm">

                                <span>Events</span>

                                <span class="font-bold">

                                    {{ $eventsJoined }}

                                </span>

                            </div>


                            <div class="flex justify-between text-sm mt-3">

                                <span>Hours</span>

                                <span class="font-bold">

                                    {{ number_format($volunteerHours, 0) }}

                                </span>

                            </div>


                            <div class="flex justify-between text-sm mt-3">

                                <span>Certificates</span>

                                <span class="font-bold">

                                    {{ $certificates }}

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- ===================================================== --}}
        {{-- UPCOMING SCHEDULE --}}
        {{-- ===================================================== --}}

        <section id="schedule" class="mt-16">


            <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-4 mb-7">

                <div>

                    <span class="text-green-600 text-sm font-bold">

                        YOUR CALENDAR

                    </span>


                    <h2 class="text-3xl font-black text-gray-900 mt-1">

                        Upcoming Schedule 📅

                    </h2>


                    <p class="text-gray-500 mt-2">

                        Your approved volunteer events.

                    </p>

                </div>


                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">

                    {{ $upcomingEvents }} Upcoming

                </span>

            </div>



            <div class="grid lg:grid-cols-2 gap-7">


                {{-- ================================================= --}}
                {{-- CALENDAR --}}
                {{-- ================================================= --}}

                <div class="bg-white rounded-[30px] p-7 shadow-xl border border-gray-100">


                    <div class="flex justify-between items-center mb-7">

                        <div>

                            <h3 class="text-xl font-black text-gray-800">

                                {{ $calendarMonth->format('F Y') }}

                            </h3>


                            <p class="text-gray-400 text-sm mt-1">

                                Registered event dates

                            </p>

                        </div>


                        <div class="w-11 h-11 bg-green-100 rounded-xl flex items-center justify-center">

                            📅

                        </div>

                    </div>



                    <div class="grid grid-cols-7 gap-2 text-center text-xs font-bold text-gray-400 mb-3">

                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>

                    </div>



                    <div class="grid grid-cols-7 gap-2">


                        @foreach($calendarDays as $day)


                            @if(!$day)

                                <div class="aspect-square"></div>

                            @else


                                @php

                                    $date = $calendarMonth
                                        ->copy()
                                        ->day($day)
                                        ->format('Y-m-d');

                                    $isRegistered = in_array(
                                        $date,
                                        $registeredDates
                                    );

                                    $isToday = $date === now()->format('Y-m-d');

                                @endphp


                                <div
                                    class="
                                    aspect-square
                                    rounded-xl
                                    flex items-center justify-center
                                    text-sm font-bold
                                    transition

                                    {{ $isRegistered
                                        ? 'bg-green-600 text-white shadow-md'
                                        : ($isToday
                                            ? 'bg-green-100 text-green-700 ring-2 ring-green-400'
                                            : 'bg-gray-50 text-gray-600 hover:bg-green-50')
                                    }}
                                    ">

                                    {{ $day }}

                                </div>


                            @endif


                        @endforeach

                    </div>



                    <div class="mt-7 flex flex-wrap items-center gap-3 text-sm text-gray-500">

                        <span class="w-3 h-3 rounded-full bg-green-600"></span>

                        Registered event

                        <span class="w-3 h-3 rounded-full bg-green-100 ring-1 ring-green-400 ml-3"></span>

                        Today

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- SCHEDULE LIST --}}
                {{-- ================================================= --}}

                <div class="bg-white rounded-[30px] p-7 shadow-xl border border-gray-100">


                    <div class="flex justify-between items-center mb-6">

                        <h3 class="text-xl font-black text-gray-800">

                            My Event Schedule

                        </h3>


                        <span class="text-sm text-gray-400">

                            Upcoming

                        </span>

                    </div>



                    @forelse($scheduleEvents as $registration)


                        @php
                            $event = $registration->event;
                        @endphp


                        @if($event)

                            <div class="group flex items-center gap-4 p-4 mb-4 bg-green-50/70 hover:bg-green-100 rounded-2xl border border-green-100 transition">


                                <div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center text-2xl">

                                    🌱

                                </div>


                                <div class="flex-1 min-w-0">


                                    <h4 class="font-bold text-gray-800 truncate">

                                        {{ $event->title }}

                                    </h4>


                                    <p class="text-gray-500 text-sm mt-1">

                                        📍
                                        {{ $event->location ?? 'Location not available' }}

                                    </p>


                                    <p class="text-green-600 text-xs font-semibold mt-1">

                                        📅
                                        {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}

                                        @if($event->event_time)

                                            • {{ $event->event_time }}

                                        @endif

                                    </p>

                                </div>


                                <span class="hidden sm:inline-flex bg-green-100 text-green-700 px-3 py-1.5 rounded-full text-xs font-bold">

                                    Approved

                                </span>

                            </div>

                        @endif


                    @empty


                        <div class="text-center py-14">


                            <div class="text-5xl">

                                📅

                            </div>


                            <h4 class="font-bold text-gray-700 mt-4">

                                No Upcoming Events

                            </h4>


                            <p class="text-gray-400 text-sm mt-2">

                                You don't have any approved upcoming events.

                            </p>


                            <a href="{{ route('events.index') }}"
                               class="inline-block mt-5 bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-full text-sm font-bold transition">

                                Browse Events

                            </a>

                        </div>


                    @endforelse

                </div>

            </div>

        </section>



        {{-- ===================================================== --}}
        {{-- RECENT ACTIVITY --}}
        {{-- ===================================================== --}}

        <section id="activity" class="mt-16">


            <div class="mb-7">

                <span class="text-green-600 text-sm font-bold">

                    ACTIVITY

                </span>


                <h2 class="text-3xl font-black text-gray-900 mt-1">

                    Recent Activity 🔔

                </h2>


                <p class="text-gray-500 mt-2">

                    Your latest volunteer registration activities.

                </p>

            </div>



            <div class="bg-white rounded-[30px] shadow-xl border border-gray-100 overflow-hidden">


                @forelse($recentRegistrations as $registration)


                    @php

                        $status = strtolower(
                            $registration->status ?? 'pending'
                        );

                        $statusClasses = match($status) {

                            'approved' =>
                                'bg-green-100 text-green-700',

                            'completed' =>
                                'bg-blue-100 text-blue-700',

                            'rejected' =>
                                'bg-red-100 text-red-700',

                            default =>
                                'bg-yellow-100 text-yellow-700',

                        };


                        $statusIcon = match($status) {

                            'approved' => '✅',

                            'completed' => '🏆',

                            'rejected' => '❌',

                            default => '⏳',

                        };

                    @endphp


                    <div class="flex items-center gap-4 p-5 border-b last:border-b-0 hover:bg-gray-50 transition">


                        <div class="w-12 h-12 rounded-2xl bg-green-100 flex items-center justify-center text-xl">

                            {{ $statusIcon }}

                        </div>


                        <div class="flex-1 min-w-0">


                            <h4 class="font-bold text-gray-800 truncate">

                                {{ $registration->event->title ?? 'Event' }}

                            </h4>


                            <p class="text-sm text-gray-400 mt-1">

                                Registration status:

                                {{ ucfirst($status) }}

                            </p>

                        </div>


                        <span class="px-3 py-1.5 rounded-full text-xs font-bold {{ $statusClasses }}">

                            {{ ucfirst($status) }}

                        </span>

                    </div>


                @empty


                    <div class="text-center py-12">


                        <div class="text-5xl">

                            📋

                        </div>


                        <h3 class="font-bold text-gray-700 mt-4">

                            No Activity Yet

                        </h3>


                        <p class="text-gray-400 text-sm mt-2">

                            Your volunteering activity will appear here.

                        </p>

                    </div>


                @endforelse

            </div>

        </section>



        {{-- ===================================================== --}}
        {{-- MOTIVATION --}}
        {{-- ===================================================== --}}

        <section class="mt-16">


            <div class="relative overflow-hidden bg-gradient-to-r from-green-800 via-emerald-700 to-teal-700 rounded-[35px] p-10 md:p-14 text-center text-white shadow-2xl">


                <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-white/10"></div>

                <div class="absolute -bottom-24 -left-16 w-60 h-60 rounded-full bg-white/10"></div>


                <div class="relative">


                    <div class="text-5xl">

                        💚

                    </div>


                    <h2 class="text-3xl md:text-5xl font-black mt-5">

                        Every Action Creates Impact

                    </h2>


                    <p class="mt-5 text-green-100 max-w-3xl mx-auto leading-8">

                        Your time, energy and participation can help create
                        stronger communities and a better future.

                    </p>


                    <div class="flex flex-wrap justify-center gap-4 mt-8">


                        <a href="{{ route('events.index') }}"
                           class="bg-yellow-400 hover:bg-yellow-300 text-gray-900 px-8 py-3.5 rounded-full font-bold shadow-lg transition">

                            🌍 Find an Event

                        </a>


                        <a href="#progress"
                           class="border border-white/50 hover:bg-white hover:text-green-800 px-8 py-3.5 rounded-full font-bold transition">

                            📈 View My Progress

                        </a>

                    </div>

                </div>

            </div>

        </section>


        <div class="h-8"></div>

    </main>

</div>

@endsection