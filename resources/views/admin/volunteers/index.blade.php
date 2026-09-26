@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-emerald-50/60">


{{-- ========================================================= --}}
{{-- HERO SECTION --}}
{{-- ========================================================= --}}

<section class="relative overflow-hidden
                bg-gradient-to-br from-green-800 via-emerald-700 to-teal-600
                text-white shadow-2xl">

    {{-- Background decoration --}}
    <div class="absolute -top-32 -right-32 w-[500px] h-[500px]
                rounded-full bg-white/10 blur-3xl"></div>

    <div class="absolute -bottom-40 -left-32 w-[450px] h-[450px]
                rounded-full bg-teal-300/10 blur-3xl"></div>

    <div class="absolute top-1/3 right-1/3 w-40 h-40
                rounded-full bg-emerald-300/10 blur-2xl"></div>

    <div class="relative z-10 max-w-7xl mx-auto
                px-5 sm:px-6 lg:px-8 py-14 lg:py-18">

        <div class="flex flex-col lg:flex-row
                    lg:items-center lg:justify-between gap-10">

            {{-- Hero content --}}
            <div class="max-w-3xl">

                <div class="inline-flex items-center gap-2
                            px-4 py-2 rounded-full
                            bg-white/10 backdrop-blur-xl
                            border border-white/20
                            shadow-lg">

                    <span class="w-2.5 h-2.5 rounded-full
                                 bg-emerald-300 animate-pulse"></span>

                    <span class="text-xs font-black uppercase
                                 tracking-[0.18em]">

                        Admin • Volunteer Management

                    </span>

                </div>

                <h1 class="mt-6 text-4xl sm:text-5xl lg:text-6xl
                           font-black tracking-tight leading-[1.05]">

                    Volunteer
                    <span class="text-emerald-200">
                        Directory
                    </span>

                </h1>

                <p class="mt-5 text-base sm:text-lg
                          text-green-50/90
                          max-w-2xl leading-8">

                    Manage registered volunteers, monitor account
                    status and access complete volunteer profiles
                    from one centralized dashboard.

                </p>

                <div class="mt-8 flex flex-wrap gap-3">

                    <a href="{{ route('admin.dashboard') }}"
                       class="inline-flex items-center gap-2
                              px-6 py-3.5
                              rounded-2xl
                              bg-white text-green-700
                              font-black text-sm
                              shadow-xl
                              hover:-translate-y-1
                              hover:bg-green-50
                              transition-all duration-300">

                        <span>⌂</span>
                        Dashboard

                    </a>

                    <button
                        onclick="document.getElementById('volunteerSearch').focus()"
                        class="inline-flex items-center gap-2
                               px-6 py-3.5
                               rounded-2xl
                               bg-white/10
                               backdrop-blur-md
                               border border-white/20
                               text-white
                               font-black text-sm
                               hover:bg-white/20
                               hover:-translate-y-1
                               transition-all duration-300">

                        <span>⌕</span>
                        Find Volunteer

                    </button>

                </div>

            </div>


            {{-- Hero summary card --}}
            <div class="w-full lg:w-auto">

                <div class="min-w-[280px]
                            rounded-[30px]
                            bg-white/10
                            backdrop-blur-2xl
                            border border-white/20
                            p-6
                            shadow-2xl">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-xs font-bold
                                      text-green-100 uppercase
                                      tracking-wider">

                                Community Size

                            </p>

                            <p class="mt-2 text-5xl font-black">

                                {{ $volunteers->count() }}

                            </p>

                            <p class="mt-1 text-sm text-green-100">

                                Registered Volunteers

                            </p>
                        </div>

                        <div class="w-16 h-16 rounded-2xl
                                    bg-white/15
                                    flex items-center justify-center
                                    text-3xl">

                            👥

                        </div>

                    </div>

                    <div class="mt-6 pt-5
                                border-t border-white/10
                                flex items-center gap-2">

                        <span class="w-2 h-2 rounded-full
                                     bg-emerald-300"></span>

                        <span class="text-xs font-semibold
                                     text-green-100">

                            VolunteerHub Community

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- STAT CARDS --}}
{{-- ========================================================= --}}

