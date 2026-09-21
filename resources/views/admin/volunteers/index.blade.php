@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-blue-50">

    {{-- ========================================================= --}}
    {{-- HERO SECTION --}}
    {{-- ========================================================= --}}

    <section class="relative overflow-hidden rounded-b-[45px]
                    bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500
                    text-white shadow-2xl">

        {{-- Decorative Background --}}
        <div class="absolute -top-20 -right-20 w-96 h-96
                    bg-white/10 rounded-full blur-3xl"></div>

        <div class="absolute bottom-0 -left-20 w-80 h-80
                    bg-green-300/20 rounded-full blur-3xl"></div>

        <div class="absolute top-20 left-1/2 w-40 h-40
                    bg-teal-300/10 rounded-full blur-2xl"></div>


        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16
                    relative z-10">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2
                        bg-white/15 backdrop-blur-md
                        border border-white/20
                        px-5 py-2 rounded-full
                        text-sm font-semibold shadow-lg">

                🛡️ VolunteerHub • Admin Portal

            </div>


            {{-- Title --}}
            <h1 class="text-5xl lg:text-6xl font-black
                       mt-6 leading-tight tracking-tight">

                Volunteer Management

            </h1>


            {{-- Description --}}
            <p class="mt-5 text-lg lg:text-xl
                      text-green-100 max-w-3xl leading-8">

                Manage your VolunteerHub community, monitor volunteer
                accounts and maintain volunteer profiles from one
                centralized management panel.

            </p>


            {{-- Buttons --}}
            <div class="mt-8 flex flex-wrap gap-4">

                <a href="{{ route('admin.dashboard') }}"
                   class="inline-flex items-center gap-2
                          bg-white text-green-700
                          px-6 py-3 rounded-2xl
                          font-bold shadow-lg
                          hover:bg-green-50
                          hover:-translate-y-1
                          transition duration-300">

                    🏠 Dashboard

                </a>


                <button
                    onclick="document.getElementById('volunteerSearch').focus()"
                    class="inline-flex items-center gap-2
                           border border-white/30
                           bg-white/10 backdrop-blur-sm
                           px-6 py-3 rounded-2xl
                           font-bold
                           hover:bg-white/20
                           hover:-translate-y-1
                           transition duration-300">

                    🔎 Find Volunteer

                </button>

            </div>


            {{-- Hero Bottom Information --}}
            <div class="mt-12 grid sm:grid-cols-3 gap-4 max-w-4xl">

                <div class="bg-white/10 backdrop-blur-md
                            border border-white/10
                            rounded-2xl px-5 py-4">

                    <p class="text-green-100 text-sm">
                        Community
                    </p>

                    <p class="text-xl font-black mt-1">
                        VolunteerHub
                    </p>

                </div>


                <div class="bg-white/10 backdrop-blur-md
                            border border-white/10
                            rounded-2xl px-5 py-4">

                    <p class="text-green-100 text-sm">
                        Management
                    </p>

                    <p class="text-xl font-black mt-1">
                        Volunteer Accounts
                    </p>

                </div>


                <div class="bg-white/10 backdrop-blur-md
                            border border-white/10
                            rounded-2xl px-5 py-4">

                    <p class="text-green-100 text-sm">
                        Access
                    </p>

                    <p class="text-xl font-black mt-1">
                        Admin Only
                    </p>

                </div>

            </div>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- STATISTICS --}}
    {{-- ========================================================= --}}

    <section class="max-w-7xl mx-auto px-6 lg:px-8
                    -mt-10 relative z-20">

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">


            {{-- Total --}}
            <div class="bg-white rounded-[25px]
                        shadow-xl border border-green-100
                        p-6 text-center
                        hover:-translate-y-2
                        transition duration-300">

                <div class="w-14 h-14 mx-auto
                            bg-green-100 rounded-2xl
                            flex items-center justify-center">

                    <span class="text-3xl">👥</span>

                </div>

                <h2 class="text-3xl font-black
                           text-green-700 mt-3">

                    {{ $volunteers->count() }}

                </h2>

                <p class="text-gray-500 text-sm font-medium mt-1">
                    Total Volunteers
                </p>

            </div>



            {{-- Active --}}
            <div class="bg-white rounded-[25px]
                        shadow-xl border border-emerald-100
                        p-6 text-center
                        hover:-translate-y-2
                        transition duration-300">

                <div class="w-14 h-14 mx-auto
                            bg-emerald-100 rounded-2xl
                            flex items-center justify-center">

                    <span class="text-3xl">🟢</span>

                </div>

                <h2 class="text-3xl font-black
                           text-emerald-600 mt-3">

                    {{ $volunteers->where('status', 'active')->count() }}

                </h2>

                <p class="text-gray-500 text-sm font-medium mt-1">
                    Active Volunteers
                </p>

            </div>



            {{-- Deactive --}}
            <div class="bg-white rounded-[25px]
                        shadow-xl border border-red-100
                        p-6 text-center
                        hover:-translate-y-2
                        transition duration-300">

                <div class="w-14 h-14 mx-auto
                            bg-red-100 rounded-2xl
                            flex items-center justify-center">

                    <span class="text-3xl">🔴</span>

                </div>

                <h2 class="text-3xl font-black
                           text-red-600 mt-3">

                    {{ $volunteers->where('status', 'deactive')->count() }}

                </h2>

                <p class="text-gray-500 text-sm font-medium mt-1">
                    Deactive Volunteers
                </p>

            </div>



            {{-- New --}}
            <div class="bg-white rounded-[25px]
                        shadow-xl border border-blue-100
                        p-6 text-center
                        hover:-translate-y-2
                        transition duration-300">

                <div class="w-14 h-14 mx-auto
                            bg-blue-100 rounded-2xl
                            flex items-center justify-center">

                    <span class="text-3xl">✨</span>

                </div>

                <h2 class="text-3xl font-black
                           text-blue-600 mt-3">

                    {{ $volunteers->where('created_at', '>=', now()->subDays(30))->count() }}

                </h2>

                <p class="text-gray-500 text-sm font-medium mt-1">
                    New This Month
                </p>

            </div>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- SEARCH SECTION --}}
    {{-- ========================================================= --}}

    <section class="max-w-7xl mx-auto px-6 lg:px-8 mt-10">

        <div class="bg-white rounded-[30px]
                    shadow-xl border border-gray-100
                    p-6 lg:p-7">

            <div class="flex flex-col lg:flex-row
                        lg:items-center
                        lg:justify-between gap-5">

                <div>

                    <h2 class="text-2xl font-black text-gray-800">
                        🔎 Find Volunteers
                    </h2>

                    <p class="text-gray-500 text-sm mt-1">
                        Search volunteers by name, email or phone number.
                    </p>

                </div>


                <div class="flex gap-3">

                    <span id="resultCount"
                          class="bg-green-100 text-green-700
                                 px-4 py-2 rounded-full
                                 text-sm font-bold">

                        {{ $volunteers->count() }} Volunteers

                    </span>

                </div>

            </div>


            <div class="mt-6 grid lg:grid-cols-[1fr_auto] gap-4">

                <div class="relative">

                    <span class="absolute left-4 top-1/2
                                 -translate-y-1/2 text-gray-400 text-xl">

                        🔎

                    </span>

                    <input
                        type="text"
                        id="volunteerSearch"
                        placeholder="Search by volunteer name, email or phone..."
                        class="w-full pl-12 pr-5 py-4
                               rounded-2xl
                               border-gray-200
                               bg-gray-50
                               focus:bg-white
                               focus:ring-2
                               focus:ring-green-500
                               focus:border-green-500
                               transition">

                </div>


                <button
                    onclick="clearSearch()"
                    class="px-7 py-4 rounded-2xl
                           bg-gray-100
                           hover:bg-gray-200
                           text-gray-700
                           font-bold transition">

                    🔄 Clear

                </button>

            </div>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- VOLUNTEER DIRECTORY --}}
    {{-- ========================================================= --}}

    <section class="max-w-7xl mx-auto px-6 lg:px-8 py-12">

        <div class="bg-white rounded-[32px]
                    shadow-2xl border border-gray-100
                    overflow-hidden">


            {{-- Directory Header --}}
            <div class="bg-gradient-to-r
                        from-green-700
                        via-emerald-600
                        to-teal-500
                        px-6 lg:px-8 py-7 text-white">

                <div class="flex flex-col lg:flex-row
                            lg:items-center
                            lg:justify-between gap-4">

                    <div>

                        <div class="flex items-center gap-3">

                            <div class="w-12 h-12
                                        bg-white/15
                                        rounded-2xl
                                        flex items-center justify-center">

                                <span class="text-2xl">
                                    👥
                                </span>

                            </div>

                            <div>

                                <h2 class="text-3xl font-black">
                                    Volunteer Directory
                                </h2>

                                <p class="text-green-100 text-sm mt-1">
                                    Registered VolunteerHub members
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="bg-white/15
                                backdrop-blur-md
                                border border-white/20
                                px-5 py-3
                                rounded-2xl">

                        <span class="text-green-100 text-sm">
                            Total Members
                        </span>

                        <span class="font-black text-xl ml-2">
                            {{ $volunteers->count() }}
                        </span>

                    </div>

                </div>

            </div>



            {{-- Table Header --}}
            <div class="hidden lg:grid
                        grid-cols-12
                        bg-green-50
                        px-8 py-4
                        text-sm font-black
                        text-green-800
                        border-b border-green-100">

                <div class="col-span-4">
                    Volunteer
                </div>

                <div class="col-span-3">
                    Contact Information
                </div>

                <div class="col-span-2 text-center">
                    Status
                </div>

                <div class="col-span-1 text-center">
                    Joined
                </div>

                <div class="col-span-2 text-center">
                    Actions
                </div>

            </div>



            {{-- ================================================= --}}
            {{-- VOLUNTEER LOOP --}}
            {{-- ================================================= --}}

            @forelse($volunteers as $volunteer)

                @php

                    $searchText = strtolower(
                        ($volunteer->name ?? '') . ' ' .
                        ($volunteer->email ?? '') . ' ' .
                        ($volunteer->phone ?? '')
                    );

                    $isActive = strtolower($volunteer->status ?? 'active') === 'active';

                @endphp


                <div
                    class="volunteer-row
                           border-b border-gray-100
                           hover:bg-green-50/70
                           transition duration-300
                           p-6 lg:px-8"
                    data-search="{{ $searchText }}"
                >

                    <div class="grid lg:grid-cols-12
                                gap-5 items-center">


                        {{-- ======================================= --}}
                        {{-- VOLUNTEER PROFILE --}}
                        {{-- ======================================= --}}

                        <div class="lg:col-span-4
                                    flex items-center gap-4">

                            {{-- Profile Photo --}}
                            <div class="w-20 h-20
                                        rounded-[22px]
                                        overflow-hidden
                                        flex-shrink-0
                                        shadow-lg
                                        border-4 border-white
                                        bg-gradient-to-br
                                        from-green-500
                                        to-emerald-600
                                        flex items-center
                                        justify-center">

                                        
                                @if($volunteer->profile_photo)

                                    <img 
                                        src="{{ asset('storage/'.$volunteer->profile_photo) }}" 
                                        alt="{{ $volunteer->name }}"
                                        class="w-full h-full object-cover hover:scale-110 transition duration-500"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                    >

                                    <div 
                                        class="w-full h-full hidden items-center justify-center 
                                            bg-gradient-to-br from-green-100 to-emerald-100 
                                            text-green-700 text-3xl">
                                        👤
                                    </div>

                                @else

                                    <div class="w-full h-full flex items-center justify-center 
                                                bg-gradient-to-br from-green-100 to-emerald-100 
                                                text-green-700 text-3xl">
                                        👤
                                    </div>

                                @endif
                            </div>


                            {{-- Name --}}
                            <div class="min-w-0">

                                <div class="flex items-center gap-2">

                                    <h3 class="text-lg font-black
                                               text-gray-800 truncate">

                                        {{ $volunteer->name }}

                                    </h3>

                                </div>


                                <p class="text-sm text-gray-400 mt-1">

                                    Volunteer ID #{{ $volunteer->id }}

                                </p>


                                @if($volunteer->gender)

                                    <p class="text-xs text-gray-500 mt-2">

                                        👤 {{ ucfirst($volunteer->gender) }}

                                    </p>

                                @endif

                            </div>

                        </div>



                        {{-- ======================================= --}}
                        {{-- CONTACT --}}
                        {{-- ======================================= --}}

                        <div class="lg:col-span-3">

                            <div class="space-y-2">

                                <div class="flex items-center gap-2">

                                    <span class="w-8 h-8
                                                 bg-blue-50
                                                 rounded-lg
                                                 flex items-center
                                                 justify-center">

                                        📧

                                    </span>

                                    <p class="text-sm font-semibold
                                              text-gray-700 truncate">

                                        {{ $volunteer->email }}

                                    </p>

                                </div>


                                <div class="flex items-center gap-2">

                                    <span class="w-8 h-8
                                                 bg-green-50
                                                 rounded-lg
                                                 flex items-center
                                                 justify-center">

                                        📱

                                    </span>

                                    <p class="text-sm text-gray-500">

                                        {{ $volunteer->phone ?: 'Phone not added' }}

                                    </p>

                                </div>

                            </div>

                        </div>



                        {{-- ======================================= --}}
                        {{-- STATUS --}}
                        {{-- ======================================= --}}

                        <div class="lg:col-span-2
                                    flex justify-center">

                            @if($isActive)

                                <span class="inline-flex items-center gap-2
                                             px-4 py-2
                                             rounded-full
                                             bg-green-100
                                             text-green-700
                                             text-sm font-black">

                                    <span class="w-2.5 h-2.5
                                                 bg-green-500
                                                 rounded-full"></span>

                                    Active

                                </span>

                            @else

                                <span class="inline-flex items-center gap-2
                                             px-4 py-2
                                             rounded-full
                                             bg-red-100
                                             text-red-700
                                             text-sm font-black">

                                    <span class="w-2.5 h-2.5
                                                 bg-red-500
                                                 rounded-full"></span>

                                    Deactive

                                </span>

                            @endif

                        </div>



                        {{-- ======================================= --}}
                        {{-- JOINED --}}
                        {{-- ======================================= --}}

                        <div class="lg:col-span-1 text-center">

                            <p class="text-sm font-black
                                      text-green-700">

                                {{ $volunteer->created_at->format('d M') }}

                            </p>

                            <p class="text-xs text-gray-400 mt-1">

                                {{ $volunteer->created_at->format('Y') }}

                            </p>

                        </div>



                        {{-- ======================================= --}}
                        {{-- ACTION BUTTONS --}}
                        {{-- ======================================= --}}

                        <div class="lg:col-span-2">

                            <div class="grid grid-cols-2 gap-2">

                                {{-- VIEW --}}
                                <a
                                    href="{{ route('admin.volunteers.show', $volunteer->id) }}"
                                    class="flex items-center
                                           justify-center gap-1
                                           bg-blue-600
                                           hover:bg-blue-700
                                           text-white
                                           py-2.5
                                           rounded-xl
                                           text-xs font-bold
                                           transition
                                           hover:-translate-y-0.5
                                           shadow">

                                    👁️ View

                                </a>


                                {{-- ACTIVE / DEACTIVE --}}
                                @if($isActive)

                                    <form
                                        action="{{ route('admin.volunteers.deactivate', $volunteer->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to deactivate this volunteer?')">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="w-full flex items-center
                                                   justify-center gap-1
                                                   bg-orange-500
                                                   hover:bg-orange-600
                                                   text-white
                                                   py-2.5
                                                   rounded-xl
                                                   text-xs font-bold
                                                   transition
                                                   hover:-translate-y-0.5
                                                   shadow">

                                            ⛔ Deactivate

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
                                            class="w-full flex items-center
                                                   justify-center gap-1
                                                   bg-green-600
                                                   hover:bg-green-700
                                                   text-white
                                                   py-2.5
                                                   rounded-xl
                                                   text-xs font-bold
                                                   transition
                                                   hover:-translate-y-0.5
                                                   shadow">

                                            ✅ Activate

                                        </button>

                                    </form>

                                @endif


                                {{-- DELETE --}}
                                <form
                                    action="{{ route('admin.volunteers.destroy', $volunteer->id) }}"
                                    method="POST"
                                    class="col-span-2"
                                    onsubmit="return confirm('Are you sure you want to permanently delete this volunteer?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="w-full flex items-center
                                               justify-center gap-2
                                               bg-red-500
                                               hover:bg-red-600
                                               text-white
                                               py-2.5
                                               rounded-xl
                                               text-xs font-bold
                                               transition
                                               hover:-translate-y-0.5
                                               shadow">

                                        🗑️ Delete Volunteer

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                {{-- ================================================= --}}
                {{-- EMPTY STATE --}}
                {{-- ================================================= --}}

                <div class="p-16 text-center">

                    <div class="w-32 h-32 mx-auto
                                bg-gradient-to-br
                                from-green-100
                                to-emerald-100
                                rounded-full
                                flex items-center
                                justify-center
                                shadow-lg">

                        <span class="text-6xl">
                            🌿
                        </span>

                    </div>


                    <h2 class="text-3xl font-black
                               text-green-700 mt-7">

                        No Volunteers Found

                    </h2>


                    <p class="text-gray-500
                              max-w-xl mx-auto
                              leading-7 mt-3">

                        There are currently no volunteer accounts
                        available in VolunteerHub.

                    </p>

                </div>

            @endforelse



            {{-- SEARCH NO RESULT --}}
            <div id="noSearchResult"
                 class="hidden p-14 text-center">

                <div class="text-6xl mb-4">
                    🔍
                </div>

                <h3 class="text-2xl font-black
                           text-gray-700">

                    No Matching Volunteer

                </h3>

                <p class="text-gray-500 mt-2">

                    Try searching with another name,
                    email or phone number.

                </p>

            </div>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- COMMUNITY CTA --}}
    {{-- ========================================================= --}}

    <section class="max-w-7xl mx-auto px-6 lg:px-8 pb-16">

        <div class="relative overflow-hidden
                    bg-gradient-to-r
                    from-green-700
                    via-emerald-600
                    to-teal-600
                    rounded-[35px]
                    p-10 lg:p-14
                    text-white text-center
                    shadow-2xl">

            <div class="absolute -top-20 -right-20
                        w-64 h-64
                        bg-white/10
                        rounded-full blur-3xl"></div>

            <div class="relative z-10">

                <div class="text-6xl mb-5">
                    🌱
                </div>

                <h2 class="text-4xl lg:text-5xl font-black">
                    Growing a Strong Volunteer Community
                </h2>

                <p class="mt-5 text-green-100
                          max-w-2xl mx-auto
                          text-lg leading-8">

                    Keep volunteer accounts organized,
                    active and ready to make a positive
                    impact through VolunteerHub.

                </p>

            </div>

        </div>

    </section>

