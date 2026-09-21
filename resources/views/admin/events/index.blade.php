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

                        Event Management

                    </h1>

                    <p class="mt-5 text-green-100
                              text-lg max-w-2xl leading-8">

                        Create, organize and monitor volunteer events
                        from one powerful management dashboard.

                    </p>

                    <div class="flex flex-wrap gap-4 mt-8">

                        <a href="{{ route('admin.events.create') }}"
                           class="bg-yellow-400 hover:bg-yellow-300
                                  text-black px-7 py-3 rounded-xl
                                  font-bold shadow-xl transition
                                  hover:-translate-y-1">

                            ➕ Create New Event

                        </a>

                        <a href="#events"
                           class="border border-white/40
                                  px-7 py-3 rounded-xl
                                  hover:bg-white/20 transition">

                            📅 View Events

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
                                Events Center
                            </h2>

                            <p class="text-green-100 text-sm mt-2">
                                Manage all volunteer opportunities
                            </p>

                        </div>

                        <div class="grid grid-cols-2 gap-3 mt-6">

                            <div class="bg-white/10 rounded-2xl p-4 text-center">

                                <p class="text-2xl font-black">
                                    {{ $events->count() }}
                                </p>

                                <p class="text-xs text-green-100">
                                    Total Events
                                </p>

                            </div>

                            <div class="bg-white/10 rounded-2xl p-4 text-center">

                                <p class="text-2xl font-black">
                                    {{ $events->sum('filled_slots') }}
                                </p>

                                <p class="text-xs text-green-100">
                                    Registrations
                                </p>

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

    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">


        {{-- ===================================================== --}}
        {{-- SUCCESS MESSAGE --}}
        {{-- ===================================================== --}}

        @if(session('success'))

            <div class="mb-8 bg-green-100
                        border border-green-300
                        text-green-800 rounded-2xl
                        p-5 shadow-lg flex items-center gap-4">

                <div class="text-4xl">
                    ✅
                </div>

                <div>

                    <h3 class="font-bold text-lg">
                        Success!
                    </h3>

                    <p class="text-sm">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif


        {{-- ===================================================== --}}
        {{-- STATISTICS --}}
        {{-- ===================================================== --}}

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">

            {{-- Total --}}
            <div class="group bg-white rounded-[28px]
                        p-6 shadow-lg
                        hover:shadow-2xl
                        hover:-translate-y-2 transition">

                <div class="flex justify-between items-center">

                    <div class="w-14 h-14 rounded-2xl
                                bg-green-100
                                flex items-center justify-center
                                text-3xl">

                        📅

                    </div>

                    <span class="text-green-600
                                 text-xs font-bold
                                 bg-green-50 px-3 py-1 rounded-full">

                        ALL

                    </span>

                </div>

                <p class="text-gray-500 mt-5">
                    Total Events
                </p>

                <h2 class="text-4xl font-black
                           text-green-700 mt-1">

                    {{ $events->count() }}

                </h2>

            </div>


            {{-- Upcoming --}}
            <div class="group bg-white rounded-[28px]
                        p-6 shadow-lg
                        hover:shadow-2xl
                        hover:-translate-y-2 transition">

                <div class="flex justify-between items-center">

                    <div class="w-14 h-14 rounded-2xl
                                bg-blue-100
                                flex items-center justify-center
                                text-3xl">

                        🌱

                    </div>

                    <span class="text-blue-600
                                 text-xs font-bold
                                 bg-blue-50 px-3 py-1 rounded-full">

                        UPCOMING

                    </span>

                </div>

                <p class="text-gray-500 mt-5">
                    Upcoming Events
                </p>

                <h2 class="text-4xl font-black
                           text-blue-700 mt-1">

                    {{ $events->where('status','Upcoming')->count() }}

                </h2>

            </div>


            {{-- Ongoing --}}
            <div class="group bg-white rounded-[28px]
                        p-6 shadow-lg
                        hover:shadow-2xl
                        hover:-translate-y-2 transition">

                <div class="flex justify-between items-center">

                    <div class="w-14 h-14 rounded-2xl
                                bg-yellow-100
                                flex items-center justify-center
                                text-3xl">

                        ⚡

                    </div>

                    <span class="text-yellow-600
                                 text-xs font-bold
                                 bg-yellow-50 px-3 py-1 rounded-full">

                        LIVE

                    </span>

                </div>

                <p class="text-gray-500 mt-5">
                    Ongoing Events
                </p>

                <h2 class="text-4xl font-black
                           text-yellow-600 mt-1">

                    {{ $events->where('status','Ongoing')->count() }}

                </h2>

            </div>


            {{-- Completed --}}
            <div class="group bg-white rounded-[28px]
                        p-6 shadow-lg
                        hover:shadow-2xl
                        hover:-translate-y-2 transition">

                <div class="flex justify-between items-center">

                    <div class="w-14 h-14 rounded-2xl
                                bg-purple-100
                                flex items-center justify-center
                                text-3xl">

                        🏆

                    </div>

                    <span class="text-purple-600
                                 text-xs font-bold
                                 bg-purple-50 px-3 py-1 rounded-full">

                        DONE

                    </span>

                </div>

                <p class="text-gray-500 mt-5">
                    Completed Events
                </p>

                <h2 class="text-4xl font-black
                           text-purple-700 mt-1">

                    {{ $events->where('status','Completed')->count() }}

                </h2>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- SEARCH + FILTER --}}
        {{-- ===================================================== --}}

        <div class="mt-10 bg-white rounded-[30px]
                    shadow-xl p-6 border border-green-100">

            <div class="flex flex-col lg:flex-row
                        justify-between gap-5">

                <div>

                    <h2 class="text-2xl font-black text-gray-800">
                        🔎 Find an Event
                    </h2>

                    <p class="text-gray-500 text-sm mt-1">
                        Search and manage events quickly.
                    </p>

                </div>

                <div class="w-full lg:w-96">

                    <div class="relative">

                        <span class="absolute left-4 top-1/2
                                     -translate-y-1/2 text-xl">
                            🔍
                        </span>

                        <input
                            id="eventSearch"
                            type="text"
                            placeholder="Search title, city, category..."
                            class="w-full pl-12 pr-5 py-4
                                   rounded-2xl
                                   border border-gray-200
                                   bg-gray-50
                                   focus:bg-white
                                   focus:ring-2
                                   focus:ring-green-500
                                   focus:border-green-500">

                    </div>

                </div>

            </div>


            {{-- Filter Buttons --}}
            <div class="flex flex-wrap gap-3 mt-6">

                <button onclick="filterEvents('all')"
                        class="filter-btn active-filter
                               bg-green-600 text-white
                               px-5 py-2 rounded-full
                               text-sm font-semibold">

                    All Events

                </button>

                <button onclick="filterEvents('Upcoming')"
                        class="filter-btn
                               bg-green-50 text-green-700
                               px-5 py-2 rounded-full
                               text-sm font-semibold">

                    🟢 Upcoming

                </button>

                <button onclick="filterEvents('Ongoing')"
                        class="filter-btn
                               bg-yellow-50 text-yellow-700
                               px-5 py-2 rounded-full
                               text-sm font-semibold">

                    🟡 Ongoing

                </button>

                <button onclick="filterEvents('Completed')"
                        class="filter-btn
                               bg-blue-50 text-blue-700
                               px-5 py-2 rounded-full
                               text-sm font-semibold">

                    🔵 Completed

                </button>

                <button onclick="filterEvents('Cancelled')"
                        class="filter-btn
                               bg-red-50 text-red-700
                               px-5 py-2 rounded-full
                               text-sm font-semibold">

                    🔴 Cancelled

                </button>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- SECTION TITLE --}}
        {{-- ===================================================== --}}

        <div id="events"
             class="flex flex-col md:flex-row
                    justify-between md:items-center
                    gap-4 mt-14 mb-8">

            <div>

                <span class="text-green-600
                             text-sm font-bold uppercase
                             tracking-wider">

                    VolunteerHub Events

                </span>

                <h2 class="text-4xl font-black text-gray-800 mt-1">
                    Manage Events
                </h2>

                <p class="text-gray-500 mt-2">
                    View, edit and manage all volunteer opportunities.
                </p>

            </div>

            <div class="bg-green-100 
            text-green-700 
            px-5 py-2 rounded-full 
            font-bold">

            <span id="eventCount">
                {{ $events->count() }}
            </span>

            Events

        </div>

        </div>


        {{-- ===================================================== --}}
        {{-- EVENTS GRID --}}
        {{-- ===================================================== --}}

        <div id="eventsGrid"
             class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">


            @forelse($events as $event)

                @php

                    $percentage = $event->capacity > 0
                        ? min(($event->filled_slots / $event->capacity) * 100, 100)
                        : 0;

                    $remaining = max(
                        $event->capacity - $event->filled_slots,
                        0
                    );

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

                    $categoryStyle = match($event->category) {

                        'Environment' =>
                            'bg-green-100 text-green-700',

                        'Healthcare' =>
                            'bg-red-100 text-red-700',

                        'Education' =>
                            'bg-blue-100 text-blue-700',

                        'Community Service' =>
                            'bg-yellow-100 text-yellow-700',

                        default =>
                            'bg-purple-100 text-purple-700',

                    };

                @endphp


                <div class="event-card group bg-white
                            rounded-[30px]
                            overflow-hidden shadow-xl
                            hover:shadow-2xl
                            hover:-translate-y-2
                            transition duration-500"
                     data-status="{{ $event->status }}">


                    {{-- ================= BANNER ================= --}}

                    <div class="relative h-56 overflow-hidden">

                        @if($event->banner)

                            <img src="{{ asset('images/events/'.$event->banner) }}"
                                 alt="{{ $event->title }}"
                                 class="w-full h-full object-cover
                                        group-hover:scale-110
                                        transition duration-700">

                        @else

                            <div class="w-full h-full
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


                        {{-- Overlay --}}
                        <div class="absolute inset-0
                                    bg-gradient-to-t
                                    from-black/60
                                    via-black/10
                                    to-transparent">
                        </div>


                        {{-- Category --}}
                        <span class="absolute top-4 left-4
                                     {{ $categoryStyle }}
                                     px-4 py-1.5
                                     rounded-full
                                     text-xs font-bold">

                            {{ $event->category }}

                        </span>


                        {{-- Status --}}
                        <span class="absolute top-4 right-4
                                     {{ $statusStyle }}
                                     px-4 py-1.5
                                     rounded-full
                                     text-xs font-bold">

                            {{ $event->status }}

                        </span>


                        {{-- Title Overlay --}}
                        <div class="absolute bottom-0 left-0 right-0 p-5">

                            <h3 class="text-white
                                       text-2xl font-black
                                       line-clamp-2">

                                {{ $event->title }}

                            </h3>

                        </div>

                    </div>


                    {{-- ================= CARD BODY ================= --}}

                    <div class="p-6">


                        {{-- Description --}}
                        <p class="text-gray-500 text-sm
                                  leading-6 line-clamp-2">

                            {{ $event->description }}

                        </p>


                        {{-- Event Information --}}
                        <div class="grid grid-cols-2 gap-3 mt-5">


                            <div class="bg-green-50
                                        rounded-2xl p-3">

                                <p class="text-xs text-gray-500">
                                    📍 City
                                </p>

                                <p class="font-bold
                                          text-green-700 mt-1
                                          truncate">

                                    {{ $event->city }}

                                </p>

                            </div>


                            <div class="bg-blue-50
                                        rounded-2xl p-3">

                                <p class="text-xs text-gray-500">
                                    🏢 Venue
                                </p>

                                <p class="font-bold
                                          text-blue-700 mt-1
                                          truncate">

                                    {{ $event->venue }}

                                </p>

                            </div>


                            <div class="bg-orange-50
                                        rounded-2xl p-3">

                                <p class="text-xs text-gray-500">
                                    📅 Date
                                </p>

                                <p class="font-bold
                                          text-orange-600 mt-1">

                                    {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}

                                </p>

                            </div>


                            <div class="bg-purple-50
                                        rounded-2xl p-3">

                                <p class="text-xs text-gray-500">
                                    ⏰ Time
                                </p>

                                <p class="font-bold
                                          text-purple-700 mt-1">

                                    {{ date('h:i A', strtotime($event->start_time)) }}

                                </p>

                            </div>

                        </div>


                        {{-- ================= CAPACITY ================= --}}

                        <div class="mt-6">

                            <div class="flex justify-between
                                        text-sm mb-2">

                                <span class="font-semibold
                                             text-gray-700">

                                    👥 Volunteer Capacity

                                </span>

                                <span class="font-bold
                                             text-green-700">

                                    {{ $event->filled_slots }}
                                    /
                                    {{ $event->capacity }}

                                </span>

                            </div>


                            <div class="w-full bg-gray-200
                                        rounded-full h-3 overflow-hidden">

                                <div class="bg-gradient-to-r
                                            from-green-500
                                            to-emerald-600
                                            h-full rounded-full"
                                     style="width: {{ $percentage }}%">
                                </div>

                            </div>


                            <div class="flex justify-between
                                        mt-2 text-xs">

                                <span class="text-gray-500">

                                    {{ round($percentage) }}% Filled

                                </span>

                                <span class="font-semibold
                                             text-green-600">

                                    {{ $remaining }} Slots Available

                                </span>

                            </div>

                        </div>


                        {{-- ================= ACTION BUTTONS ================= --}}

                        <div class="grid grid-cols-3 gap-2 mt-7">


                            {{-- VIEW --}}
                            <a href="{{ route('admin.events.show', $event->id) }}"
                               class="bg-blue-50
                                      text-blue-700
                                      py-3 rounded-xl
                                      text-center
                                      font-bold text-sm
                                      hover:bg-blue-100
                                      transition">

                                👁 View

                            </a>


                            {{-- EDIT --}}
                            <a href="{{ route('admin.events.edit', $event->id) }}"
                               class="bg-green-50
                                      text-green-700
                                      py-3 rounded-xl
                                      text-center
                                      font-bold text-sm
                                      hover:bg-green-100
                                      transition">

                                ✏️ Edit

                            </a>


                            {{-- DELETE --}}
                            <form action="{{ route('admin.events.destroy', $event->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this event?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="w-full
                                               bg-red-50
                                               text-red-600
                                               py-3 rounded-xl
                                               font-bold text-sm
                                               hover:bg-red-100
                                               transition">

                                    🗑️ Delete

                                </button>

                            </form>

                        </div>



                    </div>

                </div>

            @empty


                {{-- EMPTY STATE --}}

                <div class="md:col-span-2 xl:col-span-3
                            bg-white rounded-[35px]
                            shadow-xl p-14 text-center">

                    <div class="text-8xl mb-5">
                        📅
                    </div>

                    <h2 class="text-3xl font-black
                               text-gray-700">

                        No Events Found

                    </h2>

                    <p class="text-gray-500 mt-3">
                        You haven't created any volunteer events yet.
                    </p>

                    <a href="{{ route('admin.events.create') }}"
                       class="inline-block mt-7
                              bg-gradient-to-r
                              from-green-600 to-emerald-600
                              text-white
                              px-8 py-3
                              rounded-xl
                              font-bold shadow-lg
                              hover:scale-105
                              transition">

                        ➕ Create First Event

                    </a>

                </div>

            @endforelse

        </div>


        {{-- ===================================================== --}}
        {{-- NO SEARCH RESULT --}}
        {{-- ===================================================== --}}

        <div id="noSearchResult"
             class="hidden bg-white
                    rounded-[30px] shadow-xl
                    p-12 text-center mt-8">

            <div class="text-6xl">
                🔍
            </div>

            <h2 class="text-2xl font-black
                       text-gray-700 mt-4">

                No Matching Events

            </h2>

            <p class="text-gray-500 mt-2">
                Try another event title, city or category.
            </p>

        </div>


        {{-- ===================================================== --}}
        {{-- BOTTOM CTA --}}
        {{-- ===================================================== --}}

        <section class="mt-16">

            <div class="relative overflow-hidden
                        bg-gradient-to-r
                        from-green-700 via-emerald-600
                        to-blue-700
                        rounded-[35px]
                        p-10 text-white
                        shadow-2xl">

                <div class="absolute -right-20 -top-20
                            w-72 h-72
                            bg-white/10 rounded-full">
                </div>

                <div class="relative z-10
                            flex flex-col lg:flex-row
                            justify-between
                            items-center gap-8">

                    <div>

                        <span class="text-green-200
                                     text-sm font-bold">

                            🌿 GROW THE COMMUNITY

                        </span>

                        <h2 class="text-3xl md:text-4xl
                                   font-black mt-2">

                            Create Your Next Volunteer Event

                        </h2>

                        <p class="text-green-100 mt-3
                                  max-w-2xl">

                            Give volunteers more opportunities
                            to contribute, connect and create
                            positive community impact.

                        </p>

                    </div>


                    <a href="{{ route('admin.events.create') }}"
                       class="shrink-0
                              bg-yellow-400
                              hover:bg-yellow-300
                              text-black
                              px-8 py-4
                              rounded-2xl
                              font-black
                              shadow-xl
                              transition
                              hover:-translate-y-1">

                        ➕ Create Event

                    </a>

                </div>

            </div>

        </section>

    </div>

