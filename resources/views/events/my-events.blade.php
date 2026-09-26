@extends('layouts.student')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-100">

    {{-- ================= SUCCESS MESSAGE ================= --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-6 pt-6">
            <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl shadow">
                <div class="flex items-center gap-3">
                    <span class="text-3xl">✅</span>
                    <div>
                        <h3 class="font-bold text-lg">Success</h3>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- ================= HERO SECTION (MY EVENTS) ================= --}}
<section class="relative overflow-hidden rounded-b-[45px] bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500 text-white">

    {{-- Background Blur --}}
    <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-300/20 rounded-full blur-3xl"></div>

    {{-- Floating Icons --}}
    <div class="absolute top-10 right-10 text-8xl opacity-10 rotate-12">📅</div>
    <div class="absolute bottom-8 right-1/4 text-7xl opacity-10 -rotate-12">🏆</div>

    <div class="max-w-7xl mx-auto px-8 py-16 relative z-10">

        {{-- Top Badge --}}
        <span class="bg-white/20 px-5 py-2 rounded-full text-sm font-semibold">
            🌿 VolunteerHub Student Portal
        </span>

        {{-- Heading --}}
        <h1 class="text-5xl lg:text-6xl font-black mt-6 leading-tight">
            My Volunteer  Events
        </h1>

        {{-- Description --}}
        <p class="mt-5 text-lg text-green-100 max-w-2xl leading-8">
            View all your registered volunteer events, check approval status,
            download your Volunteer ID Card after approval and receive certificates
            after successfully completing community events.
        </p>

        {{-- Buttons --}}
        <div class="mt-8 flex flex-wrap gap-4">

            <a href="{{ route('events.index') }}"
               class="bg-white text-green-700 px-6 py-3 rounded-xl font-bold hover:bg-green-100 transition shadow-lg">
                🌍 Explore Events
            </a>

            <a href="{{ route('dashboard') }}"
               class="border border-white/40 px-6 py-3 rounded-xl hover:bg-white/20 transition">
                ← Back Dashboard
            </a>

        </div>

    </div>

