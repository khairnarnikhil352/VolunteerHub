@extends('layouts.admin')

@section('content')

@php
    $status = strtolower($application->status ?? 'pending');

    $statusConfig = [
        'pending' => [
            'label' => 'Pending Review',
            'icon' => '⏳',
            'bg' => 'bg-amber-50',
            'text' => 'text-amber-700',
            'border' => 'border-amber-200',
            'dot' => 'bg-amber-500',
        ],
        'approved' => [
            'label' => 'Approved',
            'icon' => '✓',
            'bg' => 'bg-emerald-50',
            'text' => 'text-emerald-700',
            'border' => 'border-emerald-200',
            'dot' => 'bg-emerald-500',
        ],
        'rejected' => [
            'label' => 'Rejected',
            'icon' => '✕',
            'bg' => 'bg-red-50',
            'text' => 'text-red-700',
            'border' => 'border-red-200',
            'dot' => 'bg-red-500',
        ],
        'completed' => [
            'label' => 'Completed',
            'icon' => '★',
            'bg' => 'bg-blue-50',
            'text' => 'text-blue-700',
            'border' => 'border-blue-200',
            'dot' => 'bg-blue-500',
        ],
    ];

    $currentStatus = $statusConfig[$status] ?? $statusConfig['pending'];

    $volunteer = $application->user;
    $event = $application->event;

    /*
    |--------------------------------------------------------------------------
    | Uploaded documents
    |--------------------------------------------------------------------------
    | If your DB stores values like:
    | aadhaar_documents/abc.pdf
    | passport_photos/abc.jpg
    | then storage/ is used.
    */

    $aadhaarDocument = $application->aadhaar_document ?? null;
    $passportPhoto = $application->passport_photo ?? null;

    $remainingSlots = $event
        ? max(0, ($event->capacity ?? 0) - ($event->filled_slots ?? 0))
        : 0;

    $capacityPercent = ($event && $event->capacity > 0)
        ? min(100, round(($event->filled_slots / $event->capacity) * 100))
        : 0;
@endphp


{{-- =========================================================
    PREMIUM HERO
========================================================= --}}
<div class="relative overflow-hidden rounded-[34px]
            bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500
            p-6 md:p-9 mb-8 shadow-2xl">

    {{-- Decorative Background --}}
    <div class="absolute -top-24 -right-20 w-80 h-80 rounded-full bg-white/10"></div>
    <div class="absolute -bottom-28 -left-20 w-96 h-96 rounded-full bg-white/10"></div>
    <div class="absolute top-1/2 right-1/4 w-40 h-40 rounded-full bg-white/5"></div>

    <div class="relative z-10">

        <a href="{{ route('admin.applications.index') }}"
           class="inline-flex items-center gap-2
                  px-4 py-2.5 rounded-xl
                  bg-white/15 hover:bg-white/25
                  text-white text-sm font-bold
                  backdrop-blur-md transition mb-7">
            ← Back to Applications
        </a>

        <div class="flex flex-col lg:flex-row
                    lg:items-center lg:justify-between gap-7">

            <div>

                <div class="flex flex-wrap items-center gap-2 mb-4">

                    <span class="px-3 py-1.5 rounded-full
                                 bg-white/15 text-white
                                 text-xs font-black uppercase
                                 tracking-wider backdrop-blur-md">
                        Application Details
                    </span>

                    <span class="px-3 py-1.5 rounded-full
                                 bg-white/15 text-white
                                 text-xs font-bold backdrop-blur-md">
                        ID #{{ $application->id }}
                    </span>

                </div>

                <h1 class="text-3xl md:text-4xl lg:text-5xl
                           font-black text-white tracking-tight">
                    Volunteer Application
                </h1>

                <p class="text-white/80 mt-3 max-w-2xl">
                    Complete application information, documents,
                    emergency details and event information.
                </p>

            </div>


            {{-- Status --}}
            <div class="bg-white/15 backdrop-blur-xl
                        border border-white/20
                        rounded-3xl p-5 min-w-[230px]">

                <p class="text-white/60 text-xs
                          uppercase tracking-wider font-bold">
                    Current Status
                </p>

                <div class="flex items-center gap-3 mt-3">

                    <span class="w-3 h-3 rounded-full
                                 {{ $currentStatus['dot'] }}">
                    </span>

                    <span class="text-white text-xl font-black">
                        {{ $currentStatus['label'] }}
                    </span>

                </div>

                <p class="text-white/60 text-xs mt-2">
                    Application #{{ $application->id }}
                </p>

            </div>

        </div>

    </div>
</div>


