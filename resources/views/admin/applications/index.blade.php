@extends('layouts.admin')

@section('content')

@php
/*
|--------------------------------------------------------------------------
| Application Statistics
|--------------------------------------------------------------------------
*/


$total = $applications->count();

$pending = $applications->filter(
    fn($app) => strtolower($app->status ?? 'pending') === 'pending'
)->count();

$approved = $applications->filter(
    fn($app) => strtolower($app->status ?? '') === 'approved'
)->count();

$completed = $applications->filter(
    fn($app) => strtolower($app->status ?? '') === 'completed'
)->count();

$rejected = $applications->filter(
    fn($app) => strtolower($app->status ?? '') === 'rejected'
)->count();

$approvalRate = $total > 0
    ? round(($approved / $total) * 100)
    : 0;

$pendingRate = $total > 0
    ? round(($pending / $total) * 100)
    : 0;

$completedRate = $total > 0
    ? round(($completed / $total) * 100)
    : 0;

$rejectedRate = $total > 0
    ? round(($rejected / $total) * 100)
    : 0;


@endphp

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-50">


{{-- ========================================================= --}}
{{-- PREMIUM HERO --}}
{{-- ========================================================= --}}

<section class="relative overflow-hidden bg-gradient-to-r from-green-800 via-emerald-700 to-teal-600">

    {{-- Background Decorations --}}
    <div class="absolute -top-32 -right-24 w-96 h-96 rounded-full bg-white/10 blur-sm"></div>

    <div class="absolute -bottom-40 -left-24 w-[30rem] h-[30rem] rounded-full bg-white/10"></div>

    <div class="absolute top-20 right-1/3 w-32 h-32 rounded-full bg-emerald-300/10 blur-2xl"></div>


    <div class="relative max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-10 lg:py-14">

        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-8">


            {{-- Hero Content --}}
            <div class="max-w-3xl">

                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                            bg-white/10 border border-white/20
                            backdrop-blur-xl shadow-lg">

                    <span class="relative flex h-2.5 w-2.5">

                        <span class="absolute inline-flex h-full w-full
                                     rounded-full bg-white opacity-75 animate-ping"></span>

                        <span class="relative inline-flex h-2.5 w-2.5
                                     rounded-full bg-white"></span>

                    </span>

                    <span class="text-[11px] font-black uppercase tracking-[0.18em] text-white">
                        Application Management
                    </span>

                </div>


                <h1 class="mt-5 text-4xl md:text-5xl lg:text-6xl
                           font-black tracking-tight text-white">

                    Volunteer
                    <span class="text-emerald-100">
                        Applications
                    </span>

                </h1>


                <p class="mt-4 max-w-2xl text-sm md:text-base
                          leading-7 text-green-50/90">

                    Review volunteer applications, monitor their status,
                    and manage event participation from one powerful workspace.

                </p>


                {{-- Hero Mini Features --}}
                <div class="flex flex-wrap gap-3 mt-7">

                    <div class="inline-flex items-center gap-2
                                px-3.5 py-2 rounded-xl
                                bg-white/10 border border-white/10
                                text-white text-xs font-bold">

                        <span>✓</span>
                        Quick Review

                    </div>


                    <div class="inline-flex items-center gap-2
                                px-3.5 py-2 rounded-xl
                                bg-white/10 border border-white/10
                                text-white text-xs font-bold">

                        <span>⌁</span>
                        Live Filtering

                    </div>


                    <div class="inline-flex items-center gap-2
                                px-3.5 py-2 rounded-xl
                                bg-white/10 border border-white/10
                                text-white text-xs font-bold">

                        <span>◈</span>
                        Status Tracking

                    </div>

                </div>

            </div>


            {{-- Hero Total Card --}}
            <div class="w-full xl:w-auto">

                <div class="relative overflow-hidden
                            rounded-[30px]
                            bg-white/10
                            border border-white/20
                            backdrop-blur-2xl
                            p-6
                            shadow-2xl">

                    <div class="absolute -top-10 -right-10
                                w-32 h-32 rounded-full
                                bg-white/10"></div>


                    <div class="relative flex items-center gap-5">

                        <div class="w-16 h-16 rounded-2xl
                                    bg-white/15
                                    border border-white/20
                                    flex items-center justify-center
                                    shadow-inner">

                            <span class="text-3xl">
                                📋
                            </span>

                        </div>


                        <div>

                            <p class="text-xs font-bold uppercase
                                      tracking-widest text-green-100">

                                Total Applications

                            </p>


                            <div class="flex items-end gap-2">

                                <span class="text-4xl font-black text-white">

                                    {{ $total }}

                                </span>

                                <span class="pb-1 text-xs text-green-100">

                                    submitted

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- MAIN CONTENT --}}
{{-- ========================================================= --}}