</section>
  
   
    {{-- ================= DASHBOARD STATS ================= --}}
    <div class="max-w-7xl mx-auto px-6 -mt-10 relative z-20">

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">

            {{-- Registered --}}
            <div class="bg-white rounded-3xl shadow-lg p-6 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="flex justify-between items-center">
                    <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">
                        📅
                    </div>
                </div>

                <p class="mt-5 text-gray-500 text-sm">
                    Registered Events
                </p>

                <h2 class="text-4xl font-black text-green-700 mt-2">
                    {{ $registrations->count() }}
                </h2>
            </div>

            {{-- Pending --}}
            <div class="bg-white rounded-3xl shadow-lg p-6 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="flex justify-between items-center">
                    <div class="w-14 h-14 rounded-2xl bg-yellow-100 flex items-center justify-center text-3xl">
                        ⏳
                    </div>
                </div>

                <p class="mt-5 text-gray-500 text-sm">
                    Pending Approval
                </p>

                <h2 class="text-4xl font-black text-yellow-600 mt-2">
                    {{ $registrations->where('status','Pending')->count() }}
                </h2>
            </div>

            {{-- Approved --}}
            <div class="bg-white rounded-3xl shadow-lg p-6 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="flex justify-between items-center">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center text-3xl">
                        ✅
                    </div>
                </div>

                <p class="mt-5 text-gray-500 text-sm">
                    Approved Events
                </p>

                <h2 class="text-4xl font-black text-emerald-600 mt-2">
                    {{ $registrations->where('status','Approved')->count() }}
                </h2>
            </div>

            {{-- Completed --}}
            <div class="bg-white rounded-3xl shadow-lg p-6 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="flex justify-between items-center">
                    <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">
                        🏆
                    </div>
                </div>

                <p class="mt-5 text-gray-500 text-sm">
                    Completed Events
                </p>

                <h2 class="text-4xl font-black text-blue-600 mt-2">
                    {{ $registrations->where('status','Completed')->count() }}
                </h2>
            </div>

        </div>

    </div>

    {{-- ================= SEARCH & FILTER ================= --}}
    <section class="max-w-7xl mx-auto px-6 mt-12">

        <div class="bg-white rounded-[30px] shadow-xl p-6">

            <div class="flex justify-between items-center mb-6">

                <div>
                    <h2 class="text-2xl font-black text-green-700">
                        🔎 Search My Volunteer Events
                    </h2>

                    <p class="text-gray-500 text-sm mt-1">
                        Search by event name or filter using application status.
                    </p>
                </div>

            </div>

            <form method="GET" action="{{ route('my.events') }}">

                <div class="grid lg:grid-cols-3 gap-4">

                    {{-- Search --}}
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search event name..."
                        class="rounded-2xl border-gray-300 focus:ring-green-500 focus:border-green-500"
                    >

                    {{-- Status --}}
                    <select
                        name="status"
                        class="rounded-2xl border-gray-300 focus:ring-green-500 focus:border-green-500">

                        <option value="All">All Status</option>

                        <option value="Pending"
                            {{ request('status')=='Pending' ? 'selected':'' }}>
                            ⏳ Pending
                        </option>

                        <option value="Approved"
                            {{ request('status')=='Approved' ? 'selected':'' }}>
                            ✅ Approved
                        </option>

                        <option value="Completed"
                            {{ request('status')=='Completed' ? 'selected':'' }}>
                            🏆 Completed
                        </option>

                        <option value="Rejected"
                            {{ request('status')=='Rejected' ? 'selected':'' }}>
                            ❌ Rejected
                        </option>

                    </select>

                    {{-- Button --}}
                    <button
                        type="submit"
                        class="rounded-2xl bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold hover:scale-105 transition shadow-lg">

                        Search Events

                    </button>

                </div>

            </form>

            {{-- Active Filters --}}
            <div class="flex flex-wrap gap-3 mt-5">

                @if(request('search'))
                    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                        🔍 {{ request('search') }}
                    </span>
                @endif

                @if(request('status') && request('status')!='All')
                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                        {{ request('status') }}
                    </span>
                @endif

                @if(request()->hasAny(['search','status']))
                    <a href="{{ route('my.events') }}"
                       class="bg-red-100 text-red-600 px-4 py-2 rounded-full text-sm font-semibold hover:bg-red-200 transition">
                        ✖ Clear Filters
                    </a>
                @endif

            </div>

        </div>

    </section>


    {{-- ================= MY APPLICATIONS TABLE ================= --}}
<section class="max-w-7xl mx-auto px-6 py-12">

    <div class="bg-white rounded-[30px] shadow-xl overflow-hidden">

        {{-- Table Header --}}
        <div class="bg-gradient-to-r from-green-700 to-emerald-600 px-6 py-5 text-white">

            <h2 class="text-3xl font-black">
                📋 My Volunteer Applications
            </h2>

            <p class="text-green-100 mt-2">
                View and manage all your registered volunteer events.
            </p>

        </div>

        {{-- Desktop Header --}}
        <div class="hidden lg:grid grid-cols-12 gap-4 bg-green-50 px-6 py-4 text-sm font-bold text-green-800 border-b">

            <div class="col-span-4">Event</div>
            <div class="col-span-2 text-center">Application Date</div>
            <div class="col-span-2 text-center">Event Date</div>
            <div class="col-span-2 text-center">Status</div>
            <div class="col-span-2 text-center">Actions</div>

        </div>

        {{-- Loop --}}
        @forelse($registrations as $registration)

            @php
                $event = $registration->event;
                $status = strtolower(trim($registration->status));

                $badgeColor = match($event->category){
                    'Environment' => 'bg-green-100 text-green-700',
                    'Healthcare' => 'bg-red-100 text-red-700',
                    'Education' => 'bg-blue-100 text-blue-700',
                    'Community Service' => 'bg-yellow-100 text-yellow-700',
                    default => 'bg-gray-100 text-gray-700'
                };

                $statusColor = match($status){
                    'pending' => 'bg-yellow-100 text-yellow-700',
                    'approved' => 'bg-green-100 text-green-700',
                    'completed' => 'bg-blue-100 text-blue-700',
                    'rejected' => 'bg-red-100 text-red-700',
                    default => 'bg-gray-100 text-gray-700'
                };
            @endphp

            <div class="border-b hover:bg-green-50 transition p-5">

                <div class="grid lg:grid-cols-12 gap-5 items-center">

                    {{-- Event Info --}}
                    <div class="lg:col-span-4 flex gap-4">

                        <div class="w-24 h-24 rounded-2xl overflow-hidden shadow">

                            @if($event->banner)
                                <img src="{{ asset('images/events/'.$event->banner) }}"
                                     class="w-full h-full object-cover">
                            @else
                                <img src="{{ asset('images/events/default.jpg') }}"
                                     class="w-full h-full object-cover">
                            @endif

                        </div>

                        <div>

                            <span class="px-3 py-1 rounded-full text-xs font-bold {{ $badgeColor }}">
                                {{ $event->category }}
                            </span>

                            <h3 class="font-black text-lg text-gray-800 mt-2">
                                {{ $event->title }}
                            </h3>

                            <p class="text-sm text-gray-500 line-clamp-2 mt-1">
                                {{ $event->description }}
                            </p>

                            <div class="flex flex-wrap gap-3 mt-2 text-xs text-gray-600">

                                <span>📍 {{ $event->city }}</span>

                                <span>🏢 {{ $event->venue }}</span>

                            </div>

                        </div>

                    </div>

                    {{-- Application Date --}}
                    <div class="lg:col-span-2 text-center">

                        <p class="text-xs text-gray-500">Application Date</p>

                        <h4 class="font-bold text-green-700 mt-1">
                            {{ $registration->created_at->format('d M Y') }}
                        </h4>

                        <p class="text-xs text-gray-500">
                            {{ $registration->created_at->format('h:i A') }}
                        </p>

                    </div>

                    {{-- Event Date --}}
                    <div class="lg:col-span-2 text-center">

                        <p class="text-xs text-gray-500">Event Date</p>

                        <h4 class="font-bold text-orange-600 mt-1">
                            {{ $event->event_date->format('d M Y') }}
                        </h4>

                        <p class="text-xs text-gray-500">
                            {{ date('h:i A', strtotime($event->start_time)) }}
                        </p>

                    </div>

                    {{-- Status --}}
                    <div class="lg:col-span-2 flex justify-center">

                        <span class="px-4 py-2 rounded-full text-sm font-bold {{ $statusColor }}">

                            @if($status=='pending')
                                ⏳ Pending
                            @elseif($status=='approved')
                                ✅ Approved
                            @elseif($status=='completed')
                                🏆 Completed
                            @elseif($status=='rejected')
                                ❌ Rejected
                            @endif

                        </span>

                    </div>

                {{-- ================= ACTION BUTTONS ================= --}}
