@extends('layouts.admin')

@section('content')

@php

    /* =========================================================
       STATUS CONFIGURATION
    ========================================================= */

    $status = strtolower($application->status ?? 'pending');

    $statusConfig = [

        'pending' => [
            'label' => 'Pending Review',
            'icon' => '⏳',
            'dot' => 'bg-amber-400',
            'bg' => 'bg-amber-50',
            'text' => 'text-amber-700',
            'border' => 'border-amber-200',
            'gradient' => 'from-amber-500 to-orange-500',
        ],

        'approved' => [
            'label' => 'Approved',
            'icon' => '✓',
            'dot' => 'bg-emerald-400',
            'bg' => 'bg-emerald-50',
            'text' => 'text-emerald-700',
            'border' => 'border-emerald-200',
            'gradient' => 'from-green-500 to-emerald-500',
        ],

        'rejected' => [
            'label' => 'Rejected',
            'icon' => '✕',
            'dot' => 'bg-red-400',
            'bg' => 'bg-red-50',
            'text' => 'text-red-700',
            'border' => 'border-red-200',
            'gradient' => 'from-red-500 to-rose-500',
        ],

        'completed' => [
            'label' => 'Completed',
            'icon' => '★',
            'dot' => 'bg-blue-400',
            'bg' => 'bg-blue-50',
            'text' => 'text-blue-700',
            'border' => 'border-blue-200',
            'gradient' => 'from-blue-500 to-indigo-500',
        ],

    ];

    $currentStatus = $statusConfig[$status] ?? $statusConfig['pending'];

    $volunteer = $application->user;
    $event = $application->event;

    /* =========================================================
       DOCUMENTS
    ========================================================= */

    $aadhaarDocument = $application->aadhaar_document ?? null;
    $passportPhoto = $application->passport_photo ?? null;

    /* =========================================================
       EVENT CAPACITY
    ========================================================= */

    $capacity = $event->capacity ?? 0;
    $filledSlots = $event->filled_slots ?? 0;

    $remainingSlots = max(
        0,
        $capacity - $filledSlots
    );

    $capacityPercent = $capacity > 0
        ? min(
            100,
            round(($filledSlots / $capacity) * 100)
        )
        : 0;

    /* =========================================================
       PROFILE IMAGE
    ========================================================= */

    $profileImage = $volunteer && $volunteer->profile_photo
        ? asset('storage/' . $volunteer->profile_photo)
        : 'https://ui-avatars.com/api/?name='
            . urlencode($volunteer->name ?? 'Volunteer')
            . '&background=10b981&color=ffffff&size=256&bold=true';

@endphp