<main class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-8 lg:py-10">


    {{-- ===================================================== --}}
    {{-- PREMIUM STAT CARDS --}}
    {{-- ===================================================== --}}

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">


        {{-- Pending --}}
        <div class="group relative overflow-hidden
                    rounded-[28px]
                    bg-white
                    border border-amber-100
                    p-5
                    shadow-sm
                    hover:shadow-2xl
                    hover:-translate-y-1
                    transition-all duration-300">

            <div class="absolute -right-10 -top-10
                        w-28 h-28 rounded-full
                        bg-amber-50
                        group-hover:scale-150
                        transition-transform duration-500">
            </div>


            <div class="relative">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-[11px] font-black uppercase
                                  tracking-[0.15em] text-slate-400">

                            Pending

                        </p>

                        <p class="mt-2 text-4xl font-black text-slate-800">

                            {{ $pending }}

                        </p>

                        <p class="mt-1 text-xs font-medium text-slate-400">

                            Waiting for review

                        </p>

                    </div>


                    <div class="w-12 h-12 rounded-2xl
                                bg-amber-50
                                border border-amber-100
                                flex items-center justify-center
                                text-xl
                                shadow-sm">

                        ⏳

                    </div>

                </div>


                <div class="mt-5 flex items-center justify-between">

                    <span class="text-[11px] font-bold text-amber-600">

                        {{ $pendingRate }}% of total

                    </span>

                    <span class="text-xs text-slate-300">
                        {{ $pending }}/{{ $total }}
                    </span>

                </div>


                <div class="mt-2 h-2 rounded-full bg-amber-100 overflow-hidden">

                    <div class="h-full rounded-full bg-gradient-to-r
                                from-amber-400 to-orange-400
                                transition-all duration-700"
                         style="width: {{ $pendingRate }}%">
                    </div>

                </div>

            </div>

        </div>



        {{-- Approved --}}
        <div class="group relative overflow-hidden
                    rounded-[28px]
                    bg-white
                    border border-emerald-100
                    p-5
                    shadow-sm
                    hover:shadow-2xl
                    hover:-translate-y-1
                    transition-all duration-300">

            <div class="absolute -right-10 -top-10
                        w-28 h-28 rounded-full
                        bg-emerald-50
                        group-hover:scale-150
                        transition-transform duration-500">
            </div>


            <div class="relative">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-[11px] font-black uppercase
                                  tracking-[0.15em] text-slate-400">

                            Approved

                        </p>

                        <p class="mt-2 text-4xl font-black text-slate-800">

                            {{ $approved }}

                        </p>

                        <p class="mt-1 text-xs font-medium text-slate-400">

                            Accepted applications

                        </p>

                    </div>


                    <div class="w-12 h-12 rounded-2xl
                                bg-emerald-50
                                border border-emerald-100
                                flex items-center justify-center
                                text-xl
                                text-emerald-600
                                shadow-sm">

                        ✓

                    </div>

                </div>


                <div class="mt-5 flex items-center justify-between">

                    <span class="text-[11px] font-bold text-emerald-600">

                        {{ $approvalRate }}% approval

                    </span>

                    <span class="text-xs text-slate-300">

                        {{ $approved }}/{{ $total }}

                    </span>

                </div>


                <div class="mt-2 h-2 rounded-full bg-emerald-100 overflow-hidden">

                    <div class="h-full rounded-full
                                bg-gradient-to-r
                                from-green-500 to-emerald-500
                                transition-all duration-700"
                         style="width: {{ $approvalRate }}%">
                    </div>

                </div>

            </div>

        </div>



        {{-- Completed --}}
        <div class="group relative overflow-hidden
                    rounded-[28px]
                    bg-white
                    border border-sky-100
                    p-5
                    shadow-sm
                    hover:shadow-2xl
                    hover:-translate-y-1
                    transition-all duration-300">

            <div class="absolute -right-10 -top-10
                        w-28 h-28 rounded-full
                        bg-sky-50
                        group-hover:scale-150
                        transition-transform duration-500">
            </div>


            <div class="relative">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-[11px] font-black uppercase
                                  tracking-[0.15em] text-slate-400">

                            Completed

                        </p>

                        <p class="mt-2 text-4xl font-black text-slate-800">

                            {{ $completed }}

                        </p>

                        <p class="mt-1 text-xs font-medium text-slate-400">

                            Successfully completed

                        </p>

                    </div>


                    <div class="w-12 h-12 rounded-2xl
                                bg-sky-50
                                border border-sky-100
                                flex items-center justify-center
                                text-xl
                                shadow-sm">

                        🏆

                    </div>

                </div>


                <div class="mt-5 flex items-center justify-between">

                    <span class="text-[11px] font-bold text-sky-600">

                        {{ $completedRate }}% of total

                    </span>

                    <span class="text-xs text-slate-300">

                        {{ $completed }}/{{ $total }}

                    </span>

                </div>


                <div class="mt-2 h-2 rounded-full bg-sky-100 overflow-hidden">

                    <div class="h-full rounded-full
                                bg-gradient-to-r
                                from-sky-400 to-cyan-500
                                transition-all duration-700"
                         style="width: {{ $completedRate }}%">
                    </div>

                </div>

            </div>

        </div>



        {{-- Rejected --}}
        <div class="group relative overflow-hidden
                    rounded-[28px]
                    bg-white
                    border border-red-100
                    p-5
                    shadow-sm
                    hover:shadow-2xl
                    hover:-translate-y-1
                    transition-all duration-300">

            <div class="absolute -right-10 -top-10
                        w-28 h-28 rounded-full
                        bg-red-50
                        group-hover:scale-150
                        transition-transform duration-500">
            </div>


            <div class="relative">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-[11px] font-black uppercase
                                  tracking-[0.15em] text-slate-400">

                            Rejected

                        </p>

                        <p class="mt-2 text-4xl font-black text-slate-800">

                            {{ $rejected }}

                        </p>

                        <p class="mt-1 text-xs font-medium text-slate-400">

                            Not approved

                        </p>

                    </div>


                    <div class="w-12 h-12 rounded-2xl
                                bg-red-50
                                border border-red-100
                                flex items-center justify-center
                                text-xl
                                shadow-sm">

                        ✕

                    </div>

                </div>


                <div class="mt-5 flex items-center justify-between">

                    <span class="text-[11px] font-bold text-red-600">

                        {{ $rejectedRate }}% of total

                    </span>

                    <span class="text-xs text-slate-300">

                        {{ $rejected }}/{{ $total }}

                    </span>

                </div>


                <div class="mt-2 h-2 rounded-full bg-red-100 overflow-hidden">

                    <div class="h-full rounded-full
                                bg-gradient-to-r
                                from-red-400 to-rose-500
                                transition-all duration-700"
                         style="width: {{ $rejectedRate }}%">
                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- ===================================================== --}}
    {{-- APPLICATION OVERVIEW --}}
    {{-- ===================================================== --}}

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-8">


        {{-- Overview Card --}}
        <div class="lg:col-span-2
                    rounded-[30px]
                    bg-white
                    border border-slate-100
                    p-6
                    shadow-lg shadow-slate-200/40">

            <div class="flex flex-col sm:flex-row
                        sm:items-center
                        sm:justify-between
                        gap-4">

                <div>

                    <div class="flex items-center gap-2">

                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                        <span class="text-[10px] font-black
                                     uppercase tracking-[0.18em]
                                     text-emerald-600">

                            Application Overview

                        </span>

                    </div>


                    <h2 class="mt-2 text-xl font-black text-slate-800">

                        Current application distribution

                    </h2>

                    <p class="mt-1 text-xs text-slate-400">

                        A quick snapshot of all submitted applications.

                    </p>

                </div>


                <div class="px-4 py-2 rounded-xl bg-emerald-50
                            text-emerald-700 text-xs font-black">

                    {{ $total }} Total

                </div>

            </div>


            <div class="mt-7">

                <div class="h-4 rounded-full overflow-hidden bg-slate-100 flex">

                    @if($total > 0)

                        <div class="bg-amber-400 transition-all duration-700"
                             style="width: {{ ($pending / $total) * 100 }}%">
                        </div>

                        <div class="bg-emerald-500 transition-all duration-700"
                             style="width: {{ ($approved / $total) * 100 }}%">
                        </div>

                        <div class="bg-sky-500 transition-all duration-700"
                             style="width: {{ ($completed / $total) * 100 }}%">
                        </div>

                        <div class="bg-red-500 transition-all duration-700"
                             style="width: {{ ($rejected / $total) * 100 }}%">
                        </div>

                    @endif

                </div>

            </div>


            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-6">


                <div class="flex items-center gap-3">

                    <span class="w-3 h-3 rounded-full bg-amber-400"></span>

                    <div>

                        <p class="text-xs font-bold text-slate-600">
                            Pending
                        </p>

                        <p class="text-sm font-black text-slate-800">
                            {{ $pending }}
                        </p>

                    </div>

                </div>


                <div class="flex items-center gap-3">

                    <span class="w-3 h-3 rounded-full bg-emerald-500"></span>

                    <div>

                        <p class="text-xs font-bold text-slate-600">
                            Approved
                        </p>

                        <p class="text-sm font-black text-slate-800">
                            {{ $approved }}
                        </p>

                    </div>

                </div>


                <div class="flex items-center gap-3">

                    <span class="w-3 h-3 rounded-full bg-sky-500"></span>

                    <div>

                        <p class="text-xs font-bold text-slate-600">
                            Completed
                        </p>

                        <p class="text-sm font-black text-slate-800">
                            {{ $completed }}
                        </p>

                    </div>

                </div>


                <div class="flex items-center gap-3">

                    <span class="w-3 h-3 rounded-full bg-red-500"></span>

                    <div>

                        <p class="text-xs font-bold text-slate-600">
                            Rejected
                        </p>

                        <p class="text-sm font-black text-slate-800">
                            {{ $rejected }}
                        </p>

                    </div>

                </div>

            </div>

        </div>



        {{-- Approval Rate --}}
        <div class="rounded-[30px]
                    bg-gradient-to-br
                    from-green-700
                    via-emerald-600
                    to-teal-500
                    p-6
                    text-white
                    shadow-xl
                    shadow-emerald-200/50
                    relative overflow-hidden">

            <div class="absolute -right-12 -top-12
                        w-40 h-40 rounded-full
                        bg-white/10">
            </div>

            <div class="relative">

                <p class="text-xs font-bold uppercase
                          tracking-widest text-green-100">

                    Approval Rate

                </p>


                <div class="flex items-center justify-center py-6">

                    <div class="relative w-36 h-36">

                        <svg class="w-full h-full -rotate-90"
                             viewBox="0 0 120 120">

                            <circle
                                cx="60"
                                cy="60"
                                r="48"
                                fill="none"
                                stroke="rgba(255,255,255,0.15)"
                                stroke-width="10"
                            />

                            <circle
                                cx="60"
                                cy="60"
                                r="48"
                                fill="none"
                                stroke="white"
                                stroke-width="10"
                                stroke-linecap="round"
                                stroke-dasharray="301.59"
                                stroke-dashoffset="{{ 301.59 - (301.59 * $approvalRate / 100) }}"
                            />

                        </svg>


                        <div class="absolute inset-0
                                    flex flex-col
                                    items-center
                                    justify-center">

                            <span class="text-3xl font-black">
                                {{ $approvalRate }}%
                            </span>

                            <span class="text-[10px] text-green-100">
                                approved
                            </span>

                        </div>

                    </div>

                </div>


                <p class="text-xs leading-5 text-green-50 text-center">

                    {{ $approved }} of {{ $total }}
                    applications are currently approved.

                </p>

            </div>

        </div>

    </div>



    {{-- ===================================================== --}}
    {{-- SEARCH & FILTER --}}
    {{-- ===================================================== --}}

    <div class="rounded-[30px]
                bg-white
                border border-slate-100
                shadow-lg shadow-slate-200/40
                p-5 mb-6">


        <div class="flex flex-col xl:flex-row
                    xl:items-center gap-4">


            {{-- Search --}}
            <div class="relative flex-1">

                <div class="absolute left-4 top-1/2
                            -translate-y-1/2
                            text-slate-400
                            pointer-events-none">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0z"/>

                    </svg>

                </div>


                <input
                    type="text"
                    id="applicationSearch"
                    placeholder="Search by volunteer name, email or event..."
                    class="w-full pl-12 pr-12 py-4
                           rounded-2xl
                           border border-slate-200
                           bg-slate-50
                           text-sm
                           font-semibold
                           text-slate-700
                           placeholder:text-slate-400
                           outline-none
                           focus:bg-white
                           focus:ring-2
                           focus:ring-emerald-400
                           focus:border-transparent
                           transition"
                >


                <button
                    type="button"
                    id="clearSearch"
                    class="hidden absolute right-3 top-1/2
                           -translate-y-1/2
                           w-8 h-8
                           rounded-xl
                           bg-slate-200
                           text-slate-500
                           hover:bg-emerald-100
                           hover:text-emerald-600
                           transition">

                    ✕

                </button>

            </div>


            {{-- Status --}}
            <div class="xl:w-56">

                <select
                    id="statusFilter"
                    class="w-full px-4 py-4
                           rounded-2xl
                           border border-slate-200
                           bg-slate-50
                           text-sm
                           font-black
                           text-slate-700
                           outline-none
                           focus:bg-white
                           focus:ring-2
                           focus:ring-emerald-400
                           focus:border-transparent
                           transition">

                    <option value="all">
                        All Status
                    </option>

                    <option value="pending">
                        Pending
                    </option>

                    <option value="approved">
                        Approved
                    </option>

                    <option value="completed">
                        Completed
                    </option>

                    <option value="rejected">
                        Rejected
                    </option>

                </select>

            </div>


            {{-- Result Counter --}}
            <div class="xl:w-auto">

                <div class="h-full px-5 py-4 rounded-2xl
                            bg-gradient-to-r
                            from-green-50
                            to-emerald-50
                            border border-emerald-100
                            flex items-center justify-center
                            gap-2">

                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                    <span class="text-xs font-black text-emerald-700">

                        Showing
                        <span id="visibleCount">{{ $total }}</span>

                    </span>

                </div>

            </div>

        </div>

    </div>



    {{-- ===================================================== --}}
    {{-- APPLICATION TABLE --}}
    {{-- ===================================================== --}}

    <div class="rounded-[32px]
                bg-white
                border border-slate-100
                shadow-xl shadow-slate-200/50
                overflow-hidden">


        {{-- Table Header --}}
        <div class="px-6 py-6
                    bg-gradient-to-r
                    from-slate-50
                    via-white
                    to-emerald-50
                    border-b border-slate-100">

            <div class="flex flex-col sm:flex-row
                        sm:items-center
                        sm:justify-between gap-4">


                <div>

                    <div class="flex items-center gap-2">

                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                        <span class="text-[10px] font-black uppercase
                                     tracking-[0.18em]
                                     text-emerald-600">

                            Application Records

                        </span>

                    </div>


                    <h2 class="mt-2 text-xl font-black text-slate-800">

                        Submitted Applications

                    </h2>


                    <p class="mt-1 text-xs text-slate-400">

                        Review complete application details using the View button.

                    </p>

                </div>


                <div class="inline-flex items-center gap-2
                            self-start sm:self-auto
                            px-4 py-2.5
                            rounded-xl
                            bg-white
                            border border-slate-200
                            shadow-sm">

                    <span class="text-sm">
                        📊
                    </span>

                    <span class="text-xs font-black text-slate-600">

                        <span id="tableCount">{{ $total }}</span>
                        records

                    </span>

                </div>

            </div>

        </div>



        {{-- Horizontal Scroll --}}
        <div class="overflow-x-auto">

            <div class="min-w-[1100px]">


                {{-- Column Header --}}
                <div class="grid
                            grid-cols-[2.3fr_2.4fr_1.35fr_1.35fr_1.4fr]
                            items-center gap-5
                            px-7 py-4
                            bg-slate-50/80
                            border-b border-slate-100">

                    <div class="text-[10px] font-black uppercase
                                tracking-[0.16em] text-slate-400">

                        Volunteer

                    </div>

                    <div class="text-[10px] font-black uppercase
                                tracking-[0.16em] text-slate-400">

                        Event

                    </div>

                    <div class="text-[10px] font-black uppercase
                                tracking-[0.16em] text-slate-400">

                        Applied

                    </div>

                    <div class="text-[10px] font-black uppercase
                                tracking-[0.16em] text-slate-400">

                        Status

                    </div>

                    <div class="text-[10px] font-black uppercase
                                tracking-[0.16em] text-slate-400 text-right">

                        Action

                    </div>

                </div>



                {{-- Application List --}}
                <div id="applicationList">


                    @forelse($applications as $application)

                        @php

                            $status = strtolower(
                                $application->status ?? 'pending'
                            );

                            $statusData = match($status) {

                                'approved' => [
                                    'label' => 'Approved',
                                    'icon' => '✓',
                                    'classes' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                    'dot' => 'bg-emerald-500'
                                ],

                                'completed' => [
                                    'label' => 'Completed',
                                    'icon' => '🏆',
                                    'classes' => 'bg-sky-50 text-sky-700 border-sky-200',
                                    'dot' => 'bg-sky-500'
                                ],

                                'rejected' => [
                                    'label' => 'Rejected',
                                    'icon' => '✕',
                                    'classes' => 'bg-red-50 text-red-700 border-red-200',
                                    'dot' => 'bg-red-500'
                                ],

                                default => [
                                    'label' => 'Pending',
                                    'icon' => '⏳',
                                    'classes' => 'bg-amber-50 text-amber-700 border-amber-200',
                                    'dot' => 'bg-amber-500'
                                ]

                            };

                        @endphp


                        {{-- Row --}}
                        <div
                            class="application-row
                                   group
                                   grid
                                   grid-cols-[2.3fr_2.4fr_1.35fr_1.35fr_1.4fr]
                                   items-center gap-5
                                   px-7 py-5
                                   border-b border-slate-100
                                   hover:bg-gradient-to-r
                                   hover:from-green-50/60
                                   hover:via-white
                                   hover:to-emerald-50/40
                                   transition-all duration-300"
                            data-search="{{ strtolower(
                                ($application->user->name ?? '') . ' ' .
                                ($application->user->email ?? '') . ' ' .
                                ($application->event->title ?? '')
                            ) }}"
                            data-status="{{ $status }}"
                        >


                            {{-- Volunteer --}}
                            <div class="flex items-center gap-3 min-w-0">

                                <div class="relative flex-shrink-0">

                                    @if($application->user && $application->user->profile_photo)

                                        <img
                                            src="{{ asset('storage/'.$application->user->profile_photo) }}"
                                            alt="{{ $application->user->name }}"
                                            class="w-12 h-12 rounded-2xl
                                                   object-cover
                                                   ring-4 ring-white
                                                   shadow-md
                                                   group-hover:scale-105
                                                   transition-transform duration-300"
                                        >

                                    @else

                                        <div class="w-12 h-12 rounded-2xl
                                                    bg-gradient-to-br
                                                    from-green-600
                                                    via-emerald-600
                                                    to-teal-500
                                                    text-white
                                                    flex items-center justify-center
                                                    font-black text-lg
                                                    shadow-md
                                                    group-hover:scale-105
                                                    transition-transform duration-300">

                                            {{ strtoupper(
                                                substr(
                                                    $application->user->name ?? 'V',
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </div>

                                    @endif


                                    <span class="absolute
                                                 -bottom-1
                                                 -right-1
                                                 w-4 h-4
                                                 rounded-full
                                                 bg-emerald-500
                                                 border-2 border-white
                                                 shadow-sm">
                                    </span>

                                </div>


                                <div class="min-w-0">

                                    <p class="font-black
                                              text-slate-800
                                              truncate
                                              group-hover:text-emerald-700
                                              transition-colors">

                                        {{ $application->user->name ?? 'Unknown Volunteer' }}

                                    </p>


                                    <p class="text-xs
                                              text-slate-400
                                              truncate
                                              mt-1">

                                        {{ $application->user->email ?? 'No email available' }}

                                    </p>

                                </div>

                            </div>



                            {{-- Event --}}
                            <div class="min-w-0">

                                <p class="font-black
                                          text-slate-800
                                          truncate">

                                    {{ $application->event->title ?? 'Event Deleted' }}

                                </p>


                                <div class="flex items-center gap-3 mt-1.5">

                                    <span class="inline-flex items-center gap-1
                                                 text-[11px]
                                                 font-medium
                                                 text-slate-500">

                                        📅

                                        {{ $application->event?->event_date
                                            ? \Carbon\Carbon::parse(
                                                $application->event->event_date
                                            )->format('d M Y')
                                            : 'Date unavailable'
                                        }}

                                    </span>


                                    <span class="text-slate-300">
                                        •
                                    </span>


                                    <span class="inline-flex items-center gap-1
                                                 text-[11px]
                                                 font-medium
                                                 text-slate-500
                                                 truncate">

                                        📍

                                        {{ $application->event->city ?? 'Location unavailable' }}

                                    </span>

                                </div>

                            </div>



                            {{-- Applied --}}
                            <div>

                                <p class="text-sm font-black text-slate-700">

                                    {{ $application->created_at
                                        ? $application->created_at->format('d M Y')
                                        : '—'
                                    }}

                                </p>


                                <p class="text-[11px]
                                          font-medium
                                          text-slate-400
                                          mt-1">

                                    {{ $application->created_at
                                        ? $application->created_at->format('h:i A')
                                        : ''
                                    }}

                                </p>

                            </div>



                            {{-- Status --}}
                            <div>

                                <span class="inline-flex items-center gap-2
                                             px-3.5 py-2
                                             rounded-xl
                                             border
                                             {{ $statusData['classes'] }}
                                             text-[10px]
                                             font-black
                                             uppercase
                                             tracking-wide
                                             shadow-sm">

                                    <span class="flex items-center justify-center
                                                 w-5 h-5 rounded-lg
                                                 bg-white/70">

                                        {{ $statusData['icon'] }}

                                    </span>

                                    {{ $statusData['label'] }}

                                </span>

                            </div>



                            {{-- Action --}}
                            <div class="flex justify-end">

                                <a
                                    href="{{ route(
                                        'admin.applications.show',
                                        $application
                                    ) }}"
                                    class="inline-flex items-center gap-2
                                           px-4 py-3
                                           rounded-2xl
                                           bg-gradient-to-r
                                           from-green-600
                                           via-emerald-600
                                           to-teal-500
                                           text-white
                                           text-[11px]
                                           font-black
                                           shadow-lg
                                           shadow-emerald-200/50
                                           hover:shadow-xl
                                           hover:-translate-y-1
                                           hover:from-green-700
                                           hover:via-emerald-700
                                           hover:to-teal-600
                                           transition-all duration-300">

                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                        />

                                    </svg>


                                    View

                                </a>

                            </div>

                        </div>

                    @empty


                        {{-- Empty State --}}
                        <div class="py-24 text-center px-6">

                            <div class="mx-auto w-24 h-24
                                        rounded-[28px]
                                        bg-gradient-to-br
                                        from-green-50
                                        to-emerald-100
                                        border border-emerald-100
                                        flex items-center justify-center
                                        text-4xl
                                        shadow-inner">

                                📋

                            </div>


                            <h3 class="mt-6 text-2xl font-black text-slate-800">

                                No Applications Yet

                            </h3>


                            <p class="mt-2 max-w-md mx-auto
                                      text-sm leading-6
                                      text-slate-400">

                                Volunteer applications will appear here
                                when students register for your events.

                            </p>

                        </div>

                    @endforelse

                </div>



                {{-- Search Empty State --}}
                <div id="noResults"
                     class="hidden py-20 text-center px-6">

                    <div class="mx-auto w-20 h-20
                                rounded-3xl
                                bg-slate-100
                                flex items-center justify-center
                                text-3xl">

                        🔍

                    </div>


                    <h3 class="mt-5 text-xl font-black text-slate-800">

                        No matching applications

                    </h3>


                    <p class="mt-2 text-sm text-slate-400">

                        Try another volunteer name, event or status.

                    </p>


                    <button
                        type="button"
                        id="resetFilters"
                        class="mt-5 inline-flex items-center gap-2
                               px-5 py-3
                               rounded-2xl
                               bg-gradient-to-r
                               from-green-600
                               to-emerald-600
                               text-white
                               text-xs
                               font-black
                               shadow-lg
                               hover:shadow-xl
                               hover:-translate-y-0.5
                               transition">

                        Reset Filters

                    </button>

                </div>


            </div>

        </div>

    </div>


    {{-- ===================================================== --}}
    {{-- FOOTER INFO --}}
    {{-- ===================================================== --}}

    <div class="mt-6
                flex flex-col sm:flex-row
                items-center
                justify-between
                gap-3
                px-2">

        <p class="text-xs text-slate-400">

            VolunteerHub Application Management

        </p>


        <div class="flex items-center gap-2
                    text-xs font-bold text-emerald-600">

            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

            Application system active

        </div>

    </div>

</main>


</div>

{{-- ============================================================= --}}
{{-- SEARCH + FILTER JAVASCRIPT --}}
{{-- ============================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('applicationSearch');
    const statusFilter = document.getElementById('statusFilter');
    const clearSearch = document.getElementById('clearSearch');

    const rows = document.querySelectorAll('.application-row');

    const noResults = document.getElementById('noResults');

    const visibleCount = document.getElementById('visibleCount');
    const tableCount = document.getElementById('tableCount');

    const resetFilters = document.getElementById('resetFilters');


    function filterApplications() {

        const searchValue =
            searchInput.value.toLowerCase().trim();

        const statusValue =
            statusFilter.value;


        let count = 0;


        rows.forEach(function (row) {

            const searchText =
                row.dataset.search || '';

            const rowStatus =
                row.dataset.status || '';


            const matchesSearch =
                searchText.includes(searchValue);


            const matchesStatus =
                statusValue === 'all' ||
                rowStatus === statusValue;


            if (matchesSearch && matchesStatus) {

                row.classList.remove('hidden');

                count++;

            } else {

                row.classList.add('hidden');

            }

        });


        visibleCount.textContent = count;
        tableCount.textContent = count;


        if (searchValue.length > 0) {

            clearSearch.classList.remove('hidden');

        } else {

            clearSearch.classList.add('hidden');

        }


        if (count === 0 && rows.length > 0) {

            noResults.classList.remove('hidden');

        } else {

            noResults.classList.add('hidden');

        }

    }


    searchInput.addEventListener(
        'input',
        filterApplications
    );


    statusFilter.addEventListener(
        'change',
        filterApplications
    );


    clearSearch.addEventListener(
        'click',
        function () {

            searchInput.value = '';

            filterApplications();

            searchInput.focus();

        }
    );


    resetFilters.addEventListener(
        'click',
        function () {

            searchInput.value = '';

            statusFilter.value = 'all';

            filterApplications();

        }
    );

});

</script>

@endsection
