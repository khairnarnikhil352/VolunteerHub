@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-50 py-8">

    <div class="max-w-7xl mx-auto px-5 md:px-6">


        {{-- =====================================================
            PROFILE HERO CARD
        ====================================================== --}}
        <div class="relative overflow-hidden
                    bg-white
                    rounded-[35px]
                    border border-green-100
                    shadow-xl">

            {{-- Top Gradient --}}
            <div class="h-32 md:h-36
                        bg-gradient-to-r
                        from-green-700
                        via-emerald-600
                        to-teal-500
                        relative overflow-hidden">

                <div class="absolute -right-16 -top-24
                            w-72 h-72
                            rounded-full
                            bg-white/10">
                </div>

                <div class="absolute -left-20 -bottom-32
                            w-80 h-80
                            rounded-full
                            bg-white/5">
                </div>

            </div>


            {{-- Profile Content --}}
            <div class="relative px-6 md:px-9 pb-8">

                <div class="flex flex-col lg:flex-row
                            items-center lg:items-end
                            gap-6">


                    {{-- =================================================
                        PROFILE PHOTO
                    ================================================== --}}
                    <div class="-mt-16 md:-mt-20 relative shrink-0">

                        <div class="w-32 h-32 md:w-40 md:h-40
                                    rounded-[32px]
                                    bg-white
                                    p-2
                                    shadow-2xl">

                            <div class="w-full h-full
                                        rounded-[26px]
                                        overflow-hidden
                                        bg-gradient-to-br
                                        from-green-100
                                        to-emerald-100">

                                @if($user->profile_photo)

                                    <img
                                        src="{{ asset('storage/'.$user->profile_photo) }}"
                                        alt="{{ $user->name }}"
                                        class="w-full h-full object-cover">

                                @else

                                    <div class="w-full h-full
                                                flex items-center justify-center
                                                text-5xl">

                                        👤

                                    </div>

                                @endif

                            </div>

                        </div>


                        {{-- Status Dot --}}
                        @php
                            $isActive = strtolower($user->status ?? 'active') === 'active';
                        @endphp

                        <span class="absolute -right-2 -bottom-2
                                     w-10 h-10
                                     rounded-full
                                     border-4 border-white
                                     shadow-lg
                                     flex items-center justify-center
                                     {{ $isActive ? 'bg-green-500' : 'bg-red-500' }}">

                            <span class="w-3 h-3
                                         bg-white
                                         rounded-full">
                            </span>

                        </span>

                    </div>


                    {{-- =================================================
                        NAME + BASIC INFO
                    ================================================== --}}
                    <div class="flex-1 text-center lg:text-left pb-1">

                        <div class="flex flex-col sm:flex-row
                                    items-center
                                    justify-center lg:justify-start
                                    gap-3">

                            <h1 class="text-3xl md:text-4xl
                                       font-black
                                       text-gray-800">

                                {{ $user->name }}

                            </h1>


                            @if($isActive)

                                <span class="inline-flex
                                             items-center gap-2
                                             px-4 py-1.5
                                             rounded-full
                                             bg-green-100
                                             text-green-700
                                             text-sm
                                             font-bold">

                                    <span class="w-2.5 h-2.5
                                                 rounded-full
                                                 bg-green-500">
                                    </span>

                                    Active

                                </span>

                            @else

                                <span class="inline-flex
                                             items-center gap-2
                                             px-4 py-1.5
                                             rounded-full
                                             bg-red-100
                                             text-red-700
                                             text-sm
                                             font-bold">

                                    <span class="w-2.5 h-2.5
                                                 rounded-full
                                                 bg-red-500">
                                    </span>

                                    Deactive

                                </span>

                            @endif

                        </div>


                        <p class="text-gray-500 mt-1">
                            Volunteer Account
                        </p>


                        {{-- Contact Pills --}}
                        <div class="flex flex-wrap
                                    justify-center lg:justify-start
                                    gap-2 mt-4">

                            <span class="px-4 py-2
                                         rounded-xl
                                         bg-gray-50
                                         border border-gray-100
                                         text-sm
                                         text-gray-600">

                                📧 {{ $user->email }}

                            </span>


                            @if($user->phone)

                                <span class="px-4 py-2
                                             rounded-xl
                                             bg-gray-50
                                             border border-gray-100
                                             text-sm
                                             text-gray-600">

                                    📱 {{ $user->phone }}

                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- =================================================
                        BACK BUTTON
                    ================================================== --}}
                    <div class="pb-1">

                        <a href="{{ route('admin.volunteers.index') }}"
                           class="inline-flex
                                  items-center
                                  gap-2
                                  px-5 py-3
                                  rounded-2xl
                                  bg-green-50
                                  border border-green-200
                                  text-green-700
                                  font-bold
                                  hover:bg-green-100
                                  hover:-translate-y-1
                                  transition duration-300">

                            ← Back

                        </a>

                    </div>

                </div>

            </div>

        </div>



        {{-- =====================================================
            MAIN CONTENT GRID
        ====================================================== --}}
        <div class="grid grid-cols-1 lg:grid-cols-3
                    gap-7 mt-7">


            {{-- =================================================
                LEFT SIDE
            ================================================== --}}
            <div class="lg:col-span-2 space-y-7">


                {{-- =================================================
                    PERSONAL INFORMATION
                ================================================== --}}
                <div class="bg-white
                            rounded-[32px]
                            border border-green-100
                            shadow-lg
                            overflow-hidden">

                    {{-- Card Header --}}
                    <div class="px-7 py-6
                                border-b border-gray-100
                                flex items-center gap-4">

                        <div class="w-12 h-12
                                    rounded-2xl
                                    bg-gradient-to-br
                                    from-green-500
                                    to-emerald-500
                                    flex items-center justify-center
                                    text-white
                                    text-xl
                                    shadow-md">

                            👤

                        </div>

                        <div>

                            <h2 class="text-xl
                                       font-black
                                       text-gray-800">

                                Personal Information

                            </h2>

                            <p class="text-sm text-gray-500">

                                Volunteer account details

                            </p>

                        </div>

                    </div>


                    {{-- Information Grid --}}
                    <div class="p-7">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                            {{-- Name --}}
                            <div class="info-card bg-green-50 border-green-100">

                                <div class="icon-box bg-green-100">
                                    👤
                                </div>

                                <div class="min-w-0">

                                    <p class="label text-green-600">
                                        Full Name
                                    </p>

                                    <p class="value">
                                        {{ $user->name }}
                                    </p>

                                </div>

                            </div>


                            {{-- Email --}}
                            <div class="info-card bg-emerald-50 border-emerald-100">

                                <div class="icon-box bg-emerald-100">
                                    📧
                                </div>

                                <div class="min-w-0">

                                    <p class="label text-emerald-600">
                                        Email Address
                                    </p>

                                    <p class="value break-all">
                                        {{ $user->email }}
                                    </p>

                                </div>

                            </div>


                            {{-- Phone --}}
                            <div class="info-card bg-teal-50 border-teal-100">

                                <div class="icon-box bg-teal-100">
                                    📱
                                </div>

                                <div>

                                    <p class="label text-teal-600">
                                        Phone Number
                                    </p>

                                    <p class="value">
                                        {{ $user->phone ?? 'Not provided' }}
                                    </p>

                                </div>

                            </div>


                            {{-- Gender --}}
                            <div class="info-card bg-blue-50 border-blue-100">

                                <div class="icon-box bg-blue-100">
                                    ⚧️
                                </div>

                                <div>

                                    <p class="label text-blue-600">
                                        Gender
                                    </p>

                                    <p class="value">
                                        {{ $user->gender ?? 'Not provided' }}
                                    </p>

                                </div>

                            </div>


                            {{-- DOB --}}
                            <div class="info-card bg-purple-50 border-purple-100">

                                <div class="icon-box bg-purple-100">
                                    🎂
                                </div>

                                <div>

                                    <p class="label text-purple-600">
                                        Date of Birth
                                    </p>

                                    <p class="value">

                                        @if($user->dob)

                                            {{ \Carbon\Carbon::parse($user->dob)->format('d M Y') }}

                                        @else

                                            Not provided

                                        @endif

                                    </p>

                                </div>

                            </div>


                            {{-- Role --}}
                            <div class="info-card bg-yellow-50 border-yellow-100">

                                <div class="icon-box bg-yellow-100">
                                    🛡️
                                </div>

                                <div>

                                    <p class="label text-yellow-600">
                                        Account Role
                                    </p>

                                    <p class="value">
                                        {{ ucfirst($user->role) }}
                                    </p>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>



                {{-- =================================================
                    ACCOUNT TIMELINE
                ================================================== --}}
                <div class="bg-white
                            rounded-[32px]
                            border border-green-100
                            shadow-lg
                            p-7">

                    <div class="flex items-center gap-4 mb-7">

                        <div class="w-12 h-12
                                    rounded-2xl
                                    bg-gradient-to-br
                                    from-emerald-500
                                    to-teal-500
                                    flex items-center justify-center
                                    text-white
                                    text-xl
                                    shadow-md">

                            🕒

                        </div>

                        <div>

                            <h2 class="text-xl
                                       font-black
                                       text-gray-800">

                                Account Timeline

                            </h2>

                            <p class="text-sm text-gray-500">
                                Account activity dates
                            </p>

                        </div>

                    </div>


                    <div class="relative ml-2">

                        {{-- Timeline Line --}}
                        <div class="absolute left-5 top-5 bottom-5
                                    w-0.5
                                    bg-green-100">
                        </div>


                        {{-- Created --}}
                        <div class="relative flex gap-5 pb-8">

                            <div class="relative z-10
                                        w-10 h-10 shrink-0
                                        rounded-full
                                        bg-green-100
                                        border-4 border-white
                                        shadow
                                        flex items-center justify-center
                                        text-green-600">

                                ✓

                            </div>

                            <div class="pt-1">

                                <p class="font-bold text-gray-800">
                                    Account Created
                                </p>

                                <p class="text-sm text-gray-500 mt-1">

                                    {{ $user->created_at
                                        ? $user->created_at->format('d M Y, h:i A')
                                        : 'Not available' }}

                                </p>

                            </div>

                        </div>


                        {{-- Updated --}}
                        <div class="relative flex gap-5">

                            <div class="relative z-10
                                        w-10 h-10 shrink-0
                                        rounded-full
                                        bg-emerald-100
                                        border-4 border-white
                                        shadow
                                        flex items-center justify-center
                                        text-emerald-600">

                                ↻

                            </div>

                            <div class="pt-1">

                                <p class="font-bold text-gray-800">
                                    Last Updated
                                </p>

                                <p class="text-sm text-gray-500 mt-1">

                                    {{ $user->updated_at
                                        ? $user->updated_at->format('d M Y, h:i A')
                                        : 'Not available' }}

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =================================================
                RIGHT SIDE
            ================================================== --}}
            <div class="space-y-7">


                {{-- =================================================
                    ACCOUNT STATUS
                ================================================== --}}
                <div class="bg-white
                            rounded-[32px]
                            border border-green-100
                            shadow-lg
                            overflow-hidden">

                    <div class="px-6 py-5
                                bg-gradient-to-r
                                from-green-700
                                to-emerald-500">

                        <h2 class="text-xl
                                   font-black
                                   text-white">

                            Account Status

                        </h2>

                        <p class="text-green-100 text-sm mt-1">
                            Current volunteer status
                        </p>

                    </div>


                    <div class="p-6">

                        <div class="rounded-3xl
                                    p-7
                                    text-center
                                    {{ $isActive
                                        ? 'bg-green-50'
                                        : 'bg-red-50' }}">

                            <div class="text-5xl">
                                {{ $isActive ? '🟢' : '🔴' }}
                            </div>

                            <h3 class="text-2xl
                                       font-black
                                       mt-3
                                       {{ $isActive
                                           ? 'text-green-700'
                                           : 'text-red-700' }}">

                                {{ $isActive ? 'Active' : 'Deactive' }}

                            </h3>

                            <p class="text-sm text-gray-500 mt-2">

                                {{ $isActive
                                    ? 'This volunteer account is currently active.'
                                    : 'This volunteer account is currently deactivated.' }}

                            </p>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                    QUICK ACTIONS
                ================================================== --}}
                <div class="bg-white
                            rounded-[32px]
                            border border-green-100
                            shadow-lg
                            p-6">

                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-11 h-11
                                    rounded-xl
                                    bg-green-100
                                    flex items-center justify-center">

                            ⚡

                        </div>

                        <div>

                            <h2 class="text-xl
                                       font-black
                                       text-gray-800">

                                Quick Actions

                            </h2>

                            <p class="text-xs text-gray-500">
                                Manage volunteer account
                            </p>

                        </div>

                    </div>


                    {{-- Activate / Deactivate --}}
                    @if($isActive)

                        <form
                            action="{{ route('admin.volunteers.deactivate', $user->id) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to deactivate this volunteer?')">

                            @csrf
                            @method('PATCH')

                            <button type="submit"
                                    class="action-btn
                                           bg-gradient-to-r
                                           from-orange-500
                                           to-red-500
                                           text-white
                                           hover:-translate-y-1
                                           hover:shadow-xl">

                                ⏸️ Deactivate Volunteer

                            </button>

                        </form>

                    @else

                        <form
                            action="{{ route('admin.volunteers.activate', $user->id) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to activate this volunteer?')">

                            @csrf
                            @method('PATCH')

                            <button type="submit"
                                    class="action-btn
                                           bg-gradient-to-r
                                           from-green-600
                                           to-emerald-500
                                           text-white
                                           hover:-translate-y-1
                                           hover:shadow-xl">

                                ✓ Activate Volunteer

                            </button>

                        </form>

                    @endif


                    {{-- Delete --}}
                    <form
                        action="{{ route('admin.volunteers.destroy', $user->id) }}"
                        method="POST"
                        class="mt-3"
                        onsubmit="return confirm('Are you sure you want to permanently delete this volunteer?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="action-btn
                                       bg-gray-50
                                       border border-gray-200
                                       text-gray-600
                                       hover:bg-red-50
                                       hover:text-red-600
                                       hover:border-red-200">

                            🗑️ Delete Volunteer

                        </button>

                    </form>

                </div>



                {{-- =================================================
                    MEMBER SINCE
                ================================================== --}}
                <div class="relative overflow-hidden
                            rounded-[32px]
                            bg-gradient-to-br
                            from-green-700
                            via-emerald-600
                            to-teal-500
                            p-7
                            text-white
                            shadow-xl">

                    <div class="absolute -right-12 -top-12
                                w-36 h-36
                                rounded-full
                                bg-white/10">
                    </div>


                    <div class="relative">

                        <div class="text-3xl mb-3">
                            🌱
                        </div>

                        <p class="text-green-100 text-sm font-semibold">
                            Volunteer Since
                        </p>

                        <p class="text-3xl font-black mt-1">

                            {{ $user->created_at
                                ? $user->created_at->format('M Y')
                                : 'N/A' }}

                        </p>

                        <div class="h-px bg-white/20 my-4"></div>

                        <p class="text-green-100 text-sm leading-relaxed">

                            Part of the VolunteerHub community.

                        </p>

                    </div>

                </div>


            </div>

        </div>

    </div>

</div>


{{-- =====================================================
    CUSTOM STYLES
====================================================== --}}
<style>

    .info-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem;
        border-width: 1px;
        border-radius: 1.25rem;
        transition: all .3s ease;
    }

    .info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, .06);
    }

    .icon-box {
        width: 2.75rem;
        height: 2.75rem;
        min-width: 2.75rem;
        border-radius: .875rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .label {
        font-size: .7rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .08em;
    }

    .value {
        margin-top: .25rem;
        font-size: 1rem;
        font-weight: 700;
        color: #1f2937;
    }

    .action-btn {
        width: 100%;
        padding: .9rem 1.25rem;
        border-radius: 1rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: .5rem;
        box-shadow: 0 5px 12px rgba(0,0,0,.08);
        transition: all .3s ease;
    }

</style>

@endsection