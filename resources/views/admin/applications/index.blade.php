@extends('layouts.admin')

@section('content')

@php
    $total = $applications->count();
    $pending = $applications->filter(fn($app) => strtolower($app->status ?? '') === 'pending')->count();
    $approved = $applications->filter(fn($app) => strtolower($app->status ?? '') === 'approved')->count();
    $completed = $applications->filter(fn($app) => strtolower($app->status ?? '') === 'completed')->count();
    $rejected = $applications->filter(fn($app) => strtolower($app->status ?? '') === 'rejected')->count();
@endphp

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-50">

    {{-- ========================================================= --}}
    {{-- HERO --}}
    {{-- ========================================================= --}}

    <div class="relative overflow-hidden bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500">

        {{-- Decorative circles --}}
        <div class="absolute -top-20 -right-20 w-72 h-72 bg-white/10 rounded-full"></div>
        <div class="absolute -bottom-32 -left-20 w-80 h-80 bg-white/10 rounded-full"></div>

        <div class="relative max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-10">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                <div>

                    <div class="inline-flex items-center gap-2
                                px-4 py-2 mb-4
                                rounded-full
                                bg-white/15
                                border border-white/20
                                backdrop-blur-md">

                        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>

                        <span class="text-white text-xs font-bold uppercase tracking-widest">
                            Application Management
                        </span>

                    </div>

                    <h1 class="text-3xl md:text-4xl lg:text-5xl
                               font-black text-white tracking-tight">
                        Volunteer Applications
                    </h1>

                    <p class="mt-3 max-w-2xl text-green-50 text-sm md:text-base">
                        Review and manage volunteer applications submitted for your events.
                    </p>

                </div>

                {{-- Total Applications --}}
                <div class="flex items-center gap-4
                            px-6 py-5
                            rounded-3xl
                            bg-white/15
                            border border-white/20
                            backdrop-blur-xl
                            shadow-2xl">

                    <div class="w-14 h-14 rounded-2xl
                                bg-white/20
                                flex items-center justify-center">

                        <span class="text-2xl">📋</span>

                    </div>

                    <div>
                        <p class="text-xs text-green-100 font-semibold">
                            Total Applications
                        </p>

                        <p class="text-3xl font-black text-white">
                            {{ $total }}
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </div>


    {{-- ========================================================= --}}
    {{-- CONTENT --}}
    {{-- ========================================================= --}}

    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-8">


        {{-- ===================================================== --}}
        {{-- STAT CARDS --}}
        {{-- ===================================================== --}}

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

            {{-- Pending --}}
            <div class="group bg-white rounded-3xl p-5
                        border border-amber-100
                        shadow-sm
                        hover:shadow-xl
                        hover:-translate-y-1
                        transition-all duration-300">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Pending
                        </p>

                        <p class="mt-2 text-3xl font-black text-slate-800">
                            {{ $pending }}
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-2xl
                                bg-amber-50
                                flex items-center justify-center
                                text-xl">
                        ⏳
                    </div>

                </div>

                <div class="mt-4 h-1.5 rounded-full bg-amber-100">
                    <div class="h-full rounded-full bg-amber-400"
                         style="width: {{ $total > 0 ? min(100, ($pending / $total) * 100) : 0 }}%">
                    </div>
                </div>

            </div>


            {{-- Approved --}}
            <div class="group bg-white rounded-3xl p-5
                        border border-green-100
                        shadow-sm
                        hover:shadow-xl
                        hover:-translate-y-1
                        transition-all duration-300">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Approved
                        </p>

                        <p class="mt-2 text-3xl font-black text-slate-800">
                            {{ $approved }}
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-2xl
                                bg-green-50
                                flex items-center justify-center
                                text-xl">
                        ✓
                    </div>

                </div>

                <div class="mt-4 h-1.5 rounded-full bg-green-100">
                    <div class="h-full rounded-full bg-green-500"
                         style="width: {{ $total > 0 ? min(100, ($approved / $total) * 100) : 0 }}%">
                    </div>
                </div>

            </div>


            {{-- Completed --}}
            <div class="group bg-white rounded-3xl p-5
                        border border-blue-100
                        shadow-sm
                        hover:shadow-xl
                        hover:-translate-y-1
                        transition-all duration-300">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Completed
                        </p>

                        <p class="mt-2 text-3xl font-black text-slate-800">
                            {{ $completed }}
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-2xl
                                bg-blue-50
                                flex items-center justify-center
                                text-xl">
                        🏆
                    </div>

                </div>

                <div class="mt-4 h-1.5 rounded-full bg-blue-100">
                    <div class="h-full rounded-full bg-blue-500"
                         style="width: {{ $total > 0 ? min(100, ($completed / $total) * 100) : 0 }}%">
                    </div>
                </div>

            </div>


            {{-- Rejected --}}
            <div class="group bg-white rounded-3xl p-5
                        border border-red-100
                        shadow-sm
                        hover:shadow-xl
                        hover:-translate-y-1
                        transition-all duration-300">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Rejected
                        </p>

                        <p class="mt-2 text-3xl font-black text-slate-800">
                            {{ $rejected }}
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-2xl
                                bg-red-50
                                flex items-center justify-center
                                text-xl">
                        ✕
                    </div>

                </div>

                <div class="mt-4 h-1.5 rounded-full bg-red-100">
                    <div class="h-full rounded-full bg-red-500"
                         style="width: {{ $total > 0 ? min(100, ($rejected / $total) * 100) : 0 }}%">
                    </div>
                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- SEARCH / FILTER BAR --}}
        {{-- ===================================================== --}}

        <div class="bg-white rounded-[28px]
                    border border-slate-100
                    shadow-lg shadow-slate-200/40
                    p-4 md:p-5 mb-6">

            <div class="flex flex-col md:flex-row gap-4">

                {{-- Search --}}
                <div class="relative flex-1">

                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                        🔍
                    </span>

                    <input
                        type="text"
                        id="applicationSearch"
                        placeholder="Search volunteer or event..."
                        class="w-full pl-11 pr-4 py-3.5
                               rounded-2xl
                               border border-slate-200
                               bg-slate-50
                               text-sm
                               font-medium
                               outline-none
                               focus:ring-2
                               focus:ring-emerald-400
                               focus:border-transparent
                               transition"
                    >

                </div>


                {{-- Status --}}
                <div class="md:w-56">

                    <select
                        id="statusFilter"
                        class="w-full px-4 py-3.5
                               rounded-2xl
                               border border-slate-200
                               bg-slate-50
                               text-sm
                               font-bold
                               text-slate-700
                               outline-none
                               focus:ring-2
                               focus:ring-emerald-400">

                        <option value="all">All Status</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="completed">Completed</option>
                        <option value="rejected">Rejected</option>

                    </select>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- APPLICATION TABLE --}}
        {{-- ===================================================== --}}

        <div class="bg-white rounded-[32px]
                    border border-slate-100
                    shadow-xl shadow-slate-200/50
                    overflow-hidden">


            {{-- Table Header --}}
            <div class="px-6 py-5
                        bg-gradient-to-r from-slate-50 via-white to-emerald-50
                        border-b border-slate-100">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-lg font-black text-slate-800">
                            Submitted Applications
                        </h2>

                        <p class="text-xs text-slate-400 mt-1">
                            Review complete application details from the View button.
                        </p>

                    </div>

                    <div class="hidden sm:flex items-center gap-2
                                px-3 py-2
                                rounded-xl
                                bg-emerald-50
                                text-emerald-700">

                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                        <span class="text-xs font-black">
                            {{ $total }} Applications
                        </span>

                    </div>

                </div>

            </div>


            {{-- Horizontal Scroll --}}
            <div class="overflow-x-auto">

                <div class="min-w-[1100px]">

                    {{-- Column Header --}}
                    <div class="grid grid-cols-[2.2fr_2.4fr_1.3fr_1.2fr_1.5fr]
                                items-center gap-4
                                px-6 py-4
                                bg-slate-50/70
                                border-b border-slate-100">

                        <div class="text-[10px] font-black uppercase tracking-widest text-slate-400">
                            Volunteer
                        </div>

                        <div class="text-[10px] font-black uppercase tracking-widest text-slate-400">
                            Event
                        </div>

                        <div class="text-[10px] font-black uppercase tracking-widest text-slate-400">
                            Applied
                        </div>

                        <div class="text-[10px] font-black uppercase tracking-widest text-slate-400">
                            Status
                        </div>

                        <div class="text-[10px] font-black uppercase tracking-widest text-slate-400 text-right">
                            Action
                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- APPLICATION ROWS --}}
                    {{-- ================================================= --}}

                    <div id="applicationList">

                        @forelse($applications as $application)

                            @php
                                $status = strtolower($application->status ?? 'pending');

                                $statusClasses = match($status) {
                                    'approved' => 'bg-green-50 text-green-700 border-green-200',
                                    'completed' => 'bg-blue-50 text-blue-700 border-blue-200',
                                    'rejected' => 'bg-red-50 text-red-700 border-red-200',
                                    default => 'bg-amber-50 text-amber-700 border-amber-200',
                                };

                                $statusIcon = match($status) {
                                    'approved' => '✓',
                                    'completed' => '🏆',
                                    'rejected' => '✕',
                                    default => '⏳',
                                };
                            @endphp


                            <div
                                class="application-row group
                                       grid grid-cols-[2.2fr_2.4fr_1.3fr_1.2fr_1.5fr]
                                       items-center gap-4
                                       px-6 py-5
                                       border-b border-slate-100
                                       hover:bg-gradient-to-r
                                       hover:from-green-50/70
                                       hover:to-emerald-50/40
                                       transition-all duration-300"
                                data-search="{{ strtolower(
                                    ($application->user->name ?? '') . ' ' .
                                    ($application->user->email ?? '') . ' ' .
                                    ($application->event->title ?? '')
                                ) }}"
                                data-status="{{ $status }}"
                            >


                                {{-- ===================================== --}}
                                {{-- VOLUNTEER --}}
                                {{-- ===================================== --}}

                                <div class="flex items-center gap-3 min-w-0">

                                    {{-- Avatar --}}
                                    <div class="relative flex-shrink-0">

                                        @if($application->user && $application->user->profile_photo)

                                            <img
                                                src="{{ asset('storage/'.$application->user->profile_photo) }}"
                                                alt="{{ $application->user->name }}"
                                                class="w-12 h-12 rounded-2xl object-cover
                                                       ring-4 ring-white
                                                       shadow-md"
                                            >

                                        @else

                                            <div class="w-12 h-12 rounded-2xl
                                                        bg-gradient-to-br
                                                        from-green-600
                                                        to-emerald-500
                                                        text-white
                                                        flex items-center justify-center
                                                        font-black text-lg
                                                        shadow-md">

                                                {{ strtoupper(substr($application->user->name ?? 'V', 0, 1)) }}

                                            </div>

                                        @endif

                                        <span class="absolute -bottom-1 -right-1
                                                     w-4 h-4
                                                     rounded-full
                                                     bg-emerald-500
                                                     border-2 border-white">
                                        </span>

                                    </div>


                                    <div class="min-w-0">

                                        <p class="font-black text-slate-800 truncate">
                                            {{ $application->user->name ?? 'Unknown Volunteer' }}
                                        </p>

                                        <p class="text-xs text-slate-400 truncate mt-0.5">
                                            {{ $application->user->email ?? 'No email' }}
                                        </p>

                                    </div>

                                </div>


                                {{-- ===================================== --}}
                                {{-- EVENT --}}
                                {{-- ===================================== --}}

                                <div class="min-w-0">

                                    <p class="font-black text-slate-800 truncate">
                                        {{ $application->event->title ?? 'Event Deleted' }}
                                    </p>

                                    <div class="flex items-center gap-3 mt-1">

                                        <span class="inline-flex items-center gap-1
                                                     text-xs text-slate-500">
                                            📅
                                            {{ $application->event?->event_date
                                                ? \Carbon\Carbon::parse($application->event->event_date)->format('d M Y')
                                                : '—' }}
                                        </span>

                                        <span class="text-slate-300">•</span>

                                        <span class="inline-flex items-center gap-1
                                                     text-xs text-slate-500 truncate">
                                            📍
                                            {{ $application->event->city ?? '—' }}
                                        </span>

                                    </div>

                                </div>


                                {{-- ===================================== --}}
                                {{-- APPLIED --}}
                                {{-- ===================================== --}}

                                <div>

                                    <p class="text-sm font-bold text-slate-700">
                                        {{ $application->created_at
                                            ? $application->created_at->format('d M Y')
                                            : '—' }}
                                    </p>

                                    <p class="text-[11px] text-slate-400 mt-0.5">
                                        {{ $application->created_at
                                            ? $application->created_at->format('h:i A')
                                            : '' }}
                                    </p>

                                </div>


                                {{-- ===================================== --}}
                                {{-- STATUS --}}
                                {{-- ===================================== --}}

                                <div>

                                    <span class="inline-flex items-center gap-2
                                                 px-3 py-2
                                                 rounded-xl
                                                 border
                                                 {{ $statusClasses }}
                                                 text-[11px]
                                                 font-black
                                                 uppercase
                                                 tracking-wide">

                                        <span>
                                            {{ $statusIcon }}
                                        </span>

                                        {{ ucfirst($status) }}

                                    </span>

                                </div>


                                {{-- ===================================== --}}
                                {{-- ONLY VIEW BUTTON --}}
                                {{-- ===================================== --}}

                                <div class="flex justify-end">

                                    <a
                                        href="{{ route('admin.applications.show', $application) }}"
                                        class="inline-flex items-center justify-center gap-2
                                               px-5 py-3
                                               rounded-2xl
                                               bg-gradient-to-r
                                               from-green-600
                                               via-emerald-600
                                               to-teal-500
                                               text-white
                                               text-xs
                                               font-black
                                               shadow-lg
                                               shadow-emerald-200/60
                                               hover:shadow-xl
                                               hover:-translate-y-1
                                               hover:from-green-700
                                               hover:via-emerald-700
                                               hover:to-teal-600
                                               transition-all duration-300">

                                        <span class="text-sm">
                                            👁
                                        </span>

                                        View Application

                                    </a>

                                </div>

                            </div>

                        @empty

                            {{-- EMPTY STATE --}}

                            <div class="py-20 text-center">

                                <div class="mx-auto w-20 h-20
                                            rounded-3xl
                                            bg-gradient-to-br
                                            from-green-50
                                            to-emerald-100
                                            flex items-center justify-center
                                            text-3xl
                                            mb-5">
                                    📋
                                </div>

                                <h3 class="text-xl font-black text-slate-800">
                                    No Applications Yet
                                </h3>

                                <p class="text-sm text-slate-400 mt-2">
                                    Volunteer applications will appear here.
                                </p>

                            </div>

                        @endforelse

                    </div>


                    {{-- No Search Result --}}
                    <div id="noResults"
                         class="hidden py-16 text-center">

                        <div class="text-4xl mb-4">
                            🔍
                        </div>

                        <h3 class="text-lg font-black text-slate-800">
                            No applications found
                        </h3>

                        <p class="text-sm text-slate-400 mt-1">
                            Try changing your search or status filter.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ============================================================= --}}
{{-- SEARCH + FILTER SCRIPT --}}
{{-- ============================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('applicationSearch');
    const statusFilter = document.getElementById('statusFilter');
    const rows = document.querySelectorAll('.application-row');
    const noResults = document.getElementById('noResults');

    function filterApplications() {

        const searchValue = searchInput.value.toLowerCase().trim();
        const statusValue = statusFilter.value;

        let visibleCount = 0;

        rows.forEach(row => {

            const searchText = row.dataset.search || '';
            const rowStatus = row.dataset.status || '';

            const matchesSearch =
                searchText.includes(searchValue);

            const matchesStatus =
                statusValue === 'all' ||
                rowStatus === statusValue;

            if (matchesSearch && matchesStatus) {

                row.classList.remove('hidden');
                visibleCount++;

            } else {

                row.classList.add('hidden');

            }

        });

        if (visibleCount === 0 && rows.length > 0) {

            noResults.classList.remove('hidden');

        } else {

            noResults.classList.add('hidden');

        }

    }

    searchInput.addEventListener('input', filterApplications);
    statusFilter.addEventListener('change', filterApplications);

});

</script>

@endsection