<div class="lg:col-span-2">

    @php
        $status = strtolower(trim($registration->status ?? 'pending'));
    @endphp

    <div class="flex flex-col gap-2 w-full">

        {{-- VIEW BUTTON (Always Visible) --}}
        <a href="{{ route('my.events.view', $registration->id) }}"
           class="w-full bg-slate-100 hover:bg-slate-200 text-slate-700 py-2.5 rounded-xl text-center text-sm font-bold transition">
            👁️ View
        </a>

        {{-- Pending --}}
        @if($status == 'pending')

            <a href="{{ route('events.register.edit', $registration->id) }}"
               class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-xl text-center text-sm font-bold transition">
                ✏️ Edit
            </a>

            <form action="{{ route('my.events.cancel', $registration->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                        onclick="return confirm('Cancel this application?')"
                        class="w-full bg-red-500 hover:bg-red-600 text-white py-2.5 rounded-xl text-sm font-bold transition">
                    🗑 Delete
                </button>
            </form>

        {{-- Approved --}}
        @elseif($status == 'approved')

            <a href="{{ route('volunteer.id.card', $registration->id) }}"
            class="w-full bg-gradient-to-r from-green-600 to-emerald-600
                    text-white py-2.5 rounded-xl text-center text-sm font-bold
                    hover:from-green-700 hover:to-emerald-700 transition">
                🪪 ID Card
            </a>

        {{-- Completed --}}
        @elseif($status == 'completed')

        <a href="{{ route('certificate.download', $registration->id) }}"
        class="w-full text-center
                bg-gradient-to-r from-yellow-500 to-orange-500
                hover:from-yellow-600 hover:to-orange-600
                text-white py-2.5 rounded-xl text-sm font-bold
                transition shadow-lg">
            🏆 Certificate
        </a>

    

        

        {{-- Rejected --}}
        @elseif($status == 'rejected')

            <button disabled
                    class="w-full bg-red-100 text-red-600 py-2.5 rounded-xl text-sm font-bold cursor-not-allowed">
                ❌ Rejected
            </button>

        @endif

    </div>

</div>
                </div>

            </div>

        @empty

            {{-- Empty State --}}
            <div class="p-12 text-center">

                <div class="text-7xl mb-5">🌿</div>

                <h2 class="text-3xl font-black text-green-700">
                    No Registered Events Yet
                </h2>

                <p class="text-gray-500 mt-3">
                    You haven't registered for any volunteer event.
                </p>

                <a href="{{ route('events.index') }}"
                   class="inline-block mt-6 bg-green-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-green-700 transition">

                    🌍 Browse Events

                </a>

            </div>

        @endforelse

    </div>

</section>




