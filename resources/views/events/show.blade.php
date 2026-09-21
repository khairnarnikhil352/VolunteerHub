@extends('layouts.student')

@section('content')

@php
    $percentage = ($event->capacity > 0)
        ? ($event->filled_slots / $event->capacity) * 100
        : 0;
@endphp

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-100">

    {{-- HERO IMAGE --}}

    <section class="relative h-[450px] overflow-hidden rounded-b-[40px]">

        @if($event->banner)
            <img src="{{ asset('images/events/'.$event->banner) }}"
            alt="{{ $event->title }}"
            class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-700 brightness-95 contrast-110 saturate-125">
        @else
            <img src="{{ asset('images/events/default.jpg') }}"
                alt="Volunteer Event"
                class="w-full h-full object-cover">
        @endif

        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
        <!-- Event Info -->
        <div class="absolute bottom-10 left-10 text-white max-w-2xl">

            <span class="bg-green-500 px-4 py-2 rounded-full text-sm font-bold">
                {{ $event->category }}
            </span>

            <h1 class="text-5xl font-black mt-5">
                {{ $event->title }}
            </h1>

            <p class="mt-3 text-lg text-green-100">
                📍 {{ $event->city }} • {{ $event->venue }}
            </p>

            <div class="flex flex-wrap gap-4 mt-5">

                <span class="bg-white/20 backdrop-blur-lg px-4 py-2 rounded-full">
                    📅 {{ $event->event_date->format('d M Y') }}
                </span>

                <span class="bg-white/20 backdrop-blur-lg px-4 py-2 rounded-full">
                    ⏰ {{ date('h:i A', strtotime($event->start_time)) }}
                </span>

            </div>

        </div>

    </section>
        

    {{-- CONTENT --}}
    <div class="max-w-7xl mx-auto px-6 py-10 grid lg:grid-cols-3 gap-8">

        {{-- LEFT --}}
        <div class="lg:col-span-2 space-y-8">

            {{-- ABOUT EVENT --}}
            <div class="bg-white rounded-3xl shadow-lg p-8">

                <h2 class="text-3xl font-black text-green-700 mb-5">
                    🌿 About This Event
                </h2>

                <p class="text-gray-600 leading-8">
                    {{ $event->description }}
                </p>

            </div>

            {{-- EVENT DETAILS --}}
            <div class="bg-white rounded-3xl shadow-lg p-8">

                <h2 class="text-3xl font-black text-green-700 mb-6">
                    📅 Event Information
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div class="bg-green-50 p-5 rounded-2xl">
                        <p class="text-gray-500">Date</p>
                        <h3 class="font-bold text-lg">
                            {{ $event->event_date->format('d F Y') }}
                        </h3>
                    </div>

                    <div class="bg-green-50 p-5 rounded-2xl">
                        <p class="text-gray-500">Time</p>
                        <h3 class="font-bold text-lg">
                            {{ date('h:i A', strtotime($event->start_time)) }}
                            -
                            {{ date('h:i A', strtotime($event->end_time)) }}
                        </h3>
                    </div>

                    <div class="bg-green-50 p-5 rounded-2xl">
                        <p class="text-gray-500">City</p>
                        <h3 class="font-bold text-lg">
                            {{ $event->city }}
                        </h3>
                    </div>

                    <div class="bg-green-50 p-5 rounded-2xl">
                        <p class="text-gray-500">Venue</p>
                        <h3 class="font-bold text-lg">
                            {{ $event->venue }}
                        </h3>
                    </div>

                </div>

            </div>

            {{-- ORGANIZER --}}
            <div class="bg-white rounded-3xl shadow-lg p-8">

                <h2 class="text-3xl font-black text-green-700 mb-6">
                    🤝 Organizer
                </h2>

                <div class="flex items-center gap-5">

                    <div class="w-20 h-20 rounded-full bg-green-600 flex items-center justify-center text-white text-3xl">
                        🌿
                    </div>

                    <div>
                        <h3 class="text-xl font-bold">VolunteerHub NGO</h3>
                        <p class="text-gray-500">Community Service Organization</p>
                    </div>

                </div>

            </div>

        </div>

        {{-- RIGHT SIDEBAR --}}
        <div class="space-y-6">

            {{-- JOIN CARD --}}
            <div class="bg-white rounded-3xl shadow-xl p-6 sticky top-24">

                <h2 class="text-2xl font-black text-green-700 mb-6">
                    🎯 Registration Status
                </h2>

                <div class="space-y-4 text-sm">

                    <div class="flex justify-between">
                        <span>Capacity</span>
                        <span class="font-bold">
                            {{ $event->filled_slots }}/{{ $event->capacity }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Remaining Slots</span>
                        <span class="font-bold text-green-700">
                            {{ $remaining }}
                        </span>
                    </div>

                </div>

                {{-- Progress Bar --}}
                <div class="mt-5">

                    <div class="w-full h-4 bg-gray-200 rounded-full overflow-hidden">

                        <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-full rounded-full"
                             style="width: {{ $percentage }}%">
                        </div>

                    </div>

                    <p class="text-center mt-2 text-green-700 font-semibold">
                        {{ round($percentage) }}% Filled
                    </p>

                </div>

                {{-- Join Button --}}
                @if($remaining > 0)

                   <a href="{{ route('events.register', $event->id) }}"
                    class="flex-1 text-center bg-gradient-to-r from-green-600 to-emerald-600 text-white py-3 rounded-xl font-bold shadow-lg hover:scale-105 transition">
                        🤝 Join Now
                    </a>

                @else

                    <button class="w-full mt-6 bg-gray-300 text-gray-600 py-4 rounded-2xl font-bold cursor-not-allowed">
                        Event Full
                    </button>

                @endif

                <a href="{{ route('events.index') }}"
                   class="block text-center mt-4 text-green-700 font-semibold hover:underline">

                    ← Back to Events

                </a>

            </div>

        </div>

    </div>

</div>

@endsection