<div class="min-h-screen bg-gradient-to-br
            from-slate-50 via-white to-emerald-50/60
            py-8">


    <div class="max-w-[1500px] mx-auto
                px-4 sm:px-6 lg:px-8">


        


        {{-- =====================================================
            PREMIUM HERO
        ====================================================== --}}

        <div class="relative overflow-hidden
                    rounded-[38px]
                    bg-gradient-to-br
                    from-green-800
                    via-emerald-600
                    to-teal-500
                    shadow-2xl
                    shadow-emerald-900/20
                    mb-7">


            {{-- Decorative shapes --}}

            <div class="absolute -right-28 -top-32
                        w-[430px] h-[430px]
                        rounded-full bg-white/10">
            </div>

            <div class="absolute -left-24 -bottom-40
                        w-[420px] h-[420px]
                        rounded-full bg-white/5">
            </div>

            <div class="absolute right-[25%] top-1/2
                        w-36 h-36 rounded-full
                        bg-white/5">
            </div>


            {{-- Dots --}}

            <div class="absolute top-10 right-12 opacity-25">

                <div class="grid grid-cols-6 gap-2">

                    @for($i = 0; $i < 36; $i++)

                        <span class="w-1.5 h-1.5
                                     rounded-full bg-white">
                        </span>

                    @endfor

                </div>

            </div>


            <div class="relative z-10
                        p-6 md:p-9 lg:p-10">


                {{-- Top badges --}}

                <div class="flex flex-wrap items-center gap-3 mb-6">

                    <span class="px-4 py-2
                                 rounded-full
                                 bg-white/15
                                 border border-white/10
                                 backdrop-blur-md
                                 text-white
                                 text-xs
                                 font-black
                                 uppercase
                                 tracking-wider">

                        Application Details

                    </span>


                    <span class="px-4 py-2
                                 rounded-full
                                 bg-white/15
                                 border border-white/10
                                 backdrop-blur-md
                                 text-white
                                 text-xs
                                 font-bold">

                        ID #{{ $application->id }}

                    </span>

                </div>



                <div class="flex flex-col
                            lg:flex-row
                            lg:items-center
                            lg:justify-between
                            gap-8">


                    {{-- Hero left --}}

                    <div class="flex items-center gap-5">


                        {{-- Avatar --}}

                        <div class="relative shrink-0">

                            <div class="w-20 h-20
                                        md:w-24 md:h-24
                                        rounded-[26px]
                                        bg-white
                                        p-1.5
                                        shadow-2xl">

                                <img
                                    src="{{ $profileImage }}"
                                    alt="{{ $volunteer->name ?? 'Volunteer' }}"
                                    class="w-full h-full
                                           object-cover
                                           rounded-[20px]">

                            </div>


                            <span class="absolute
                                         -right-2 -bottom-2
                                         w-9 h-9
                                         rounded-full
                                         bg-white
                                         p-1
                                         shadow-lg">

                                <span class="flex items-center
                                             justify-center
                                             w-full h-full
                                             rounded-full
                                             {{ $currentStatus['dot'] }}">

                                </span>

                            </span>

                        </div>



                        <div>

                            <p class="text-emerald-100
                                      text-sm font-bold">

                                Volunteer Application

                            </p>

                            <h1 class="text-3xl md:text-4xl
                                       font-black
                                       text-white
                                       tracking-tight">

                                {{ $volunteer->name ?? 'Unknown Volunteer' }}

                            </h1>

                            <p class="text-white/70
                                      text-sm md:text-base
                                      mt-1">

                                {{ $event->title ?? 'Event not available' }}

                            </p>

                        </div>

                    </div>



                    {{-- Hero status --}}

                    <div class="min-w-[250px]
                                rounded-[28px]
                                bg-white/10
                                border border-white/20
                                backdrop-blur-xl
                                p-5">


                        <p class="text-white/55
                                  text-[10px]
                                  uppercase
                                  tracking-[.15em]
                                  font-black">

                            Current Status

                        </p>


                        <div class="flex items-center gap-3 mt-3">

                            <span class="w-3 h-3
                                         rounded-full
                                         {{ $currentStatus['dot'] }}
                                         shadow-[0_0_12px_rgba(255,255,255,.4)]">
                            </span>

                            <span class="text-xl
                                         font-black text-white">

                                {{ $currentStatus['label'] }}

                            </span>

                        </div>


                        <p class="text-white/50
                                  text-xs mt-2">

                            Submitted
                            {{ $application->created_at?->format('d M Y') ?? 'N/A' }}

                        </p>

                    </div>

                </div>

            </div>

        </div>



        {{-- =====================================================
            SUMMARY STATS
        ====================================================== --}}

        <div class="grid grid-cols-1
                    sm:grid-cols-2
                    xl:grid-cols-4
                    gap-5 mb-7">


            {{-- Applicant --}}

            <div class="summary-card">

                <div class="summary-icon
                            bg-gradient-to-br
                            from-green-100 to-emerald-100">

                    👤

                </div>

                <div class="min-w-0">

                    <p class="summary-label">
                        Applicant
                    </p>

                    <p class="summary-value truncate">

                        {{ $volunteer->name ?? 'N/A' }}

                    </p>

                    <p class="summary-helper">
                        Volunteer
                    </p>

                </div>

            </div>



            {{-- Event --}}

            <div class="summary-card">

                <div class="summary-icon
                            bg-gradient-to-br
                            from-teal-100 to-cyan-100">

                    🎯

                </div>

                <div class="min-w-0">

                    <p class="summary-label">
                        Event
                    </p>

                    <p class="summary-value truncate">

                        {{ $event->title ?? 'N/A' }}

                    </p>

                    <p class="summary-helper">

                        {{ $event->category ?? 'Volunteer Event' }}

                    </p>

                </div>

            </div>



            {{-- Applied date --}}

            <div class="summary-card">

                <div class="summary-icon
                            bg-gradient-to-br
                            from-blue-100 to-indigo-100">

                    📅

                </div>

                <div>

                    <p class="summary-label">
                        Applied On
                    </p>

                    <p class="summary-value">

                        {{ $application->created_at?->format('d M Y') ?? 'N/A' }}

                    </p>

                    <p class="summary-helper">

                        {{ $application->created_at?->format('h:i A') ?? '' }}

                    </p>

                </div>

            </div>



            {{-- Status --}}

            <div class="summary-card">

                <div class="summary-icon
                            {{ $currentStatus['bg'] }}">

                    {{ $currentStatus['icon'] }}

                </div>

                <div>

                    <p class="summary-label">
                        Status
                    </p>

                    <p class="summary-value
                              {{ $currentStatus['text'] }}">

                        {{ $currentStatus['label'] }}

                    </p>

                    <p class="summary-helper">
                        Application #{{ $application->id }}
                    </p>

                </div>

            </div>

        </div>



        {{-- =====================================================
            MAIN LAYOUT
        ====================================================== --}}

        <div class="grid grid-cols-1
                    xl:grid-cols-3
                    gap-7">


            {{-- =================================================
                MAIN CONTENT
            ================================================== --}}

            <div class="xl:col-span-2 space-y-7">


                {{-- =================================================
                    PERSONAL INFORMATION
                ================================================== --}}

                <div class="premium-card">

                    <div class="section-header
                                from-green-50
                                via-emerald-50
                                to-teal-50">

                        <div class="section-icon
                                    from-green-600
                                    to-emerald-500">

                            👤

                        </div>

                        <div>

                            <h2 class="section-title">
                                Volunteer Information
                            </h2>

                            <p class="section-subtitle">

                                Personal details submitted with the application

                            </p>

                        </div>

                    </div>


                    <div class="p-6 md:p-8">

                        <div class="grid grid-cols-1
                                    md:grid-cols-2
                                    gap-4">


                            <div class="detail-card">
                                <span class="detail-label">
                                    Volunteer Name
                                </span>

                                <span class="detail-value">
                                    {{ $volunteer->name ?? 'N/A' }}
                                </span>
                            </div>


                            <div class="detail-card">
                                <span class="detail-label">
                                    Email Address
                                </span>

                                <span class="detail-value break-all">
                                    {{ $volunteer->email ?? 'N/A' }}
                                </span>
                            </div>


                            <div class="detail-card">
                                <span class="detail-label">
                                    Phone Number
                                </span>

                                <span class="detail-value">
                                    {{ $application->phone ?? $volunteer->phone ?? 'N/A' }}
                                </span>
                            </div>


                            <div class="detail-card">
                                <span class="detail-label">
                                    Date of Birth
                                </span>

                                <span class="detail-value">

                                    {{ $application->dob
                                        ? \Carbon\Carbon::parse($application->dob)->format('d M Y')
                                        : 'N/A' }}

                                </span>
                            </div>


                            <div class="detail-card">
                                <span class="detail-label">
                                    Gender
                                </span>

                                <span class="detail-value capitalize">
                                    {{ $application->gender ?? $volunteer->gender ?? 'N/A' }}
                                </span>
                            </div>


                            <div class="detail-card">
                                <span class="detail-label">
                                    Volunteer Category
                                </span>

                                <span class="detail-value">
                                    {{ $application->volunteer_category ?? 'N/A' }}
                                </span>
                            </div>


                            <div class="detail-card">
                                <span class="detail-label">
                                    Occupation
                                </span>

                                <span class="detail-value">
                                    {{ $application->occupation ?? 'N/A' }}
                                </span>
                            </div>


                            <div class="detail-card">

                                <span class="detail-label">
                                    Aadhaar Number
                                </span>

                                <span class="detail-value font-mono
                                             tracking-wider">

                                    {{ $application->aadhaar_number ?? 'N/A' }}

                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                    ADDRESS
                ================================================== --}}

                <div class="premium-card">

                    <div class="section-header
                                from-teal-50
                                via-emerald-50
                                to-green-50">

                        <div class="section-icon
                                    from-teal-500
                                    to-emerald-600">

                            📍

                        </div>

                        <div>

                            <h2 class="section-title">
                                Address Information
                            </h2>

                            <p class="section-subtitle">
                                Residential address provided by volunteer
                            </p>

                        </div>

                    </div>


                    <div class="p-6 md:p-8">

                        <div class="address-box">

                            <div class="address-icon">
                                🏠
                            </div>

                            <div>

                                <p class="detail-label">
                                    Full Address
                                </p>

                                <p class="text-slate-700
                                          font-bold
                                          leading-7
                                          mt-2">

                                    {{ $application->address ?? 'N/A' }}

                                </p>

                            </div>

                        </div>


                        <div class="grid grid-cols-1
                                    md:grid-cols-3
                                    gap-4 mt-5">

                            <div class="detail-card">
                                <span class="detail-label">
                                    City
                                </span>

                                <span class="detail-value">
                                    {{ $application->city ?? 'N/A' }}
                                </span>
                            </div>


                            <div class="detail-card">
                                <span class="detail-label">
                                    State
                                </span>

                                <span class="detail-value">
                                    {{ $application->state ?? 'N/A' }}
                                </span>
                            </div>


                            <div class="detail-card">
                                <span class="detail-label">
                                    Pincode
                                </span>

                                <span class="detail-value font-mono">
                                    {{ $application->pincode ?? 'N/A' }}
                                </span>
                            </div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                    EMERGENCY CONTACT
                ================================================== --}}

                <div class="premium-card">

                    <div class="section-header
                                from-orange-50
                                via-amber-50
                                to-yellow-50">

                        <div class="section-icon
                                    from-orange-500
                                    to-amber-500">

                            🚨

                        </div>

                        <div>

                            <h2 class="section-title">
                                Emergency Contact
                            </h2>

                            <p class="section-subtitle">
                                Emergency contact information
                            </p>

                        </div>

                    </div>


                    <div class="p-6 md:p-8">

                        <div class="grid grid-cols-1
                                    md:grid-cols-3
                                    gap-4">

                            <div class="detail-card">
                                <span class="detail-label">
                                    Contact Name
                                </span>

                                <span class="detail-value">
                                    {{ $application->emergency_contact_name ?? 'N/A' }}
                                </span>
                            </div>


                            <div class="detail-card">
                                <span class="detail-label">
                                    Relation
                                </span>

                                <span class="detail-value">
                                    {{ $application->emergency_contact_relation ?? 'N/A' }}
                                </span>
                            </div>


                            <div class="detail-card">
                                <span class="detail-label">
                                    Contact Phone
                                </span>

                                <span class="detail-value">
                                    {{ $application->emergency_contact_phone ?? 'N/A' }}
                                </span>
                            </div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                    DOCUMENTS
                ================================================== --}}

                <div class="premium-card">

                    <div class="section-header
                                from-blue-50
                                via-indigo-50
                                to-purple-50">

                        <div class="section-icon
                                    from-blue-600
                                    to-indigo-600">

                            📎

                        </div>

                        <div>

                            <h2 class="section-title">
                                Uploaded Documents
                            </h2>

                            <p class="section-subtitle">
                                Documents submitted with this application
                            </p>

                        </div>

                    </div>


                    <div class="p-6 md:p-8">

                        <div class="grid grid-cols-1
                                    md:grid-cols-2
                                    gap-6">


                            {{-- Aadhaar --}}

                            <div class="document-card">

                                <div class="flex items-center
                                            justify-between">

                                    <div class="flex items-center gap-3">

                                        <div class="document-icon
                                                    bg-blue-100">
                                            🪪
                                        </div>

                                        <div>

                                            <h3 class="font-black
                                                       text-slate-800">

                                                Aadhaar Document

                                            </h3>

                                            <p class="text-xs
                                                      text-slate-400">

                                                Identity proof

                                            </p>

                                        </div>

                                    </div>


                                    @if($aadhaarDocument)

                                        <span class="document-status">
                                            Uploaded
                                        </span>

                                    @else

                                        <span class="document-missing">
                                            Missing
                                        </span>

                                    @endif

                                </div>


                                @if($aadhaarDocument)

                                    <div class="document-preview">

                                        <img
                                            src="{{ asset('storage/' . $aadhaarDocument) }}"
                                            alt="Aadhaar Document"
                                            class="w-full h-full
                                                   object-contain
                                                   cursor-pointer
                                                   hover:scale-[1.02]
                                                   transition duration-300"
                                            onclick="openDocumentPreview('{{ asset('storage/' . $aadhaarDocument) }}')">

                                    </div>


                                    <button
                                        type="button"
                                        onclick="openDocumentPreview('{{ asset('storage/' . $aadhaarDocument) }}')"
                                        class="document-button
                                               bg-gradient-to-r
                                               from-blue-600
                                               to-indigo-600">

                                        👁 View Document

                                    </button>

                                @else

                                    <div class="missing-document">
                                        📄
                                        <p>
                                            No Aadhaar document uploaded.
                                        </p>
                                    </div>

                                @endif

                            </div>



                            {{-- Passport --}}

                            <div class="document-card">

                                <div class="flex items-center
                                            justify-between">

                                    <div class="flex items-center gap-3">

                                        <div class="document-icon
                                                    bg-purple-100">
                                            📸
                                        </div>

                                        <div>

                                            <h3 class="font-black
                                                       text-slate-800">

                                                Passport Photo

                                            </h3>

                                            <p class="text-xs
                                                      text-slate-400">

                                                Volunteer photograph

                                            </p>

                                        </div>

                                    </div>


                                    @if($passportPhoto)

                                        <span class="document-status">
                                            Uploaded
                                        </span>

                                    @else

                                        <span class="document-missing">
                                            Missing
                                        </span>

                                    @endif

                                </div>


                                @if($passportPhoto)

                                    <div class="document-preview">

                                        <img
                                            src="{{ asset('storage/' . $passportPhoto) }}"
                                            alt="Passport Photo"
                                            class="w-full h-full
                                                   object-contain">

                                    </div>


                                    <a
                                        href="{{ asset('storage/' . $passportPhoto) }}"
                                        target="_blank"
                                        class="document-button
                                               bg-gradient-to-r
                                               from-purple-600
                                               to-indigo-600">

                                        👁 View Photo

                                    </a>

                                @else

                                    <div class="missing-document">
                                        📸
                                        <p>
                                            No passport photo uploaded.
                                        </p>
                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                    VOLUNTEER RESPONSES
                ================================================== --}}

                <div class="premium-card">

                    <div class="section-header
                                from-emerald-50
                                to-green-50">

                        <div class="section-icon
                                    from-emerald-600
                                    to-green-600">

                            💬

                        </div>

                        <div>

                            <h2 class="section-title">
                                Volunteer Responses
                            </h2>

                            <p class="section-subtitle">
                                Motivation and previous experience
                            </p>

                        </div>

                    </div>


                    <div class="p-6 md:p-8 space-y-5">


                        <div class="response-card
                                    border-emerald-100
                                    bg-emerald-50/60">

                            <p class="response-label
                                      text-emerald-600">

                                Why do you want to join?

                            </p>

                            <p class="response-text">

                                {{ $application->why_join
                                    ?? 'No response provided.' }}

                            </p>

                        </div>


                        <div class="response-card
                                    border-slate-200
                                    bg-slate-50">

                            <p class="response-label
                                      text-slate-500">

                                Previous Experience

                            </p>

                            <p class="response-text">

                                {{ $application->previous_experience
                                    ?? 'No previous experience provided.' }}

                            </p>

                        </div>


                        <div class="response-card
                                    border-amber-100
                                    bg-amber-50/60">

                            <p class="response-label
                                      text-amber-700">

                                Medical Condition

                            </p>

                            <p class="response-text">

                                {{ $application->medical_condition
                                    ?? 'No medical condition reported.' }}

                            </p>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                    EVENT INFORMATION
                ================================================== --}}

                <div class="premium-card">

                    <div class="section-header
                                from-teal-50
                                via-emerald-50
                                to-green-50">

                        <div class="section-icon
                                    from-teal-500
                                    to-emerald-600">

                            🎯

                        </div>

                        <div>

                            <h2 class="section-title">
                                Event Information
                            </h2>

                            <p class="section-subtitle">
                                Event associated with this application
                            </p>

                        </div>

                    </div>


                    <div class="p-6 md:p-8">


                        {{-- Event Banner --}}

                        @if($event && !empty($event->banner))

                            <div class="relative h-64 md:h-80
                                        rounded-[28px]
                                        overflow-hidden
                                        mb-7
                                        group">

                                <img
                                    src="{{ asset('images/events/' . $event->banner) }}"
                                    alt="{{ $event->title }}"
                                    class="w-full h-full
                                           object-cover
                                           group-hover:scale-105
                                           transition duration-700">


                                <div class="absolute inset-0
                                            bg-gradient-to-t
                                            from-slate-950/80
                                            via-slate-950/10
                                            to-transparent">
                                </div>


                                <div class="absolute
                                            bottom-0 left-0 right-0
                                            p-6">

                                    <span class="inline-flex
                                                 px-3 py-1.5
                                                 rounded-full
                                                 bg-white/15
                                                 backdrop-blur-md
                                                 text-white
                                                 text-xs font-bold">

                                        {{ $event->category ?? 'Volunteer Event' }}

                                    </span>


                                    <h3 class="text-2xl md:text-3xl
                                               font-black
                                               text-white mt-2">

                                        {{ $event->title }}

                                    </h3>

                                </div>

                            </div>

                        @endif


                        <div class="grid grid-cols-1
                                    md:grid-cols-2
                                    gap-4">


                            <div class="detail-card md:col-span-2">

                                <span class="detail-label">
                                    Event Title
                                </span>

                                <span class="detail-value text-xl">
                                    {{ $event->title ?? 'N/A' }}
                                </span>

                            </div>


                            <div class="detail-card">

                                <span class="detail-label">
                                    Category
                                </span>

                                <span class="detail-value">
                                    {{ $event->category ?? 'N/A' }}
                                </span>

                            </div>


                            <div class="detail-card">

                                <span class="detail-label">
                                    Event Date
                                </span>

                                <span class="detail-value">

                                    {{ $event?->event_date
                                        ? \Carbon\Carbon::parse($event->event_date)->format('d M Y')
                                        : 'N/A' }}

                                </span>

                            </div>


                            <div class="detail-card">

                                <span class="detail-label">
                                    Location
                                </span>

                                <span class="detail-value">
                                    {{ $event->city ?? 'N/A' }}
                                </span>

                            </div>


                            <div class="detail-card">

                                <span class="detail-label">
                                    Total Capacity
                                </span>

                                <span class="detail-value">
                                    {{ $capacity }} Volunteers
                                </span>

                            </div>


                            <div class="detail-card">

                                <span class="detail-label">
                                    Filled Slots
                                </span>

                                <span class="detail-value text-emerald-600">
                                    {{ $filledSlots }}
                                </span>

                            </div>


                            <div class="detail-card">

                                <span class="detail-label">
                                    Remaining Slots
                                </span>

                                <span class="detail-value
                                    {{ $remainingSlots > 0
                                        ? 'text-blue-600'
                                        : 'text-red-600' }}">

                                    {{ $remainingSlots }}

                                </span>

                            </div>

                        </div>


                        {{-- Capacity Progress --}}

                        <div class="capacity-box mt-6">

                            <div class="flex items-center
                                        justify-between gap-4">

                                <div>

                                    <p class="font-black
                                              text-slate-800">

                                        Event Capacity

                                    </p>

                                    <p class="text-xs
                                              text-slate-400 mt-1">

                                        {{ $filledSlots }}
                                        of
                                        {{ $capacity }}
                                        slots filled

                                    </p>

                                </div>


                                <span class="text-2xl
                                             font-black
                                             text-emerald-600">

                                    {{ $capacityPercent }}%

                                </span>

                            </div>


                            <div class="h-4 bg-white
                                        rounded-full
                                        overflow-hidden
                                        mt-5
                                        shadow-inner">

                                <div
                                    class="h-full
                                           rounded-full
                                           bg-gradient-to-r
                                           from-green-500
                                           via-emerald-500
                                           to-teal-500
                                           transition-all duration-700"
                                    style="width: {{ $capacityPercent }}%">
                                </div>

                            </div>


                            <div class="flex justify-between
                                        text-xs mt-3">

                                <span class="text-slate-400">
                                    {{ $filledSlots }} filled
                                </span>

                                <span class="font-bold
                                             text-emerald-600">

                                    {{ $remainingSlots }} remaining

                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                    APPLICATION TIMELINE
                ================================================== --}}

                <div class="premium-card">

                    <div class="section-header
                                from-slate-50
                                to-emerald-50">

                        <div class="section-icon
                                    from-emerald-500
                                    to-teal-500">

                            🕒

                        </div>

                        <div>

                            <h2 class="section-title">
                                Application Timeline
                            </h2>

                            <p class="section-subtitle">
                                Track the application journey
                            </p>

                        </div>

                    </div>


                    <div class="p-6 md:p-8">

                        <div class="relative ml-3">


                            {{-- Timeline Line --}}

                            <div class="absolute left-5
                                        top-6 bottom-6
                                        w-0.5
                                        bg-gradient-to-b
                                        from-emerald-500
                                        via-teal-400
                                        to-slate-200">
                            </div>


                            {{-- Submitted --}}

                            <div class="timeline-item">

                                <div class="timeline-icon
                                            bg-emerald-100
                                            text-emerald-600">

                                    ✓

                                </div>

                                <div>

                                    <span class="timeline-badge
                                                 bg-emerald-50
                                                 text-emerald-700">

                                        SUBMITTED

                                    </span>

                                    <h3 class="timeline-title">

                                        Application Submitted

                                    </h3>

                                    <p class="timeline-date">

                                        {{ $application->created_at?->format('d M Y, h:i A') ?? 'N/A' }}

                                    </p>

                                </div>

                            </div>


                            {{-- Review --}}

                            <div class="timeline-item">

                                <div class="timeline-icon
                                    {{ in_array($status, ['approved','completed'])
                                        ? 'bg-emerald-100 text-emerald-600'
                                        : ($status === 'rejected'
                                            ? 'bg-red-100 text-red-600'
                                            : 'bg-amber-100 text-amber-600') }}">

                                    {{ $status === 'rejected' ? '✕' : '✓' }}

                                </div>

                                <div>

                                    <span class="timeline-badge
                                        {{ $status === 'rejected'
                                            ? 'bg-red-50 text-red-700'
                                            : (in_array($status, ['approved','completed'])
                                                ? 'bg-emerald-50 text-emerald-700'
                                                : 'bg-amber-50 text-amber-700') }}">

                                        ADMIN REVIEW

                                    </span>


                                    <h3 class="timeline-title">
                                        Application Review
                                    </h3>


                                    @if(in_array($status, ['approved', 'completed']))

                                        <p class="text-sm
                                                  text-emerald-600
                                                  font-bold mt-1">

                                            Application Approved

                                        </p>

                                        <p class="timeline-date">

                                            {{ $application->approved_at?->format('d M Y, h:i A') ?? 'N/A' }}

                                        </p>

                                    @elseif($status === 'rejected')

                                        <p class="text-sm
                                                  text-red-600
                                                  font-bold mt-1">

                                            Application Rejected

                                        </p>

                                    @else

                                        <p class="text-sm
                                                  text-amber-600
                                                  font-bold mt-1">

                                            Waiting for admin review

                                        </p>

                                    @endif

                                </div>

                            </div>


                            {{-- Completion --}}

                            <div class="timeline-item last">

                                <div class="timeline-icon
                                    {{ $status === 'completed'
                                        ? 'bg-blue-100 text-blue-600'
                                        : 'bg-slate-100 text-slate-400' }}">

                                    ★

                                </div>

                                <div>

                                    <span class="timeline-badge
                                        {{ $status === 'completed'
                                            ? 'bg-blue-50 text-blue-700'
                                            : 'bg-slate-50 text-slate-400' }}">

                                        COMPLETION

                                    </span>


                                    <h3 class="timeline-title">

                                        Event Completion

                                    </h3>


                                    @if($status === 'completed')

                                        <p class="text-sm
                                                  text-blue-600
                                                  font-bold mt-1">

                                            Participation completed

                                        </p>

                                        <p class="timeline-date">

                                            {{ $application->completed_at?->format('d M Y, h:i A') ?? 'N/A' }}

                                        </p>

                                    @else

                                        <p class="timeline-date">

                                            Not completed yet

                                        </p>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =================================================
                RIGHT SIDEBAR
            ================================================== --}}

            <div class="space-y-6">


                {{-- =================================================
                    QUICK ACTIONS
                ================================================== --}}

                <div class="premium-card overflow-hidden">

                    <div class="relative
                                bg-gradient-to-br
                                from-green-800
                                via-emerald-600
                                to-teal-500
                                p-6
                                overflow-hidden">

                        <div class="absolute
                                    -right-10 -top-10
                                    w-32 h-32
                                    rounded-full
                                    bg-white/10">
                        </div>

                        <div class="relative">

                            <p class="text-white/55
                                      text-[10px]
                                      uppercase
                                      tracking-[.15em]
                                      font-black">

                                Administration

                            </p>

                            <h2 class="text-2xl
                                       font-black
                                       text-white mt-1">

                                Quick Actions

                            </h2>

                            <p class="text-white/65
                                      text-xs mt-1">

                                Manage application status

                            </p>

                        </div>

                    </div>


                    <div class="p-6 space-y-3">


                        {{-- Pending --}}

                        @if($status === 'pending')

                            <form method="POST"
                                  action="{{ route('admin.applications.approve', $application->id) }}">

                                @csrf
                                @method('PATCH')

                                <button type="submit"
                                        onclick="return confirm('Approve this application?')"
                                        class="action-primary
                                               from-green-600
                                               to-emerald-500">

                                    <span>✓</span>

                                    Approve Application

                                </button>

                            </form>


                            <button
                                type="button"
                                onclick="openRejectModal({{ $application->id }})"
                                class="action-danger">

                                <span>✕</span>

                                Reject Application

                            </button>

                        @endif



                        {{-- Approved --}}

                        @if($status === 'approved')

                            <form method="POST"
                                  action="{{ route('admin.applications.complete', $application->id) }}">

                                @csrf
                                @method('PATCH')

                                <button type="submit"
                                        onclick="return confirm('Mark this application as completed?')"
                                        class="action-primary
                                               from-blue-600
                                               to-indigo-600">

                                    <span>★</span>

                                    Mark as Completed

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
                                        onclick="return confirm('Approve this application again?')"
                                        class="action-primary
                                               from-green-600
                                               to-emerald-500">

                                    <span>↻</span>

                                    Approve Again

                                </button>

                            </form>

                        @endif



                        {{-- Completed --}}

                        @if($status === 'completed')

                            <div class="completed-box">

                                <div class="w-12 h-12
                                            rounded-2xl
                                            bg-blue-100
                                            flex items-center
                                            justify-center
                                            text-xl">

                                    ★

                                </div>

                                <div>

                                    <p class="font-black
                                              text-blue-700">

                                        Application Completed

                                    </p>

                                    <p class="text-xs
                                              text-blue-500 mt-1">

                                        Volunteer participation completed

                                    </p>

                                </div>

                            </div>

                        @endif



                        <a href="{{ route('admin.applications.index') }}"
                           class="action-secondary">

                            ← Back to Applications

                        </a>

                    </div>

                </div>



                {{-- =================================================
                    STATUS CARD
                ================================================== --}}

                <div class="premium-card p-6">

                    <div class="flex items-center
                                justify-between">

                        <div>

                            <p class="text-[10px]
                                      uppercase
                                      tracking-[.15em]
                                      font-black
                                      text-slate-400">

                                Application Status

                            </p>

                            <p class="text-xs
                                      text-slate-400 mt-1">

                                Current state

                            </p>

                        </div>


                        <div class="w-11 h-11
                                    rounded-2xl
                                    {{ $currentStatus['bg'] }}
                                    flex items-center
                                    justify-center
                                    text-xl">

                            {{ $currentStatus['icon'] }}

                        </div>

                    </div>


                    <div class="mt-5
                                p-5 rounded-[24px]
                                {{ $currentStatus['bg'] }}
                                border
                                {{ $currentStatus['border'] }}">

                        <div class="flex items-center gap-3">

                            <span class="w-3 h-3
                                         rounded-full
                                         {{ $currentStatus['dot'] }}">
                            </span>

                            <span class="text-xl
                                         font-black
                                         {{ $currentStatus['text'] }}">

                                {{ $currentStatus['label'] }}

                            </span>

                        </div>

                        <p class="text-xs
                                  text-slate-400 mt-2">

                            Application #{{ $application->id }}

                        </p>

                    </div>

                </div>



                {{-- =================================================
                    EVENT CAPACITY
                ================================================== --}}

                <div class="relative overflow-hidden
                            rounded-[32px]
                            bg-gradient-to-br
                            from-slate-950
                            via-slate-900
                            to-emerald-950
                            p-6 text-white
                            shadow-xl">


                    <div class="absolute
                                -right-12 -top-12
                                w-40 h-40
                                rounded-full
                                bg-emerald-500/10">
                    </div>


                    <div class="relative">

                        <div class="flex items-center
                                    justify-between">

                            <div>

                                <p class="text-white/45
                                          text-[10px]
                                          uppercase
                                          tracking-[.15em]
                                          font-black">

                                    Event Capacity

                                </p>

                                <p class="text-white/50
                                          text-xs mt-1">

                                    Volunteer availability

                                </p>

                            </div>


                            <div class="w-11 h-11
                                        rounded-2xl
                                        bg-white/10
                                        flex items-center
                                        justify-center">

                                🎯

                            </div>

                        </div>


                        <div class="flex items-end
                                    justify-between mt-7">

                            <div>

                                <p class="text-5xl
                                          font-black">

                                    {{ $capacityPercent }}%

                                </p>

                                <p class="text-white/45
                                          text-xs mt-1">

                                    capacity filled

                                </p>

                            </div>


                            <div class="text-right">

                                <p class="text-xl
                                          font-black">

                                    {{ $filledSlots }}
                                    /
                                    {{ $capacity }}

                                </p>

                                <p class="text-white/40
                                          text-xs">

                                    volunteers

                                </p>

                            </div>

                        </div>


                        <div class="h-3
                                    bg-white/10
                                    rounded-full
                                    overflow-hidden
                                    mt-6">

                            <div
                                class="h-full
                                       rounded-full
                                       bg-gradient-to-r
                                       from-green-400
                                       via-emerald-400
                                       to-teal-400"
                                style="width: {{ $capacityPercent }}%">
                            </div>

                        </div>


                        <div class="flex items-center
                                    justify-between mt-4">

                            <span class="text-xs
                                         text-white/40">

                                Remaining

                            </span>

                            <span class="text-sm
                                         font-black
                                         text-emerald-300">

                                {{ $remainingSlots }} slots

                            </span>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                    APPLICATION RECORD
                ================================================== --}}

                <div class="premium-card p-6">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11
                                    rounded-2xl
                                    bg-emerald-100
                                    flex items-center
                                    justify-center">

                            📋

                        </div>

                        <div>

                            <h3 class="font-black
                                       text-slate-800">

                                Application Record

                            </h3>

                            <p class="text-xs
                                      text-slate-400">

                                Important timestamps

                            </p>

                        </div>

                    </div>


                    <div class="mt-6 space-y-4">


                        <div class="record-row">

                            <span>
                                Application ID
                            </span>

                            <strong class="text-emerald-600">
                                #{{ $application->id }}
                            </strong>

                        </div>


                        <div class="record-row">

                            <span>
                                Submitted
                            </span>

                            <strong>

                                {{ $application->created_at?->format('d M Y') ?? '—' }}

                            </strong>

                        </div>


                        <div class="record-row">

                            <span>
                                Approved
                            </span>

                            <strong>

                                {{ $application->approved_at?->format('d M Y') ?? '—' }}

                            </strong>

                        </div>


                        <div class="record-row">

                            <span>
                                Completed
                            </span>

                            <strong>

                                {{ $application->completed_at?->format('d M Y') ?? '—' }}

                            </strong>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                    ADMIN INFO
                ================================================== --}}

                <div class="rounded-[30px]
                            border border-emerald-100
                            bg-gradient-to-br
                            from-green-50
                            via-white
                            to-teal-50
                            p-6">

                    <div class="flex items-start gap-4">

                        <div class="w-12 h-12
                                    shrink-0
                                    rounded-2xl
                                    bg-gradient-to-br
                                    from-green-500
                                    to-emerald-500
                                    text-white
                                    flex items-center
                                    justify-center
                                    shadow-lg">

                            💡

                        </div>

                        <div>

                            <h3 class="font-black
                                       text-slate-800">

                                Admin Review

                            </h3>

                            <p class="text-sm
                                      text-slate-500
                                      leading-6 mt-1">

                                Review the submitted information
                                carefully before changing the
                                application status.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



