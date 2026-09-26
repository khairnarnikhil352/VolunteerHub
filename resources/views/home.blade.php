
@extends('layouts.app')

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | UPCOMING EVENT DATA
    |--------------------------------------------------------------------------
    */

    $remainingSlots = 0;
    $capacityPercentage = 0;

    if ($upcomingEvent) {

        $capacity = (int) ($upcomingEvent->capacity ?? 0);
        $filledSlots = (int) ($upcomingEvent->filled_slots ?? 0);

        $remainingSlots = max(0, $capacity - $filledSlots);

        if ($capacity > 0) {
            $capacityPercentage = min(
                100,
                round(($filledSlots / $capacity) * 100)
            );
        }
    }

@endphp


{{-- ========================================================= --}}
{{-- HERO SECTION --}}
{{-- ========================================================= --}}

<section class="relative overflow-hidden bg-gradient-to-br
                from-emerald-700 via-green-600 to-blue-700 text-white">

    {{-- Background Blur --}}
    <div class="absolute -top-20 -left-20 w-96 h-96
                bg-green-400/30 rounded-full blur-3xl">
    </div>

    <div class="absolute bottom-0 right-0 w-96 h-96
                bg-blue-400/30 rounded-full blur-3xl">
    </div>


    <div class="relative max-w-7xl mx-auto px-6 py-24
                grid lg:grid-cols-2 gap-12 items-center">


        {{-- ================= LEFT ================= --}}
        <div>

            <span class="bg-white/20 backdrop-blur-lg
                         px-4 py-2 rounded-full
                         border border-white/20 text-sm">

                🌍 India's Trusted Volunteer Platform

            </span>


            <h1 class="mt-8 text-5xl md:text-7xl
                       font-black leading-tight">

                Together We Can

                <span class="text-yellow-300">
                    Change Lives.
                </span>

            </h1>


            <p class="mt-6 text-lg text-green-100 leading-8">

                VolunteerHub helps volunteers connect with
                community events, discover meaningful
                opportunities and track their volunteer impact.

            </p>


            {{-- BUTTONS --}}
            <div class="mt-10 flex flex-wrap gap-4">

                <a href="{{ route('register') }}"
                   class="bg-yellow-400 text-black
                          px-7 py-3 rounded-full font-bold
                          hover:bg-yellow-300 transition shadow-xl">

                    Join Community

                </a>


                <a href="#events"
                   class="border border-white px-7 py-3
                          rounded-full hover:bg-white
                          hover:text-green-700 transition">

                    Explore Events

                </a>

            </div>


            {{-- ================= MINI STATS ================= --}}
            <div class="grid grid-cols-3 gap-4 mt-12">


                {{-- Volunteers --}}
                <div class="bg-white/10 backdrop-blur-lg
                            rounded-2xl p-4 text-center
                            border border-white/20">

                    <h2 class="text-3xl font-bold">

                        {{ number_format($totalVolunteers) }}

                    </h2>

                    <p class="text-sm text-green-100">
                        Volunteers
                    </p>

                </div>


                {{-- Events --}}
                <div class="bg-white/10 backdrop-blur-lg
                            rounded-2xl p-4 text-center
                            border border-white/20">

                    <h2 class="text-3xl font-bold">

                        {{ number_format($totalEvents) }}

                    </h2>

                    <p class="text-sm text-green-100">
                        Events
                    </p>

                </div>


                {{-- Cities --}}
                <div class="bg-white/10 backdrop-blur-lg
                            rounded-2xl p-4 text-center
                            border border-white/20">

                    <h2 class="text-3xl font-bold">

                        {{ number_format($totalCities) }}

                    </h2>

                    <p class="text-sm text-green-100">
                        Cities
                    </p>

                </div>

            </div>

        </div>


        {{-- ================= RIGHT ================= --}}
        <div class="relative">


            <img
                src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?auto=format&fit=crop&w=900&q=80"
                alt="Volunteer Community"
                class="rounded-[35px] shadow-2xl
                       border-4 border-white/20
                       hover:scale-105 duration-500">


            {{-- ================= DYNAMIC UPCOMING EVENT ================= --}}
            @if($upcomingEvent)

                <div class="absolute -bottom-8 left-6
                            bg-white rounded-3xl p-5
                            shadow-2xl text-gray-800
                            w-72 border border-green-100">

                    {{-- Label --}}
                    <div class="flex items-center
                                justify-between">

                        <p class="text-sm text-gray-500">
                            Upcoming Event
                        </p>

                        <span class="w-2.5 h-2.5
                                     bg-green-500 rounded-full
                                     animate-pulse">
                        </span>

                    </div>


                    {{-- Event --}}
                    <h3 class="font-bold text-green-700
                               mt-2 leading-5">

                        🌳 {{ $upcomingEvent->title }}

                    </h3>


                    {{-- Location --}}
                    <p class="text-sm mt-3 text-gray-600">

                        📍 {{ $upcomingEvent->city ?? 'Location TBA' }}

                    </p>


                    {{-- Date --}}
                    <p class="text-sm text-gray-600">

                        📅
                        {{ \Carbon\Carbon::parse($upcomingEvent->event_date)->format('d M Y') }}

                    </p>


                    {{-- Slots --}}
                    <div class="mt-3">

                        <div class="flex justify-between
                                    items-center">

                            <span class="text-green-700
                                         font-semibold text-sm">

                                {{ $remainingSlots }}
                                Slots Available

                            </span>

                            <span class="text-xs text-gray-400">

                                {{ $upcomingEvent->filled_slots ?? 0 }}
                                /
                                {{ $upcomingEvent->capacity ?? 0 }}

                            </span>

                        </div>


                        {{-- Progress --}}
                        @if(($upcomingEvent->capacity ?? 0) > 0)

                            <div class="w-full bg-gray-100
                                        rounded-full h-2 mt-2
                                        overflow-hidden">

                                <div
                                    class="bg-gradient-to-r
                                           from-green-500
                                           to-emerald-500
                                           h-2 rounded-full"
                                    style="width: {{ $capacityPercentage }}%">
                                </div>

                            </div>

                        @endif

                    </div>


                    {{-- View Event --}}
                    <a href="{{ route('events.index') }}"
                    class="inline-flex items-center gap-2 text-green-700 font-bold hover:text-emerald-700 transition">
                        View Events 
                        <span>→</span>
                    </a>

                </div>

            @else

                {{-- No Event --}}
                <div class="absolute -bottom-6 left-6
                            bg-white rounded-3xl p-6
                            shadow-2xl text-gray-800 w-64">

                    <div class="text-center">

                        <div class="text-4xl">
                            🌿
                        </div>

                        <h3 class="font-bold text-gray-700 mt-2">
                            No Upcoming Events
                        </h3>

                        <p class="text-xs text-gray-500 mt-2">
                            New volunteer opportunities
                            will appear here.
                        </p>

                    </div>

                </div>

            @endif

        </div>

    </div>


    {{-- Wave --}}
    <svg class="absolute bottom-0 left-0 w-full"
         viewBox="0 0 1440 160">

        <path fill="white"
              d="M0,96L60,106C120,117,240,139,360,138C480,139,600,117,720,106C840,96,960,96,1080,106C1200,117,1320,139,1380,149L1440,160V160H0Z"/>

    </svg>