<section class="relative z-20
                max-w-7xl mx-auto
                px-5 sm:px-6 lg:px-8
                -mt-8">

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

        {{-- Total --}}
        <div class="group bg-white rounded-[28px]
                    border border-slate-100
                    p-5 sm:p-6
                    shadow-xl shadow-slate-200/50
                    hover:-translate-y-2
                    hover:shadow-2xl
                    transition-all duration-300">

            <div class="flex items-start justify-between">

                <div class="w-12 h-12 rounded-2xl
                            bg-gradient-to-br
                            from-green-100 to-emerald-100
                            flex items-center justify-center
                            text-2xl
                            group-hover:scale-110
                            transition">

                    👥

                </div>

                <span class="text-[10px] font-black
                             uppercase tracking-widest
                             text-green-600
                             bg-green-50
                             px-2.5 py-1.5 rounded-full">

                    Total

                </span>

            </div>

            <p class="mt-5 text-3xl sm:text-4xl
                      font-black text-slate-800">

                {{ $volunteers->count() }}

            </p>

            <p class="mt-1 text-sm font-semibold text-slate-400">

                Total Volunteers

            </p>

            <div class="mt-4 h-1.5 rounded-full bg-green-100 overflow-hidden">

                <div class="h-full w-full rounded-full
                            bg-gradient-to-r
                            from-green-500 to-emerald-500">
                </div>

            </div>

        </div>


        {{-- Active --}}
        <div class="group bg-white rounded-[28px]
                    border border-slate-100
                    p-5 sm:p-6
                    shadow-xl shadow-slate-200/50
                    hover:-translate-y-2
                    hover:shadow-2xl
                    transition-all duration-300">

            <div class="flex items-start justify-between">

                <div class="w-12 h-12 rounded-2xl
                            bg-emerald-100
                            flex items-center justify-center
                            text-2xl
                            group-hover:scale-110
                            transition">

                    ✓

                </div>

                <span class="text-[10px] font-black
                             uppercase tracking-widest
                             text-emerald-600
                             bg-emerald-50
                             px-2.5 py-1.5 rounded-full">

                    Active

                </span>

            </div>

            <p class="mt-5 text-3xl sm:text-4xl
                      font-black text-slate-800">

                {{ $volunteers->where('status', 'active')->count() }}

            </p>

            <p class="mt-1 text-sm font-semibold text-slate-400">

                Active Volunteers

            </p>

            <div class="mt-4 h-1.5 rounded-full bg-emerald-100 overflow-hidden">

                <div class="h-full rounded-full
                            bg-emerald-500"
                     style="width: {{ $volunteers->count() > 0
                        ? min(100, ($volunteers->where('status','active')->count() / $volunteers->count()) * 100)
                        : 0 }}%">
                </div>

            </div>

        </div>


        {{-- Deactive --}}
        <div class="group bg-white rounded-[28px]
                    border border-slate-100
                    p-5 sm:p-6
                    shadow-xl shadow-slate-200/50
                    hover:-translate-y-2
                    hover:shadow-2xl
                    transition-all duration-300">

            <div class="flex items-start justify-between">

                <div class="w-12 h-12 rounded-2xl
                            bg-red-100
                            flex items-center justify-center
                            text-2xl
                            group-hover:scale-110
                            transition">

                    !

                </div>

                <span class="text-[10px] font-black
                             uppercase tracking-widest
                             text-red-600
                             bg-red-50
                             px-2.5 py-1.5 rounded-full">

                    Inactive

                </span>

            </div>

            <p class="mt-5 text-3xl sm:text-4xl
                      font-black text-slate-800">

                {{ $volunteers->where('status', 'deactive')->count() }}

            </p>

            <p class="mt-1 text-sm font-semibold text-slate-400">

                Deactive Volunteers

            </p>

            <div class="mt-4 h-1.5 rounded-full bg-red-100 overflow-hidden">

                <div class="h-full rounded-full
                            bg-red-500"
                     style="width: {{ $volunteers->count() > 0
                        ? min(100, ($volunteers->where('status','deactive')->count() / $volunteers->count()) * 100)
                        : 0 }}%">
                </div>

            </div>

        </div>


        {{-- New --}}
        <div class="group bg-white rounded-[28px]
                    border border-slate-100
                    p-5 sm:p-6
                    shadow-xl shadow-slate-200/50
                    hover:-translate-y-2
                    hover:shadow-2xl
                    transition-all duration-300">

            <div class="flex items-start justify-between">

                <div class="w-12 h-12 rounded-2xl
                            bg-teal-100
                            flex items-center justify-center
                            text-2xl
                            group-hover:scale-110
                            transition">

                    ✦

                </div>

                <span class="text-[10px] font-black
                             uppercase tracking-widest
                             text-teal-600
                             bg-teal-50
                             px-2.5 py-1.5 rounded-full">

                    30 Days

                </span>

            </div>

            <p class="mt-5 text-3xl sm:text-4xl
                      font-black text-slate-800">

                {{ $volunteers->where('created_at', '>=', now()->subDays(30))->count() }}

            </p>

            <p class="mt-1 text-sm font-semibold text-slate-400">

                New Volunteers

            </p>

            <div class="mt-4 h-1.5 rounded-full bg-teal-100 overflow-hidden">

                <div class="h-full w-full rounded-full
                            bg-gradient-to-r
                            from-emerald-500 to-teal-500">
                </div>

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- SEARCH --}}
{{-- ========================================================= --}}