{{-- =========================================================
    DOCUMENT PREVIEW MODAL
========================================================= --}}

<div id="documentModal"
     class="fixed inset-0 z-[10000]
            hidden items-center justify-center
            bg-slate-950/80
            backdrop-blur-md
            p-4">


    <div class="relative
                w-full max-w-5xl
                max-h-[92vh]
                bg-white
                rounded-[30px]
                shadow-2xl
                overflow-hidden">


        <div class="flex items-center
                    justify-between
                    px-5 py-4
                    border-b border-slate-100">

            <div>

                <h3 class="font-black
                           text-slate-800">

                    Document Preview

                </h3>

                <p class="text-xs
                          text-slate-400">

                    Uploaded application document

                </p>

            </div>


            <button
                type="button"
                onclick="closeDocumentPreview()"
                class="w-10 h-10
                       rounded-xl
                       bg-slate-100
                       text-slate-600
                       hover:bg-red-50
                       hover:text-red-600
                       transition">

                ✕

            </button>

        </div>


        <div class="bg-slate-950
                    flex items-center
                    justify-center
                    p-5
                    min-h-[500px]
                    max-h-[78vh]">

            <img
                id="documentPreviewImage"
                src=""
                alt="Document Preview"
                class="max-w-full
                       max-h-[70vh]
                       object-contain
                       rounded-xl">

        </div>

    </div>

