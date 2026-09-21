
@extends('layouts.student')

@section('content')

 {{-- ================= show massage  ================= --}}

@if(session('success'))

<div class="max-w-7xl mx-auto px-6 mt-6">

    <div class="bg-green-100 border border-green-400 text-green-800 rounded-2xl p-5 shadow-lg flex items-center gap-4">

        <div class="text-4xl">✅</div>

        <div>
            <h3 class="font-bold text-lg">Registration Successful!</h3>
            <p>{{ session('success') }}</p>
        </div>

    </div>

</div>

@endif

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-100">

    {{-- ================= HERO SECTION ================= --}}
    <section class="relative overflow-hidden rounded-b-[45px] bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500 text-white">

        <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-300/20 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-8 py-16 relative z-10">

            <span class="bg-white/20 px-5 py-2 rounded-full text-sm font-semibold">
                🌿 VolunteerHub Student Portal
            </span>

            <h1 class="text-5xl lg:text-6xl font-black mt-6 leading-tight">
                Discover Amazing <br> Volunteer Opportunities
            </h1>

            <p class="mt-5 text-lg text-green-100 max-w-2xl">
                Join community events, earn volunteer hours, receive certificates and help make your city better.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">

                <a href="#events"
                   class="bg-white text-green-700 px-6 py-3 rounded-xl font-bold hover:bg-green-100 transition">
                    🌍 Explore Events
                </a>

                <a href="/dashboard"
                   class="border border-white/40 px-6 py-3 rounded-xl hover:bg-white/20 transition">
                    ← Back Dashboard
                </a>

            </div>

        </div>

    </section>

    {{-- ================= STATS ================= --}}
    <div class="max-w-7xl mx-auto px-6 -mt-10 relative z-20">

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

            <div class="bg-white rounded-2xl shadow-lg p-5 text-center">
                <div class="text-4xl">🌍</div>
                <h2 class="text-3xl font-black text-green-700 mt-2">{{ count($events) }}</h2>
                <p class="text-gray-500 text-sm">Active Events</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-5 text-center">
                <div class="text-4xl">👥</div>
                <h2 class="text-3xl font-black text-blue-700">205+</h2>
                <p class="text-gray-500 text-sm">Volunteers Joined</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-5 text-center">
                <div class="text-4xl">🏆</div>
                <h2 class="text-3xl font-black text-yellow-500">180+</h2>
                <p class="text-gray-500 text-sm">Certificates</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-5 text-center">
                <div class="text-4xl">❤️</div>
                <h2 class="text-3xl font-black text-red-500">15 NGOs</h2>
                <p class="text-gray-500 text-sm">Community Partners</p>
            </div>

        </div>

    </div>

    {{-- ================= SEARCH BAR ================= --}}
    <section class="max-w-7xl mx-auto px-6 mt-10">

            <div class="bg-white/90 backdrop-blur-xl rounded-[30px] shadow-2xl p-6 border border-green-100">

                <h2 class="text-2xl font-black text-green-700 mb-5">
                    🔎 Search Volunteer Events
                </h2>

                <form method="GET" action="{{ route('events.index') }}">

                    <div class="grid lg:grid-cols-4 gap-4">

                        <input type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search event name..."
                            class="rounded-xl border-gray-300 focus:ring-green-500">

                        <select name="category"
                                class="rounded-xl border-gray-300 focus:ring-green-500">
                            <option value="">All Categories</option>
                            <option value="Environment">🌳 Environment</option>
                            <option value="Healthcare">❤️ Healthcare</option>
                            <option value="Education">📚 Education</option>
                            <option value="Community Service">🍛 Community Service</option>
                        </select>

                        <select name="city"
                                class="rounded-xl border-gray-300 focus:ring-green-500">
                            <option value="">All Cities</option>
                            <option value="Nashik">Nashik</option>
                            <option value="Pune">Pune</option>
                            <option value="Mumbai">Mumbai</option>
                        </select>

                        <button type="submit"
                                class="rounded-xl bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold hover:scale-105 transition">
                            Search
                        </button>

                    </div>

                </form>

            </div>

            </section>

            <div class="flex flex-wrap gap-3 mt-6">

                @if(request('search'))
                    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                        🔍 {{ request('search') }}
                    </span>
                @endif

                @if(request('category') && request('category') != 'All')
                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                        🌿 {{ request('category') }}
                    </span>
                @endif

                @if(request('city') && request('city') != 'All')
                    <span class="bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold">
                        📍 {{ request('city') }}
                    </span>
                @endif

                @if(request()->hasAny(['search','category','city']))
                    <a href="{{ route('events.index') }}"
                    class="bg-red-100 text-red-600 px-4 py-2 rounded-full text-sm font-semibold hover:bg-red-200">
                        ✖ Clear Filters
                    </a>
                @endif

            </div>

            

        </div>

    </section>

    {{-- ================= FEATURED EVENT ================= --}}
    @if(count($events) > 0)

        @php
            $featured = $events[0];
            $remaining = $featured->capacity - $featured->filled_slots;
        @endphp

        <section class="max-w-7xl mx-auto px-6 mt-12">

            <div class="bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 rounded-[35px] overflow-hidden shadow-2xl">

                <div class="grid lg:grid-cols-2 items-center">

                    <div class="p-10 text-white">

                        <span class="bg-yellow-300 text-black px-4 py-2 rounded-full text-xs font-bold">
                            ⭐ FEATURED EVENT
                        </span>

                        <h2 class="text-4xl font-black mt-5">
                            {{ $featured->title }}
                        </h2>

                        <p class="mt-4 text-green-100">
                            {{ $featured->description }}
                        </p>

                        <div class="grid grid-cols-2 gap-5 mt-8">

                            <div>
                                <p class="text-green-200 text-sm">📅 Date</p>
                                <h4 class="font-bold">
                                    {{ $featured->event_date->format('d M Y') }}
                                </h4>
                            </div>

                            <div>
                                <p class="text-green-200 text-sm">📍 Location</p>
                                <h4 class="font-bold">
                                    {{ $featured->city }} • {{ $featured->venue }}
                                </h4>
                            </div>

                            <div>
                                <p class="text-green-200 text-sm">👥 Capacity</p>
                                <h4 class="font-bold">
                                    {{ $featured->filled_slots }}/{{ $featured->capacity }} Joined
                                </h4>
                            </div>

                            <div>
                                <p class="text-green-200 text-sm">🪑 Slots Left</p>
                                <h4 class="font-bold">
                                    {{ $remaining }}
                                </h4>
                            </div>

                        </div>

                        <button class="mt-8 bg-white text-green-700 px-6 py-3 rounded-xl font-bold hover:bg-green-100">
                            🤝 Join Featured Event
                        </button>

                    </div>

                   <div class="hidden lg:block h-full">

                    @if($featured->banner)
                        <img src="{{ asset('images/events/' . $featured->banner) }}"
                            alt="{{ $featured->title }}"
                            class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-green-500 to-emerald-700 flex items-center justify-center text-[150px]">
                            🌿
                        </div>
                    @endif

                </div>
                </div>

            </div>

        </section>

    @endif

    {{-- ================= EVENTS GRID ================= --}}
    <section id="events" class="max-w-7xl mx-auto px-6 py-14">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h2 class="text-4xl font-black text-gray-800">
                    🌱 Upcoming Volunteer Events
                </h2>

                <p class="text-gray-500 mt-2">
                    Choose an event and become a part of the community.
                </p>

            </div>

            <span class="bg-green-100 text-green-700 px-5 py-2 rounded-full font-semibold">
                {{ count($events) }} Events
            </span>

        </div>

        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">

            @forelse($events as $event)

                @php
                    $percentage = ($event->capacity > 0)
                        ? ($event->filled_slots / $event->capacity) * 100
                        : 0;

                    $remaining = $event->capacity - $event->filled_slots;
                    
                    $status = $registrations[$event->id] ?? null;

                    $badgeColor = match($event->category){
                        'Environment' => 'bg-green-100 text-green-700',
                        'Healthcare' => 'bg-red-100 text-red-700',
                        'Education' => 'bg-blue-100 text-blue-700',
                        'Community Service' => 'bg-yellow-100 text-yellow-700',
                        default => 'bg-gray-100 text-gray-700'
                    };
                @endphp

                <div class="group bg-white rounded-[28px] shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition duration-500">

                    {{-- Banner --}}
                    <div class="relative h-52 overflow-hidden rounded-t-[28px]">

                        @if($event->banner)
                            <img src="{{ asset('images/events/' . $event->banner) }}"
                                alt="{{ $event->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-green-500 via-emerald-500 to-teal-600 flex items-center justify-center text-7xl">
                                🌿
                            </div>
                        @endif

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>

                        <!-- Category -->
                        <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-bold {{ $badgeColor }}">
                            {{ $event->category }}
                        </span>

                        <!-- Status -->
                        @if($event->status == 'Upcoming')
                            <span class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                Upcoming
                            </span>
                        @elseif($event->status == 'Completed')
                            <span class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                Completed
                            </span>
                        @else
                            <span class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                Cancelled
                            </span>
                        @endif

                        <!-- Bottom Title Overlay -->
                        <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black/70 to-transparent">
                            <h3 class="text-white font-bold text-xl">
                                {{ $event->title }}
                            </h3>
                        </div>

                    </div>

                    {{-- Card Content --}}
                    <div class="p-6">

                        <p class="text-gray-500 text-sm line-clamp-3">
                            {{ $event->description }}
                        </p>

                        <!-- Information -->
                        <div class="grid grid-cols-2 gap-3 mt-5">

                            <div class="bg-green-50 p-3 rounded-xl">
                                <p class="text-xs text-gray-500">📍 City</p>
                                <h4 class="font-bold text-green-700">
                                    {{ $event->city }}
                                </h4>
                            </div>

                            <div class="bg-blue-50 p-3 rounded-xl">
                                <p class="text-xs text-gray-500">🏢 Venue</p>
                                <h4 class="font-bold text-blue-700">
                                    {{ $event->venue }}
                                </h4>
                            </div>

                            <div class="bg-orange-50 p-3 rounded-xl">
                                <p class="text-xs text-gray-500">📅 Date</p>
                                <h4 class="font-bold text-orange-600">
                                    {{ $event->event_date->format('d M Y') }}
                                </h4>
                            </div>

                            <div class="bg-purple-50 p-3 rounded-xl">
                                <p class="text-xs text-gray-500">⏰ Time</p>
                                <h4 class="font-bold text-purple-700">
                                    {{ date('h:i A', strtotime($event->start_time)) }}
                                </h4>
                            </div>

                        </div>

                        <!-- Capacity -->
                        <div class="mt-6">

                            <div class="flex justify-between text-sm mb-2">

                                <span class="font-semibold">Volunteer Capacity</span>

                                <span class="font-bold text-green-700">
                                    {{ $remaining }} Slots Left
                                </span>

                            </div>

                            <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">

                                <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-full rounded-full"
                                    style="width: {{ $percentage }}%">
                                </div>

                            </div>

                            <div class="flex justify-between mt-2 text-xs text-gray-500">

                                <span>{{ $event->filled_slots }} Joined</span>

                                <span>{{ $event->capacity }} Capacity</span>

                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="mt-6 grid grid-cols-2 gap-3">

                            {{-- Register Button --}}
                            @if($status === 'Pending')

                                <button class="w-full bg-yellow-400 text-yellow-900 py-3 rounded-xl font-bold cursor-not-allowed">
                                    ⏳ Pending
                                </button>

                            @elseif($status === 'Approved')

                                <button class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold cursor-not-allowed">
                                    ✅ Approved
                                </button>

                            @elseif($status === 'Rejected')

                                <button class="w-full bg-red-500 text-white py-3 rounded-xl font-bold cursor-not-allowed">
                                    ❌ Rejected
                                </button>

                            @elseif($remaining > 0)

                                <a href="{{ route('events.register', $event->id) }}"
                                class="block text-center bg-gradient-to-r from-green-600 to-emerald-600 text-white py-3 rounded-xl font-bold hover:scale-105 transition">
                                    📝 Register
                                </a>

                            @else

                                <button class="w-full bg-gray-300 text-gray-600 py-3 rounded-xl font-bold cursor-not-allowed">
                                    🚫 Event Full
                                </button>

                            @endif

                            {{-- Save/Bookmark Button --}}
                            @php
                                $saved = in_array($event->id,$savedEvents);
                            @endphp

                            @if($saved)

                            <form action="{{ route('events.unsave',$event->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="w-full border border-red-500 text-red-600 py-3 rounded-xl font-semibold hover:bg-red-50 transition">

                                    ❤️ Saved

                                </button>

                            </form>

                            @else

                            <form action="{{ route('events.save',$event->id) }}"
                                method="POST">

                                @csrf

                                <button class="w-full border border-green-600 text-green-700 py-3 rounded-xl font-semibold hover:bg-green-50 transition">

                                    🤍 Save Event

                                </button>

                            </form>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

            <div class="col-span-3 bg-white rounded-[30px] shadow-lg p-12 text-center">

                <div class="text-8xl mb-5">🔍</div>

                <h2 class="text-3xl font-black text-gray-700">
                    No Events Found
                </h2>

                <p class="text-gray-500 mt-3">
                    Try changing your search, category or city filter.
                </p>

                <a href="{{ route('events.index') }}"
                class="inline-block mt-6 bg-green-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-green-700">

                    Show All Events

                </a>

            </div>

            @endforelse

            

        </div>

    </section>

    {{-- ================= COMMUNITY IMPACT ================= --}}
    <section class="max-w-7xl mx-auto px-6 pb-16">

        <div class="bg-gradient-to-r from-green-700 to-teal-600 rounded-[35px] p-10 text-white text-center shadow-xl">

            <h2 class="text-4xl font-black">
                Together We Can Make a Difference 🌎
            </h2>

            <p class="mt-4 text-green-100 max-w-2xl mx-auto">
                VolunteerHub connects students with NGOs and community organizations to participate in meaningful social activities and earn verified volunteer certificates.
            </p>

            <div class="grid md:grid-cols-3 gap-6 mt-10">

                <div>
                    <div class="text-5xl mb-2">🌳</div>
                    <h3 class="font-bold text-xl">Environment</h3>
                    <p class="text-green-100 text-sm mt-2">
                        Plantation, Cleanup, Sustainability Drives
                    </p>
                </div>

                <div>
                    <div class="text-5xl mb-2">📚</div>
                    <h3 class="font-bold text-xl">Education</h3>
                    <p class="text-green-100 text-sm mt-2">
                        Teaching, Mentoring & Literacy Programs
                    </p>
                </div>

                <div>
                    <div class="text-5xl mb-2">❤️</div>
                    <h3 class="font-bold text-xl">Healthcare</h3>
                    <p class="text-green-100 text-sm mt-2">
                        Blood Donation & Health Awareness Camps
                    </p>
                </div>

            </div>

        </div>

    </section>

</div>

@endsection