</section>



{{-- ========================================================= --}}
{{-- IMPACT --}}
{{-- ========================================================= --}}

<section class="bg-white py-20">

    <div class="max-w-7xl mx-auto px-6">


        <div class="text-center mb-14">

            <h2 class="text-4xl font-bold text-green-700">
                Our Community Impact
            </h2>

            <p class="text-gray-500 mt-3">
                Real-time statistics from VolunteerHub.
            </p>

        </div>


        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">


            {{-- Volunteers --}}
            <div class="rounded-3xl p-6 text-center text-white
                        bg-gradient-to-br from-green-500 to-green-700
                        shadow-xl hover:-translate-y-2 transition">

                <div class="text-5xl">
                    🌱
                </div>

                <h3 class="text-4xl font-bold mt-3">

                    {{ number_format($totalVolunteers) }}

                </h3>

                <p>
                    Active Volunteers
                </p>

            </div>


            {{-- Events --}}
            <div class="rounded-3xl p-6 text-center text-white
                        bg-gradient-to-br from-blue-500 to-cyan-600
                        shadow-xl hover:-translate-y-2 transition">

                <div class="text-5xl">
                    📅
                </div>

                <h3 class="text-4xl font-bold mt-3">

                    {{ number_format($totalEvents) }}

                </h3>

                <p>
                    Volunteer Events
                </p>

            </div>


            {{-- Upcoming --}}
            <div class="rounded-3xl p-6 text-center text-white
                        bg-gradient-to-br from-orange-400 to-red-500
                        shadow-xl hover:-translate-y-2 transition">

                <div class="text-5xl">
                    🌍
                </div>

                <h3 class="text-4xl font-bold mt-3">

                    {{ number_format($upcomingEventsCount) }}

                </h3>

                <p>
                    Upcoming Events
                </p>

            </div>


            {{-- Completed --}}
            <div class="rounded-3xl p-6 text-center text-white
                        bg-gradient-to-br from-purple-500 to-indigo-600
                        shadow-xl hover:-translate-y-2 transition">

                <div class="text-5xl">
                    🏆
                </div>

                <h3 class="text-4xl font-bold mt-3">

                    {{ number_format($completedEventsCount) }}

                </h3>

                <p>
                    Completed Events
                </p>

            </div>


        </div>

    </div>