</div>



{{-- =========================================================
    REJECT MODAL
========================================================= --}}

<div id="rejectModal"
     class="fixed inset-0 z-[9999]
            hidden items-center justify-center
            bg-slate-950/70
            backdrop-blur-md
            p-4">


    <div class="w-full max-w-lg
                bg-white
                rounded-[32px]
                shadow-2xl
                overflow-hidden
                transform transition">


        {{-- Header --}}

        <div class="relative
                    bg-gradient-to-r
                    from-red-600
                    to-rose-500
                    p-6 text-white">

            <div class="absolute
                        -right-10 -top-10
                        w-28 h-28
                        rounded-full
                        bg-white/10">
            </div>


            <div class="relative
                        flex items-center
                        justify-between">

                <div>

                    <p class="text-white/60
                              text-[10px]
                              uppercase
                              tracking-[.15em]
                              font-black">

                        Application Action

                    </p>

                    <h2 class="text-2xl
                               font-black mt-1">

                        Reject Application

                    </h2>

                </div>


                <button
                    type="button"
                    onclick="closeRejectModal()"
                    class="w-10 h-10
                           rounded-xl
                           bg-white/15
                           hover:bg-white/25
                           transition">

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


            <div class="mb-5">

                <div class="flex items-center
                            gap-3 p-4
                            rounded-2xl
                            bg-amber-50
                            border border-amber-100">

                    <span class="text-xl">
                        ⚠️
                    </span>

                    <p class="text-xs
                              text-amber-700
                              leading-5">

                        Please provide a clear reason
                        for rejecting this application.

                    </p>

                </div>

            </div>


            <label class="block
                          text-sm
                          font-black
                          text-slate-700
                          mb-2">

                Rejection Reason

            </label>


            <textarea
                name="rejection_reason"
                rows="5"
                required
                minlength="5"
                maxlength="1000"
                placeholder="Enter the reason for rejecting this application..."
                class="w-full
                       rounded-2xl
                       border border-slate-200
                       bg-slate-50
                       px-4 py-4
                       text-sm
                       text-slate-700
                       outline-none
                       focus:border-red-400
                       focus:ring-4
                       focus:ring-red-100
                       transition
                       resize-none"></textarea>


            <div class="flex items-center
                        justify-between mt-2">

                <p class="text-xs
                          text-slate-400">

                    Minimum 5 characters

                </p>

                <p class="text-xs
                          text-slate-400">

                    Maximum 1000

                </p>

            </div>


            <div class="flex gap-3 mt-6">

                <button
                    type="button"
                    onclick="closeRejectModal()"
                    class="flex-1
                           py-3.5
                           rounded-2xl
                           bg-slate-100
                           text-slate-700
                           font-black
                           hover:bg-slate-200
                           transition">

                    Cancel

                </button>


                <button
                    type="submit"
                    class="flex-1
                           py-3.5
                           rounded-2xl
                           bg-gradient-to-r
                           from-red-600
                           to-rose-500
                           text-white
                           font-black
                           shadow-lg
                           hover:shadow-xl
                           hover:-translate-y-0.5
                           transition">

                    Reject Application

                </button>

            </div>

        </form>

    </div>