<section class="max-w-7xl mx-auto
                px-5 sm:px-6 lg:px-8
                mt-10">

    <div class="relative overflow-hidden
                bg-white
                rounded-[30px]
                border border-slate-100
                shadow-xl shadow-slate-200/40
                p-6 lg:p-7">

        <div class="absolute top-0 right-0
                    w-48 h-48
                    bg-emerald-50
                    rounded-full blur-3xl
                    pointer-events-none"></div>

        <div class="relative">

            <div class="flex flex-col lg:flex-row
                        lg:items-center
                        lg:justify-between gap-5">

                <div>

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-2xl
                                    bg-gradient-to-br
                                    from-green-100 to-emerald-100
                                    flex items-center justify-center
                                    text-xl">

                            ⌕

                        </div>

                        <div>

                            <h2 class="text-xl sm:text-2xl
                                       font-black text-slate-800">

                                Find Volunteers

                            </h2>

                            <p class="text-sm text-slate-400 mt-0.5">

                                Search by name, email or phone number

                            </p>

                        </div>

                    </div>

                </div>

                <div id="resultCount"
                     class="self-start lg:self-auto
                            inline-flex items-center gap-2
                            px-4 py-2.5
                            rounded-full
                            bg-emerald-50
                            text-emerald-700
                            text-xs font-black">

                    <span class="w-2 h-2 rounded-full
                                 bg-emerald-500"></span>

                    {{ $volunteers->count() }} Volunteers

                </div>

            </div>


            <div class="mt-6 flex flex-col sm:flex-row gap-3">

                <div class="relative flex-1">

                    <span class="absolute left-4 top-1/2
                                 -translate-y-1/2
                                 text-slate-400 text-lg">

                        ⌕

                    </span>

                    <input
                        type="text"
                        id="volunteerSearch"
                        placeholder="Search volunteer name, email or phone..."
                        class="w-full pl-11 pr-5 py-4
                               rounded-2xl
                               border border-slate-200
                               bg-slate-50
                               text-sm font-medium
                               text-slate-700
                               outline-none
                               focus:bg-white
                               focus:ring-2
                               focus:ring-emerald-400
                               focus:border-emerald-400
                               transition">

                </div>

                <button
                    onclick="clearSearch()"
                    class="px-6 py-4 rounded-2xl
                           bg-slate-100
                           hover:bg-slate-200
                           text-slate-700
                           font-black text-sm
                           transition-all">

                    ↻ Clear

                </button>

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- DIRECTORY --}}
{{-- ========================================================= --}}

