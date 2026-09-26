@extends('layouts.admin')

@section('content')

@php
    $isActive = strtolower($user->status ?? 'active') === 'active';

    $profileImage = $user->profile_photo
        ? asset('storage/' . $user->profile_photo)
        : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=10b981&color=ffffff&size=256&bold=true';

    $memberSince = $user->created_at
        ? $user->created_at->format('M Y')
        : 'N/A';

    $createdDate = $user->created_at
        ? $user->created_at->format('d M Y, h:i A')
        : 'Not available';

    $updatedDate = $user->updated_at
        ? $user->updated_at->format('d M Y, h:i A')
        : 'Not available';
@endphp


<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-emerald-50/70 py-8">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        



        {{-- =========================================================
            PREMIUM HERO
        ========================================================== --}}
        <div class="relative overflow-hidden rounded-[36px]
                    bg-gradient-to-br from-green-700 via-emerald-600 to-teal-500
                    shadow-2xl shadow-emerald-900/15">


            {{-- Decorative circles --}}
            <div class="absolute -right-24 -top-32
                        w-96 h-96 rounded-full
                        bg-white/10"></div>

            <div class="absolute right-24 -bottom-40
                        w-80 h-80 rounded-full
                        bg-white/5"></div>

            <div class="absolute -left-28 -bottom-32
                        w-96 h-96 rounded-full
                        bg-black/5"></div>


            {{-- Small dots --}}
            <div class="absolute top-8 right-10 opacity-30">
                <div class="grid grid-cols-5 gap-2">
                    @for($i = 0; $i < 25; $i++)
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                    @endfor
                </div>
            </div>


            <div class="relative p-6 md:p-9 lg:p-10">

                <div class="flex flex-col lg:flex-row
                            lg:items-center gap-7">


                    {{-- =================================================
                        PROFILE PHOTO
                    ================================================== --}}
                    <div class="relative shrink-0">

                        <div class="w-32 h-32 md:w-40 md:h-40
                                    rounded-[32px]
                                    bg-white/95
                                    p-2
                                    shadow-2xl">

                            <div class="w-full h-full
                                        rounded-[26px]
                                        overflow-hidden
                                        bg-gradient-to-br
                                        from-emerald-100
                                        to-teal-100">

                                <img
                                    src="{{ $profileImage }}"
                                    alt="{{ $user->name }}"
                                    class="w-full h-full object-cover">

                            </div>

                        </div>


                        {{-- Online Status --}}
                        <div class="absolute -right-3 -bottom-3
                                    w-12 h-12 rounded-full
                                    bg-white
                                    p-1 shadow-xl">

                            <div class="w-full h-full rounded-full
                                        flex items-center justify-center
                                        {{ $isActive ? 'bg-green-500' : 'bg-red-500' }}">

                                <span class="w-3 h-3
                                             rounded-full bg-white"></span>

                            </div>

                        </div>

                    </div>



                    {{-- =================================================
                        PROFILE INFORMATION
                    ================================================== --}}
                    <div class="flex-1 text-white">

                        <div class="flex flex-wrap items-center gap-3">

                            <h1 class="text-3xl md:text-4xl lg:text-5xl
                                       font-black tracking-tight">

                                {{ $user->name }}

                            </h1>


                            @if($isActive)

                                <span class="inline-flex items-center gap-2
                                             px-4 py-2 rounded-full
                                             bg-white/15 border border-white/20
                                             backdrop-blur-md
                                             text-white text-sm font-bold">

                                    <span class="w-2.5 h-2.5 rounded-full bg-green-300
                                                 shadow-[0_0_10px_rgba(134,239,172,0.9)]">
                                    </span>

                                    Active

                                </span>

                            @else

                                <span class="inline-flex items-center gap-2
                                             px-4 py-2 rounded-full
                                             bg-red-500/20 border border-red-200/20
                                             backdrop-blur-md
                                             text-white text-sm font-bold">

                                    <span class="w-2.5 h-2.5 rounded-full bg-red-300"></span>

                                    Deactive

                                </span>

                            @endif

                        </div>


                        <p class="text-emerald-50/90 text-lg mt-2 font-medium">
                            Volunteer Account
                        </p>


                        {{-- Contact --}}
                        <div class="flex flex-wrap gap-3 mt-5">

                            <div class="inline-flex items-center gap-2
                                        px-4 py-2.5 rounded-2xl
                                        bg-white/10 border border-white/10
                                        backdrop-blur-md
                                        text-sm">

                                <span>✉️</span>

                                <span class="break-all">
                                    {{ $user->email }}
                                </span>

                            </div>


                            @if($user->phone)

                                <div class="inline-flex items-center gap-2
                                            px-4 py-2.5 rounded-2xl
                                            bg-white/10 border border-white/10
                                            backdrop-blur-md
                                            text-sm">

                                    <span>📱</span>

                                    <span>
                                        {{ $user->phone }}
                                    </span>

                                </div>

                            @endif

                        </div>


                        {{-- Member since --}}
                        <div class="flex items-center gap-2
                                    mt-5 text-sm text-emerald-100">

                            <span>🌱</span>

                            <span>
                                Member since {{ $memberSince }}
                            </span>

                        </div>

                    </div>



                    {{-- =================================================
                        HERO ACTIONS
                    ================================================== --}}
                    <div class="flex flex-col gap-3 lg:min-w-[180px]">

                        <a href="{{ route('admin.volunteers.index') }}"
                           class="inline-flex justify-center items-center gap-2
                                  px-5 py-3.5 rounded-2xl
                                  bg-white text-emerald-700
                                  font-extrabold
                                  shadow-xl
                                  hover:-translate-y-1
                                  hover:shadow-2xl
                                  transition duration-300">

                            👥 All Volunteers

                        </a>


                        <a href="{{ route('admin.dashboard') }}"
                           class="inline-flex justify-center items-center gap-2
                                  px-5 py-3.5 rounded-2xl
                                  bg-white/10
                                  border border-white/20
                                  backdrop-blur-md
                                  text-white font-bold
                                  hover:bg-white/20
                                  transition duration-300">

                            📊 Dashboard

                        </a>

                    </div>

                </div>

            </div>

        </div>



        {{-- =========================================================
            MINI STATS
        ========================================================== --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mt-6">


            {{-- Status --}}
            <div class="group bg-white rounded-[28px]
                        border border-gray-100
                        p-5 shadow-lg shadow-gray-200/30
                        hover:-translate-y-1 hover:shadow-xl
                        transition duration-300">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-xs font-black uppercase
                                  tracking-wider text-gray-400">
                            Account Status
                        </p>

                        <p class="text-2xl font-black mt-2
                                  {{ $isActive ? 'text-green-600' : 'text-red-600' }}">

                            {{ $isActive ? 'Active' : 'Deactive' }}

                        </p>
                    </div>


                    <div class="w-12 h-12 rounded-2xl
                                {{ $isActive ? 'bg-green-100' : 'bg-red-100' }}
                                flex items-center justify-center text-xl">

                        {{ $isActive ? '✓' : '!' }}

                    </div>

                </div>

            </div>



            {{-- Role --}}
            <div class="group bg-white rounded-[28px]
                        border border-gray-100
                        p-5 shadow-lg shadow-gray-200/30
                        hover:-translate-y-1 hover:shadow-xl
                        transition duration-300">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-black uppercase
                                  tracking-wider text-gray-400">
                            Account Role
                        </p>

                        <p class="text-2xl font-black mt-2 text-emerald-600">

                            {{ ucfirst($user->role ?? 'Volunteer') }}

                        </p>

                    </div>


                    <div class="w-12 h-12 rounded-2xl
                                bg-emerald-100
                                flex items-center justify-center text-xl">

                        🛡️

                    </div>

                </div>

            </div>



            {{-- Joined --}}
            <div class="group bg-white rounded-[28px]
                        border border-gray-100
                        p-5 shadow-lg shadow-gray-200/30
                        hover:-translate-y-1 hover:shadow-xl
                        transition duration-300">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-black uppercase
                                  tracking-wider text-gray-400">
                            Joined
                        </p>

                        <p class="text-2xl font-black mt-2 text-teal-600">

                            {{ $memberSince }}

                        </p>

                    </div>


                    <div class="w-12 h-12 rounded-2xl
                                bg-teal-100
                                flex items-center justify-center text-xl">

                        🌱

                    </div>

                </div>

            </div>

        </div>



        {{-- =========================================================
            MAIN GRID
        ========================================================== --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">


            {{-- =====================================================
                LEFT CONTENT
            ====================================================== --}}
            <div class="lg:col-span-2 space-y-6">


                {{-- =================================================
                    PERSONAL INFORMATION
                ================================================== --}}
                <div class="premium-card">

                    <div class="card-header">

                        <div class="header-icon bg-gradient-to-br
                                    from-green-500 to-emerald-500">
                            👤
                        </div>

                        <div>

                            <h2 class="card-title">
                                Personal Information
                            </h2>

                            <p class="card-subtitle">
                                Basic information associated with this volunteer account
                            </p>

                        </div>

                    </div>


                    <div class="p-6 md:p-7">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


                            {{-- Full Name --}}
                            <div class="info-card bg-gradient-to-br
                                        from-green-50 to-emerald-50
                                        border-green-100">

                                <div class="info-icon bg-green-100">
                                    👤
                                </div>

                                <div class="min-w-0">

                                    <p class="info-label text-green-600">
                                        Full Name
                                    </p>

                                    <p class="info-value">
                                        {{ $user->name }}
                                    </p>

                                </div>

                            </div>



                            {{-- Email --}}
                            <div class="info-card bg-gradient-to-br
                                        from-emerald-50 to-teal-50
                                        border-emerald-100">

                                <div class="info-icon bg-emerald-100">
                                    ✉️
                                </div>

                                <div class="min-w-0">

                                    <p class="info-label text-emerald-600">
                                        Email Address
                                    </p>

                                    <p class="info-value break-all">
                                        {{ $user->email }}
                                    </p>

                                </div>

                            </div>



                            {{-- Phone --}}
                            <div class="info-card bg-gradient-to-br
                                        from-teal-50 to-cyan-50
                                        border-teal-100">

                                <div class="info-icon bg-teal-100">
                                    📱
                                </div>

                                <div>

                                    <p class="info-label text-teal-600">
                                        Phone Number
                                    </p>

                                    <p class="info-value">
                                        {{ $user->phone ?? 'Not provided' }}
                                    </p>

                                </div>

                            </div>



                            {{-- Gender --}}
                            <div class="info-card bg-gradient-to-br
                                        from-blue-50 to-indigo-50
                                        border-blue-100">

                                <div class="info-icon bg-blue-100">
                                    ⚧️
                                </div>

                                <div>

                                    <p class="info-label text-blue-600">
                                        Gender
                                    </p>

                                    <p class="info-value">
                                        {{ $user->gender ?? 'Not provided' }}
                                    </p>

                                </div>

                            </div>



                            {{-- DOB --}}
                            <div class="info-card bg-gradient-to-br
                                        from-purple-50 to-pink-50
                                        border-purple-100">

                                <div class="info-icon bg-purple-100">
                                    🎂
                                </div>

                                <div>

                                    <p class="info-label text-purple-600">
                                        Date of Birth
                                    </p>

                                    <p class="info-value">

                                        @if($user->dob)

                                            {{ \Carbon\Carbon::parse($user->dob)->format('d M Y') }}

                                        @else

                                            Not provided

                                        @endif

                                    </p>

                                </div>

                            </div>



                            {{-- Role --}}
                            <div class="info-card bg-gradient-to-br
                                        from-amber-50 to-yellow-50
                                        border-amber-100">

                                <div class="info-icon bg-amber-100">
                                    🛡️
                                </div>

                                <div>

                                    <p class="info-label text-amber-600">
                                        Account Role
                                    </p>

                                    <p class="info-value">
                                        {{ ucfirst($user->role ?? 'Volunteer') }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                    ACCOUNT TIMELINE
                ================================================== --}}
                <div class="premium-card p-6 md:p-7">

                    <div class="flex items-center gap-4 mb-8">

                        <div class="header-icon bg-gradient-to-br
                                    from-emerald-500 to-teal-500">
                            🕒
                        </div>

                        <div>

                            <h2 class="card-title">
                                Account Timeline
                            </h2>

                            <p class="card-subtitle">
                                Important dates related to this account
                            </p>

                        </div>

                    </div>


                    <div class="relative pl-2">


                        {{-- Vertical Line --}}
                        <div class="absolute left-[25px]
                                    top-5 bottom-5
                                    w-0.5 bg-gradient-to-b
                                    from-green-300
                                    via-emerald-300
                                    to-teal-300">
                        </div>



                        {{-- Created --}}
                        <div class="relative flex gap-5 pb-8">

                            <div class="timeline-dot
                                        bg-green-100
                                        text-green-600">
                                ✓
                            </div>

                            <div class="pt-1">

                                <span class="timeline-badge
                                             bg-green-50 text-green-700">
                                    ACCOUNT CREATED
                                </span>

                                <p class="font-black text-gray-800 mt-2">
                                    Volunteer joined VolunteerHub
                                </p>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $createdDate }}
                                </p>

                            </div>

                        </div>



                        {{-- Updated --}}
                        <div class="relative flex gap-5">

                            <div class="timeline-dot
                                        bg-emerald-100
                                        text-emerald-600">
                                ↻
                            </div>

                            <div class="pt-1">

                                <span class="timeline-badge
                                             bg-emerald-50 text-emerald-700">
                                    LAST UPDATED
                                </span>

                                <p class="font-black text-gray-800 mt-2">
                                    Account information was updated
                                </p>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $updatedDate }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                    ADMIN NOTE / INFORMATION
                ================================================== --}}
                <div class="relative overflow-hidden rounded-[30px]
                            bg-gradient-to-r
                            from-green-50 via-emerald-50 to-teal-50
                            border border-emerald-100 p-6 md:p-7">

                    <div class="absolute -right-12 -top-12
                                w-32 h-32 rounded-full
                                bg-emerald-200/30">
                    </div>

                    <div class="relative flex gap-4">

                        <div class="w-12 h-12 shrink-0
                                    rounded-2xl
                                    bg-white
                                    border border-emerald-100
                                    shadow-sm
                                    flex items-center justify-center
                                    text-xl">
                            💡
                        </div>

                        <div>

                            <h3 class="font-black text-gray-800">
                                Volunteer Management
                            </h3>

                            <p class="text-sm text-gray-600
                                      leading-relaxed mt-1">

                                Use the quick actions to manage this volunteer's
                                account status. Deactivating an account can prevent
                                the volunteer from accessing active volunteer features.

                            </p>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =====================================================
                RIGHT SIDEBAR
            ====================================================== --}}
            <div class="space-y-6">


                {{-- =================================================
                    ACCOUNT STATUS
                ================================================== --}}
                <div class="premium-card overflow-hidden">

                    <div class="px-6 py-5
                                bg-gradient-to-r
                                from-green-700
                                via-emerald-600
                                to-teal-500">

                        <div class="flex items-center justify-between">

                            <div>

                                <h2 class="text-xl font-black text-white">
                                    Account Status
                                </h2>

                                <p class="text-emerald-100 text-sm mt-1">
                                    Current account availability
                                </p>

                            </div>

                            <div class="w-11 h-11 rounded-2xl
                                        bg-white/15
                                        flex items-center justify-center
                                        text-xl">
                                {{ $isActive ? '✓' : '!' }}
                            </div>

                        </div>

                    </div>


                    <div class="p-6">

                        <div class="rounded-[28px] p-7 text-center
                                    {{ $isActive
                                        ? 'bg-gradient-to-br from-green-50 to-emerald-50 border border-green-100'
                                        : 'bg-gradient-to-br from-red-50 to-orange-50 border border-red-100' }}">


                            <div class="w-20 h-20 mx-auto rounded-3xl
                                        flex items-center justify-center
                                        text-4xl
                                        {{ $isActive
                                            ? 'bg-green-100'
                                            : 'bg-red-100' }}">

                                {{ $isActive ? '🟢' : '🔴' }}

                            </div>


                            <h3 class="text-2xl font-black mt-4
                                       {{ $isActive
                                           ? 'text-green-700'
                                           : 'text-red-700' }}">

                                {{ $isActive ? 'Active' : 'Deactive' }}

                            </h3>


                            <p class="text-sm text-gray-500
                                      leading-relaxed mt-2">

                                {{ $isActive
                                    ? 'This volunteer account is currently active and available.'
                                    : 'This volunteer account is currently deactivated.' }}

                            </p>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                    QUICK ACTIONS
                ================================================== --}}
                <div class="premium-card p-6">

                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-12 h-12 rounded-2xl
                                    bg-gradient-to-br
                                    from-green-100 to-emerald-100
                                    flex items-center justify-center
                                    text-xl">
                            ⚡
                        </div>

                        <div>

                            <h2 class="text-xl font-black text-gray-800">
                                Quick Actions
                            </h2>

                            <p class="text-xs text-gray-500 mt-0.5">
                                Manage this volunteer
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
                                           from-orange-500 to-red-500
                                           text-white
                                           hover:shadow-xl
                                           hover:-translate-y-1">

                                <span>⏸️</span>
                                <span>Deactivate Volunteer</span>

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
                                           from-green-600 to-emerald-500
                                           text-white
                                           hover:shadow-xl
                                           hover:-translate-y-1">

                                <span>✓</span>
                                <span>Activate Volunteer</span>

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
                                       bg-white
                                       border border-gray-200
                                       text-gray-600
                                       hover:bg-red-50
                                       hover:border-red-200
                                       hover:text-red-600">

                            <span>🗑️</span>
                            <span>Delete Volunteer</span>

                        </button>

                    </form>

                </div>



                {{-- =================================================
                    MEMBER SINCE CARD
                ================================================== --}}
                <div class="relative overflow-hidden
                            rounded-[30px]
                            bg-gradient-to-br
                            from-green-700
                            via-emerald-600
                            to-teal-500
                            p-7 text-white shadow-xl">

                    <div class="absolute -right-14 -top-14
                                w-40 h-40 rounded-full
                                bg-white/10">
                    </div>

                    <div class="absolute -left-20 -bottom-24
                                w-48 h-48 rounded-full
                                bg-black/5">
                    </div>


                    <div class="relative">

                        <div class="w-14 h-14 rounded-2xl
                                    bg-white/15
                                    backdrop-blur-md
                                    flex items-center justify-center
                                    text-2xl mb-5">
                            🌱
                        </div>


                        <p class="text-emerald-100 text-sm font-semibold">
                            Volunteer Since
                        </p>


                        <p class="text-4xl font-black mt-1">
                            {{ $memberSince }}
                        </p>


                        <div class="h-px bg-white/20 my-5"></div>


                        <div class="flex items-start gap-3">

                            <span>✨</span>

                            <p class="text-emerald-50 text-sm leading-relaxed">
                                Proud member of the VolunteerHub community.
                            </p>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                    SECURITY CARD
                ================================================== --}}
                <div class="bg-white rounded-[30px]
                            border border-gray-100
                            p-6 shadow-lg">

                    <div class="flex items-start gap-4">

                        <div class="w-12 h-12 shrink-0
                                    rounded-2xl
                                    bg-emerald-100
                                    flex items-center justify-center
                                    text-xl">
                            🔐
                        </div>

                        <div>

                            <h3 class="font-black text-gray-800">
                                Account Security
                            </h3>

                            <p class="text-sm text-gray-500
                                      leading-relaxed mt-1">

                                Profile and account information is protected
                                by VolunteerHub authentication.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- =========================================================
            BOTTOM CTA
        ========================================================== --}}
        <div class="relative overflow-hidden
                    mt-7 rounded-[32px]
                    bg-white
                    border border-emerald-100
                    shadow-lg">

            <div class="absolute inset-0
                        bg-gradient-to-r
                        from-green-50
                        via-transparent
                        to-teal-50">
            </div>


            <div class="relative p-6 md:p-8
                        flex flex-col md:flex-row
                        items-center justify-between
                        gap-5">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14 shrink-0
                                rounded-2xl
                                bg-gradient-to-br
                                from-green-500
                                to-emerald-500
                                flex items-center justify-center
                                text-white text-2xl
                                shadow-lg">
                        👥
                    </div>

                    <div>

                        <h3 class="text-lg md:text-xl
                                   font-black text-gray-800">

                            Volunteer Management Center

                        </h3>

                        <p class="text-sm text-gray-500 mt-1">

                            Return to the volunteer directory to manage other accounts.

                        </p>

                    </div>

                </div>


                <a href="{{ route('admin.volunteers.index') }}"
                   class="inline-flex items-center gap-2
                          px-6 py-3.5
                          rounded-2xl
                          bg-gradient-to-r
                          from-green-600
                          to-emerald-500
                          text-white
                          font-extrabold
                          shadow-lg
                          hover:shadow-xl
                          hover:-translate-y-1
                          transition duration-300">

                    View Volunteers

                    <span class="text-lg">
                        →
                    </span>

                </a>

            </div>

        </div>

    </div>