{{-- =========================================================
    QUICK VOLUNTEER SUMMARY
========================================================= --}}
<section class="max-w-7xl mx-auto px-6 pb-12">

    @php
        $totalRegistrations = $registrations->count();

        $pendingCount = $registrations->filter(function ($registration) {
            return strtolower(trim($registration->status ?? '')) === 'pending';
        })->count();

        $approvedCount = $registrations->filter(function ($registration) {
            return strtolower(trim($registration->status ?? '')) === 'approved';
        })->count();

        $completedCount = $registrations->filter(function ($registration) {
            return strtolower(trim($registration->status ?? '')) === 'completed';
        })->count();
    @endphp

    <div class="bg-white rounded-[30px] shadow-xl p-8">

        <div class="text-center mb-8">

            <span class="inline-block bg-green-100 text-green-700
                px-4 py-2 rounded-full text-sm font-bold">
                📊 Volunteer Activity
            </span>

            <h2 class="text-3xl font-black text-green-700 mt-4">
                My Volunteer Summary
            </h2>

            <p class="text-gray-500 mt-2">
                A quick overview of your VolunteerHub journey.
            </p>

        </div>


        <div class="grid md:grid-cols-4 gap-5">

            {{-- Total --}}
            <div class="group bg-gradient-to-br from-green-50 to-emerald-100
                rounded-2xl p-6 text-center border border-green-100
                hover:-translate-y-2 hover:shadow-lg transition duration-300">

                <div class="w-14 h-14 mx-auto bg-green-100
                    rounded-2xl flex items-center justify-center
                    text-3xl group-hover:scale-110 transition">
                    🌍
                </div>

                <h3 class="text-3xl font-black text-green-700 mt-4">
                    {{ $totalRegistrations }}
                </h3>

                <p class="text-gray-600 text-sm mt-1 font-semibold">
                    Applications Submitted
                </p>

            </div>


            {{-- Pending --}}
            <div class="group bg-gradient-to-br from-yellow-50 to-orange-100
                rounded-2xl p-6 text-center border border-yellow-100
                hover:-translate-y-2 hover:shadow-lg transition duration-300">

                <div class="w-14 h-14 mx-auto bg-yellow-100
                    rounded-2xl flex items-center justify-center
                    text-3xl group-hover:scale-110 transition">
                    ⏳
                </div>

                <h3 class="text-3xl font-black text-yellow-700 mt-4">
                    {{ $pendingCount }}
                </h3>

                <p class="text-gray-600 text-sm mt-1 font-semibold">
                    Waiting for Approval
                </p>

            </div>


            {{-- Approved --}}
            <div class="group bg-gradient-to-br from-emerald-50 to-teal-100
                rounded-2xl p-6 text-center border border-emerald-100
                hover:-translate-y-2 hover:shadow-lg transition duration-300">

                <div class="w-14 h-14 mx-auto bg-emerald-100
                    rounded-2xl flex items-center justify-center
                    text-3xl group-hover:scale-110 transition">
                    🪪
                </div>

                <h3 class="text-3xl font-black text-emerald-700 mt-4">
                    {{ $approvedCount }}
                </h3>

                <p class="text-gray-600 text-sm mt-1 font-semibold">
                    Approved Events
                </p>

            </div>


            {{-- Completed --}}
            <div class="group bg-gradient-to-br from-blue-50 to-indigo-100
                rounded-2xl p-6 text-center border border-blue-100
                hover:-translate-y-2 hover:shadow-lg transition duration-300">

                <div class="w-14 h-14 mx-auto bg-blue-100
                    rounded-2xl flex items-center justify-center
                    text-3xl group-hover:scale-110 transition">
                    🏆
                </div>

                <h3 class="text-3xl font-black text-blue-700 mt-4">
                    {{ $completedCount }}
                </h3>

                <p class="text-gray-600 text-sm mt-1 font-semibold">
                    Certificates Earned
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    VOLUNTEER CTA
========================================================= --}}
<section class="max-w-7xl mx-auto px-6 pb-16">

    <div class="relative overflow-hidden
        bg-gradient-to-r from-green-700 via-emerald-600 to-teal-600
        rounded-[35px] p-10 lg:p-14 text-white text-center shadow-2xl">

        {{-- Decorative circles --}}
        <div class="absolute -top-20 -right-20
            w-64 h-64 bg-white/10 rounded-full blur-2xl">
        </div>

        <div class="absolute -bottom-20 -left-20
            w-64 h-64 bg-green-300/10 rounded-full blur-2xl">
        </div>


        <div class="relative z-10">

            <div class="text-6xl mb-5">
                🌱
            </div>

            <span class="inline-block bg-white/15
                border border-white/20 px-5 py-2
                rounded-full text-sm font-semibold">
                Keep Making an Impact
            </span>

            <h2 class="text-4xl lg:text-5xl font-black mt-5">
                Continue Your Volunteer Journey
            </h2>

            <p class="mt-5 text-green-100 max-w-2xl
                mx-auto text-lg leading-8">

                Discover new volunteer opportunities, participate
                in meaningful community activities, earn verified
                certificates and make a positive impact in society.

            </p>


            {{-- CTA Buttons --}}
            <div class="flex flex-wrap justify-center gap-4 mt-9">

                <a
                    href="{{ route('events.index') }}"
                    class="inline-flex items-center gap-2
                    bg-white text-green-700
                    px-8 py-4 rounded-2xl font-bold
                    shadow-lg hover:bg-green-50
                    hover:-translate-y-1 transition">

                    🌍 Explore More Events

                </a>


                <a
                    href="{{ route('saved.events') }}"
                    class="inline-flex items-center gap-2
                    border border-white/30
                    bg-white/10 backdrop-blur-sm
                    px-8 py-4 rounded-2xl font-bold
                    hover:bg-white/20
                    hover:-translate-y-1 transition">

                    ❤️ View Saved Events

                </a>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    PAGE END
========================================================= --}}

</div>

@endsection



