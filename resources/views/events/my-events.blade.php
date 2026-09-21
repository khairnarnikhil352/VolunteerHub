@extends('layouts.student')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-100">

    {{-- ================= HERO SECTION ================= --}}
    <section class="relative overflow-hidden rounded-b-[45px] bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500 text-white">

        <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-300/20 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-8 py-16 relative z-10">

            <span class="bg-white/20 px-5 py-2 rounded-full text-sm font-semibold">
                🌿 VolunteerHub • My Events
            </span>

            <h1 class="text-5xl lg:text-6xl font-black mt-6 leading-tight">
                My Volunteer Journey
            </h1>

            <p class="mt-5 text-lg text-green-100 max-w-2xl">
                Track all volunteer events you've registered for, check approval status,
                edit pending applications, download ID card after approval and certificate after completion.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">

                <a href="{{ route('events.index') }}"
                    class="bg-white text-green-700 px-6 py-3 rounded-xl font-bold hover:bg-green-100 transition">
                    🌍 Browse Events
                </a>

                <a href="{{ route('saved.events') }}"
                    class="border border-white/30 px-6 py-3 rounded-xl hover:bg-white/20 transition">
                    ❤️ Saved Events
                </a>

            </div>

        </div>

    </section>

    {{-- ================= DASHBOARD STATS ================= --}}
    <div class="max-w-7xl mx-auto px-6 -mt-10 relative z-20">

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

            <div class="bg-white rounded-2xl shadow-lg p-5 text-center">
                <div class="text-4xl">📅</div>
                <h2 class="text-3xl font-black text-green-700 mt-2">
                    {{ $registrations->count() }}
                </h2>
                <p class="text-gray-500 text-sm">Registered Events</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-5 text-center">
                <div class="text-4xl">⏳</div>
                <h2 class="text-3xl font-black text-yellow-600 mt-2">
                    {{ $registrations->where('status','Pending')->count() }}
                </h2>
                <p class="text-gray-500 text-sm">Pending Approval</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-5 text-center">
                <div class="text-4xl">✅</div>
                <h2 class="text-3xl font-black text-green-600 mt-2">
                    {{ $registrations->where('status','Approved')->count() }}
                </h2>
                <p class="text-gray-500 text-sm">Approved Events</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-5 text-center">
                <div class="text-4xl">🏆</div>
                <h2 class="text-3xl font-black text-blue-600 mt-2">
                    {{ $registrations->where('status','Completed')->count() }}
                </h2>
                <p class="text-gray-500 text-sm">Completed Events</p>
            </div>

        </div>

    </div>

    {{-- ================= SEARCH & FILTER ================= --}}
    <section class="max-w-7xl mx-auto px-6 mt-10">

        <form method="GET" action="{{ route('my.events') }}">

            <div class="bg-white rounded-[30px] shadow-xl p-6">

                <h2 class="text-2xl font-black text-gray-800 mb-6">
                    🔎 Search My Applications
                </h2>

                <div class="grid lg:grid-cols-3 gap-4">

                    <input type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search Event Name..."
                        class="rounded-2xl border-gray-300 focus:ring-green-500 focus:border-green-500">

                    <select name="status"
                        class="rounded-2xl border-gray-300 focus:ring-green-500">

                        <option value="All">All Status</option>

                        <option value="Pending"
                            {{ request('status')=='Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="Approved"
                            {{ request('status')=='Approved' ? 'selected' : '' }}>
                            Approved
                        </option>

                        <option value="Completed"
                            {{ request('status')=='Completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                        <option value="Rejected"
                            {{ request('status')=='Rejected' ? 'selected' : '' }}>
                            Rejected
                        </option>

                    </select>

                    <button
                        class="bg-green-600 hover:bg-green-700 text-white rounded-2xl py-3 font-semibold">
                        Search Events
                    </button>

                </div>

            </div>

        </form>

    </section>

    {{-- ================= MY APPLICATIONS TABLE ================= --}}
    <section class="max-w-7xl mx-auto px-6 py-12">

        <div class="bg-white rounded-[30px] shadow-xl overflow-hidden">

            {{-- Table Header --}}
            <div class="bg-gradient-to-r from-green-700 to-emerald-600 px-6 py-5 text-white">

                <h2 class="text-3xl font-black">
                    📋 My Volunteer Applications
                </h2>

                <p class="text-green-100 mt-1">
                    Every application is shown in one row with actions based on status.
                </p>

            </div>

            {{-- Column Header --}}
            <div class="hidden lg:grid grid-cols-12 bg-green-50 px-6 py-4 text-sm font-bold text-green-800 border-b">

                <div class="col-span-4">Event</div>

                <div class="col-span-2 text-center">Application Date</div>

                <div class="col-span-2 text-center">Event Date</div>

                <div class="col-span-2 text-center">Status</div>

                <div class="col-span-2 text-center">Actions</div>

            </div>

            {{-- ================= LOOP START ================= --}}
            @forelse($registrations as $registration)

                @php
                    $event = $registration->event;

                    $percentage = ($event->capacity > 0)
                        ? ($event->filled_slots / $event->capacity) * 100
                        : 0;

                    $remaining = $event->capacity - $event->filled_slots;

                    $badgeColor = match($event->category){
                        'Environment' => 'bg-green-100 text-green-700',
                        'Healthcare' => 'bg-red-100 text-red-700',
                        'Education' => 'bg-blue-100 text-blue-700',
                        'Community Service' => 'bg-yellow-100 text-yellow-700',
                        default => 'bg-gray-100 text-gray-700'
                    };

                    $statusColor = match($registration->status){
                        'Pending' => 'bg-yellow-100 text-yellow-700',
                        'Approved' => 'bg-green-100 text-green-700',
                        'Completed' => 'bg-blue-100 text-blue-700',
                        'Rejected' => 'bg-red-100 text-red-700',
                        default => 'bg-gray-100 text-gray-700'
                    };
                @endphp

                                {{-- ================= APPLICATION ROW ================= --}}
                <div class="border-b hover:bg-green-50 transition duration-300 p-5">

                    <div class="grid lg:grid-cols-12 gap-5 items-center">

                        {{-- ================= EVENT IMAGE + NAME ================= --}}
                        <div class="lg:col-span-4 flex gap-4 items-center">

                            {{-- Event Banner --}}
                            <div class="w-28 h-28 rounded-2xl overflow-hidden shadow-lg flex-shrink-0">

                                @if($event->banner)
                                    <img src="{{ asset('images/events/'.$event->banner) }}"
                                        class="w-full h-full object-cover hover:scale-110 transition duration-500">
                                @else
                                    <img src="{{ asset('images/events/default.jpg') }}"
                                        class="w-full h-full object-cover">
                                @endif

                            </div>

                            {{-- Event Details --}}
                            <div>

                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $badgeColor }}">
                                    {{ $event->category }}
                                </span>

                                <h3 class="text-lg font-black text-gray-800 mt-2">
                                    {{ $event->title }}
                                </h3>

                                <p class="text-sm text-gray-500 line-clamp-2 mt-1">
                                    {{ $event->description }}
                                </p>

                                <div class="flex items-center gap-3 mt-2 text-xs text-gray-600 flex-wrap">

                                    <span>📍 {{ $event->city }}</span>

                                    <span>🏢 {{ $event->venue }}</span>

                                </div>

                            </div>

                        </div>

                        {{-- ================= APPLICATION DATE ================= --}}
                        <div class="lg:col-span-2 text-center">

                            <p class="text-xs text-gray-500">Application Date</p>

                            <h4 class="font-bold text-green-700 mt-1">
                                {{ $registration->created_at->format('d M Y') }}
                            </h4>

                            <p class="text-xs text-gray-400">
                                {{ $registration->created_at->format('h:i A') }}
                            </p>

                        </div>

                        {{-- ================= EVENT DATE ================= --}}
                        <div class="lg:col-span-2 text-center">

                            <p class="text-xs text-gray-500">Event Date</p>

                            <h4 class="font-bold text-orange-600 mt-1">
                                {{ $event->event_date->format('d M Y') }}
                            </h4>

                            <p class="text-xs text-gray-500">
                                {{ date('h:i A', strtotime($event->start_time)) }}
                            </p>

                        </div>

                        {{-- ================= STATUS ================= --}}
                        <div class="lg:col-span-2">

                            <div class="flex justify-center">

                                <span class="px-4 py-2 rounded-full text-sm font-bold {{ $statusColor }}">
                                    @if($registration->status == 'Pending')
                                        ⏳ Pending
                                    @elseif($registration->status == 'Approved')
                                        ✅ Approved
                                    @elseif($registration->status == 'Completed')
                                        🏆 Completed
                                    @elseif($registration->status == 'Rejected')
                                        ❌ Rejected
                                    @endif
                                </span>

                            </div>

                            {{-- Capacity --}}
                            

                        </div>

                        {{-- ================= ACTION BUTTONS ================= --}}
                        <div class="lg:col-span-2">

                            @if($registration->status == 'Pending')

                                {{-- Pending = Edit + Delete --}}
                                <div class="space-y-2">


                                    <a href="{{ route('my.events.view',$registration->id) }}"
                                    class="block text-center bg-blue-600 text-white py-2 rounded-xl font-bold hover:bg-blue-700 transition">

                                        👁️ View 

                                    </a>

                                    <a href="{{ route('events.register.edit',$registration->id) }}"
                                        class="block text-center bg-green-600 text-white py-2 rounded-xl text-sm font-bold hover:bg-green-700 transition">

                                        ✏️ Edit

                                    </a>

                                    <form action="{{ route('my.events.cancel',$registration->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="w-full bg-red-500 text-white py-2 rounded-xl text-sm font-bold hover:bg-red-600 transition">

                                            🗑 Delete

                                        </button>

                                    </form>

                                </div>

                            @elseif($registration->status == 'Approved')

                                {{-- Approved = ID Card --}}
                                <div class="space-y-2">

                                    <a href="{{ route('volunteer.id',$registration->id) }}"
                                        class="block text-center bg-gradient-to-r from-green-600 to-emerald-600 text-white py-2 rounded-xl text-sm font-bold hover:scale-105 transition">

                                        🪪 ID Card

                                    </a>

                                    <button
                                        class="w-full border border-green-600 text-green-700 py-2 rounded-xl text-sm font-semibold cursor-default">

                                        Ready for Event

                                    </button>

                                </div>

                            @elseif($registration->status == 'Completed')

                                {{-- Completed = Certificate --}}
                                <div class="space-y-2">

                                    <a href="{{ route('certificate.download',$registration->id) }}"
                                        class="block text-center bg-yellow-500 text-white py-2 rounded-xl text-sm font-bold hover:bg-yellow-600 transition">

                                        🏆 Certificate

                                    </a>

                                    <button
                                        class="w-full border border-yellow-500 text-yellow-600 py-2 rounded-xl text-sm font-semibold cursor-default">

                                        Event Completed

                                    </button>

                                </div>

                            @elseif($registration->status == 'Rejected')

                                {{-- Rejected --}}
                                <div class="space-y-2">

                                    <button
                                        class="w-full bg-gray-300 text-gray-700 py-2 rounded-xl text-sm font-bold cursor-not-allowed">

                                        ❌ Rejected

                                    </button>

                                    <a href="#"
                                        class="block text-center text-red-600 text-sm underline">

                                        View Reason

                                    </a>

                                </div>

                            @endif

                        </div>

                    </div>

                </div>
                            @empty

                {{-- ================= EMPTY STATE ================= --}}
                <div class="p-12 text-center">

                    <div class="flex justify-center mb-6">
                        <div class="w-28 h-28 bg-green-100 rounded-full flex items-center justify-center shadow-lg">
                            <span class="text-6xl">🌿</span>
                        </div>
                    </div>

                    <h2 class="text-3xl font-black text-green-700 mb-3">
                        No Registered Events Yet
                    </h2>

                    <p class="text-gray-500 max-w-xl mx-auto leading-7">
                        You haven't registered for any volunteer event yet.
                        Browse available events and start your volunteering journey with VolunteerHub.
                    </p>

                    <a href="{{ route('events.index') }}"
                        class="inline-flex items-center gap-3 mt-8 bg-gradient-to-r from-green-600 to-emerald-600 text-white px-8 py-4 rounded-2xl font-bold shadow-lg hover:scale-105 transition">

                        🌍 Browse Volunteer Events

                    </a>

                </div>

            @endforelse

        </div>

    </section>

    {{-- ================= QUICK SUMMARY SECTION ================= --}}
    <section class="max-w-7xl mx-auto px-6 pb-12">

        <div class="bg-white rounded-[30px] shadow-lg p-8">

            <h2 class="text-3xl font-black text-green-700 mb-8 text-center">
                📊 My Volunteer Summary
            </h2>

            <div class="grid md:grid-cols-4 gap-5">

                <div class="bg-green-50 rounded-2xl p-5 text-center">
                    <div class="text-4xl mb-2">🌍</div>
                    <h3 class="text-2xl font-black text-green-700">
                        {{ $registrations->count() }}
                    </h3>
                    <p class="text-gray-500 text-sm mt-1">Applications Submitted</p>
                </div>

                <div class="bg-yellow-50 rounded-2xl p-5 text-center">
                    <div class="text-4xl mb-2">⏳</div>
                    <h3 class="text-2xl font-black text-yellow-700">
                        {{ $registrations->where('status','Pending')->count() }}
                    </h3>
                    <p class="text-gray-500 text-sm mt-1">Waiting for Approval</p>
                </div>

                <div class="bg-emerald-50 rounded-2xl p-5 text-center">
                    <div class="text-4xl mb-2">🪪</div>
                    <h3 class="text-2xl font-black text-emerald-700">
                        {{ $registrations->where('status','Approved')->count() }}
                    </h3>
                    <p class="text-gray-500 text-sm mt-1">Volunteer ID Cards</p>
                </div>

                <div class="bg-blue-50 rounded-2xl p-5 text-center">
                    <div class="text-4xl mb-2">🏆</div>
                    <h3 class="text-2xl font-black text-blue-700">
                        {{ $registrations->where('status','Completed')->count() }}
                    </h3>
                    <p class="text-gray-500 text-sm mt-1">Certificates Earned</p>
                </div>

            </div>

        </div>

    </section>

    {{-- ================= COMMUNITY CTA ================= --}}
    <section class="max-w-7xl mx-auto px-6 pb-16">

        <div class="bg-gradient-to-r from-green-700 via-emerald-600 to-teal-600 rounded-[35px] p-10 text-white text-center shadow-xl">

            <div class="text-6xl mb-4">🌱</div>

            <h2 class="text-4xl font-black">
                Continue Your Volunteer Journey
            </h2>

            <p class="mt-4 text-green-100 max-w-2xl mx-auto text-lg">
                Discover new volunteer opportunities, participate in community activities,
                earn verified certificates and make a positive impact in society.
            </p>

            <div class="flex flex-wrap justify-center gap-4 mt-8">

                <a href="{{ route('events.index') }}"
                    class="bg-white text-green-700 px-8 py-4 rounded-2xl font-bold hover:bg-green-100 transition shadow-lg">

                    🌍 Explore More Events

                </a>

                <a href="{{ route('saved.events') }}"
                    class="border border-white/30 px-8 py-4 rounded-2xl font-bold hover:bg-white/20 transition">

                    ❤️ View Saved Events

                </a>

            </div>

        </div>

    </section>

</div>

@endsection