</div>



{{-- =========================================================
    PREMIUM CSS
========================================================= --}}

<style>

    /* =========================================================
       PREMIUM CARD
    ========================================================= */

    .premium-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 32px;
        box-shadow:
            0 12px 35px rgba(15, 23, 42, .055),
            0 2px 8px rgba(15, 23, 42, .025);
        overflow: hidden;
        transition: all .3s ease;
    }

    .premium-card:hover {
        box-shadow:
            0 20px 50px rgba(15, 23, 42, .08),
            0 5px 15px rgba(16, 185, 129, .04);
    }


    /* =========================================================
       SUMMARY
    ========================================================= */

    .summary-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.35rem;
        min-height: 112px;

        background: #ffffff;

        border: 1px solid #eef2f7;
        border-radius: 25px;

        box-shadow:
            0 8px 25px rgba(15, 23, 42, .045);

        transition: all .3s ease;
    }

    .summary-card:hover {
        transform: translateY(-4px);

        border-color: #a7f3d0;

        box-shadow:
            0 18px 35px rgba(15, 23, 42, .08);
    }


    .summary-icon {
        width: 3.25rem;
        height: 3.25rem;
        min-width: 3.25rem;

        border-radius: 1.1rem;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 1.3rem;
    }


    .summary-label {
        font-size: .65rem;
        font-weight: 900;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: .1em;
    }


    .summary-value {
        margin-top: .3rem;

        font-size: 1rem;
        font-weight: 900;

        color: #1e293b;
    }


    .summary-helper {
        margin-top: .15rem;

        font-size: .7rem;
        color: #94a3b8;
    }


    /* =========================================================
       SECTION HEADER
    ========================================================= */

    .section-header {
        display: flex;
        align-items: center;
        gap: 1rem;

        padding: 1.5rem 1.75rem;

        background: linear-gradient(
            135deg,
            var(--tw-gradient-from),
            var(--tw-gradient-via),
            var(--tw-gradient-to)
        );

        border-bottom: 1px solid #d1fae5;
    }


    .section-icon {
        width: 3.25rem;
        height: 3.25rem;
        min-width: 3.25rem;

        border-radius: 1.1rem;

        background-image:
            linear-gradient(
                135deg,
                var(--tw-gradient-from),
                var(--tw-gradient-to)
            );

        display: flex;
        align-items: center;
        justify-content: center;

        color: white;
        font-size: 1.3rem;

        box-shadow:
            0 10px 22px rgba(16, 185, 129, .2);
    }


    .section-title {
        font-size: 1.25rem;
        font-weight: 900;
        color: #1e293b;
    }


    .section-subtitle {
        margin-top: .25rem;
        font-size: .78rem;
        color: #94a3b8;
    }


    /* =========================================================
       DETAIL CARD
    ========================================================= */

    .detail-card {
        min-height: 82px;

        padding: 1.15rem;

        border-radius: 1.25rem;

        background:
            linear-gradient(
                135deg,
                #f8fafc,
                #ffffff
            );

        border: 1px solid #e2e8f0;

        display: flex;
        flex-direction: column;
        justify-content: center;

        transition: all .25s ease;
    }


    .detail-card:hover {
        transform: translateY(-2px);

        border-color: #a7f3d0;

        box-shadow:
            0 12px 28px rgba(15, 23, 42, .06);
    }


    .detail-label {
        font-size: .64rem;
        font-weight: 900;

        text-transform: uppercase;
        letter-spacing: .09em;

        color: #94a3b8;
    }


    .detail-value {
        margin-top: .3rem;

        font-size: .96rem;
        font-weight: 800;

        color: #1e293b;

        line-height: 1.5;
    }


    /* =========================================================
       ADDRESS
    ========================================================= */

    .address-box {
        display: flex;
        align-items: flex-start;
        gap: 1rem;

        padding: 1.35rem;

        border-radius: 1.4rem;

        background:
            linear-gradient(
                135deg,
                #ecfdf5,
                #f0fdfa
            );

        border: 1px solid #d1fae5;
    }


    .address-icon {
        width: 3rem;
        height: 3rem;
        min-width: 3rem;

        border-radius: 1rem;

        background: white;

        display: flex;
        align-items: center;
        justify-content: center;

        box-shadow: 0 5px 15px rgba(15, 23, 42, .06);
    }


    /* =========================================================
       DOCUMENTS
    ========================================================= */

    .document-card {
        padding: 1.25rem;

        border-radius: 1.5rem;

        background:
            linear-gradient(
                135deg,
                #f8fafc,
                #ffffff
            );

        border: 1px solid #e2e8f0;

        transition: all .3s ease;
    }


    .document-card:hover {
        transform: translateY(-3px);

        border-color: #cbd5e1;

        box-shadow:
            0 15px 35px rgba(15, 23, 42, .07);
    }


    .document-icon {
        width: 3rem;
        height: 3rem;

        border-radius: 1rem;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 1.15rem;
    }


    .document-status {
        padding: .35rem .65rem;

        border-radius: 999px;

        background: #d1fae5;
        color: #047857;

        font-size: .58rem;
        font-weight: 900;

        text-transform: uppercase;
        letter-spacing: .05em;
    }


    .document-missing {
        padding: .35rem .65rem;

        border-radius: 999px;

        background: #fee2e2;
        color: #b91c1c;

        font-size: .58rem;
        font-weight: 900;

        text-transform: uppercase;
    }


    .document-preview {
        height: 230px;

        margin-top: 1.25rem;

        border-radius: 1.25rem;

        overflow: hidden;

        background: white;

        border: 1px solid #e2e8f0;

        display: flex;
        align-items: center;
        justify-content: center;
    }


    .document-button {
        width: 100%;

        margin-top: 1rem;

        padding: .8rem 1rem;

        border-radius: .9rem;

        color: white;

        font-size: .8rem;
        font-weight: 800;

        display: flex;
        align-items: center;
        justify-content: center;
        gap: .5rem;

        box-shadow:
            0 7px 16px rgba(15, 23, 42, .1);

        transition: all .25s ease;
    }


    .document-button:hover {
        transform: translateY(-2px);

        box-shadow:
            0 12px 22px rgba(15, 23, 42, .14);
    }


    .missing-document {
        height: 230px;

        margin-top: 1.25rem;

        border-radius: 1.25rem;

        border: 1px dashed #fecaca;

        background: #fffafa;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        color: #ef4444;

        font-size: 2rem;
    }


    .missing-document p {
        font-size: .75rem;
        font-weight: 800;
        margin-top: .5rem;
    }


    /* =========================================================
       RESPONSES
    ========================================================= */

    .response-card {
        padding: 1.4rem;

        border-width: 1px;

        border-radius: 1.5rem;
    }


    .response-label {
        font-size: .65rem;
        font-weight: 900;

        text-transform: uppercase;
        letter-spacing: .09em;
    }


    .response-text {
        margin-top: .75rem;

        color: #475569;

        font-size: .9rem;

        line-height: 1.8;

        white-space: pre-line;
    }


    /* =========================================================
       CAPACITY
    ========================================================= */

    .capacity-box {
        padding: 1.4rem;

        border-radius: 1.5rem;

        background:
            linear-gradient(
                135deg,
                #f8fafc,
                #ecfdf5
            );

        border: 1px solid #d1fae5;
    }


    /* =========================================================
       TIMELINE
    ========================================================= */

    .timeline-item {
        position: relative;

        display: flex;

        gap: 1.25rem;

        padding-bottom: 2.2rem;
    }


    .timeline-item.last {
        padding-bottom: 0;
    }


    .timeline-icon {
        position: relative;

        z-index: 10;

        width: 2.75rem;
        height: 2.75rem;
        min-width: 2.75rem;

        border-radius: 999px;

        border: 4px solid white;

        display: flex;
        align-items: center;
        justify-content: center;

        font-weight: 900;

        box-shadow:
            0 6px 15px rgba(15, 23, 42, .08);
    }


    .timeline-badge {
        display: inline-flex;

        padding: .3rem .65rem;

        border-radius: .55rem;

        font-size: .58rem;
        font-weight: 900;

        letter-spacing: .08em;
    }


    .timeline-title {
        margin-top: .5rem;

        font-size: .95rem;

        font-weight: 900;

        color: #1e293b;
    }


    .timeline-date {
        margin-top: .25rem;

        font-size: .75rem;

        color: #94a3b8;
    }


    /* =========================================================
       ACTIONS
    ========================================================= */

    .action-primary {
        width: 100%;

        padding: .95rem 1rem;

        border-radius: 1rem;

        background-image:
            linear-gradient(
                90deg,
                var(--tw-gradient-from),
                var(--tw-gradient-to)
            );

        color: white;

        font-weight: 900;

        display: flex;
        align-items: center;
        justify-content: center;
        gap: .5rem;

        box-shadow:
            0 8px 18px rgba(16, 185, 129, .15);

        transition: all .3s ease;
    }


    .action-primary:hover {
        transform: translateY(-2px);

        box-shadow:
            0 15px 28px rgba(16, 185, 129, .2);
    }


    .action-danger {
        width: 100%;

        padding: .95rem 1rem;

        border-radius: 1rem;

        background: #fff1f2;

        border: 1px solid #fecdd3;

        color: #dc2626;

        font-weight: 900;

        display: flex;
        align-items: center;
        justify-content: center;
        gap: .5rem;

        transition: all .25s ease;
    }


    .action-danger:hover {
        background: #ffe4e6;

        transform: translateY(-2px);
    }


    .action-secondary {
        width: 100%;

        padding: .95rem 1rem;

        border-radius: 1rem;

        background: #f1f5f9;

        color: #475569;

        font-weight: 900;

        display: flex;
        align-items: center;
        justify-content: center;

        transition: all .25s ease;
    }


    .action-secondary:hover {
        background: #e2e8f0;

        transform: translateY(-1px);
    }


    .completed-box {
        display: flex;
        align-items: center;
        gap: 1rem;

        padding: 1rem;

        border-radius: 1rem;

        background:
            linear-gradient(
                135deg,
                #eff6ff,
                #eef2ff
            );

        border: 1px solid #bfdbfe;
    }


    /* =========================================================
       RECORD ROW
    ========================================================= */

    .record-row {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 1rem;

        padding-bottom: .9rem;

        border-bottom: 1px solid #f1f5f9;
    }


    .record-row:last-child {
        border-bottom: 0;
        padding-bottom: 0;
    }


    .record-row span {
        font-size: .78rem;
        color: #94a3b8;
    }


    .record-row strong {
        font-size: .78rem;
        color: #334155;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media(max-width:640px) {

        .premium-card {
            border-radius: 24px;
        }

        .summary-card {
            border-radius: 22px;
        }

        .section-header {
            padding: 1.25rem;
        }

        .section-icon {
            width: 2.8rem;
            height: 2.8rem;
            min-width: 2.8rem;
        }

        .section-title {
            font-size: 1.1rem;
        }

        .detail-card {
            padding: 1rem;
        }

    }

