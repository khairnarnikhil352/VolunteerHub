@extends('layouts.student')

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | DYNAMIC CERTIFICATE DATA
    |--------------------------------------------------------------------------
    */

    $event = $registration->event;
    $volunteer = $registration->user;

    $eventDate = $event->event_date
        ? \Carbon\Carbon::parse($event->event_date)->format('d F Y')
        : 'N/A';

    $issueDate = now()->format('d F Y');

    $volunteerId =
        'VH-' . str_pad($registration->id, 5, '0', STR_PAD_LEFT);

    $certificateId =
        'VH-CERT-' . str_pad($registration->id, 6, '0', STR_PAD_LEFT);

@endphp


<div class="min-h-screen bg-gradient-to-br
            from-slate-100 via-green-50 to-emerald-100
            py-10 px-4">


    {{-- ============================================================= --}}
    {{-- PAGE CONTAINER --}}
    {{-- ============================================================= --}}

    <div class="max-w-7xl mx-auto">


        {{-- ============================================================= --}}
        {{-- TOP PAGE HEADER --}}
        {{-- ============================================================= --}}

        <div class="flex flex-col lg:flex-row
                    lg:items-center lg:justify-between
                    gap-5 mb-8 print:hidden">


            {{-- Heading --}}
            <div>

                <div class="flex items-center gap-2">

                    <span class="w-2 h-2
                                 rounded-full
                                 bg-green-500"></span>

                    <span class="text-xs
                                 font-black
                                 tracking-[0.25em]
                                 uppercase
                                 text-green-700">

                        VolunteerHub

                    </span>

                </div>


                <h1 class="text-3xl md:text-4xl
                           font-black
                           text-slate-800
                           mt-2">

                    Certificate Preview

                </h1>


                <p class="text-slate-500 mt-1">

                    Official volunteer recognition certificate

                </p>

            </div>



            {{-- Buttons --}}
            <div class="flex flex-wrap gap-3">


                {{-- Print --}}
                <button onclick="window.print()"
                        class="group
                               inline-flex items-center gap-2
                               bg-gradient-to-r
                               from-green-600
                               via-emerald-600
                               to-teal-600
                               hover:from-green-700
                               hover:via-emerald-700
                               hover:to-teal-700
                               text-white
                               px-6 py-3.5
                               rounded-xl
                               font-bold
                               shadow-lg
                               shadow-green-600/20
                               transition-all
                               duration-300
                               hover:-translate-y-0.5">

                    <span class="text-lg">
                        🖨️
                    </span>

                    Print / Save PDF

                </button>



                {{-- Back --}}
                <a href="{{ route('my.events') }}"
                   class="inline-flex items-center gap-2
                          bg-white
                          border border-slate-200
                          hover:border-green-300
                          hover:bg-green-50
                          text-slate-700
                          px-6 py-3.5
                          rounded-xl
                          font-bold
                          shadow-sm
                          transition">

                    ← Back to My Events

                </a>

            </div>

        </div>



        {{-- ============================================================= --}}
        {{-- CERTIFICATE --}}
        {{-- ============================================================= --}}

        <div id="certificate"
             class="relative
                    bg-white
                    shadow-[0_30px_90px_rgba(0,0,0,0.16)]
                    overflow-hidden
                    p-3">


            {{-- ========================================================= --}}
            {{-- PREMIUM OUTER FRAME --}}
            {{-- ========================================================= --}}

            <div class="relative
                        border-[4px]
                        border-green-700
                        p-2">


                {{-- Inner Gold Border --}}
                <div class="relative
                            border-[1.5px]
                            border-amber-400
                            overflow-hidden">


                    {{-- ================================================= --}}
                    {{-- TOP GREEN BAND --}}
                    {{-- ================================================= --}}

                    <div class="h-3
                                bg-gradient-to-r
                                from-green-800
                                via-emerald-500
                                to-teal-500">

                    </div>



                    {{-- ================================================= --}}
                    {{-- BACKGROUND WATERMARK --}}
                    {{-- ================================================= --}}

                    <div class="absolute
                                inset-0
                                flex
                                items-center
                                justify-center
                                pointer-events-none
                                overflow-hidden">


                        <div class="text-[260px]
                                    md:text-[340px]
                                    font-black
                                    text-green-700/[0.025]
                                    select-none
                                    leading-none">

                            VH

                        </div>

                    </div>



                    {{-- ================================================= --}}
                    {{-- DECORATIVE CORNERS --}}
                    {{-- ================================================= --}}

                    {{-- TOP LEFT --}}
                    <div class="absolute
                                top-0 left-0
                                w-36 h-36
                                border-r-[3px]
                                border-b-[3px]
                                border-green-700/20
                                rounded-br-full">

                    </div>


                    {{-- TOP RIGHT --}}
                    <div class="absolute
                                top-0 right-0
                                w-36 h-36
                                border-l-[3px]
                                border-b-[3px]
                                border-emerald-700/20
                                rounded-bl-full">

                    </div>


                    {{-- BOTTOM LEFT --}}
                    <div class="absolute
                                bottom-0 left-0
                                w-36 h-36
                                border-r-[3px]
                                border-t-[3px]
                                border-teal-700/20
                                rounded-tr-full">

                    </div>


                    {{-- BOTTOM RIGHT --}}
                    <div class="absolute
                                bottom-0 right-0
                                w-36 h-36
                                border-l-[3px]
                                border-t-[3px]
                                border-green-700/20
                                rounded-tl-full">

                    </div>



                    {{-- ================================================= --}}
                    {{-- MAIN CONTENT --}}
                    {{-- ================================================= --}}

                    <div class="relative z-10
                                px-7 md:px-14 lg:px-20
                                py-10 md:py-12">



                        {{-- ================================================= --}}
                        {{-- LOGO --}}
                        {{-- ================================================= --}}

                        <div class="flex justify-center">

                            <div class="relative">


                                {{-- Outer Ring --}}
                                <div class="w-28 h-28
                                            rounded-full
                                            bg-white
                                            border-[3px]
                                            border-green-700
                                            flex items-center
                                            justify-center
                                            shadow-xl
                                            ring-4
                                            ring-green-700/10">


                                    {{-- Green Logo --}}
                                    <div class="w-20 h-20
                                                rounded-full
                                                bg-gradient-to-br
                                                from-green-700
                                                via-emerald-600
                                                to-teal-500
                                                flex items-center
                                                justify-center">


                                        {{-- VolunteerHub Logo SVG --}}
                                        <svg
                                            viewBox="0 0 100 100"
                                            width="58"
                                            height="58"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg">


                                            {{-- Center Person --}}
                                            <circle
                                                cx="50"
                                                cy="29"
                                                r="10"
                                                fill="white"/>


                                            <path
                                                d="M32 67
                                                   C32 51 39 44
                                                   50 44
                                                   C61 44 68 51
                                                   68 67"
                                                stroke="white"
                                                stroke-width="8"
                                                stroke-linecap="round"/>


                                            {{-- Left Person --}}
                                            <circle
                                                cx="27"
                                                cy="38"
                                                r="7"
                                                fill="white"
                                                opacity=".9"/>


                                            <path
                                                d="M16 67
                                                   C16 56 20 50
                                                   27 50"
                                                stroke="white"
                                                stroke-width="7"
                                                stroke-linecap="round"/>


                                            {{-- Right Person --}}
                                            <circle
                                                cx="73"
                                                cy="38"
                                                r="7"
                                                fill="white"
                                                opacity=".9"/>


                                            <path
                                                d="M84 67
                                                   C84 56 80 50
                                                   73 50"
                                                stroke="white"
                                                stroke-width="7"
                                                stroke-linecap="round"/>


                                            {{-- Connection --}}
                                            <path
                                                d="M26 72
                                                   C37 82
                                                   63 82
                                                   74 72"
                                                stroke="white"
                                                stroke-width="5"
                                                stroke-linecap="round"/>

                                        </svg>

                                    </div>

                                </div>


                                {{-- Small Star --}}
                                <div class="absolute
                                            -top-2
                                            -right-2
                                            w-8 h-8
                                            rounded-full
                                            bg-amber-400
                                            text-white
                                            flex items-center
                                            justify-center
                                            text-sm
                                            shadow-md">

                                    ★

                                </div>

                            </div>

                        </div>



                        {{-- ================================================= --}}
                        {{-- BRAND NAME --}}
                        {{-- ================================================= --}}

                        <div class="text-center mt-5">


                            <h1 class="text-4xl md:text-5xl
                                       font-black
                                       tracking-tight
                                       text-green-800">

                                VolunteerHub

                            </h1>


                            <p class="mt-2
                                      text-[11px] md:text-xs
                                      tracking-[0.4em]
                                      uppercase
                                      font-bold
                                      text-slate-500">

                                Student Volunteer Program

                            </p>


                            <p class="mt-1
                                      text-xs
                                      text-slate-400">

                                Community • Service • Impact

                            </p>

                        </div>



                        {{-- ================================================= --}}
                        {{-- DECORATIVE DIVIDER --}}
                        {{-- ================================================= --}}

                        <div class="flex items-center
                                    justify-center
                                    gap-4 mt-6">

                            <div class="w-28 h-px
                                        bg-gradient-to-r
                                        from-transparent
                                        to-emerald-400">

                            </div>


                            <div class="text-amber-500 text-xl">

                                ✦

                            </div>


                            <div class="w-28 h-px
                                        bg-gradient-to-l
                                        from-transparent
                                        to-emerald-400">

                            </div>

                        </div>



                        {{-- ================================================= --}}
                        {{-- CERTIFICATE HEADING --}}
                        {{-- ================================================= --}}

                        <div class="text-center mt-6">


                            <p class="uppercase
                                      tracking-[0.3em]
                                      text-xs md:text-sm
                                      font-bold
                                      text-slate-500">

                                Certificate of Appreciation

                            </p>


                            <h2 class="mt-3
                                       text-5xl md:text-6xl
                                       font-serif
                                       font-black
                                       text-slate-800">

                                Certificate

                            </h2>


                            <p class="mt-2
                                      text-sm md:text-base
                                      text-slate-500">

                                This certificate is proudly presented to

                            </p>

                        </div>



                        {{-- ================================================= --}}
                        {{-- VOLUNTEER NAME --}}
                        {{-- ================================================= --}}

                        <div class="text-center mt-5">


                            <h3 class="font-serif
                                       text-4xl md:text-5xl
                                       font-black
                                       text-green-700">

                                {{ $volunteer->name }}

                            </h3>


                            <div class="flex items-center
                                        justify-center
                                        gap-3 mt-3">

                                <div class="w-16 h-[1px]
                                            bg-emerald-300">

                                </div>

                                <div class="text-green-600">
                                    ◆
                                </div>

                                <div class="w-16 h-[1px]
                                            bg-emerald-300">

                                </div>

                            </div>

                        </div>



                        {{-- ================================================= --}}
                        {{-- DESCRIPTION --}}
                        {{-- ================================================= --}}

                        <div class="max-w-4xl
                                    mx-auto
                                    text-center
                                    mt-6">


                            <p class="text-slate-600
                                      text-sm md:text-base
                                      leading-7">

                                This certificate is proudly awarded to

                                <span class="font-bold
                                             text-slate-800">

                                    {{ $volunteer->name }}

                                </span>

                                for successfully completing the volunteer
                                participation in

                                <span class="font-bold
                                             text-green-700">

                                    {{ $event->title }}

                                </span>

                                and for demonstrating dedication,
                                responsibility and valuable contribution
                                towards community service.

                            </p>

                        </div>



                        {{-- ================================================= --}}
                        {{-- EVENT DETAILS --}}
                        {{-- ================================================= --}}

                        <div class="grid grid-cols-1
                                    md:grid-cols-3
                                    gap-4
                                    max-w-5xl
                                    mx-auto
                                    mt-7">


                            {{-- Event --}}
                            <div class="rounded-xl
                                        border
                                        border-green-200
                                        bg-green-50/70
                                        px-5 py-4
                                        text-center">

                                <p class="text-[10px]
                                          uppercase
                                          tracking-[0.2em]
                                          font-bold
                                          text-slate-400">

                                    Event

                                </p>


                                <p class="mt-2
                                          font-bold
                                          text-sm
                                          text-green-800">

                                    {{ $event->title }}

                                </p>

                            </div>



                            {{-- Date --}}
                            <div class="rounded-xl
                                        border
                                        border-emerald-200
                                        bg-emerald-50/70
                                        px-5 py-4
                                        text-center">

                                <p class="text-[10px]
                                          uppercase
                                          tracking-[0.2em]
                                          font-bold
                                          text-slate-400">

                                    Event Date

                                </p>


                                <p class="mt-2
                                          font-bold
                                          text-sm
                                          text-emerald-800">

                                    {{ $eventDate }}

                                </p>

                            </div>



                            {{-- Category --}}
                            <div class="rounded-xl
                                        border
                                        border-teal-200
                                        bg-teal-50/70
                                        px-5 py-4
                                        text-center">

                                <p class="text-[10px]
                                          uppercase
                                          tracking-[0.2em]
                                          font-bold
                                          text-slate-400">

                                    Category

                                </p>


                                <p class="mt-2
                                          font-bold
                                          text-sm
                                          text-teal-800">

                                    {{ $event->category }}

                                </p>

                            </div>

                        </div>



                        {{-- ================================================= --}}
                        {{-- SIGNATURE SECTION --}}
                        {{-- ================================================= --}}

                        <div class="grid grid-cols-1
                                    md:grid-cols-3
                                    items-end
                                    gap-10
                                    max-w-5xl
                                    mx-auto
                                    mt-9">

                                {{-- ================================================= --}}
                                {{-- LEFT SIGNATURE --}}
                                {{-- ================================================= --}}

                                <div class="text-center">

                                    {{-- Digital Signature --}}
                                    <div class="h-14 flex items-end justify-center">

                                        <svg width="180"
                                            height="55"
                                            viewBox="0 0 180 55"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="mx-auto">

                                            {{-- Main Signature Stroke --}}
                                            <path d="M8 40
                                                    C20 18, 28 18, 34 36
                                                    C39 50, 48 12, 58 22
                                                    C66 30, 69 43, 78 35
                                                    C87 27, 91 13, 98 19
                                                    C105 25, 101 43, 111 39
                                                    C121 35, 123 17, 132 21
                                                    C141 25, 135 42, 146 39
                                                    C155 36, 158 25, 171 19"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="text-green-700"/>

                                            {{-- Signature Underline --}}
                                            <path d="M25 47
                                                    C60 51, 105 49, 163 44"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                class="text-emerald-600"/>

                                        </svg>

                                    </div>


                                    {{-- Nikhil Khairnar --}}
                                    <div class="w-52 mx-auto
                                                border-b-2 border-slate-400
                                                pb-2">

                                        <p class="font-serif
                                                font-bold
                                                text-lg
                                                text-slate-700">

                                            Nikhil Khairnar

                                        </p>

                                    </div>


                                    {{-- Signature Label --}}
                                    <p class="mt-2
                                            text-[10px]
                                            uppercase
                                            tracking-[0.2em]
                                            font-bold
                                            text-slate-500">


                                           Founder & CEO 

                                        <p class="text-[9px]
                                                    text-slate-400
                                                    mt-1">

                                                VolunteerHub

                                            </p>

                                    </p>

                                </div>

                            {{-- ================================================= --}}
                            {{-- OFFICIAL SEAL --}}
                            {{-- ================================================= --}}

                            <div class="flex justify-center">


                                <div class="relative
                                            w-28 h-28
                                            rounded-full
                                            border-[3px]
                                            border-amber-500
                                            flex items-center
                                            justify-center
                                            text-center
                                            rotate-[-3deg]">


                                    {{-- Inner Circle --}}
                                    <div class="absolute
                                                inset-2
                                                rounded-full
                                                border
                                                border-amber-400">

                                    </div>


                                    {{-- Seal Content --}}
                                    <div class="relative z-10">


                                        <div class="text-amber-500
                                                    text-lg">

                                            ★

                                        </div>


                                        <p class="text-[8px]
                                                  font-black
                                                  tracking-[0.12em]
                                                  uppercase
                                                  text-green-800">

                                            VolunteerHub

                                        </p>


                                        <p class="text-[7px]
                                                  font-bold
                                                  text-slate-500
                                                  mt-1">

                                            VERIFIED

                                        </p>


                                        <div class="text-amber-500
                                                    text-xs mt-1">

                                            ★ ★ ★

                                        </div>

                                    </div>

                                </div>

                            </div>



                            {{-- RIGHT --}}
                            <div class="text-center">


                                <div class="h-12
                                            flex items-center
                                            justify-center">

                                    <span class="font-serif
                                                 italic
                                                 text-2xl
                                                 text-slate-700">

                                        Event Coordinator

                                    </span>

                                </div>


                                <div class="w-52
                                            mx-auto
                                            border-b-2
                                            border-slate-400">

                                </div>


                                <p class="mt-2
                                          text-[10px]
                                          uppercase
                                          tracking-[0.2em]
                                          font-bold
                                          text-slate-500">

                                    Event Coordinator

                                </p>


                                <p class="text-[9px]
                                          text-slate-400
                                          mt-1">

                                    VolunteerHub

                                </p>

                            </div>

                        </div>



                        {{-- ================================================= --}}
                        {{-- CERTIFICATE METADATA --}}
                        {{-- ================================================= --}}

                        <div class="mt-7
                                    pt-4
                                    border-t
                                    border-slate-200">


                            <div class="flex flex-wrap
                                        justify-center
                                        gap-x-8
                                        gap-y-2
                                        text-[9px]
                                        md:text-[10px]">


                                <div>

                                    <span class="text-slate-400">
                                        Volunteer ID:
                                    </span>

                                    <span class="font-bold
                                                 text-slate-600">

                                        {{ $volunteerId }}

                                    </span>

                                </div>


                                <div>

                                    <span class="text-slate-400">
                                        Certificate ID:
                                    </span>

                                    <span class="font-bold
                                                 text-slate-600">

                                        {{ $certificateId }}

                                    </span>

                                </div>


                                <div>

                                    <span class="text-slate-400">
                                        Issue Date:
                                    </span>

                                    <span class="font-bold
                                                 text-slate-600">

                                        {{ $issueDate }}

                                    </span>

                                </div>

                            </div>

                        </div>


                    </div>


                    {{-- ================================================= --}}
                    {{-- BOTTOM GREEN BAND --}}
                    {{-- ================================================= --}}

                    <div class="h-3
                                bg-gradient-to-r
                                from-green-800
                                via-emerald-500
                                to-teal-500">

                    </div>


                </div>

            </div>

        </div>



        {{-- ============================================================= --}}
        {{-- VERIFICATION CARD --}}
        {{-- ============================================================= --}}

        <div class="mt-6
                    bg-white
                    border border-slate-200
                    rounded-2xl
                    p-5
                    shadow-sm
                    print:hidden">


            <div class="flex flex-col
                        md:flex-row
                        md:items-center
                        justify-between
                        gap-5">


                <div class="flex items-start gap-4">


                    <div class="w-12 h-12
                                rounded-xl
                                bg-green-100
                                flex items-center
                                justify-center
                                text-xl">

                        ✓

                    </div>


                    <div>

                        <h3 class="font-black
                                   text-slate-800">

                            Certificate Verified

                        </h3>


                        <p class="text-sm
                                  text-slate-500
                                  mt-1">

                            This certificate was issued by
                            <strong class="text-green-700">
                                VolunteerHub
                            </strong>
                            for a completed volunteer activity.

                        </p>

                    </div>

                </div>



                {{-- Certificate ID --}}
                <div class="md:text-right">


                    <p class="text-[10px]
                              uppercase
                              tracking-widest
                              text-slate-400
                              font-bold">

                        Certificate ID

                    </p>


                    <p class="font-black
                              text-green-700
                              mt-1">

                        {{ $certificateId }}

                    </p>

                </div>

            </div>

        </div>



        {{-- ============================================================= --}}
        {{-- PRINT INSTRUCTION --}}
        {{-- ============================================================= --}}

        <div class="text-center
                    mt-4
                    text-xs
                    text-slate-400
                    print:hidden">

            Click <strong>Print / Save PDF</strong> and select
            <strong>Save as PDF</strong> to create your digital certificate.

        </div>


    </div>

</div>



{{-- ================================================================= --}}
{{-- PRINT CSS --}}
{{-- ================================================================= --}}

<style>

@media print {

    @page {

        size: A4 landscape;

        margin: 5mm;

    }


    html,
    body {

        margin: 0 !important;

        padding: 0 !important;

        background: white !important;

    }


    /*
    Hide admin layout
    */
    nav,
    header,
    footer,
    aside,
    .sidebar,
    [class*="sidebar"],
    [class*="navbar"] {

        display: none !important;

    }


    /*
    Hide everything
    */
    body * {

        visibility: hidden;

    }


    /*
    Show certificate only
    */
    #certificate,
    #certificate * {

        visibility: visible;

    }


    #certificate {

        position: absolute !important;

        left: 0 !important;

        top: 0 !important;

        width: 100% !important;

        max-width: none !important;

        margin: 0 !important;

        padding: 0 !important;

        background: white !important;

        box-shadow: none !important;

    }


    /*
    Remove screen-only elements
    */
    .print\:hidden {

        display: none !important;

    }


    /*
    Prevent browser from
    shrinking certificate
    */
    #certificate {

        transform: none !important;

    }

}

</style>


@endsection