</div>



{{-- ============================================================= --}}
{{-- SEARCH JAVASCRIPT --}}
{{-- ============================================================= --}}

<script>

    const searchInput =
        document.getElementById('volunteerSearch');

    const volunteerRows =
        document.querySelectorAll('.volunteer-row');

    const resultCount =
        document.getElementById('resultCount');

    const noSearchResult =
        document.getElementById('noSearchResult');


    searchInput.addEventListener('input', function () {

        const searchValue =
            this.value.toLowerCase().trim();

        let visibleCount = 0;


        volunteerRows.forEach(row => {

            const searchData =
                row.dataset.search.toLowerCase();

            if (searchData.includes(searchValue)) {

                row.style.display = '';
                visibleCount++;

            } else {

                row.style.display = 'none';

            }

        });


        resultCount.textContent =
            visibleCount + ' Volunteers';


        if (visibleCount === 0 && searchValue !== '') {

            noSearchResult.classList.remove('hidden');

        } else {

            noSearchResult.classList.add('hidden');

        }

    });


    function clearSearch() {

        searchInput.value = '';

        volunteerRows.forEach(row => {

            row.style.display = '';

        });

        resultCount.textContent =
            volunteerRows.length + ' Volunteers';

        noSearchResult.classList.add('hidden');

        searchInput.focus();

    }

</script>

@endsection