</div>


{{-- ============================================================= --}}
{{-- SEARCH + FILTER JAVASCRIPT --}}
{{-- ============================================================= --}}

<script>

const searchInput = document.getElementById('eventSearch');

const eventCards = document.querySelectorAll('.event-card');

const noSearchResult = document.getElementById('noSearchResult');

const eventCount = document.getElementById('eventCount');

let currentFilter = 'all';


function applyFilters() {

    const searchValue = searchInput.value.toLowerCase().trim();

    let visibleCount = 0;


    eventCards.forEach(card => {

        const cardText = card.innerText.toLowerCase();

        const status = card.dataset.status;


        const matchesSearch =
            cardText.includes(searchValue);


        const matchesFilter =
            currentFilter === 'all' ||
            status === currentFilter;


        if(matchesSearch && matchesFilter) {

            card.style.display = '';

            visibleCount++;

        } else {

            card.style.display = 'none';

        }

    });


    // =========================================================
    // DYNAMIC EVENT COUNT
    // =========================================================

    if (eventCount) {
        eventCount.innerText = visibleCount;
    }


    // =========================================================
    // NO RESULT MESSAGE
    // =========================================================

    if(visibleCount === 0 && eventCards.length > 0) {

        noSearchResult.classList.remove('hidden');

    } else {

        noSearchResult.classList.add('hidden');

    }

}


searchInput.addEventListener('input', applyFilters);


// =============================================================
// FILTER EVENTS
// =============================================================

function filterEvents(status) {

    currentFilter = status;

    applyFilters();


    // Remove active style from all buttons
    document.querySelectorAll('.filter-btn')
        .forEach(button => {

            button.classList.remove(
                'bg-green-600',
                'text-white'
            );

        });


    // Add active style to clicked button
    event.target.classList.add(
        'bg-green-600',
        'text-white'
    );

}

</script>






@endsection