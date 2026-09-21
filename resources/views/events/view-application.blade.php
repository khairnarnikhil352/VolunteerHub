@extends('layouts.student')

@section('content')

@php
    $statusColor = match($registration->status){
        'Pending' => 'bg-yellow-100 text-yellow-700',
        'Approved' => 'bg-green-100 text-green-700',
        'Completed' => 'bg-blue-100 text-blue-700',
        'Rejected' => 'bg-red-100 text-red-700',
        default => 'bg-gray-100 text-gray-700'
    };
@endphp

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-100">

    {{-- ================= HERO ================= --}}
    <section class="relative overflow-hidden rounded-b-[40px] bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500 text-white">

        <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-8 py-14 relative z-10">

            <span class="bg-white/20 px-5 py-2 rounded-full text-sm font-semibold">
                👁️ Volunteer Application
            </span>

            <h1 class="text-5xl font-black mt-5">
                {{ $event->title }}
            </h1>

            <p class="mt-4 text-green-100 text-lg">
                Your submitted volunteer application details.
            </p>

            <div class="mt-6 flex gap-4 flex-wrap">

                <span class="px-4 py-2 rounded-full font-bold {{ $statusColor }}">
                    {{ $registration->status }}
                </span>

                <span class="bg-white/20 px-4 py-2 rounded-full">
                    📅 Applied : {{ $registration->created_at->format('d M Y') }}
                </span>

            </div>

        </div>

    </section>

    {{-- ================= EVENT CARD ================= --}}
    <div class="max-w-7xl mx-auto px-6 -mt-10 relative z-20">

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

            <div class="grid lg:grid-cols-3">

                {{-- Event Image --}}
                <div class="h-72 lg:h-full">

                    @if($event->banner)
                        <img src="{{ asset('images/events/'.$event->banner) }}"
                             class="w-full h-full object-cover">
                    @else
                        <img src="{{ asset('images/events/default.jpg') }}"
                             class="w-full h-full object-cover">
                    @endif

                </div>

                {{-- Event Info --}}
                <div class="lg:col-span-2 p-8">

                    <h2 class="text-3xl font-black text-green-700">
                        {{ $event->title }}
                    </h2>

                    <p class="text-gray-600 mt-4 leading-7">
                        {{ $event->description }}
                    </p>

                    <div class="grid md:grid-cols-2 gap-5 mt-8">

                        <div class="bg-green-50 rounded-2xl p-4">
                            <p class="text-sm text-gray-500">📅 Event Date</p>
                            <h3 class="font-bold text-green-700">
                                {{ $event->event_date->format('d F Y') }}
                            </h3>
                        </div>

                        <div class="bg-blue-50 rounded-2xl p-4">
                            <p class="text-sm text-gray-500">⏰ Event Time</p>
                            <h3 class="font-bold text-blue-700">
                                {{ date('h:i A', strtotime($event->start_time)) }}
                            </h3>
                        </div>

                        <div class="bg-orange-50 rounded-2xl p-4">
                            <p class="text-sm text-gray-500">📍 City</p>
                            <h3 class="font-bold text-orange-700">
                                {{ $event->city }}
                            </h3>
                        </div>

                        <div class="bg-purple-50 rounded-2xl p-4">
                            <p class="text-sm text-gray-500">🏢 Venue</p>
                            <h3 class="font-bold text-purple-700">
                                {{ $event->venue }}
                            </h3>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ================= PERSONAL INFORMATION ================= --}}
    <section class="max-w-7xl mx-auto px-6 py-10">

        <div class="bg-white rounded-3xl shadow-lg p-8">

            <h2 class="text-3xl font-black text-green-700 mb-8">
                👤 Personal Information
            </h2>

            <div class="grid lg:grid-cols-3 gap-8">

                {{-- LEFT SIDE : Passport Photo + Aadhaar PDF --}}
                <div class="space-y-6">

                    {{-- Passport Photo --}}
                    <div class="text-center bg-green-50 rounded-3xl p-6 border border-green-200">

                        <img src="{{ asset('storage/'.$registration->passport_photo) }}"
                            class="w-40 h-40 rounded-full object-cover border-4 border-green-500 shadow-xl mx-auto">

                        <p class="mt-4 font-bold text-green-700 text-lg">
                            Passport Photo
                        </p>

                    </div>

                    {{-- Aadhaar Card Document --}}
                    <div class="bg-blue-50 rounded-3xl p-5 border border-blue-200">

                        <p class="text-gray-600 text-sm mb-3 font-semibold">
                            📄 Aadhaar Card Document
                        </p>

                        @if($registration->aadhaar_document)

                            <a href="{{ asset('storage/'.$registration->aadhaar_document) }}"
                            target="_blank"
                            class="flex items-center justify-between bg-white border border-blue-200 rounded-2xl px-4 py-3 hover:bg-blue-100 transition">

                                <div>
                                    <p class="font-bold text-blue-700">
                                        Aadhaar Uploaded
                                    </p>

                                    <p class="text-xs text-gray-500">
                                        Click to view uploaded document
                                    </p>
                                </div>

                                <span class="bg-blue-600 text-white px-3 py-2 rounded-lg text-sm font-semibold">
                                    View PDF
                                </span>

                            </a>

                        @else

                            <div class="bg-red-100 text-red-600 rounded-xl p-4 text-center font-semibold">
                                No Aadhaar document uploaded.
                            </div>

                        @endif

                    </div>

                </div>

                {{-- RIGHT SIDE : Personal Details --}}
                <div class="lg:col-span-2">

                    <div class="grid md:grid-cols-2 gap-5">

                        <div class="bg-gray-50 rounded-2xl p-4">
                            <p class="text-xs text-gray-500">Full Name</p>
                            <h4 class="font-bold text-lg">{{ $registration->user->name }}</h4>
                        </div>

                        <div class="bg-gray-50 rounded-2xl p-4">
                            <p class="text-xs text-gray-500">Email Address</p>
                            <h4 class="font-bold text-lg">{{ $registration->user->email }}</h4>
                        </div>

                        <div class="bg-gray-50 rounded-2xl p-4">
                            <p class="text-xs text-gray-500">📱 Mobile Number</p>
                            <h4 class="font-bold text-lg">{{ $registration->phone }}</h4>
                        </div>

                        <div class="bg-gray-50 rounded-2xl p-4">
                            <p class="text-xs text-gray-500">⚧ Gender</p>
                            <h4 class="font-bold text-lg">{{ $registration->gender }}</h4>
                        </div>

                        <div class="bg-gray-50 rounded-2xl p-4">
                            <p class="text-xs text-gray-500">🎂 Date of Birth</p>
                            <h4 class="font-bold text-lg">
                                {{ $registration->dob->format('d M Y') }}
                            </h4>
                        </div>

                        <div class="bg-gray-50 rounded-2xl p-4">
                            <p class="text-xs text-gray-500">💼 Volunteer Category</p>
                            <h4 class="font-bold text-lg">{{ $registration->volunteer_category }}</h4>
                        </div>

                        <div class="bg-gray-50 rounded-2xl p-4">
                            <p class="text-xs text-gray-500">🧑 Occupation</p>
                            <h4 class="font-bold text-lg">{{ $registration->occupation }}</h4>
                        </div>

                        <div class="bg-gray-50 rounded-2xl p-4">
                            <p class="text-xs text-gray-500">🪪 Aadhaar Number</p>
                            <h4 class="font-bold text-lg">{{ $registration->aadhaar_number }}</h4>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    

    {{-- ================= ADDRESS ================= --}}
    <section class="max-w-7xl mx-auto px-6 pb-8">

        <div class="bg-white rounded-3xl shadow-lg p-8">

            <h2 class="text-3xl font-black text-green-700 mb-8">
                🏠 Address Information
            </h2>

            <div class="grid md:grid-cols-3 gap-6">

                <div class="md:col-span-3">
                    <p class="text-gray-500 text-sm">Full Address</p>
                    <h4 class="font-bold">{{ $registration->address }}</h4>
                </div>

                <div>
                    <p class="text-gray-500 text-sm">City</p>
                    <h4 class="font-bold">{{ $registration->city }}</h4>
                </div>

                <div>
                    <p class="text-gray-500 text-sm">State</p>
                    <h4 class="font-bold">{{ $registration->state }}</h4>
                </div>

                <div>
                    <p class="text-gray-500 text-sm">Pincode</p>
                    <h4 class="font-bold">{{ $registration->pincode }}</h4>
                </div>

            </div>

        </div>

    </section>

    {{-- ================= EMERGENCY CONTACT ================= --}}
    <section class="max-w-7xl mx-auto px-6 pb-8">

        <div class="bg-white rounded-3xl shadow-lg p-8">

            <h2 class="text-3xl font-black text-green-700 mb-8">
                📞 Emergency Contact
            </h2>

            <div class="grid md:grid-cols-3 gap-6">

                <div>
                    <p class="text-gray-500 text-sm">Contact Name</p>
                    <h4 class="font-bold">{{ $registration->emergency_contact_name }}</h4>
                </div>

                <div>
                    <p class="text-gray-500 text-sm">Relationship</p>
                    <h4 class="font-bold">{{ $registration->emergency_contact_relation }}</h4>
                </div>

                <div>
                    <p class="text-gray-500 text-sm">Mobile Number</p>
                    <h4 class="font-bold">{{ $registration->emergency_contact_phone }}</h4>
                </div>

            </div>

        </div>

    </section>

    {{-- ================= MOTIVATION ================= --}}
    <section class="max-w-7xl mx-auto px-6 pb-8">

        <div class="bg-white rounded-3xl shadow-lg p-8">

            <h2 class="text-3xl font-black text-green-700 mb-6">
                ❤️ Volunteer Motivation
            </h2>

            <div class="space-y-6">

                <div class="bg-green-50 rounded-2xl p-5">
                    <p class="text-gray-500 text-sm mb-2">Why do you want to join?</p>
                    <p class="leading-7">{{ $registration->why_join }}</p>
                </div>

                <div class="bg-blue-50 rounded-2xl p-5">
                    <p class="text-gray-500 text-sm mb-2">Previous Volunteer Experience</p>
                    <p class="leading-7">
                        {{ $registration->previous_experience ?: 'No previous volunteer experience provided.' }}
                    </p>
                </div>

            </div>

        </div>

    </section>

    {{-- ================= MEDICAL ================= --}}
    <section class="max-w-7xl mx-auto px-6 pb-8">

        <div class="bg-white rounded-3xl shadow-lg p-8">

            <h2 class="text-3xl font-black text-green-700 mb-6">
                ⚕ Medical Information
            </h2>

            <div class="bg-red-50 rounded-2xl p-5">

                <p class="text-gray-500 text-sm mb-2">
                    Medical Condition / Allergies
                </p>

                <p class="leading-7">
                    {{ $registration->medical_condition ?: 'No medical condition mentioned.' }}
                </p>

            </div>

        </div>

    </section>

    {{-- ================= APPLICATION STATUS ================= --}}
    <section class="max-w-7xl mx-auto px-6 pb-12">

        <div class="bg-white rounded-3xl shadow-lg p-8">

            <h2 class="text-3xl font-black text-green-700 mb-8">
                📋 Application Status
            </h2>

            <div class="grid md:grid-cols-2 gap-6">

                <div class="bg-gray-50 rounded-2xl p-5">

                    <p class="text-gray-500 text-sm">Current Status</p>

                    <span class="inline-block mt-3 px-5 py-2 rounded-full font-bold {{ $statusColor }}">
                        {{ $registration->status }}
                    </span>

                </div>

                <div class="bg-gray-50 rounded-2xl p-5">

                    <p class="text-gray-500 text-sm">Application Submitted On</p>

                    <h3 class="font-bold mt-2">
                        {{ $registration->created_at->format('d F Y h:i A') }}
                    </h3>

                </div>

            </div>

            {{-- Buttons --}}
            <div class="flex flex-wrap gap-4 mt-10">

                <a href="{{ route('my.events') }}"
                   class="bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-bold hover:bg-gray-300">
                    ← Back to My Events
                </a>

                @if($registration->status == 'Pending')

                    <a href="{{ route('events.register.edit',$registration->id) }}"
                       class="bg-green-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-green-700">
                        ✏️ Edit Application
                    </a>

               
                @endif

            </div>

        </div>

    </section>

</div>

@endsection