</section>



{{{-- ========================================================= --}}
{{-- VOLUNTEER CATEGORIES - PREMIUM ONE ROW --}}
{{-- ========================================================= --}}

<section id="about" class="py-20 bg-gradient-to-b from-green-50 via-white to-green-100">

    <div class="max-w-7xl mx-auto px-6">

        {{-- Section Header --}}
        <div class="text-center mb-14">

            <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-5 py-2 rounded-full text-sm font-bold">
                🌿 Volunteer Categories
            </span>

            <h2 class="text-5xl font-black text-green-700 mt-5">
                Explore Volunteer Categories
            </h2>

            <p class="text-gray-500 mt-4 max-w-2xl mx-auto text-lg">
                Choose your interest and discover volunteer opportunities available across different categories.
            </p>

        </div>

        @if($categories->count())

        {{-- ONE ROW SCROLLABLE --}}
        <div class="flex gap-6 overflow-x-auto pb-4 scrollbar-hide">

            @foreach($categories as $category)

                @php
                    $categoryName = $category->category;

                    $categoryCount = \App\Models\Event::where(
                        'category',
                        $categoryName
                    )->count();

                    $icons = [
                        'Environment'       => '🌳',
                        'Healthcare'        => '❤️',
                        'Education'         => '📚',
                        'Food Drive'        => '🍲',
                        'Disaster Relief'   => '🛡️',
                        'Community Support' => '🤝',
                    ];

                    $colors = [
                        'Environment'       => 'from-green-500 to-emerald-600',
                        'Healthcare'        => 'from-red-500 to-pink-600',
                        'Education'         => 'from-blue-500 to-indigo-600',
                        'Food Drive'        => 'from-orange-400 to-red-500',
                        'Disaster Relief'   => 'from-indigo-500 to-violet-600',
                        'Community Support' => 'from-purple-500 to-fuchsia-600',
                    ];

                    $icon = $icons[$categoryName] ?? '🌱';
                    $gradient = $colors[$categoryName] ?? 'from-green-500 to-emerald-600';
                @endphp

                {{-- Category Card --}}
                <div class="min-w-[240px] max-w-[2500px] bg-white rounded-[28px] shadow-lg hover:shadow-2xl hover:-translate-y-2 transition duration-300 overflow-hidden group border border-green-100">

                    {{-- Top Gradient --}}
                    <div class="h-24 bg-gradient-to-r {{ $gradient }} flex items-center justify-center relative">

                        <div class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/20"></div>

                        <span class="text-5xl group-hover:scale-110 transition duration-300">
                            {{ $icon }}
                        </span>

                    </div>

                    {{-- Content --}}
                    <div class="p-6 text-center">

                        <h3 class="text-xl font-black text-gray-800">
                            {{ $categoryName }}
                        </h3>

                        <p class="text-sm text-gray-500 mt-3 leading-6">
                            {{ $categoryCount }}
                            {{ Str::plural('Event', $categoryCount) }}
                            Available
                        </p>

                        {{-- Small Badge --}}
                        <div class="mt-4 inline-flex items-center gap-2 bg-green-50 text-green-700 px-3 py-2 rounded-full text-xs font-bold">
                            🌿 VolunteerHub
                        </div>

                        {{-- Button --}}
                        <a href="{{ route('events.index', ['category' => $categoryName]) }}"
                           class="mt-5 inline-flex items-center justify-center w-full bg-gradient-to-r {{ $gradient }} text-white py-3 rounded-xl font-bold shadow-md hover:scale-105 transition">

                            Explore Events →

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

        {{-- Bottom Info --}}
        <div class="text-center mt-8">
            <p class="text-sm text-gray-500">
                👉 Swipe horizontally to explore all volunteer categories.
            </p>
        </div>

        @else

        {{-- Empty State --}}
        <div class="bg-white rounded-[30px] shadow-xl p-12 text-center">

            <div class="w-24 h-24 mx-auto rounded-full bg-green-100 flex items-center justify-center text-5xl">
                🌱
            </div>

            <h3 class="text-2xl font-black text-green-700 mt-6">
                Categories Coming Soon
            </h3>

            <p class="text-gray-500 mt-3">
                Volunteer categories will automatically appear here when new events are added by the admin.
            </p>

        </div>

        @endif

    </div>

</section>

{{-- Hide Scrollbar --}}
<style>
.scrollbar-hide::-webkit-scrollbar{
    display:none;
}
.scrollbar-hide{
    -ms-overflow-style:none;
    scrollbar-width:none;
}
</style>


{{-- ========================================================= --}}
{{-- HOW IT WORKS --}}
{{-- ========================================================= --}}

<section class="py-20 bg-white">

    <div class="max-w-6xl mx-auto px-6 text-center">

        <h2 class="text-4xl font-bold text-blue-700 mb-12">
            How VolunteerHub Works
        </h2>


        <div class="grid md:grid-cols-4 gap-8">


            @foreach([
                ['📝','Register','Create your free account.'],
                ['🔍','Explore Events','Find volunteer opportunities.'],
                ['🎯','Choose Role','Select an event that interests you.'],
                ['🌍','Make Impact','Join events and contribute to society.']
            ] as $step)


                <div>

                    <div class="w-20 h-20 mx-auto rounded-full
                                bg-green-100 flex items-center
                                justify-center text-4xl shadow-md">

                        {{ $step[0] }}

                    </div>


                    <h3 class="mt-5 font-bold text-lg">
                        {{ $step[1] }}
                    </h3>


                    <p class="text-gray-500 mt-2">
                        {{ $step[2] }}
                    </p>

                </div>

            @endforeach

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- WHY CHOOSE US / LIVE EVENT CAPACITY --}}
{{-- ========================================================= --}}

