@extends('layouts.admin')

@section('content')

@php
    $isAdmin = auth()->user()->role === 'admin';
@endphp

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-50">

    {{-- ========================================================= --}}
    {{-- HERO SECTION --}}
    {{-- ========================================================= --}}

    <section class="relative overflow-hidden rounded-b-[45px]
                    bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500
                    text-white shadow-2xl">

        {{-- Decorative Background --}}
        <div class="absolute -top-20 -right-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 -left-20 w-80 h-80 bg-green-300/20 rounded-full blur-3xl"></div>
        <div class="absolute top-20 left-1/2 w-40 h-40 bg-teal-300/10 rounded-full blur-2xl"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16 relative z-10">

            <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-md border border-white/20 px-5 py-2 rounded-full text-sm font-semibold shadow-lg">
                🛡️ VolunteerHub • Admin Portal
            </div>

            <h1 class="text-5xl lg:text-6xl font-black mt-6 leading-tight tracking-tight">
                My Admin Profile
            </h1>

            <p class="mt-5 text-lg text-green-100 max-w-3xl leading-8">
                Manage your administrator profile, account settings and VolunteerHub management information.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">

                <a href="{{ route('admin.dashboard') }}"
                   class="inline-flex items-center gap-2 bg-white text-green-700 px-6 py-3 rounded-2xl font-bold shadow-lg hover:bg-green-50 transition">
                    🏠 Dashboard
                </a>

                <a href="{{ route('admin.profile.edit') }}"
                   class="inline-flex items-center gap-2 border border-white/30 bg-white/10 backdrop-blur-sm px-6 py-3 rounded-2xl font-bold hover:bg-white/20 transition">
                    ✏️ Edit Profile
                </a>

            </div>

        </div>
    </section>

    {{-- ========================================================= --}}
    {{-- PROFILE CARD --}}
    {{-- ========================================================= --}}

    <div class="max-w-7xl mx-auto px-6 -mt-12 relative z-20">

        <div class="bg-white rounded-[35px] shadow-2xl overflow-hidden border border-green-100">

            <div class="h-32 bg-gradient-to-r from-green-600 via-emerald-500 to-teal-500 relative">

                <div class="absolute inset-0 bg-black/10"></div>

            </div>

            <div class="px-8 pb-8">

                <div class="flex flex-col lg:flex-row items-center lg:items-end gap-6 -mt-16">

                    {{-- PHOTO --}}
                    <div class="relative">

                        <div class="w-36 h-36 rounded-[28px] bg-white p-2 shadow-xl">

                            @if($user->profile_photo)

                                <img src="{{ asset('storage/'.$user->profile_photo) }}"
                                     class="w-full h-full rounded-[24px] object-cover">

                            @else

                                <div class="w-full h-full rounded-[24px] bg-gradient-to-br from-green-100 to-emerald-100 flex items-center justify-center text-6xl">
                                    👤
                                </div>

                            @endif

                        </div>

                        <span class="absolute -bottom-2 -right-2 w-10 h-10 bg-green-500 border-4 border-white rounded-full flex items-center justify-center">
                            <span class="w-3 h-3 bg-white rounded-full"></span>
                        </span>

                    </div>

                    {{-- INFO --}}
                    <div class="flex-1 text-center lg:text-left">

                        <div class="flex flex-wrap items-center gap-3 justify-center lg:justify-start">

                            <h2 class="text-3xl font-black text-gray-800">
                                {{ $user->name }}
                            </h2>

                            <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-bold">
                                🛡️ Administrator
                            </span>

                        </div>

                        <p class="text-gray-500 mt-2">
                            VolunteerHub System Administrator
                        </p>

                        <div class="flex flex-wrap gap-3 mt-5 justify-center lg:justify-start">

                            <span class="px-4 py-2 rounded-xl bg-gray-50 border text-sm">
                                📧 {{ $user->email }}
                            </span>

                            <span class="px-4 py-2 rounded-xl bg-gray-50 border text-sm">
                                📱 {{ $user->phone ?? 'Not Available' }}
                            </span>

                            <span class="px-4 py-2 rounded-xl bg-green-50 border border-green-200 text-green-700 text-sm font-semibold">
                                📅 Member Since {{ $user->created_at->format('M Y') }}
                            </span>

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <a href="{{ route('admin.profile.edit') }}"
                       class="bg-gradient-to-r from-green-600 to-emerald-600 text-white px-6 py-3 rounded-2xl font-bold shadow-lg hover:scale-105 transition">
                        ✏️ Edit Profile
                    </a>

                </div>

            </div>

        </div>

        {{-- ========================================================= --}}
        {{-- STATISTICS --}}
        {{-- ========================================================= --}}

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mt-10">

            <div class="bg-white rounded-[28px] p-6 shadow-lg border border-green-100 hover:-translate-y-2 transition">

                <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-3xl mb-4">
                    👥
                </div>

                <p class="text-gray-500 text-sm">Total Volunteers</p>

                <h2 class="text-4xl font-black text-green-700">
                    {{ $stats['volunteers'] }}
                </h2>

            </div>

            <div class="bg-white rounded-[28px] p-6 shadow-lg border border-blue-100 hover:-translate-y-2 transition">

                <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl mb-4">
                    📅
                </div>

                <p class="text-gray-500 text-sm">Total Events</p>

                <h2 class="text-4xl font-black text-blue-700">
                    {{ $stats['events'] }}
                </h2>

            </div>

            <div class="bg-white rounded-[28px] p-6 shadow-lg border border-purple-100 hover:-translate-y-2 transition">

                <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-3xl mb-4">
                    📄
                </div>

                <p class="text-gray-500 text-sm">Applications</p>

                <h2 class="text-4xl font-black text-purple-700">
                    {{ $stats['applications'] }}
                </h2>

            </div>

            <div class="bg-white rounded-[28px] p-6 shadow-lg border border-emerald-100 hover:-translate-y-2 transition">

                <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center text-3xl mb-4">
                    ✅
                </div>

                <p class="text-gray-500 text-sm">Approved Applications</p>

                <h2 class="text-4xl font-black text-emerald-700">
                    {{ $stats['approved'] }}
                </h2>

            </div>

        </div>

        {{-- ========================================================= --}}
        {{-- MAIN CONTENT --}}
        {{-- ========================================================= --}}

        <div class="grid lg:grid-cols-3 gap-8 mt-10">

            {{-- LEFT SIDE --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- PERSONAL INFO --}}
                <div class="bg-white rounded-[30px] shadow-xl border border-green-100 overflow-hidden">

                    <div class="bg-gradient-to-r from-green-700 to-emerald-600 px-6 py-5 text-white">

                        <h3 class="text-2xl font-black">👤 Personal Information</h3>

                        <p class="text-green-100 text-sm mt-1">
                            Administrator account details.
                        </p>

                    </div>

                    <div class="p-6 grid md:grid-cols-2 gap-5">

                        <div class="bg-green-50 rounded-2xl p-5 border border-green-100">
                            <p class="text-xs text-green-600 font-bold uppercase">Full Name</p>
                            <h4 class="font-black text-gray-800 text-lg mt-2">{{ $user->name }}</h4>
                        </div>

                        <div class="bg-blue-50 rounded-2xl p-5 border border-blue-100">
                            <p class="text-xs text-blue-600 font-bold uppercase">Email</p>
                            <h4 class="font-black text-gray-800 text-lg mt-2 break-all">{{ $user->email }}</h4>
                        </div>

                        <div class="bg-yellow-50 rounded-2xl p-5 border border-yellow-100">
                            <p class="text-xs text-yellow-600 font-bold uppercase">Phone Number</p>
                            <h4 class="font-black text-gray-800 text-lg mt-2">{{ $user->phone ?? 'Not Available' }}</h4>
                        </div>

                        <div class="bg-purple-50 rounded-2xl p-5 border border-purple-100">
                            <p class="text-xs text-purple-600 font-bold uppercase">Gender</p>
                            <h4 class="font-black text-gray-800 text-lg mt-2">{{ $user->gender ?? 'Not Available' }}</h4>
                        </div>

                        <div class="bg-pink-50 rounded-2xl p-5 border border-pink-100">
                            <p class="text-xs text-pink-600 font-bold uppercase">Date of Birth</p>
                            <h4 class="font-black text-gray-800 text-lg mt-2">
                                {{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('d M Y') : 'Not Available' }}
                            </h4>
                        </div>

                        <div class="bg-teal-50 rounded-2xl p-5 border border-teal-100">
                            <p class="text-xs text-teal-600 font-bold uppercase">Role</p>
                            <h4 class="font-black text-gray-800 text-lg mt-2">{{ ucfirst($user->role) }}</h4>
                        </div>

                    </div>

                </div>

                {{-- ACCOUNT TIMELINE --}}
                <div class="bg-white rounded-[30px] shadow-xl border border-green-100 overflow-hidden">

                    <div class="bg-gradient-to-r from-emerald-600 to-teal-500 px-6 py-5 text-white">

                        <h3 class="text-2xl font-black">🕒 Account Timeline</h3>

                    </div>

                    <div class="p-7 space-y-6">

                        <div class="flex gap-4 items-start">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-xl">🎉</div>
                            <div>
                                <h4 class="font-bold text-gray-800">Account Created</h4>
                                <p class="text-gray-500">{{ $user->created_at->format('d M Y • h:i A') }}</p>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-xl">✏️</div>
                            <div>
                                <h4 class="font-bold text-gray-800">Last Updated</h4>
                                <p class="text-gray-500">{{ $user->updated_at->format('d M Y • h:i A') }}</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT SIDE --}}
            <div class="space-y-8">

                {{-- ACCOUNT STATUS --}}
                <div class="bg-white rounded-[30px] shadow-xl border border-green-100 overflow-hidden">

                    <div class="bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500 p-6 text-white">

                        <h3 class="text-2xl font-black">🟢 Account Status</h3>

                    </div>

                    <div class="p-6 text-center">

                        <div class="w-24 h-24 rounded-full bg-green-100 mx-auto flex items-center justify-center text-5xl">
                            🟢
                        </div>

                        <h2 class="text-3xl font-black text-green-700 mt-5">
                            Active Administrator
                        </h2>

                        <p class="text-gray-500 mt-2">
                            This administrator account has full access to VolunteerHub management.
                        </p>

                    </div>

                </div>

                {{-- QUICK ACTIONS --}}
                <div class="bg-white rounded-[30px] shadow-xl border border-green-100 overflow-hidden">

                    <div class="bg-gradient-to-r from-green-700 to-emerald-600 p-6 text-white">

                        <h3 class="text-2xl font-black">⚡ Quick Actions</h3>

                    </div>

                    <div class="p-6 space-y-4">

                        <a href="{{ route('admin.profile.edit') }}"
                           class="block w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white text-center py-4 rounded-2xl font-bold shadow hover:scale-105 transition">
                            ✏️ Edit Profile
                        </a>

                        <a href="{{ route('admin.profile.edit') }}#password"
                           class="block w-full bg-gradient-to-r from-orange-500 to-red-500 text-white text-center py-4 rounded-2xl font-bold shadow hover:scale-105 transition">
                            🔒 Change Password
                        </a>

                        <a href="{{ route('admin.dashboard') }}"
                           class="block w-full border border-green-300 text-green-700 text-center py-4 rounded-2xl font-bold hover:bg-green-50 transition">
                            🏠 Back to Dashboard
                        </a>

                    </div>

                </div>

                {{-- ADMIN SUMMARY --}}
                <div class="relative overflow-hidden rounded-[30px] bg-gradient-to-br from-green-700 via-emerald-600 to-teal-500 text-white shadow-xl p-7">

                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full"></div>

                    <div class="relative z-10">

                        <div class="text-5xl mb-4">🌿</div>

                        <p class="text-green-200 text-sm font-semibold uppercase tracking-wider">
                            VolunteerHub Administrator
                        </p>

                        <h3 class="text-3xl font-black mt-2">
                            Manage the Entire Platform
                        </h3>

                        <p class="mt-3 text-green-100 leading-7">
                            Volunteers, Events, Applications, Certificates and Reports are managed from this admin account.
                        </p>

                        <div class="mt-6 space-y-2 text-green-100 text-sm">

                            <div>✔ Volunteer Management</div>
                            <div>✔ Event Management</div>
                            <div>✔ Application Approval</div>
                            <div>✔ Certificate Generation</div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- BOTTOM CTA --}}
        <div class="mt-12 bg-gradient-to-r from-green-700 via-emerald-600 to-teal-600 rounded-[35px] p-10 text-white shadow-xl">

            <div class="flex flex-col lg:flex-row items-center justify-between gap-6">

                <div>

                    <p class="text-green-200 text-sm font-semibold uppercase">
                        VolunteerHub Admin Panel
                    </p>

                    <h2 class="text-4xl font-black mt-2">
                        Keep Your Community Organized
                    </h2>

                    <p class="mt-3 text-green-100 max-w-2xl">
                        Manage volunteers, review applications, approve registrations, generate volunteer ID cards and certificates — all from one dashboard.
                    </p>

                </div>

                <a href="{{ route('admin.dashboard') }}"
                   class="bg-yellow-400 text-black px-8 py-4 rounded-2xl font-black shadow-xl hover:bg-yellow-300 transition">
                    🚀 Go to Dashboard
                </a>

            </div>

        </div>

    </div>

</div>

@endsection