{{-- =========================================================
    QUICK SUMMARY
========================================================= --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4
            gap-5 mb-8">

    {{-- Applicant --}}
    <div class="bg-white rounded-3xl
                border border-slate-100
                shadow-lg p-5
                hover:-translate-y-1 hover:shadow-xl
                transition">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-[11px] uppercase
                          tracking-wider font-bold text-slate-400">
                    Applicant
                </p>

                <p class="text-lg font-black text-slate-800 mt-2">
                    {{ $volunteer->name ?? 'N/A' }}
                </p>
            </div>

            <div class="w-12 h-12 rounded-2xl
                        bg-emerald-50
                        flex items-center justify-center
                        text-xl">
                👤
            </div>

        </div>

    </div>


    {{-- Event --}}
    <div class="bg-white rounded-3xl
                border border-slate-100
                shadow-lg p-5
                hover:-translate-y-1 hover:shadow-xl
                transition">

        <div class="flex items-center justify-between">

            <div class="min-w-0">

                <p class="text-[11px] uppercase
                          tracking-wider font-bold text-slate-400">
                    Event
                </p>

                <p class="text-lg font-black text-slate-800
                          mt-2 truncate">
                    {{ $event->title ?? 'N/A' }}
                </p>

            </div>

            <div class="w-12 h-12 shrink-0 rounded-2xl
                        bg-teal-50
                        flex items-center justify-center
                        text-xl">
                🎯
            </div>

        </div>

    </div>


    {{-- Applied --}}
    <div class="bg-white rounded-3xl
                border border-slate-100
                shadow-lg p-5
                hover:-translate-y-1 hover:shadow-xl
                transition">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-[11px] uppercase
                          tracking-wider font-bold text-slate-400">
                    Applied On
                </p>

                <p class="text-lg font-black text-slate-800 mt-2">
                    {{ $application->created_at?->format('d M Y') ?? 'N/A' }}
                </p>

            </div>

            <div class="w-12 h-12 rounded-2xl
                        bg-blue-50
                        flex items-center justify-center
                        text-xl">
                📅
            </div>

        </div>

    </div>


    {{-- Application --}}
    <div class="bg-white rounded-3xl
                border border-slate-100
                shadow-lg p-5
                hover:-translate-y-1 hover:shadow-xl
                transition">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-[11px] uppercase
                          tracking-wider font-bold text-slate-400">
                    Application ID
                </p>

                <p class="text-2xl font-black
                          text-emerald-600 mt-2">
                    #{{ $application->id }}
                </p>

            </div>

            <div class="w-12 h-12 rounded-2xl
                        bg-purple-50
                        flex items-center justify-center
                        text-xl">
                📋
            </div>

        </div>

    </div>

</div>



<div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

    {{-- =====================================================
        MAIN CONTENT
    ====================================================== --}}
    <div class="xl:col-span-2 space-y-8">


        {{-- =================================================
            1. PERSONAL / APPLICATION DETAILS
        ================================================== --}}
        <div class="bg-white rounded-[32px]
                    border border-slate-100
                    shadow-xl overflow-hidden">

            {{-- Header --}}
            <div class="px-6 md:px-8 py-6
                        bg-gradient-to-r
                        from-green-50 via-emerald-50 to-teal-50
                        border-b border-emerald-100">

                <div class="flex items-center gap-4">

                    <div class="w-13 h-13
                                rounded-2xl
                                bg-gradient-to-br
                                from-green-600 to-teal-500
                                flex items-center justify-center
                                text-white text-xl shadow-lg">
                        👤
                    </div>

                    <div>

                        <h2 class="text-xl font-black text-slate-800">
                            Volunteer Application Details
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Personal information submitted with this application
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6 md:p-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Volunteer Name --}}
                    <div class="detail-card">
                        <p class="detail-label">Volunteer Name</p>
                        <p class="detail-value">
                            {{ $volunteer->name ?? 'N/A' }}
                        </p>
                    </div>


                    {{-- Email --}}
                    <div class="detail-card">
                        <p class="detail-label">Email Address</p>
                        <p class="detail-value break-all">
                            {{ $volunteer->email ?? 'N/A' }}
                        </p>
                    </div>


                    {{-- Phone --}}
                    <div class="detail-card">
                        <p class="detail-label">Phone Number</p>
                        <p class="detail-value">
                            {{ $application->phone ?? 'N/A' }}
                        </p>
                    </div>


                    {{-- DOB --}}
                    <div class="detail-card">
                        <p class="detail-label">Date of Birth</p>
                        <p class="detail-value">
                            {{ $application->dob
                                ? \Carbon\Carbon::parse($application->dob)->format('d M Y')
                                : 'N/A' }}
                        </p>
                    </div>


                    {{-- Gender --}}
                    <div class="detail-card">
                        <p class="detail-label">Gender</p>
                        <p class="detail-value capitalize">
                            {{ $application->gender ?? 'N/A' }}
                        </p>
                    </div>


                    {{-- Volunteer Category --}}
                    <div class="detail-card">
                        <p class="detail-label">Volunteer Category</p>
                        <p class="detail-value">
                            {{ $application->volunteer_category ?? 'N/A' }}
                        </p>
                    </div>


                    {{-- Occupation --}}
                    <div class="detail-card">
                        <p class="detail-label">Occupation</p>
                        <p class="detail-value">
                            {{ $application->occupation ?? 'N/A' }}
                        </p>
                    </div>


                    {{-- Aadhaar --}}
                    <div class="detail-card">

                        <p class="detail-label">
                            Aadhaar Number
                        </p>

                        <p class="detail-value font-mono tracking-wider">
                            {{ $application->aadhaar_number ?? 'N/A' }}
                        </p>

                    </div>

                </div>

            </div>

        </div>



        {{-- =================================================
            2. ADDRESS DETAILS
        ================================================== --}}
        <div class="bg-white rounded-[32px]
                    border border-slate-100
                    shadow-xl overflow-hidden">

            <div class="px-6 md:px-8 py-6
                        bg-gradient-to-r
                        from-teal-50 via-emerald-50 to-green-50
                        border-b border-emerald-100">

                <div class="flex items-center gap-4">

                    <div class="w-13 h-13 rounded-2xl
                                bg-gradient-to-br
                                from-teal-500 to-emerald-600
                                flex items-center justify-center
                                text-white text-xl shadow-lg">
                        📍
                    </div>

                    <div>

                        <h2 class="text-xl font-black text-slate-800">
                            Address Information
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Residential address provided by volunteer
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6 md:p-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Address --}}
                    <div class="md:col-span-2
                                rounded-2xl bg-slate-50
                                border border-slate-100 p-5">

                        <p class="text-[11px] uppercase
                                  tracking-wider font-bold
                                  text-slate-400">
                            Full Address
                        </p>

                        <p class="font-bold text-slate-800
                                  mt-2 leading-7">
                            {{ $application->address ?? 'N/A' }}
                        </p>

                    </div>


                    {{-- City --}}
                    <div class="detail-card">
                        <p class="detail-label">City</p>
                        <p class="detail-value">
                            {{ $application->city ?? 'N/A' }}
                        </p>
                    </div>


                    {{-- State --}}
                    <div class="detail-card">
                        <p class="detail-label">State</p>
                        <p class="detail-value">
                            {{ $application->state ?? 'N/A' }}
                        </p>
                    </div>


                    {{-- Pincode --}}
                    <div class="detail-card">
                        <p class="detail-label">Pincode</p>
                        <p class="detail-value font-mono">
                            {{ $application->pincode ?? 'N/A' }}
                        </p>
                    </div>

                </div>

            </div>

        </div>



        {{-- =================================================
            3. EMERGENCY CONTACT
        ================================================== --}}
        <div class="bg-white rounded-[32px]
                    border border-slate-100
                    shadow-xl overflow-hidden">

            <div class="px-6 md:px-8 py-6
                        bg-gradient-to-r
                        from-orange-50 via-amber-50 to-yellow-50
                        border-b border-amber-100">

                <div class="flex items-center gap-4">

                    <div class="w-13 h-13 rounded-2xl
                                bg-gradient-to-br
                                from-orange-500 to-amber-500
                                flex items-center justify-center
                                text-white text-xl shadow-lg">
                        🚨
                    </div>

                    <div>

                        <h2 class="text-xl font-black text-slate-800">
                            Emergency Contact
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Emergency contact information
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6 md:p-8">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    {{-- Name --}}
                    <div class="detail-card">
                        <p class="detail-label">
                            Contact Name
                        </p>

                        <p class="detail-value">
                            {{ $application->emergency_contact_name ?? 'N/A' }}
                        </p>
                    </div>


                    {{-- Relation --}}
                    <div class="detail-card">
                        <p class="detail-label">
                            Relation
                        </p>

                        <p class="detail-value">
                            {{ $application->emergency_contact_relation ?? 'N/A' }}
                        </p>
                    </div>


                    {{-- Phone --}}
                    <div class="detail-card">
                        <p class="detail-label">
                            Contact Phone
                        </p>

                        <p class="detail-value">
                            {{ $application->emergency_contact_phone ?? 'N/A' }}
                        </p>
                    </div>

                </div>

            </div>

        </div>



        {{-- =================================================
            4. DOCUMENTS
        ================================================== --}}
        <div class="bg-white rounded-[32px]
                    border border-slate-100
                    shadow-xl overflow-hidden">

            <div class="px-6 md:px-8 py-6
                        bg-gradient-to-r
                        from-blue-50 via-indigo-50 to-purple-50
                        border-b border-indigo-100">

                <div class="flex items-center gap-4">

                    <div class="w-13 h-13 rounded-2xl
                                bg-gradient-to-br
                                from-blue-600 to-indigo-600
                                flex items-center justify-center
                                text-white text-xl shadow-lg">
                        📎
                    </div>

                    <div>

                        <h2 class="text-xl font-black text-slate-800">
                            Uploaded Documents
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Documents submitted with this application
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6 md:p-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    {{-- =================================================
                     AADHAAR DOCUMENT PREVIEW
                    ================================================== --}}
                    <div class="rounded-[26px]
                                border border-slate-200
                                overflow-hidden
                                bg-gradient-to-br
                                from-slate-50 to-blue-50">

                        <div class="p-5">

                            {{-- Header --}}
                            <div class="flex items-center justify-between">

                                <div class="flex items-center gap-3">

                                    <div class="w-12 h-12
                                                rounded-2xl
                                                bg-blue-100
                                                flex items-center justify-center
                                                text-xl">
                                        🪪
                                    </div>

                                    <div>

                                        <h3 class="font-black text-slate-800">
                                            Aadhaar Document
                                        </h3>

                                        <p class="text-xs text-slate-500">
                                            Identity proof
                                        </p>

                                    </div>

                                </div>


                                @if($aadhaarDocument)

                                    <span class="px-2.5 py-1
                                                rounded-full
                                                bg-emerald-100
                                                text-emerald-700
                                                text-[10px]
                                                font-black">
                                        UPLOADED
                                    </span>

                                @endif

                            </div>


                            {{-- Document Preview --}}
                            @if($aadhaarDocument)

                                <div class="mt-5">

                                    <div class="h-56 rounded-2xl
                                                overflow-hidden
                                                bg-white
                                                border border-slate-200
                                                shadow-sm">

                                        <img src="{{ asset('storage/' . $aadhaarDocument) }}"
                                            alt="Aadhaar Document"
                                            class="w-full h-full object-contain
                                                    cursor-pointer
                                                    hover:scale-[1.02]
                                                    transition duration-300"
                                            onclick="openDocumentPreview('{{ asset('storage/' . $aadhaarDocument) }}')">

                                    </div>


                                    {{-- View Button --}}
                                    <button type="button"
                                            onclick="openDocumentPreview('{{ asset('storage/' . $aadhaarDocument) }}')"
                                            class="mt-4 inline-flex
                                                items-center justify-center
                                                gap-2 w-full
                                                px-4 py-3
                                                rounded-xl
                                                bg-gradient-to-r
                                                from-blue-600 to-indigo-600
                                                text-white font-bold
                                                text-sm shadow-md
                                                hover:shadow-lg
                                                hover:-translate-y-0.5
                                                transition">

                                        👁 View Full Document

                                    </button>

                                </div>

                            @else

                                <div class="mt-5 p-5
                                            rounded-2xl
                                            bg-white
                                            border border-red-100
                                            text-center">

                                    <div class="text-3xl mb-2">
                                        📄
                                    </div>

                                    <p class="text-sm font-bold text-red-600">
                                        No Aadhaar document uploaded.
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- Passport Photo --}}
                    <div class="rounded-[26px]
                                border border-slate-200
                                overflow-hidden
                                bg-gradient-to-br
                                from-slate-50 to-purple-50">

                        <div class="p-5">

                            <div class="flex items-center justify-between">

                                <div class="flex items-center gap-3">

                                    <div class="w-12 h-12
                                                rounded-2xl
                                                bg-purple-100
                                                flex items-center justify-center
                                                text-xl">
                                        📸
                                    </div>

                                    <div>

                                        <h3 class="font-black text-slate-800">
                                            Passport Photo
                                        </h3>

                                        <p class="text-xs text-slate-500">
                                            Volunteer photograph
                                        </p>

                                    </div>

                                </div>

                                @if($passportPhoto)
                                    <span class="px-2.5 py-1
                                                 rounded-full
                                                 bg-emerald-100
                                                 text-emerald-700
                                                 text-[10px]
                                                 font-black">
                                        UPLOADED
                                    </span>
                                @endif

                            </div>


                            @if($passportPhoto)

                                <div class="mt-5">

                                    <div class="h-56 rounded-2xl
                                                overflow-hidden
                                                bg-slate-100
                                                border border-slate-200">

                                        <img src="{{ asset('storage/' . $passportPhoto) }}"
                                             alt="Passport Photo"
                                             class="w-full h-full object-contain">

                                    </div>


                                    <a href="{{ asset('storage/' . $passportPhoto) }}"
                                       target="_blank"
                                       class="mt-4 inline-flex
                                              items-center justify-center
                                              gap-2 w-full
                                              px-4 py-3
                                              rounded-xl
                                              bg-gradient-to-r
                                              from-purple-600 to-indigo-600
                                              text-white font-bold
                                              text-sm shadow-md
                                              hover:shadow-lg
                                              transition">
                                        👁 View Full Photo
                                    </a>

                                </div>

                            @else

                                <div class="mt-5 p-4 rounded-2xl
                                            bg-white border border-red-100">

                                    <p class="text-sm font-bold text-red-600">
                                        No passport photo uploaded.
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- =================================================
            5. QUESTIONS & EXPERIENCE
        ================================================== --}}
        <div class="bg-white rounded-[32px]
                    border border-slate-100
                    shadow-xl overflow-hidden">

            <div class="px-6 md:px-8 py-6
                        bg-gradient-to-r
                        from-emerald-50 to-green-50
                        border-b border-emerald-100">

                <div class="flex items-center gap-4">

                    <div class="w-13 h-13 rounded-2xl
                                bg-gradient-to-br
                                from-emerald-600 to-green-600
                                flex items-center justify-center
                                text-white text-xl shadow-lg">
                        💬
                    </div>

                    <div>

                        <h2 class="text-xl font-black text-slate-800">
                            Volunteer Responses
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Motivation, experience and additional information
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6 md:p-8 space-y-5">

                {{-- Why Join --}}
                <div class="rounded-3xl
                            bg-gradient-to-br
                            from-emerald-50 to-green-50
                            border border-emerald-100 p-6">

                    <p class="text-xs uppercase
                              tracking-wider font-black
                              text-emerald-600">
                        Why do you want to join?
                    </p>

                    <p class="mt-3 text-slate-700
                              leading-7 whitespace-pre-line">
                        {{ $application->why_join ?? 'No response provided.' }}
                    </p>

                </div>


                {{-- Previous Experience --}}
                <div class="rounded-3xl
                            bg-slate-50
                            border border-slate-100 p-6">

                    <p class="text-xs uppercase
                              tracking-wider font-black
                              text-slate-400">
                        Previous Experience
                    </p>

                    <p class="mt-3 text-slate-700
                              leading-7 whitespace-pre-line">
                        {{ $application->previous_experience ?? 'No previous experience provided.' }}
                    </p>

                </div>


                {{-- Medical Condition --}}
                <div class="rounded-3xl
                            bg-amber-50
                            border border-amber-100 p-6">

                    <p class="text-xs uppercase
                              tracking-wider font-black
                              text-amber-700">
                        Medical Condition
                    </p>

                    <p class="mt-3 text-slate-700
                              leading-7 whitespace-pre-line">
                        {{ $application->medical_condition ?? 'No medical condition reported.' }}
                    </p>

                </div>

            </div>

        </div>



        {{-- =================================================
            6. EVENT DETAILS
        ================================================== --}}
        <div class="bg-white rounded-[32px]
                    border border-slate-100
                    shadow-xl overflow-hidden">

            <div class="px-6 md:px-8 py-6
                        bg-gradient-to-r
                        from-teal-50 via-emerald-50 to-green-50
                        border-b border-emerald-100">

                <div class="flex items-center gap-4">

                    <div class="w-13 h-13 rounded-2xl
                                bg-gradient-to-br
                                from-teal-500 to-emerald-600
                                flex items-center justify-center
                                text-white text-xl shadow-lg">
                        🎯
                    </div>

                    <div>

                        <h2 class="text-xl font-black text-slate-800">
                            Event Information
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Event associated with this application
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6 md:p-8">

                {{-- Event Banner --}}
                @if($event && !empty($event->banner))

                    <div class="relative h-64 md:h-80
                                rounded-[28px]
                                overflow-hidden mb-7">

                        <img src="{{ asset('images/events/' . $event->banner) }}"
                             alt="{{ $event->title }}"
                             class="w-full h-full object-cover">

                        <div class="absolute inset-0
                                    bg-gradient-to-t
                                    from-black/70
                                    via-black/20
                                    to-transparent">
                        </div>

                        <div class="absolute bottom-0 left-0 right-0 p-6">

                            <span class="inline-flex
                                         px-3 py-1.5
                                         rounded-full
                                         bg-white/20
                                         backdrop-blur-md
                                         text-white text-xs font-bold mb-3">
                                {{ $event->category ?? 'Volunteer Event' }}
                            </span>

                            <h3 class="text-2xl md:text-3xl
                                       font-black text-white">
                                {{ $event->title ?? 'Event' }}
                            </h3>

                        </div>

                    </div>

                @endif


                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Title --}}
                    <div class="md:col-span-2 detail-card">
                        <p class="detail-label">Event Title</p>
                        <p class="detail-value text-xl">
                            {{ $event->title ?? 'N/A' }}
                        </p>
                    </div>


                    {{-- Category --}}
                    <div class="detail-card">
                        <p class="detail-label">Category</p>
                        <p class="detail-value">
                            {{ $event->category ?? 'N/A' }}
                        </p>
                    </div>


                    {{-- Date --}}
                    <div class="detail-card">
                        <p class="detail-label">Event Date</p>
                        <p class="detail-value">
                            {{ $event->event_date
                                ? \Carbon\Carbon::parse($event->event_date)->format('d M Y')
                                : 'N/A' }}
                        </p>
                    </div>


                    {{-- City --}}
                    <div class="detail-card">
                        <p class="detail-label">City / Location</p>
                        <p class="detail-value">
                            {{ $event->city ?? 'N/A' }}
                        </p>
                    </div>


                    {{-- Capacity --}}
                    <div class="detail-card">
                        <p class="detail-label">Total Capacity</p>
                        <p class="detail-value">
                            {{ $event->capacity ?? 0 }} Volunteers
                        </p>
                    </div>


                    {{-- Filled --}}
                    <div class="detail-card">
                        <p class="detail-label">Filled Slots</p>
                        <p class="detail-value text-emerald-600">
                            {{ $event->filled_slots ?? 0 }}
                        </p>
                    </div>


                    {{-- Remaining --}}
                    <div class="detail-card">
                        <p class="detail-label">Remaining Slots</p>
                        <p class="detail-value
                            {{ $remainingSlots > 0
                                ? 'text-blue-600'
                                : 'text-red-600' }}">
                            {{ $remainingSlots }}
                        </p>
                    </div>

                </div>


                {{-- Capacity --}}
                <div class="mt-6 rounded-3xl
                            bg-gradient-to-br
                            from-slate-50 to-emerald-50
                            border border-emerald-100 p-6">

                    <div class="flex items-center
                                justify-between mb-3">

                        <div>

                            <p class="text-sm font-black text-slate-800">
                                Event Capacity
                            </p>

                            <p class="text-xs text-slate-500 mt-1">
                                {{ $event->filled_slots ?? 0 }}
                                of
                                {{ $event->capacity ?? 0 }}
                                slots filled
                            </p>

                        </div>

                        <span class="text-lg font-black
                                     text-emerald-600">
                            {{ $capacityPercent }}%
                        </span>

                    </div>

                    <div class="h-4 bg-white rounded-full
                                overflow-hidden shadow-inner">

                        <div class="h-full
                                    bg-gradient-to-r
                                    from-green-500
                                    via-emerald-500
                                    to-teal-500
                                    rounded-full"
                             style="width: {{ $capacityPercent }}%">
                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- =================================================
            7. APPLICATION STATUS / TIMELINE
        ================================================== --}}
        <div class="bg-white rounded-[32px]
                    border border-slate-100
                    shadow-xl overflow-hidden">

            <div class="px-6 md:px-8 py-6
                        bg-gradient-to-r
                        from-slate-50 to-emerald-50
                        border-b border-emerald-100">

                <h2 class="text-xl font-black text-slate-800">
                    Application Timeline
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Track application progress
                </p>

            </div>


            <div class="p-6 md:p-8">

                <div class="relative pl-8">

                    <div class="absolute left-[11px]
                                top-2 bottom-2 w-[2px]
                                bg-gradient-to-b
                                from-emerald-500
                                via-teal-400
                                to-slate-200">
                    </div>


                    {{-- Submitted --}}
                    <div class="relative pb-9">

                        <div class="absolute -left-8 top-0
                                    w-6 h-6 rounded-full
                                    bg-emerald-500
                                    border-4 border-white
                                    shadow">
                        </div>

                        <h3 class="font-black text-slate-800">
                            Application Submitted
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            {{ $application->created_at?->format('d M Y, h:i A') ?? 'N/A' }}
                        </p>

                    </div>


                    {{-- Approved --}}
                    <div class="relative pb-9">

                        <div class="absolute -left-8 top-0
                                    w-6 h-6 rounded-full
                                    border-4 border-white shadow
                                    {{ in_array($status, ['approved', 'completed'])
                                        ? 'bg-emerald-500'
                                        : 'bg-slate-300' }}">
                        </div>

                        <h3 class="font-black text-slate-800">
                            Admin Review
                        </h3>

                        @if(in_array($status, ['approved', 'completed']))

                            <p class="text-sm text-emerald-600
                                      font-bold mt-1">
                                Application Approved
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                {{ $application->approved_at?->format('d M Y, h:i A') ?? 'N/A' }}
                            </p>

                        @elseif($status === 'rejected')

                            <p class="text-sm text-red-600
                                      font-bold mt-1">
                                Application Rejected
                            </p>

                        @else

                            <p class="text-sm text-amber-600
                                      font-bold mt-1">
                                Waiting for review
                            </p>

                        @endif

                    </div>


                    {{-- Completed --}}
                    <div class="relative">

                        <div class="absolute -left-8 top-0
                                    w-6 h-6 rounded-full
                                    border-4 border-white shadow
                                    {{ $status === 'completed'
                                        ? 'bg-blue-500'
                                        : 'bg-slate-300' }}">
                        </div>

                        <h3 class="font-black text-slate-800">
                            Event Completion
                        </h3>

                        @if($status === 'completed')

                            <p class="text-sm text-blue-600
                                      font-bold mt-1">
                                Event participation completed
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                {{ $application->completed_at?->format('d M Y, h:i A') ?? 'N/A' }}
                            </p>

                        @else

                            <p class="text-sm text-slate-400 mt-1">
                                Not completed yet
                            </p>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- =====================================================
        RIGHT SIDEBAR
    ====================================================== --}}
    <div class="space-y-6">


        {{-- =================================================
            QUICK ACTIONS
        ================================================== --}}
        <div class="bg-white rounded-[32px]
                    border border-slate-100
                    shadow-xl overflow-hidden">

            <div class="p-6
                        bg-gradient-to-br
                        from-green-700 via-emerald-600 to-teal-500">

                <p class="text-white/60 text-xs
                          uppercase tracking-wider font-bold">
                    Administration
                </p>

                <h2 class="text-2xl font-black text-white mt-1">
                    Quick Actions
                </h2>

            </div>


            <div class="p-6 space-y-3">

                {{-- Pending --}}
                @if($status === 'pending')

                    <form method="POST"
                          action="{{ route('admin.applications.approve', $application->id) }}">

                        @csrf
                        @method('PATCH')

                        <button type="submit"
                                class="w-full py-4 rounded-2xl
                                       bg-gradient-to-r
                                       from-green-600 to-emerald-600
                                       text-white font-black
                                       shadow-lg
                                       hover:shadow-xl
                                       hover:-translate-y-0.5
                                       transition">
                            ✓ Approve Application
                        </button>

                    </form>


                    <button type="button"
                            onclick="openRejectModal({{ $application->id }})"
                            class="w-full py-4 rounded-2xl
                                   bg-red-50 text-red-600
                                   border border-red-200
                                   font-black
                                   hover:bg-red-100 transition">
                        ✕ Reject Application
                    </button>

                @endif


                {{-- Approved --}}
                @if($status === 'approved')

                    <form method="POST"
                          action="{{ route('admin.applications.complete', $application->id) }}">

                        @csrf
                        @method('PATCH')

                        <button type="submit"
                                class="w-full py-4 rounded-2xl
                                       bg-gradient-to-r
                                       from-blue-600 to-indigo-600
                                       text-white font-black
                                       shadow-lg
                                       hover:shadow-xl
                                       transition">
                            ★ Mark as Completed
                        </button>

                    </form>

                @endif


                {{-- Rejected --}}
                @if($status === 'rejected')

                    <form method="POST"
                          action="{{ route('admin.applications.approve', $application->id) }}">

                        @csrf
                        @method('PATCH')

                        <button type="submit"
                                class="w-full py-4 rounded-2xl
                                       bg-gradient-to-r
                                       from-green-600 to-emerald-600
                                       text-white font-black
                                       shadow-lg
                                       hover:shadow-xl
                                       transition">
                            ↻ Approve Again
                        </button>

                    </form>

                @endif


                {{-- Completed --}}
                @if($status === 'completed')

                    <div class="w-full py-4 rounded-2xl
                                bg-blue-50
                                border border-blue-200
                                text-blue-700
                                text-center font-black">
                        ★ Application Completed
                    </div>

                @endif


                <a href="{{ route('admin.applications.index') }}"
                   class="w-full flex items-center
                          justify-center py-4 rounded-2xl
                          bg-slate-100 text-slate-700
                          font-black hover:bg-slate-200 transition">
                    ← Back to Applications
                </a>

            </div>

        </div>



        {{-- =================================================
            STATUS CARD
        ================================================== --}}
        <div class="bg-white rounded-[32px]
                    border border-slate-100
                    shadow-xl p-6">

            <p class="text-xs uppercase
                      tracking-wider font-black
                      text-slate-400">
                Application Status
            </p>

            <div class="mt-5 p-5 rounded-3xl
                        {{ $currentStatus['bg'] }}
                        border {{ $currentStatus['border'] }}">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14 rounded-2xl
                                {{ $currentStatus['bg'] }}
                                border {{ $currentStatus['border'] }}
                                flex items-center justify-center
                                text-2xl">
                        {{ $currentStatus['icon'] }}
                    </div>

                    <div>

                        <h3 class="text-xl font-black
                                   {{ $currentStatus['text'] }}">
                            {{ $currentStatus['label'] }}
                        </h3>

                        <p class="text-xs text-slate-500 mt-1">
                            Application #{{ $application->id }}
                        </p>

                    </div>

                </div>

            </div>

        </div>



        {{-- =================================================
            EVENT CAPACITY SIDEBAR
        ================================================== --}}
        <div class="bg-gradient-to-br
                    from-slate-900 via-slate-800 to-emerald-950
                    rounded-[32px] p-6 shadow-xl text-white">

            <p class="text-white/50 text-xs
                      uppercase tracking-wider font-bold">
                Event Capacity
            </p>

            <div class="flex items-end
                        justify-between mt-4">

                <div>

                    <p class="text-4xl font-black">
                        {{ $capacityPercent }}%
                    </p>

                    <p class="text-white/50 text-sm mt-1">
                        capacity filled
                    </p>

                </div>

                <div class="text-right">

                    <p class="font-black text-lg">
                        {{ $event->filled_slots ?? 0 }}
                        /
                        {{ $event->capacity ?? 0 }}
                    </p>

                    <p class="text-white/50 text-xs">
                        volunteers
                    </p>

                </div>

            </div>


            <div class="h-3 bg-white/10
                        rounded-full overflow-hidden mt-5">

                <div class="h-full
                            bg-gradient-to-r
                            from-green-400 to-teal-400
                            rounded-full"
                     style="width: {{ $capacityPercent }}%">
                </div>

            </div>

            <div class="flex justify-between mt-4
                        text-xs">

                <span class="text-white/50">
                    Remaining
                </span>

                <span class="font-bold text-emerald-300">
                    {{ $remainingSlots }} slots
                </span>

            </div>

        </div>



        {{-- =================================================
            APPLICATION RECORD
        ================================================== --}}
        <div class="bg-white rounded-[32px]
                    border border-slate-100
                    shadow-xl p-6">

            <h3 class="font-black text-slate-800">
                Application Record
            </h3>

            <div class="mt-5 space-y-4">

                <div class="flex justify-between gap-4">
                    <span class="text-sm text-slate-500">
                        Application ID
                    </span>

                    <span class="font-black text-slate-800">
                        #{{ $application->id }}
                    </span>
                </div>


                <div class="flex justify-between gap-4">
                    <span class="text-sm text-slate-500">
                        Submitted
                    </span>

                    <span class="font-bold text-slate-800 text-sm">
                        {{ $application->created_at?->format('d M Y') ?? 'N/A' }}
                    </span>
                </div>


                <div class="flex justify-between gap-4">
                    <span class="text-sm text-slate-500">
                        Approved
                    </span>

                    <span class="font-bold text-slate-800 text-sm">
                        {{ $application->approved_at?->format('d M Y') ?? '—' }}
                    </span>
                </div>


                <div class="flex justify-between gap-4">
                    <span class="text-sm text-slate-500">
                        Completed
                    </span>

                    <span class="font-bold text-slate-800 text-sm">
                        {{ $application->completed_at?->format('d M Y') ?? '—' }}
                    </span>
                </div>

            </div>

        </div>

    </div>