<section class="max-w-7xl mx-auto
                px-5 sm:px-6 lg:px-8
                py-10">

    <div class="bg-white
                rounded-[32px]
                border border-slate-100
                shadow-2xl shadow-slate-200/50
                overflow-hidden">

        {{-- Directory header --}}
        <div class="relative overflow-hidden
                    bg-gradient-to-r
                    from-green-700
                    via-emerald-600
                    to-teal-500
                    px-6 lg:px-8 py-7">

            <div class="absolute -right-10 -top-24
                        w-60 h-60
                        rounded-full
                        bg-white/10"></div>

            <div class="relative z-10
                        flex flex-col sm:flex-row
                        sm:items-center
                        sm:justify-between gap-5">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14
                                rounded-2xl
                                bg-white/15
                                backdrop-blur-md
                                border border-white/20
                                flex items-center justify-center
                                text-2xl">

                        👥

                    </div>

                    <div>

                        <h2 class="text-2xl sm:text-3xl
                                   font-black text-white">

                            Volunteer Directory

                        </h2>

                        <p class="text-sm text-green-100 mt-1">

                            Registered members of VolunteerHub

                        </p>

                    </div>

                </div>

                <div class="inline-flex items-center
                            gap-2
                            px-4 py-2.5
                            rounded-2xl
                            bg-white/10
                            border border-white/20
                            backdrop-blur-md">

                    <span class="text-xs text-green-100">
                        Members
                    </span>

                    <span class="text-lg font-black text-white">
                        {{ $volunteers->count() }}
                    </span>

                </div>

            </div>

        </div>


        {{-- Desktop column heading --}}
        <div class="hidden lg:grid
                    grid-cols-12
                    px-8 py-4
                    bg-slate-50
                    border-b border-slate-100">

            <div class="col-span-4 text-[10px]
                        uppercase tracking-[0.15em]
                        font-black text-slate-400">

                Volunteer

            </div>

            <div class="col-span-3 text-[10px]
                        uppercase tracking-[0.15em]
                        font-black text-slate-400">

                Contact

            </div>

            <div class="col-span-2 text-center
                        text-[10px]
                        uppercase tracking-[0.15em]
                        font-black text-slate-400">

                Status

            </div>

            <div class="col-span-1 text-center
                        text-[10px]
                        uppercase tracking-[0.15em]
                        font-black text-slate-400">

                Joined

            </div>

            <div class="col-span-2 text-center
                        text-[10px]
                        uppercase tracking-[0.15em]
                        font-black text-slate-400">

                Actions

            </div>

        </div>


        {{-- Volunteer rows --}}
        <div id="volunteerList">

            @forelse($volunteers as $volunteer)

                @php

                    $searchText = strtolower(
                        ($volunteer->name ?? '') . ' ' .
                        ($volunteer->email ?? '') . ' ' .
                        ($volunteer->phone ?? '')
                    );

                    $isActive = strtolower(
                        $volunteer->status ?? 'active'
                    ) === 'active';

                @endphp


                <div
                    class="volunteer-row group
                           border-b border-slate-100
                           p-5 sm:p-6 lg:px-8
                           hover:bg-gradient-to-r
                           hover:from-green-50/70
                           hover:to-emerald-50/40
                           transition-all duration-300"
                    data-search="{{ $searchText }}">

                    <div class="grid lg:grid-cols-12
                                gap-5 items-center">


                        {{-- Volunteer --}}
                        <div class="lg:col-span-4
                                    flex items-center gap-4
                                    min-w-0">

                            <div class="relative
                                        w-16 h-16 sm:w-[72px] sm:h-[72px]
                                        rounded-[20px]
                                        overflow-hidden
                                        flex-shrink-0
                                        bg-gradient-to-br
                                        from-green-500 to-emerald-600
                                        shadow-lg
                                        ring-4 ring-white">

                                @if($volunteer->profile_photo)

                                    <img
                                        src="{{ asset('storage/'.$volunteer->profile_photo) }}"
                                        alt="{{ $volunteer->name }}"
                                        class="w-full h-full object-cover
                                               group-hover:scale-110
                                               transition duration-500"
                                        onerror="this.style.display='none';
                                                 this.nextElementSibling.style.display='flex';">

                                    <div
                                        class="w-full h-full hidden
                                               items-center justify-center
                                               bg-gradient-to-br
                                               from-green-100 to-emerald-100
                                               text-green-700 text-2xl">

                                        👤

                                    </div>

                                @else

                                    <div class="w-full h-full
                                                flex items-center
                                                justify-center
                                                bg-gradient-to-br
                                                from-green-100 to-emerald-100
                                                text-green-700 text-2xl">

                                        {{ strtoupper(substr($volunteer->name ?? 'V', 0, 1)) }}

                                    </div>

                                @endif

                                <span class="absolute bottom-1 right-1
                                             w-3.5 h-3.5
                                             rounded-full
                                             {{ $isActive ? 'bg-emerald-500' : 'bg-red-500' }}
                                             border-2 border-white">
                                </span>

                            </div>


                            <div class="min-w-0">

                                <h3 class="text-base sm:text-lg
                                           font-black
                                           text-slate-800
                                           truncate">

                                    {{ $volunteer->name }}

                                </h3>

                                <p class="text-xs text-slate-400 mt-1">

                                    Volunteer ID
                                    <span class="font-bold text-slate-500">
                                        #{{ $volunteer->id }}
                                    </span>

                                </p>

                                @if($volunteer->gender)

                                    <span class="inline-flex
                                                 mt-2
                                                 px-2.5 py-1
                                                 rounded-lg
                                                 bg-slate-100
                                                 text-slate-500
                                                 text-[10px]
                                                 font-bold">

                                        {{ ucfirst($volunteer->gender) }}

                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- Contact --}}
                        <div class="lg:col-span-3">

                            <div class="space-y-2.5">

                                <div class="flex items-center gap-2.5 min-w-0">

                                    <div class="w-9 h-9
                                                rounded-xl
                                                bg-blue-50
                                                flex items-center justify-center
                                                flex-shrink-0">

                                        ✉

                                    </div>

                                    <span class="text-sm font-semibold
                                                 text-slate-700 truncate">

                                        {{ $volunteer->email }}

                                    </span>

                                </div>

                                <div class="flex items-center gap-2.5">

                                    <div class="w-9 h-9
                                                rounded-xl
                                                bg-emerald-50
                                                flex items-center justify-center
                                                flex-shrink-0">

                                        ☎

                                    </div>

                                    <span class="text-sm text-slate-500">

                                        {{ $volunteer->phone ?: 'Phone not added' }}

                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- Status --}}
                        <div class="lg:col-span-2
                                    flex justify-start lg:justify-center">

                            @if($isActive)

                                <span class="inline-flex items-center gap-2
                                             px-4 py-2.5
                                             rounded-full
                                             bg-emerald-50
                                             text-emerald-700
                                             border border-emerald-100
                                             text-xs font-black">

                                    <span class="w-2 h-2
                                                 rounded-full
                                                 bg-emerald-500"></span>

                                    Active

                                </span>

                            @else

                                <span class="inline-flex items-center gap-2
                                             px-4 py-2.5
                                             rounded-full
                                             bg-red-50
                                             text-red-700
                                             border border-red-100
                                             text-xs font-black">

                                    <span class="w-2 h-2
                                                 rounded-full
                                                 bg-red-500"></span>

                                    Deactive

                                </span>

                            @endif

                        </div>


                        {{-- Joined --}}
                        <div class="lg:col-span-1 text-left lg:text-center">

                            <p class="text-sm font-black text-slate-700">

                                {{ $volunteer->created_at?->format('d M') ?? '—' }}

                            </p>

                            <p class="text-[11px] text-slate-400 mt-0.5">

                                {{ $volunteer->created_at?->format('Y') ?? '' }}

                            </p>

                        </div>


                        {{-- Actions --}}
                        <div class="lg:col-span-2">

                            <div class="grid grid-cols-2 gap-2">

                                {{-- View --}}
                                <a
                                    href="{{ route('admin.volunteers.show', $volunteer->id) }}"
                                    class="inline-flex items-center
                                           justify-center gap-1.5
                                           px-3 py-2.5
                                           rounded-xl
                                           bg-slate-900
                                           hover:bg-slate-800
                                           text-white
                                           text-xs font-black
                                           shadow-md
                                           hover:-translate-y-0.5
                                           transition">

                                    👁 View

                                </a>


                                {{-- Activate / Deactivate --}}
                                @if($isActive)

                                    <form
                                        action="{{ route('admin.volunteers.deactivate', $volunteer->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to deactivate this volunteer?')">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="w-full inline-flex items-center
                                                   justify-center gap-1
                                                   px-3 py-2.5
                                                   rounded-xl
                                                   bg-orange-500
                                                   hover:bg-orange-600
                                                   text-white
                                                   text-xs font-black
                                                   shadow-md
                                                   hover:-translate-y-0.5
                                                   transition">

                                            Deactive

                                        </button>

                                    </form>

                                @else

                                    <form
                                        action="{{ route('admin.volunteers.activate', $volunteer->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Activate this volunteer?')">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="w-full inline-flex items-center
                                                   justify-center gap-1
                                                   px-3 py-2.5
                                                   rounded-xl
                                                   bg-emerald-600
                                                   hover:bg-emerald-700
                                                   text-white
                                                   text-xs font-black
                                                   shadow-md
                                                   hover:-translate-y-0.5
                                                   transition">

                                            Activate

                                        </button>

                                    </form>

                                @endif


                                {{-- Delete --}}
                                <form
                                    action="{{ route('admin.volunteers.destroy', $volunteer->id) }}"
                                    method="POST"
                                    class="col-span-2"
                                    onsubmit="return confirm('Are you sure you want to permanently delete this volunteer? This action cannot be undone.')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="w-full inline-flex items-center
                                               justify-center gap-2
                                               px-3 py-2.5
                                               rounded-xl
                                               bg-red-50
                                               hover:bg-red-500
                                               text-red-600
                                               hover:text-white
                                               border border-red-100
                                               hover:border-red-500
                                               text-xs font-black
                                               transition-all">

                                        Delete Volunteer

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                {{-- Empty state --}}
                <div class="px-6 py-20 text-center">

                    <div class="mx-auto w-24 h-24
                                rounded-[28px]
                                bg-gradient-to-br
                                from-green-50 to-emerald-100
                                flex items-center justify-center
                                text-4xl shadow-inner">

                        👥

                    </div>

                    <h3 class="mt-6 text-2xl
                               font-black text-slate-800">

                        No Volunteers Yet

                    </h3>

                    <p class="mt-2 text-sm text-slate-400
                              max-w-md mx-auto">

                        Volunteer accounts will appear here
                        once students register on VolunteerHub.

                    </p>

                </div>

            @endforelse

        </div>


        {{-- Search no result --}}
        <div id="noSearchResult"
             class="hidden px-6 py-20 text-center">

            <div class="mx-auto w-20 h-20
                        rounded-3xl
                        bg-slate-100
                        flex items-center justify-center
                        text-3xl">

                ⌕

            </div>

            <h3 class="mt-5 text-xl
                       font-black text-slate-800">

                No Matching Volunteer

            </h3>

            <p class="mt-2 text-sm text-slate-400">

                Try another name, email or phone number.

            </p>

            <button
                onclick="clearSearch()"
                class="mt-5 px-5 py-2.5
                       rounded-xl
                       bg-emerald-600
                       hover:bg-emerald-700
                       text-white
                       text-xs font-black">

                Clear Search

            </button>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- FOOTER CTA --}}
{{-- ========================================================= --}}