<section class="py-20
                bg-gradient-to-r
                from-green-600 to-blue-600
                text-white">

    <div class="max-w-7xl mx-auto px-6
                grid lg:grid-cols-2 gap-12
                items-center">


        {{-- LEFT --}}
        <div>

            <h2 class="text-5xl font-black">
                Why VolunteerHub?
            </h2>


            <p class="mt-6 text-green-100 leading-8">

                VolunteerHub provides a simple platform
                where students can discover events,
                register for opportunities and contribute
                to meaningful community activities.

            </p>


            <ul class="mt-8 space-y-4 text-lg">

                <li>
                    ✔ Easy Event Registration
                </li>

                <li>
                    ✔ Real-time Slot Availability
                </li>

                <li>
                    ✔ Volunteer Dashboard
                </li>

                <li>
                    ✔ Event Approval System
                </li>

                <li>
                    ✔ Volunteer ID & Certificate
                </li>

            </ul>

        </div>



        {{-- RIGHT --}}
        <div class="bg-white/10 backdrop-blur-xl
                    rounded-[35px] p-8
                    border border-white/20">


            <div class="flex items-center
                        justify-between mb-7">

                <div>

                    <p class="text-green-100 text-sm">
                        LIVE EVENT AVAILABILITY
                    </p>

                    <h3 class="text-2xl font-black">
                        Upcoming Events
                    </h3>

                </div>

                <span class="text-3xl">
                    📊
                </span>

            </div>


            @if($featuredEvents->count())


                <div class="space-y-6">

                    @foreach($featuredEvents as $event)

                        @php

                            $capacity = (int) ($event->capacity ?? 0);

                            $filled = (int) ($event->filled_slots ?? 0);

                            $percentage = $capacity > 0
                                ? min(100, round(($filled / $capacity) * 100))
                                : 0;

                        @endphp


                        <div>

                            <div class="flex justify-between
                                        gap-4 mb-2">

                                <span class="font-semibold truncate">

                                    {{ $event->title }}

                                </span>

                                <span class="text-sm
                                             text-green-100
                                             shrink-0">

                                    {{ $percentage }}%

                                </span>

                            </div>


                            <div class="w-full bg-white/20
                                        rounded-full h-3">

                                <div
                                    class="bg-yellow-300 h-3
                                           rounded-full transition-all"
                                    style="width: {{ $percentage }}%">
                                </div>

                            </div>


                            <div class="flex justify-between
                                        mt-2 text-xs
                                        text-green-100">

                                <span>

                                    {{ $filled }} registered

                                </span>

                                <span>

                                    {{ $capacity }} capacity

                                </span>

                            </div>

                        </div>

                    @endforeach

                </div>


            @else

                <div class="text-center py-10">

                    <div class="text-4xl">
                        🌿
                    </div>

                    <p class="mt-3 text-green-100">
                        No upcoming events available.
                    </p>

                </div>

            @endif

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- VOLUNTEER ACTIVITY --}}
{{-- ========================================================= --}}

<section class="py-20 bg-green-50">

    <div class="max-w-6xl mx-auto px-6">


        <div class="text-center mb-12">

            <h2 class="text-4xl font-bold text-green-700">
                Volunteer Activity
            </h2>

            <p class="text-gray-500 mt-3">
                Recent completed volunteer participation.
            </p>

        </div>


        @if($recentVolunteers->count())


            <div class="grid md:grid-cols-3 gap-8">

                @foreach($recentVolunteers as $activity)

                    <div class="bg-white rounded-3xl p-6
                                shadow-lg hover:shadow-xl
                                transition">


                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-full
                                        bg-gradient-to-br
                                        from-green-500 to-emerald-600
                                        text-white flex items-center
                                        justify-center
                                        font-black text-lg">

                                {{ strtoupper(
                                    substr(
                                        $activity->user->name ?? 'V',
                                        0,
                                        1
                                    )
                                ) }}

                            </div>


                            <div class="min-w-0">

                                <h4 class="font-bold text-green-700
                                           truncate">

                                    {{ $activity->user->name ?? 'Volunteer' }}

                                </h4>

                                <p class="text-sm text-gray-500">
                                    Completed Volunteer
                                </p>

                            </div>

                        </div>


                        <div class="mt-5 p-4
                                    bg-green-50 rounded-2xl">

                            <p class="text-sm text-gray-500">
                                Completed Event
                            </p>

                            <h3 class="font-bold text-gray-800 mt-1">

                                {{ $activity->event->title ?? 'Volunteer Event' }}

                            </h3>

                        </div>


                        @if($activity->event)

                            <p class="text-xs text-gray-400 mt-4">

                                📍
                                {{ $activity->event->city ?? 'Location TBA' }}

                            </p>

                        @endif

                    </div>

                @endforeach

            </div>


        @else

            <div class="bg-white rounded-3xl p-10
                        shadow text-center">

                <div class="text-5xl">
                    🤝
                </div>

                <h3 class="text-xl font-bold
                           text-gray-700 mt-4">

                    Be the First Volunteer

                </h3>

                <p class="text-gray-500 mt-2">

                    Completed volunteer activities
                    will appear here.

                </p>

            </div>

        @endif

    </div>

</section>



{{-- ========================================================= --}}
{{-- CALL TO ACTION --}}
{{-- ========================================================= --}}

<section class="py-24
                bg-gradient-to-r
                from-green-700 via-green-600
                to-blue-700
                text-center text-white">


    <div class="max-w-4xl mx-auto px-6">


        <h2 class="text-5xl font-black">
            Become a Volunteer Today
        </h2>


        <p class="mt-6 text-lg text-green-100 leading-8">

            Join VolunteerHub and discover meaningful
            community service opportunities.

        </p>


        <div class="mt-10 flex justify-center
                    gap-5 flex-wrap">


            <a href="{{ route('register') }}"
               class="bg-yellow-400 text-black
                      px-8 py-4 rounded-full
                      font-bold hover:bg-yellow-300
                      transition shadow-xl">

                Join VolunteerHub

            </a>


            <a href="{{ route('events.index') }}"
               class="border border-white
                      px-8 py-4 rounded-full
                      hover:bg-white
                      hover:text-green-700
                      transition">

                Browse Events

            </a>

        </div>

    </div>

</section>


@endsection