</div>



{{-- =========================================================
    REJECTION MODAL
========================================================= --}}
<div id="rejectModal"
     class="fixed inset-0 z-[9999]
            hidden items-center justify-center
            bg-slate-950/60 backdrop-blur-sm p-4">

    <div class="w-full max-w-lg
                bg-white rounded-[32px]
                shadow-2xl overflow-hidden">

        {{-- Header --}}
        <div class="bg-gradient-to-r
                    from-red-600 to-rose-500
                    p-6 text-white">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-white/70 text-xs
                              uppercase tracking-wider font-bold">
                        Application Action
                    </p>

                    <h2 class="text-2xl font-black mt-1">
                        Reject Application
                    </h2>

                </div>

                <button type="button"
                        onclick="closeRejectModal()"
                        class="w-10 h-10 rounded-xl
                               bg-white/15
                               hover:bg-white/25 transition">
                    ✕
                </button>

            </div>

        </div>


        {{-- Form --}}
        <form id="rejectForm"
              method="POST"
              class="p-6">

            @csrf
            @method('PATCH')

            <label class="block text-sm
                          font-black text-slate-700 mb-2">
                Rejection Reason
            </label>

            <textarea name="rejection_reason"
                      rows="5"
                      required
                      minlength="5"
                      maxlength="1000"
                      placeholder="Enter the reason for rejecting this application..."
                      class="w-full rounded-2xl
                             border border-slate-200
                             bg-slate-50
                             px-4 py-4
                             text-sm
                             outline-none
                             focus:border-red-400
                             focus:ring-4
                             focus:ring-red-100
                             transition resize-none"></textarea>

            <p class="text-xs text-slate-400 mt-2">
                This reason will be visible to the volunteer.
            </p>


            <div class="flex gap-3 mt-6">

                <button type="button"
                        onclick="closeRejectModal()"
                        class="flex-1 py-3.5
                               rounded-2xl
                               bg-slate-100
                               text-slate-700
                               font-black
                               hover:bg-slate-200 transition">
                    Cancel
                </button>

                <button type="submit"
                        class="flex-1 py-3.5
                               rounded-2xl
                               bg-gradient-to-r
                               from-red-600 to-rose-500
                               text-white
                               font-black
                               shadow-lg
                               hover:shadow-xl transition">
                    Reject Application
                </button>

            </div>

        </form>

    </div>