<section class="max-w-7xl mx-auto
                px-5 sm:px-6 lg:px-8 pb-16">

    <div class="relative overflow-hidden
                rounded-[35px]
                bg-gradient-to-r
                from-green-800
                via-emerald-700
                to-teal-600
                p-8 sm:p-10 lg:p-14
                text-white
                shadow-2xl">

        <div class="absolute -right-20 -top-24
                    w-80 h-80
                    rounded-full
                    bg-white/10 blur-3xl"></div>

        <div class="absolute -left-20 -bottom-24
                    w-72 h-72
                    rounded-full
                    bg-teal-300/10 blur-3xl"></div>

        <div class="relative z-10
                    flex flex-col lg:flex-row
                    lg:items-center
                    lg:justify-between gap-8">

            <div>

                <span class="inline-flex
                             px-3 py-1.5
                             rounded-full
                             bg-white/10
                             border border-white/15
                             text-[10px]
                             font-black uppercase
                             tracking-widest">

                    VolunteerHub Community

                </span>

                <h2 class="mt-4 text-3xl sm:text-4xl
                           font-black">

                    Growing Together

                </h2>

                <p class="mt-3 text-green-100
                          max-w-2xl leading-7">

                    Keep your volunteer community organized,
                    active and ready to create meaningful impact.

                </p>

            </div>

            <div class="flex-shrink-0">

                <div class="w-20 h-20
                            rounded-[25px]
                            bg-white/10
                            border border-white/20
                            backdrop-blur-md
                            flex items-center justify-center
                            text-4xl">

                    🌱

                </div>

            </div>

        </div>

    </div>