</style>



{{-- =========================================================
    JAVASCRIPT
========================================================= --}}

<script>

    /* =========================================================
       DOCUMENT PREVIEW
    ========================================================= */

    function openDocumentPreview(url) {

        const modal =
            document.getElementById('documentModal');

        const image =
            document.getElementById('documentPreviewImage');

        image.src = url;

        modal.classList.remove('hidden');

        modal.classList.add('flex');

        document.body.classList.add('overflow-hidden');

    }


    function closeDocumentPreview() {

        const modal =
            document.getElementById('documentModal');

        const image =
            document.getElementById('documentPreviewImage');

        modal.classList.add('hidden');

        modal.classList.remove('flex');

        image.src = '';

        document.body.classList.remove('overflow-hidden');

    }



    /* =========================================================
       REJECT MODAL
    ========================================================= */

    function openRejectModal(applicationId) {

        const modal =
            document.getElementById('rejectModal');

        const form =
            document.getElementById('rejectForm');

        form.action =
            "{{ url('/admin/applications') }}/"
            + applicationId
            + "/reject";

        modal.classList.remove('hidden');

        modal.classList.add('flex');

        document.body.classList.add('overflow-hidden');

    }


    function closeRejectModal() {

        const modal =
            document.getElementById('rejectModal');

        modal.classList.add('hidden');

        modal.classList.remove('flex');

        document.body.classList.remove('overflow-hidden');

    }



    /* =========================================================
       CLICK OUTSIDE MODALS
    ========================================================= */

    const rejectModal =
        document.getElementById('rejectModal');

    if (rejectModal) {

        rejectModal.addEventListener(
            'click',
            function(event) {

                if (event.target === this) {

                    closeRejectModal();

                }

            }
        );

    }


    const documentModal =
        document.getElementById('documentModal');

    if (documentModal) {

        documentModal.addEventListener(
            'click',
            function(event) {

                if (event.target === this) {

                    closeDocumentPreview();

                }

            }
        );

    }



    /* =========================================================
       ESC KEY
    ========================================================= */

    document.addEventListener(
        'keydown',
        function(event) {

            if (event.key === 'Escape') {

                closeRejectModal();

                closeDocumentPreview();

            }

        }
    );

</script>

@endsection