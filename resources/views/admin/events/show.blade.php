@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-blue-50">

    {{-- ========================================================= --}}
    {{-- HERO SECTION --}}
    {{-- ========================================================= --}}

    <section class="relative overflow-hidden rounded-b-[45px]
                    bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500
                    text-white shadow-2xl">

        {{-- Decorative Circles --}}
        <div class="absolute -top-24 -right-20 w-96 h-96
                    bg-white/10 rounded-full blur-3xl"></div>

        <div class="absolute -bottom-32 -left-20 w-96 h-96
                    bg-green-300/20 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-14
                    relative z-10">

            <div class="flex flex-col lg:flex-row
                        justify-between items-start lg:items-center gap-8">

                {{-- Hero Content --}}
                <div>

                    <span class="inline-block bg-white/20 backdrop-blur
                                 px-5 py-2 rounded-full
                                 text-sm font-semibold border border-white/20">

                        🛡️ VolunteerHub Admin Portal

                    </span>

                    <h1 class="text-5xl lg:text-6xl
                               font-black mt-6 leading-tight">

                        Event Details

                    </h1>

                    <p class="mt-5 text-green-100
                              text-lg max-w-2xl leading-8">

                        View complete information, volunteer capacity,
                        schedule and details of this event.

                    </p>

                    <div class="flex flex-wrap gap-4 mt-8">

                        {{-- Back --}}
                        <a href="{{ route('admin.events.index') }}"
                           class="bg-white text-green-700
                                  px-7 py-3 rounded-xl
                                  font-bold shadow-xl
                                  hover:bg-green-50
                                  transition hover:-translate-y-1">

                            ← Back to Events

                        </a>

                        {{-- Edit --}}
                        <a href="{{ route('admin.events.edit', $event->id) }}"
                           class="bg-yellow-400 hover:bg-yellow-300
                                  text-black px-7 py-3 rounded-xl
                                  font-bold shadow-xl
                                  transition hover:-translate-y-1">

                            ✏️ Edit Event

                        </a>

                    </div>

                </div>


                {{-- Hero Side Card --}}
                <div class="w-full lg:w-80">

                    <div class="bg-white/15 backdrop-blur-xl
                                border border-white/20
                                rounded-[30px] p-7 shadow-2xl">

                        <div class="text-center">

                            <div class="w-20 h-20 mx-auto
                                        bg-white rounded-3xl
                                        flex items-center justify-center
                                        text-5xl shadow-xl">

                                📅

                            </div>

                            <h2 class="text-2xl font-black mt-5">

                                Event Overview

                            </h2>

                            <p class="text-green-100 text-sm mt-2">

                                Volunteer opportunity details

                            </p>

                        </div>


                        <div class="grid grid-cols-2 gap-3 mt-6">

                            <div class="bg-white/10 rounded-2xl p-4 text-center">

                                <p class="text-2xl font-black">

                                    {{ $event->capacity }}

                                </p>

                                <p class="text-xs text-green-100">

                                    Capacity

                                </p>

                            </div>


                            <div class="bg-white/10 rounded-2xl p-4 text-center">

                                <p class="text-2xl font-black">

                                    {{ $event->filled_slots }}

                                </p>

                                <p class="text-xs text-green-100">

                                    Registered

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Hero Bottom Info --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-10">

                <div class="bg-white/10 rounded-2xl p-4">

                    <p class="text-green-200 text-xs">

                        📍 Location

                    </p>

                    <p class="font-bold mt-1">

                        {{ $event->city }}

                    </p>

                </div>


                <div class="bg-white/10 rounded-2xl p-4">

                    <p class="text-green-200 text-xs">

                        📅 Date

                    </p>

                    <p class="font-bold mt-1">

                        {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}

                    </p>

                </div>


                <div class="bg-white/10 rounded-2xl p-4">

                    <p class="text-green-200 text-xs">

                        ⏰ Start Time

                    </p>

                    <p class="font-bold mt-1">

                        {{ date('h:i A', strtotime($event->start_time)) }}

                    </p>

                </div>


                <div class="bg-white/10 rounded-2xl p-4">

                    <p class="text-green-200 text-xs">

                        📌 Status

                    </p>

                    <p class="font-bold mt-1">

                        {{ $event->status }}

                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================================= --}}

    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">


        {{-- ===================================================== --}}
        {{-- EVENT TITLE --}}
        {{-- ===================================================== --}}

        <div class="bg-white rounded-[30px]
                    shadow-xl border border-green-100
                    p-7 mb-8">

            <div class="flex flex-col md:flex-row
                        justify-between gap-5">

                <div>

                    <span class="inline-block
                                 bg-green-100 text-green-700
                                 px-4 py-1.5 rounded-full
                                 text-xs font-bold">

                        {{ $event->category }}

                    </span>

                    <h2 class="text-4xl font-black
                               text-gray-800 mt-4">

                        {{ $event->title }}

                    </h2>

                    <p class="text-gray-500 mt-2">

                        Complete event information and volunteer details

                    </p>

                </div>


                {{-- Status --}}
                @php

                    $statusStyle = match($event->status) {

                        'Upcoming' =>
                            'bg-green-100 text-green-700',

                        'Ongoing' =>
                            'bg-yellow-100 text-yellow-700',

                        'Completed' =>
                            'bg-blue-100 text-blue-700',

                        'Cancelled' =>
                            'bg-red-100 text-red-700',

                        default =>
                            'bg-gray-100 text-gray-700',

                    };

                @endphp


                <div>

                    <span class="{{ $statusStyle }}
                                 px-5 py-2 rounded-full
                                 text-sm font-bold">

                        {{ $event->status }}

                    </span>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- BANNER + ABOUT --}}
        {{-- ===================================================== --}}

        <div class="grid lg:grid-cols-3 gap-8">


            {{-- Banner --}}
            <div class="lg:col-span-2
                        bg-white rounded-[30px]
                        shadow-xl overflow-hidden">

                @if($event->banner)

                    <div class="relative h-80 overflow-hidden">

                        <img src="{{ asset('images/events/'.$event->banner) }}"
                             alt="{{ $event->title }}"
                             class="w-full h-full object-cover">

                        <div class="absolute inset-0
                                    bg-gradient-to-t
                                    from-black/50
                                    via-transparent
                                    to-transparent">
                        </div>

                        <div class="absolute bottom-5 left-6">

                            <span class="bg-white/90
                                         text-green-700
                                         px-4 py-2 rounded-full
                                         text-sm font-bold">

                                🌿 VolunteerHub Event

                            </span>

                        </div>

                    </div>

                @else

                    <div class="h-80
                                bg-gradient-to-br
                                from-green-500
                                via-emerald-500
                                to-teal-600
                                flex items-center
                                justify-center
                                text-8xl">

                        🌿

                    </div>

                @endif

            </div>


            {{-- Quick Info --}}
            <div class="bg-white rounded-[30px]
                        shadow-xl p-7
                        border border-green-100">

                <h3 class="text-2xl font-black text-gray-800">

                    ⚡ Quick Info

                </h3>

                <div class="space-y-4 mt-6">

                    <div class="bg-green-50 rounded-2xl p-4">

                        <p class="text-xs text-gray-500">

                            📍 City

                        </p>

                        <p class="font-bold text-green-700 mt-1">

                            {{ $event->city }}

                        </p>

                    </div>


                    <div class="bg-blue-50 rounded-2xl p-4">

                        <p class="text-xs text-gray-500">

                            🏢 Venue

                        </p>

                        <p class="font-bold text-blue-700 mt-1">

                            {{ $event->venue }}

                        </p>

                    </div>


                    <div class="bg-orange-50 rounded-2xl p-4">

                        <p class="text-xs text-gray-500">

                            📅 Event Date

                        </p>

                        <p class="font-bold text-orange-600 mt-1">

                            {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}

                        </p>

                    </div>


                    <div class="bg-purple-50 rounded-2xl p-4">

                        <p class="text-xs text-gray-500">

                            ⏰ Time

                        </p>

                        <p class="font-bold text-purple-700 mt-1">

                            {{ date('h:i A', strtotime($event->start_time)) }}
                            -
                            {{ date('h:i A', strtotime($event->end_time)) }}

                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- ABOUT EVENT --}}
        {{-- ===================================================== --}}

        <div class="bg-white rounded-[30px]
                    shadow-xl p-8 mt-8
                    border border-green-100">

            <div class="flex items-center gap-4">

                <div class="w-14 h-14
                            bg-green-100
                            rounded-2xl
                            flex items-center justify-center
                            text-3xl">

                    📖

                </div>

                <div>

                    <h2 class="text-2xl font-black text-gray-800">

                        About This Event

                    </h2>

                    <p class="text-gray-500 text-sm">

                        Event description

                    </p>

                </div>

            </div>


            <div class="mt-6
                        bg-green-50
                        rounded-2xl p-6">

                <p class="text-gray-700
                          leading-8 whitespace-pre-line">

                    {{ $event->description }}

                </p>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- LOCATION + DATE TIME --}}
        {{-- ===================================================== --}}

        <div class="grid md:grid-cols-2 gap-8 mt-8">


            {{-- Location --}}
            <div class="bg-white rounded-[30px]
                        shadow-xl p-7
                        border border-green-100">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14
                                bg-blue-100
                                rounded-2xl
                                flex items-center justify-center
                                text-3xl">

                        📍

                    </div>

                    <div>

                        <h2 class="text-2xl font-black text-gray-800">

                            Event Location

                        </h2>

                        <p class="text-gray-500 text-sm">

                            Where the event will take place

                        </p>

                    </div>

                </div>


                <div class="mt-6 space-y-4">

                    <div class="bg-blue-50 rounded-2xl p-5">

                        <p class="text-sm text-gray-500">

                            City

                        </p>

                        <p class="text-xl font-black text-blue-700 mt-1">

                            {{ $event->city }}

                        </p>

                    </div>


                    <div class="bg-green-50 rounded-2xl p-5">

                        <p class="text-sm text-gray-500">

                            Venue

                        </p>

                        <p class="text-xl font-black text-green-700 mt-1">

                            {{ $event->venue }}

                        </p>

                    </div>

                </div>

            </div>


            {{-- Date & Time --}}
            <div class="bg-white rounded-[30px]
                        shadow-xl p-7
                        border border-green-100">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14
                                bg-orange-100
                                rounded-2xl
                                flex items-center justify-center
                                text-3xl">

                        📅

                    </div>

                    <div>

                        <h2 class="text-2xl font-black text-gray-800">

                            Date & Time

                        </h2>

                        <p class="text-gray-500 text-sm">

                            Event schedule

                        </p>

                    </div>

                </div>


                <div class="mt-6 space-y-4">

                    <div class="bg-orange-50 rounded-2xl p-5">

                        <p class="text-sm text-gray-500">

                            Event Date

                        </p>

                        <p class="text-xl font-black text-orange-600 mt-1">

                            {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}

                        </p>

                    </div>


                    <div class="bg-purple-50 rounded-2xl p-5">

                        <p class="text-sm text-gray-500">

                            Event Time

                        </p>

                        <p class="text-xl font-black text-purple-700 mt-1">

                            {{ date('h:i A', strtotime($event->start_time)) }}
                            -
                            {{ date('h:i A', strtotime($event->end_time)) }}

                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- VOLUNTEER CAPACITY --}}
        {{-- ===================================================== --}}

        @php

            $capacity = (int) $event->capacity;

            $filled = (int) $event->filled_slots;

            $remaining = max(0, $capacity - $filled);

            $percentage = $capacity > 0
                ? min(100, ($filled / $capacity) * 100)
                : 0;

        @endphp


        <div class="bg-white rounded-[30px]
                    shadow-xl p-8 mt-8
                    border border-green-100">

            <div class="flex flex-col md:flex-row
                        justify-between
                        md:items-center gap-5">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14
                                bg-green-100
                                rounded-2xl
                                flex items-center justify-center
                                text-3xl">

                        👥

                    </div>

                    <div>

                        <h2 class="text-2xl font-black text-gray-800">

                            Volunteer Capacity

                        </h2>

                        <p class="text-gray-500 text-sm">

                            Registration overview

                        </p>

                    </div>

                </div>


                <div class="text-right">

                    <p class="text-3xl font-black text-green-700">

                        {{ $filled }} / {{ $capacity }}

                    </p>

                    <p class="text-sm text-gray-500">

                        Volunteers Registered

                    </p>

                </div>

            </div>


            {{-- Progress --}}
            <div class="mt-7">

                <div class="flex justify-between
                            text-sm mb-2">

                    <span class="font-semibold text-gray-700">

                        Registration Progress

                    </span>

                    <span class="font-bold text-green-700">

                        {{ round($percentage) }}%

                    </span>

                </div>


                <div class="w-full bg-gray-200
                            rounded-full h-4 overflow-hidden">

                    <div class="bg-gradient-to-r
                                from-green-500
                                via-emerald-500
                                to-teal-500
                                h-full rounded-full
                                transition-all duration-700"
                         style="width: {{ $percentage }}%">

                    </div>

                </div>


                <div class="flex justify-between mt-3">

                    <span class="text-sm text-gray-500">

                        {{ $filled }} Filled

                    </span>

                    <span class="font-bold text-green-600">

                        {{ $remaining }} Slots Available

                    </span>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- EVENT SUMMARY --}}
        {{-- ===================================================== --}}

        <div class="bg-gradient-to-r
                    from-green-700 via-emerald-600 to-teal-500
                    rounded-[35px]
                    p-8 mt-8
                    text-white shadow-2xl">

            <div class="flex flex-col lg:flex-row
                        justify-between
                        items-start lg:items-center gap-7">

                <div>

                    <span class="text-green-200
                                 text-sm font-bold">

                        🌿 VOLUNTEERHUB EVENT

                    </span>

                    <h2 class="text-3xl font-black mt-2">

                        {{ $event->title }}

                    </h2>

                    <p class="text-green-100 mt-2">

                        {{ $event->category }} •
                        {{ $event->city }} •
                        {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}

                    </p>

                </div>


                <div class="flex flex-wrap gap-3">

                    <a href="{{ route('admin.events.index') }}"
                       class="bg-white
                              text-green-700
                              px-6 py-3
                              rounded-xl
                              font-bold
                              hover:bg-green-50
                              transition">

                        ← All Events

                    </a>


                    <a href="{{ route('admin.events.edit', $event->id) }}"
                       class="bg-yellow-400
                              hover:bg-yellow-300
                              text-black
                              px-6 py-3
                              rounded-xl
                              font-bold
                              transition">

                        ✏️ Edit Event

                    </a>

                </div>

            </div>

        </div>


    </div>

</div>

@endsection