</section>


</div>

{{-- ========================================================= --}}
{{-- SEARCH JAVASCRIPT --}}
{{-- ========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput =
        document.getElementById('volunteerSearch');

    const volunteerRows =
        document.querySelectorAll('.volunteer-row');

    const resultCount =
        document.getElementById('resultCount');

    const noSearchResult =
        document.getElementById('noSearchResult');


    function filterVolunteers() {

        const searchValue =
            searchInput.value.toLowerCase().trim();

        let visibleCount = 0;


        volunteerRows.forEach(row => {

            const searchData =
                (row.dataset.search || '').toLowerCase();

            const matched =
                searchData.includes(searchValue);


            if (matched) {

                row.style.display = '';

                visibleCount++;

            } else {

                row.style.display = 'none';

            }

        });


        resultCount.innerHTML = `
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            ${visibleCount} Volunteers
        `;


        if (
            visibleCount === 0 &&
            searchValue !== '' &&
            volunteerRows.length > 0
        ) {

            noSearchResult.classList.remove('hidden');

        } else {

            noSearchResult.classList.add('hidden');

        }

    }


    searchInput.addEventListener(
        'input',
        filterVolunteers
    );


    window.clearSearch = function () {

        searchInput.value = '';

        volunteerRows.forEach(row => {

            row.style.display = '';

        });


        resultCount.innerHTML = `
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            ${volunteerRows.length} Volunteers
        `;


        noSearchResult.classList.add('hidden');

        searchInput.focus();

    };

});

</script>

@endsection