</div>



{{-- =========================================================
    EXTRA CARD STYLES
========================================================= --}}
<style>

    .detail-card {
        border-radius: 20px;
        background: linear-gradient(
            135deg,
            #f8fafc,
            #ffffff
        );
        border: 1px solid #e2e8f0;
        padding: 20px;
        transition: all .25s ease;
    }

    .detail-card:hover {
        transform: translateY(-2px);
        border-color: #a7f3d0;
        box-shadow: 0 12px 30px rgba(15, 23, 42, .07);
    }

    .detail-label {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .08em;
        font-weight: 800;
        color: #94a3b8;
    }

    .detail-value {
        margin-top: 7px;
        font-size: 15px;
        font-weight: 800;
        color: #1e293b;
        line-height: 1.6;
    }

</style>



{{-- =========================================================
    JAVASCRIPT
========================================================= --}}
<script>

    function openRejectModal(applicationId) {

        const modal = document.getElementById('rejectModal');
        const form = document.getElementById('rejectForm');

        form.action =
            "{{ url('/admin/applications') }}/"
            + applicationId
            + "/reject";

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        document.body.classList.add('overflow-hidden');
    }


    function closeRejectModal() {

        const modal = document.getElementById('rejectModal');

        modal.classList.add('hidden');
        modal.classList.remove('flex');

        document.body.classList.remove('overflow-hidden');
    }


    document.getElementById('rejectModal')
        .addEventListener('click', function(event) {

            if (event.target === this) {
                closeRejectModal();
            }

        });


    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {
            closeRejectModal();
        }

    });

</script>

@endsection