</div>



{{-- ============================================================
    PREMIUM STYLES
============================================================= --}}
<style>

    /* Main Cards */
    .premium-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 30px;
        box-shadow:
            0 10px 30px rgba(15, 23, 42, 0.055),
            0 2px 8px rgba(15, 23, 42, 0.025);
        overflow: hidden;
        transition: all .3s ease;
    }

    .premium-card:hover {
        box-shadow:
            0 18px 45px rgba(15, 23, 42, 0.08),
            0 4px 12px rgba(16, 185, 129, 0.05);
    }


    /* Card Header */
    .card-header {
        padding: 1.5rem 1.75rem;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 1rem;
    }


    /* Header Icon */
    .header-icon {
        width: 3rem;
        height: 3rem;
        min-width: 3rem;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        box-shadow: 0 8px 18px rgba(16, 185, 129, .18);
    }


    /* Titles */
    .card-title {
        font-size: 1.25rem;
        font-weight: 900;
        color: #1f2937;
        line-height: 1.3;
    }

    .card-subtitle {
        color: #94a3b8;
        font-size: .82rem;
        margin-top: .2rem;
        line-height: 1.5;
    }


    /* Information Cards */
    .info-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.15rem;
        border-width: 1px;
        border-radius: 1.35rem;
        min-height: 82px;
        transition:
            transform .3s ease,
            box-shadow .3s ease,
            border-color .3s ease;
    }

    .info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 28px rgba(15, 23, 42, .07);
    }


    /* Info Icon */
    .info-icon {
        width: 3rem;
        height: 3rem;
        min-width: 3rem;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
    }


    /* Labels */
    .info-label {
        font-size: .68rem;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .08em;
    }


    /* Values */
    .info-value {
        color: #1f2937;
        font-size: .98rem;
        font-weight: 800;
        margin-top: .25rem;
        line-height: 1.4;
    }


    /* Timeline */
    .timeline-dot {
        position: relative;
        z-index: 10;
        width: 3rem;
        height: 3rem;
        min-width: 3rem;
        border-radius: 999px;
        border: 4px solid white;
        box-shadow: 0 5px 15px rgba(15, 23, 42, .08);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 900;
    }


    .timeline-badge {
        display: inline-flex;
        align-items: center;
        padding: .3rem .65rem;
        border-radius: .6rem;
        font-size: .62rem;
        font-weight: 900;
        letter-spacing: .07em;
    }


    /* Action Buttons */
    .action-btn {
        width: 100%;
        min-height: 52px;
        padding: .85rem 1.1rem;
        border-radius: 1rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: .55rem;
        box-shadow: 0 5px 14px rgba(15, 23, 42, .07);
        transition:
            transform .3s ease,
            box-shadow .3s ease,
            background .3s ease;
    }


    /* Smooth Buttons */
    button,
    a {
        -webkit-tap-highlight-color: transparent;
    }


    /* Responsive */
    @media (max-width: 640px) {

        .premium-card {
            border-radius: 24px;
        }

        .card-header {
            padding: 1.25rem;
        }

        .info-card {
            padding: 1rem;
        }

    }

</style>

@endsection