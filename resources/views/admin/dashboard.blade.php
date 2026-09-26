@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-50">

<!-- ================= HERO SECTION ================= -->

<section class="relative overflow-hidden rounded-b-[45px]
                bg-gradient-to-r from-green-700 via-emerald-600 to-teal-600
                text-white shadow-2xl">

    <!-- Background Blur -->
    <div class="absolute -top-16 -right-16 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 -left-16 w-72 h-72 bg-green-300/20 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6 py-14">

        <div class="flex flex-col lg:flex-row items-center justify-between gap-10">

            <!-- Welcome Text -->
            <div class="flex-1">

                <span class="inline-flex items-center gap-2 bg-white/15 px-4 py-2 rounded-full text-sm font-semibold backdrop-blur-md">
                    🛡 VolunteerHub • Admin Portal
                </span>

                <h1 class="text-5xl lg:text-6xl font-black mt-5 leading-tight">
                    Welcome Back,
                    <span class="text-yellow-300">
                        {{ Auth::user()->name }}
                    </span>
                </h1>

                <p class="mt-5 text-lg text-green-100 max-w-xl leading-8">
                    Manage volunteers, events, applications and community activities from one powerful dashboard.
                </p>

                <div class="flex flex-wrap gap-4 mt-8">

                    <a href="#overview"
                       class="bg-yellow-400 hover:bg-yellow-300 text-black px-7 py-3 rounded-full font-bold shadow-lg transition">
                        📊 Dashboard Overview
                    </a>

                    <a href="#quick-actions"
                       class="border border-white px-7 py-3 rounded-full hover:bg-white hover:text-green-700 transition">
                        ⚡ Quick Actions
                    </a>

                </div>

            </div>

            <!-- Admin Profile -->
            <div class="w-full lg:w-80">

                <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-6 border border-white/20 shadow-2xl">

                    <div class="flex flex-col items-center text-center">

                        @if(Auth::user()->profile_photo)

                            <img src="{{ asset('storage/'.Auth::user()->profile_photo) }}"
                                 class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg">

                        @else

                            <div class="w-24 h-24 rounded-full bg-white text-green-700 flex items-center justify-center text-4xl font-black shadow-xl">
                                {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                            </div>

                        @endif

                        <h2 class="text-2xl font-bold mt-4">
                            {{ Auth::user()->name }}
                        </h2>

                        <p class="text-green-100 text-sm mt-1">
                            {{ Auth::user()->email }}
                        </p>

                        <span class="mt-4 bg-yellow-300 text-green-900 px-4 py-2 rounded-full text-xs font-bold">
                            Administrator
                        </span>

                    </div>

                    <!-- Mini Stats -->

                    <div class="grid grid-cols-2 gap-4 mt-6">

                        <div class="bg-white/10 rounded-2xl p-4 text-center">
                            <h3 class="text-2xl font-black">{{ $stats['totalEvents'] }}</h3>
                            <p class="text-xs text-green-100 mt-1">Events</p>
                        </div>

                        <div class="bg-white/10 rounded-2xl p-4 text-center">
                            <h3 class="text-2xl font-black">{{ $stats['totalVolunteers'] }}</h3>
                            <p class="text-xs text-green-100 mt-1">Volunteers</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ================= OVERVIEW TITLE ================= -->

<div id="overview" class="max-w-7xl mx-auto px-6 py-10">

    <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-8">

        <div>

            <h2 class="text-3xl font-black text-gray-800">
                📊 Admin Dashboard Overview
            </h2>

            <p class="text-gray-500 mt-2">
                Live overview of VolunteerHub platform performance.
            </p>

        </div>

        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">
            📅 {{ now()->format('l, d M Y') }}
        </span>

    </div>
    <!-- ================= STATISTICS ================= -->

<div class="grid grid-cols-2 lg:grid-cols-4 gap-5">

    <!-- Events -->
    <div class="bg-white rounded-3xl p-6 shadow-lg hover:-translate-y-2 hover:shadow-2xl transition">

        <div class="flex justify-between items-center">
            <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">
                📅
            </div>

            <span class="text-green-600 text-sm font-bold">
                Active
            </span>
        </div>

        <p class="text-gray-500 mt-5">Total Events</p>

        <h2 class="text-4xl font-black text-green-600 mt-2">
            {{ $stats['totalEvents'] }}
        </h2>

        <p class="text-green-600 text-sm mt-3">
            {{ $stats['activeEvents'] }} Active Events
        </p>

    </div>

    <!-- Volunteers -->
    <div class="bg-white rounded-3xl p-6 shadow-lg hover:-translate-y-2 hover:shadow-2xl transition">

        <div class="flex justify-between items-center">
            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">
                👥
            </div>

            <span class="text-blue-600 text-sm font-bold">
                Registered
            </span>
        </div>

        <p class="text-gray-500 mt-5">Total Volunteers</p>

        <h2 class="text-4xl font-black text-blue-600 mt-2">
            {{ $stats['totalVolunteers'] }}
        </h2>

        <p class="text-blue-600 text-sm mt-3">
            Community Members
        </p>

    </div>

    <!-- Applications -->
    <div class="bg-white rounded-3xl p-6 shadow-lg hover:-translate-y-2 hover:shadow-2xl transition">

        <div class="flex justify-between items-center">
            <div class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center text-3xl">
                📝
            </div>

            <span class="text-orange-600 text-sm font-bold">
                {{ $stats['pendingApplications'] }} Pending
            </span>
        </div>

        <p class="text-gray-500 mt-5">Applications</p>

        <h2 class="text-4xl font-black text-orange-500 mt-2">
            {{ $stats['totalApplications'] }}
        </h2>

        <p class="text-orange-500 text-sm mt-3">
            Volunteer Registrations
        </p>

    </div>

    <!-- Approved -->
    <div class="bg-white rounded-3xl p-6 shadow-lg hover:-translate-y-2 hover:shadow-2xl transition">

        <div class="flex justify-between items-center">
            <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-3xl">
                ✅
            </div>

            <span class="text-purple-600 text-sm font-bold">
                {{ $stats['approvalRate'] }}%
            </span>
        </div>

        <p class="text-gray-500 mt-5">Approved</p>

        <h2 class="text-4xl font-black text-purple-600 mt-2">
            {{ $stats['approvedApplications'] }}
        </h2>

        <p class="text-purple-500 text-sm mt-3">
            Successfully Approved
        </p>

    </div>

</div>

<!-- ================= ANALYTICS ================= -->

<div class="grid md:grid-cols-3 gap-6 mt-10">

    <div class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-3xl p-6 text-white shadow-xl">

        <p class="uppercase text-sm tracking-wide text-green-100">
            Pending Review
        </p>

        <h2 class="text-5xl font-black mt-3">
            {{ $stats['pendingApplications'] }}
        </h2>

        <p class="mt-3 text-green-100">
            Applications waiting for approval.
        </p>

    </div>

    <div class="bg-gradient-to-r from-blue-600 to-cyan-600 rounded-3xl p-6 text-white shadow-xl">

        <p class="uppercase text-sm tracking-wide text-blue-100">
            Approval Rate
        </p>

        <h2 class="text-5xl font-black mt-3">
            {{ $stats['approvalRate'] }}%
        </h2>

        <p class="mt-3 text-blue-100">
            Overall volunteer approval success.
        </p>

    </div>

    <div class="bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl p-6 text-white shadow-xl">

        <p class="uppercase text-sm tracking-wide text-purple-100">
            Completed Events
        </p>

        <h2 class="text-5xl font-black mt-3">
            {{ $stats['completedEvents'] }}
        </h2>

        <p class="mt-3 text-purple-100">
            Successfully completed community events.
        </p>

    </div>

</div>

<!-- ================= QUICK ACTIONS ================= -->

<div id="quick-actions" class="mt-14">

    <div class="mb-7">

        <h2 class="text-3xl font-black text-gray-800">
            ⚡ Quick Actions
        </h2>

        <p class="text-gray-500 mt-2">
            Manage important VolunteerHub operations instantly.
        </p>

    </div>

    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- Create Event -->
        <a href="{{ route('admin.events.create') }}"
           class="group bg-gradient-to-r from-green-500 to-emerald-600 rounded-3xl p-6 text-white shadow-xl hover:-translate-y-2 transition">

            <div class="text-5xl mb-5 group-hover:scale-110 transition">➕</div>

            <h3 class="text-xl font-bold">Create Event</h3>

            <p class="text-green-100 text-sm mt-2">
                Publish a new volunteer event.
            </p>

        </a>

        <!-- Manage Events -->
        <a href="{{ route('admin.events.index') }}"
           class="group bg-gradient-to-r from-blue-500 to-cyan-600 rounded-3xl p-6 text-white shadow-xl hover:-translate-y-2 transition">

            <div class="text-5xl mb-5 group-hover:scale-110 transition">📅</div>

            <h3 class="text-xl font-bold">Manage Events</h3>

            <p class="text-blue-100 text-sm mt-2">
                {{ $stats['totalEvents'] }} Events Available
            </p>

        </a>

        <!-- Volunteers -->
        <a href="{{ route('admin.volunteers.index') }}"
           class="group bg-gradient-to-r from-purple-500 to-indigo-600 rounded-3xl p-6 text-white shadow-xl hover:-translate-y-2 transition">

            <div class="text-5xl mb-5 group-hover:scale-110 transition">👥</div>

            <h3 class="text-xl font-bold">Manage Volunteers</h3>

            <p class="text-purple-100 text-sm mt-2">
                {{ $stats['totalVolunteers'] }} Registered Volunteers
            </p>

        </a>

        <!-- Applications -->
        <a href="{{ route('admin.applications.index') }}"
           class="group bg-gradient-to-r from-orange-500 to-red-500 rounded-3xl p-6 text-white shadow-xl hover:-translate-y-2 transition">

            <div class="text-5xl mb-5 group-hover:scale-110 transition">📝</div>

            <h3 class="text-xl font-bold">Review Applications</h3>

            <p class="text-orange-100 text-sm mt-2">
                {{ $stats['pendingApplications'] }} Pending Requests
            </p>

        </a>

    </div>

</div>

    <!-- ================= MANAGEMENT OVERVIEW ================= -->

    <div class="mt-16 grid lg:grid-cols-2 gap-8">

        <!-- ================= RECENT APPLICATIONS ================= -->

        <div class="bg-white rounded-[30px] shadow-xl border border-green-100 overflow-hidden">

            <div class="bg-gradient-to-r from-orange-500 to-red-500 p-6 text-white flex justify-between items-center">

                <div>
                    <h2 class="text-2xl font-black">📝 Recent Applications</h2>
                    <p class="text-orange-100 text-sm">
                        Latest volunteer registration requests.
                    </p>
                </div>

                <span class="bg-white/20 px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $stats['pendingApplications'] }} Pending
                </span>

            </div>

            <div class="p-6 space-y-4">

                @forelse($recentApplications as $application)

                    <div class="flex items-center justify-between bg-gray-50 hover:bg-green-50 p-4 rounded-2xl transition">

                        <div class="flex items-center gap-4">

                            @if($application->user->profile_photo)

                                <img src="{{ asset('storage/'.$application->user->profile_photo) }}"
                                     class="w-12 h-12 rounded-full object-cover">

                            @else

                                <div class="w-12 h-12 rounded-full bg-green-600 text-white flex items-center justify-center font-bold">
                                    {{ strtoupper(substr($application->user->name,0,1)) }}
                                </div>

                            @endif

                            <div>

                                <h4 class="font-bold text-gray-800">
                                    {{ $application->user->name }}
                                </h4>

                                <p class="text-sm text-gray-500">
                                    {{ $application->event->title }}
                                </p>

                                <p class="text-xs text-gray-400">
                                    {{ $application->created_at->diffForHumans() }}
                                </p>

                            </div>

                        </div>

                        @if($application->status == 'approved')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                Approved
                            </span>

                        @elseif($application->status == 'pending')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">
                                Pending
                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">
                                Rejected
                            </span>

                        @endif

                    </div>

                @empty

                    <div class="text-center py-8 text-gray-500">
                        No applications found.
                    </div>

                @endforelse

                <a href="{{ route('admin.applications.index') }}"
                   class="block text-center mt-6 bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-bold">
                    View All Applications
                </a>

            </div>

        </div>

        <!-- ================= EVENT STATUS ================= -->

        <div class="bg-white rounded-[30px] shadow-xl border border-green-100 overflow-hidden">

            <div class="bg-gradient-to-r from-green-600 to-emerald-600 p-6 text-white">

                <h2 class="text-2xl font-black">📊 Event Status Overview</h2>

                <p class="text-green-100 text-sm">
                    Live status of all VolunteerHub events.
                </p>

            </div>

            <div class="p-6 space-y-6">

                {{-- Active Events --}}
                <div>

                    <div class="flex justify-between mb-2">

                        <span class="font-semibold text-gray-700">
                            🌱 Active Events
                        </span>

                        <span class="font-bold text-green-600">
                            {{ $stats['activeEvents'] }}
                        </span>

                    </div>

                    @php
                        $activeWidth = $stats['totalEvents'] > 0
                            ? ($stats['activeEvents']/$stats['totalEvents'])*100
                            : 0;
                    @endphp

                    <div class="w-full bg-gray-200 rounded-full h-3">

                        <div class="bg-green-500 h-3 rounded-full"
                             style="width:{{ $activeWidth }}%">
                        </div>

                    </div>

                </div>

                {{-- Completed --}}
                <div>

                    <div class="flex justify-between mb-2">

                        <span class="font-semibold text-gray-700">
                            ✅ Completed Events
                        </span>

                        <span class="font-bold text-purple-600">
                            {{ $stats['completedEvents'] }}
                        </span>

                    </div>

                    @php
                        $completedWidth = $stats['totalEvents'] > 0
                            ? ($stats['completedEvents']/$stats['totalEvents'])*100
                            : 0;
                    @endphp

                    <div class="w-full bg-gray-200 rounded-full h-3">

                        <div class="bg-purple-500 h-3 rounded-full"
                             style="width:{{ $completedWidth }}%">
                        </div>

                    </div>

                </div>

                {{-- Pending Applications --}}
                <div>

                    <div class="flex justify-between mb-2">

                        <span class="font-semibold text-gray-700">
                            📝 Pending Applications
                        </span>

                        <span class="font-bold text-orange-500">
                            {{ $stats['pendingApplications'] }}
                        </span>

                    </div>

                    @php
                        $pendingWidth = $stats['totalApplications'] > 0
                            ? ($stats['pendingApplications']/$stats['totalApplications'])*100
                            : 0;
                    @endphp

                    <div class="w-full bg-gray-200 rounded-full h-3">

                        <div class="bg-orange-500 h-3 rounded-full"
                             style="width:{{ $pendingWidth }}%">
                        </div>

                    </div>

                </div>

                {{-- Approved --}}
                <div>

                    <div class="flex justify-between mb-2">

                        <span class="font-semibold text-gray-700">
                            🏆 Approved Applications
                        </span>

                        <span class="font-bold text-blue-600">
                            {{ $stats['approvedApplications'] }}
                        </span>

                    </div>

                    <div class="w-full bg-gray-200 rounded-full h-3">

                        <div class="bg-blue-500 h-3 rounded-full"
                             style="width:{{ $stats['approvalRate'] }}%">
                        </div>

                    </div>

                </div>

                {{-- Summary Card --}}

                <div class="mt-8 bg-gradient-to-r from-green-50 to-emerald-50 p-5 rounded-2xl border border-green-200">

                    <p class="text-gray-500 text-sm uppercase">
                        Platform Summary
                    </p>

                    <h3 class="text-3xl font-black text-green-700 mt-2">
                        {{ $stats['totalEvents'] }} Events Running
                    </h3>

                    <p class="text-gray-600 mt-2 text-sm">
                        {{ $stats['totalVolunteers'] }} volunteers are registered on VolunteerHub.
                    </p>

                </div>

            </div>

        </div>

    </div>

    

                

    <!-- ================= PLATFORM SUMMARY ================= -->

    <div class="mt-16 grid md:grid-cols-4 gap-5">

        <div class="bg-white rounded-3xl p-6 shadow-lg border border-green-100 text-center">

            <div class="text-5xl">🌱</div>

            <h3 class="text-3xl font-black text-green-700 mt-3">
                {{ $stats['activeEvents'] }}
            </h3>

            <p class="text-gray-500 text-sm mt-2">
                Active Events
            </p>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-lg border border-blue-100 text-center">

            <div class="text-5xl">👥</div>

            <h3 class="text-3xl font-black text-blue-700 mt-3">
                {{ $stats['totalVolunteers'] }}
            </h3>

            <p class="text-gray-500 text-sm mt-2">
                Registered Volunteers
            </p>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-lg border border-orange-100 text-center">

            <div class="text-5xl">📄</div>

            <h3 class="text-3xl font-black text-orange-600 mt-3">
                {{ $stats['pendingApplications'] }}
            </h3>

            <p class="text-gray-500 text-sm mt-2">
                Pending Requests
            </p>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-lg border border-purple-100 text-center">

            <div class="text-5xl">🏆</div>

            <h3 class="text-3xl font-black text-purple-700 mt-3">
                {{ $stats['approvalRate'] }}%
            </h3>

            <p class="text-gray-500 text-sm mt-2">
                Approval Rate
            </p>

        </div>

    </div>

    <!-- ================= CTA BANNER ================= -->

    <div class="mt-16 mb-8">

        <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-r from-green-700 via-emerald-600 to-teal-600 p-10 text-white shadow-2xl">

            <div class="absolute -right-16 -top-16 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

            <div class="relative z-10 flex flex-col lg:flex-row justify-between items-center gap-8">

                <div>

                    <p class="uppercase tracking-widest text-green-200 text-sm font-semibold">
                        VolunteerHub Administrator
                    </p>

                    <h2 class="text-4xl lg:text-5xl font-black mt-3">
                        Empower Volunteers, Create Impact 🌿
                    </h2>

                    <p class="mt-4 text-green-100 max-w-2xl leading-7">
                        Manage volunteers, approve applications, create meaningful community events,
                        generate certificates and build a better VolunteerHub community.
                    </p>

                </div>

                <div class="flex flex-col gap-4 w-full lg:w-auto">

                    <a href="{{ route('admin.events.create') }}"
                       class="bg-yellow-400 hover:bg-yellow-300 text-black px-8 py-4 rounded-2xl font-black text-center shadow-xl">
                        ➕ Create New Event
                    </a>

                    <a href="{{ route('admin.applications.index') }}"
                       class="border border-white hover:bg-white hover:text-green-700 px-8 py-4 rounded-2xl font-bold text-center transition">
                        📝 Review Applications
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection