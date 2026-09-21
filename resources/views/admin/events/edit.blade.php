@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-blue-50">

    {{-- ========================================================= --}}
    {{-- HERO SECTION --}}
    {{-- ========================================================= --}}

    <section class="relative overflow-hidden rounded-b-[45px]
                    bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500
                    text-white shadow-2xl">

        {{-- Decorative Circles --}}
        <div class="absolute -top-24 -right-20 w-96 h-96
                    bg-white/10 rounded-full blur-3xl"></div>

        <div class="absolute -bottom-32 -left-20 w-96 h-96
                    bg-green-300/20 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-14
                    relative z-10">

            <div class="flex flex-col lg:flex-row
                        justify-between items-start lg:items-center gap-8">

                {{-- Hero Content --}}
                <div>

                    <span class="inline-block bg-white/20 backdrop-blur
                                 px-5 py-2 rounded-full
                                 text-sm font-semibold border border-white/20">

                        🛡️ VolunteerHub Admin Portal

                    </span>

                    <h1 class="text-5xl lg:text-6xl
                               font-black mt-6 leading-tight">

                        Edit Event

                    </h1>

                    <p class="mt-5 text-green-100
                              text-lg max-w-2xl leading-8">

                        Update event information, schedule,
                        volunteer capacity and event banner.

                    </p>

                    <div class="flex flex-wrap gap-4 mt-8">

                        <a href="{{ route('admin.events.index') }}"
                           class="bg-white
                                  text-green-700
                                  px-7 py-3
                                  rounded-xl
                                  font-bold
                                  shadow-xl
                                  hover:bg-green-50
                                  transition
                                  hover:-translate-y-1">

                            ← Back to Events

                        </a>

                        <a href="{{ route('admin.dashboard') }}"
                           class="border border-white/40
                                  px-7 py-3
                                  rounded-xl
                                  hover:bg-white/20
                                  transition">

                            🏠 Dashboard

                        </a>

                    </div>

                </div>


                {{-- Hero Side Card --}}
                <div class="w-full lg:w-80">

                    <div class="bg-white/15 backdrop-blur-xl
                                border border-white/20
                                rounded-[30px]
                                p-7
                                shadow-2xl">

                        <div class="text-center">

                            <div class="w-20 h-20 mx-auto
                                        bg-white
                                        rounded-3xl
                                        flex items-center
                                        justify-center
                                        text-5xl
                                        shadow-xl">

                                ✏️

                            </div>

                            <h2 class="text-2xl font-black mt-5">

                                Event Editor

                            </h2>

                            <p class="text-green-100 text-sm mt-2">

                                Update your volunteer opportunity

                            </p>

                        </div>


                        <div class="grid grid-cols-2 gap-3 mt-6">

                            <div class="bg-white/10
                                        rounded-2xl
                                        p-4
                                        text-center">

                                <p class="text-2xl font-black">

                                    {{ $event->filled_slots }}

                                </p>

                                <p class="text-xs text-green-100">

                                    Registered

                                </p>

                            </div>


                            <div class="bg-white/10
                                        rounded-2xl
                                        p-4
                                        text-center">

                                <p class="text-2xl font-black">

                                    {{ $event->capacity }}

                                </p>

                                <p class="text-xs text-green-100">

                                    Capacity

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Hero Bottom Info --}}
            <div class="grid grid-cols-2 md:grid-cols-4
                        gap-4 mt-10">

                <div class="bg-white/10
                            rounded-2xl
                            p-4">

                    <p class="text-green-200 text-xs">

                        📅 Event

                    </p>

                    <p class="font-bold mt-1 truncate">

                        {{ $event->title }}

                    </p>

                </div>


                <div class="bg-white/10
                            rounded-2xl
                            p-4">

                    <p class="text-green-200 text-xs">

                        📍 City

                    </p>

                    <p class="font-bold mt-1">

                        {{ $event->city }}

                    </p>

                </div>


                <div class="bg-white/10
                            rounded-2xl
                            p-4">

                    <p class="text-green-200 text-xs">

                        📅 Date

                    </p>

                    <p class="font-bold mt-1">

                        {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}

                    </p>

                </div>


                <div class="bg-white/10
                            rounded-2xl
                            p-4">

                    <p class="text-green-200 text-xs">

                        📌 Status

                    </p>

                    <p class="font-bold mt-1">

                        {{ $event->status }}

                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================================= --}}

    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">


        {{-- ===================================================== --}}
        {{-- SUCCESS MESSAGE --}}
        {{-- ===================================================== --}}

        @if(session('success'))

            <div class="mb-8
                        bg-green-100
                        border border-green-300
                        text-green-800
                        rounded-2xl
                        p-5
                        shadow-lg
                        flex items-center gap-4">

                <div class="text-4xl">

                    ✅

                </div>

                <div>

                    <h3 class="font-bold text-lg">

                        Success!

                    </h3>

                    <p class="text-sm">

                        {{ session('success') }}

                    </p>

                </div>

            </div>

        @endif


        {{-- ===================================================== --}}
        {{-- ERROR MESSAGE --}}
        {{-- ===================================================== --}}

        @if($errors->any())

            <div class="mb-8
                        bg-red-50
                        border border-red-200
                        text-red-700
                        rounded-2xl
                        p-6
                        shadow-lg">

                <h3 class="font-bold text-lg mb-3">

                    ⚠️ Please fix the following errors:

                </h3>

                <ul class="list-disc
                           list-inside
                           space-y-1
                           text-sm">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- ===================================================== --}}
        {{-- FORM --}}
        {{-- ===================================================== --}}

        <div class="bg-white
                    rounded-[35px]
                    shadow-2xl
                    overflow-hidden
                    border border-green-100">


            {{-- FORM HEADER --}}
            <div class="bg-gradient-to-r
                        from-green-700
                        via-emerald-600
                        to-teal-500
                        p-8
                        text-white">

                <div class="flex items-center gap-4">

                    <div class="w-16 h-16
                                bg-white/20
                                rounded-2xl
                                flex items-center
                                justify-center
                                text-3xl">

                        ✏️

                    </div>

                    <div>

                        <h2 class="text-3xl font-black">

                            Update Event Information

                        </h2>

                        <p class="text-green-100 mt-1">

                            Modify the details below and save your changes.

                        </p>

                    </div>

                </div>

            </div>


            {{-- FORM --}}
            <form action="{{ route('admin.events.update', $event->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @method('PUT')


                <div class="p-8 lg:p-10">


                    {{-- ================================================= --}}
                    {{-- BASIC INFORMATION --}}
                    {{-- ================================================= --}}

                    <div>

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-11 h-11
                                        bg-green-100
                                        rounded-xl
                                        flex items-center
                                        justify-center
                                        text-xl">

                                📋

                            </div>

                            <div>

                                <h3 class="text-xl font-black text-gray-800">

                                    Basic Information

                                </h3>

                                <p class="text-gray-500 text-sm">

                                    Main information about your event

                                </p>

                            </div>

                        </div>


                        <div class="grid md:grid-cols-2 gap-6">


                            {{-- Title --}}
                            <div class="md:col-span-2">

                                <label class="block text-sm
                                              font-bold
                                              text-gray-700
                                              mb-2">

                                    Event Title

                                </label>

                                <input type="text"
                                       name="title"
                                       value="{{ old('title', $event->title) }}"
                                       placeholder="Enter event title"
                                       required
                                       class="w-full
                                              px-5 py-4
                                              rounded-2xl
                                              border border-gray-200
                                              bg-gray-50
                                              focus:bg-white
                                              focus:ring-2
                                              focus:ring-green-500
                                              focus:border-green-500
                                              transition">

                            </div>


                            {{-- Category --}}
                            <div>

                                <label class="block text-sm
                                              font-bold
                                              text-gray-700
                                              mb-2">

                                    Category

                                </label>

                                <select name="category"
                                        required
                                        class="w-full
                                               px-5 py-4
                                               rounded-2xl
                                               border border-gray-200
                                               bg-gray-50
                                               focus:bg-white
                                               focus:ring-2
                                               focus:ring-green-500
                                               focus:border-green-500">

                                    @foreach([
                                        'Environment',
                                        'Education',
                                        'Healthcare',
                                        'Community',
                                        'Animal Welfare',
                                        'Disaster Relief',
                                        'Other'
                                    ] as $category)

                                        <option value="{{ $category }}"
                                            {{ old('category', $event->category) == $category ? 'selected' : '' }}>

                                            {{ $category }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- Status --}}
                            <div>

                                <label class="block text-sm
                                              font-bold
                                              text-gray-700
                                              mb-2">

                                    Status

                                </label>

                                <select name="status"
                                        required
                                        class="w-full
                                               px-5 py-4
                                               rounded-2xl
                                               border border-gray-200
                                               bg-gray-50
                                               focus:bg-white
                                               focus:ring-2
                                               focus:ring-green-500
                                               focus:border-green-500">

                                    @foreach([
                                        'Upcoming',
                                        'Ongoing',
                                        'Completed',
                                        'Cancelled'
                                    ] as $status)

                                        <option value="{{ $status }}"
                                            {{ old('status', $event->status) == $status ? 'selected' : '' }}>

                                            {{ $status }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- Description --}}
                            <div class="md:col-span-2">

                                <label class="block text-sm
                                              font-bold
                                              text-gray-700
                                              mb-2">

                                    Description

                                </label>

                                <textarea name="description"
                                          rows="5"
                                          required
                                          placeholder="Describe your volunteer event..."
                                          class="w-full
                                                 px-5 py-4
                                                 rounded-2xl
                                                 border border-gray-200
                                                 bg-gray-50
                                                 focus:bg-white
                                                 focus:ring-2
                                                 focus:ring-green-500
                                                 focus:border-green-500
                                                 transition">{{ old('description', $event->description) }}</textarea>

                            </div>

                        </div>

                    </div>


                    {{-- DIVIDER --}}
                    <div class="border-t border-gray-100 my-10"></div>


                    {{-- ================================================= --}}
                    {{-- LOCATION --}}
                    {{-- ================================================= --}}

                    <div>

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-11 h-11
                                        bg-blue-100
                                        rounded-xl
                                        flex items-center
                                        justify-center
                                        text-xl">

                                📍

                            </div>

                            <div>

                                <h3 class="text-xl font-black text-gray-800">

                                    Event Location

                                </h3>

                                <p class="text-gray-500 text-sm">

                                    Where the event will take place

                                </p>

                            </div>

                        </div>


                        <div class="grid md:grid-cols-2 gap-6">


                            {{-- City --}}
                            <div>

                                <label class="block text-sm
                                              font-bold
                                              text-gray-700
                                              mb-2">

                                    City

                                </label>

                                <input type="text"
                                       name="city"
                                       value="{{ old('city', $event->city) }}"
                                       placeholder="Enter city"
                                       required
                                       class="w-full
                                              px-5 py-4
                                              rounded-2xl
                                              border border-gray-200
                                              bg-gray-50
                                              focus:bg-white
                                              focus:ring-2
                                              focus:ring-green-500
                                              focus:border-green-500">

                            </div>


                            {{-- Venue --}}
                            <div>

                                <label class="block text-sm
                                              font-bold
                                              text-gray-700
                                              mb-2">

                                    Venue

                                </label>

                                <input type="text"
                                       name="venue"
                                       value="{{ old('venue', $event->venue) }}"
                                       placeholder="Enter venue"
                                       required
                                       class="w-full
                                              px-5 py-4
                                              rounded-2xl
                                              border border-gray-200
                                              bg-gray-50
                                              focus:bg-white
                                              focus:ring-2
                                              focus:ring-green-500
                                              focus:border-green-500">

                            </div>

                        </div>

                    </div>


                    {{-- DIVIDER --}}
                    <div class="border-t border-gray-100 my-10"></div>


                    {{-- ================================================= --}}
                    {{-- DATE & TIME --}}
                    {{-- ================================================= --}}

                    <div>

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-11 h-11
                                        bg-orange-100
                                        rounded-xl
                                        flex items-center
                                        justify-center
                                        text-xl">

                                📅

                            </div>

                            <div>

                                <h3 class="text-xl font-black text-gray-800">

                                    Date & Time

                                </h3>

                                <p class="text-gray-500 text-sm">

                                    Set the event schedule

                                </p>

                            </div>

                        </div>


                        <div class="grid md:grid-cols-3 gap-6">


                            {{-- Date --}}
                            <div>

                                <label class="block text-sm
                                              font-bold
                                              text-gray-700
                                              mb-2">

                                    Event Date

                                </label>

                                <input type="date"
                                       name="event_date"
                                       value="{{ old('event_date', $event->event_date) }}"
                                       required
                                       class="w-full
                                              px-5 py-4
                                              rounded-2xl
                                              border border-gray-200
                                              bg-gray-50
                                              focus:bg-white
                                              focus:ring-2
                                              focus:ring-green-500
                                              focus:border-green-500">

                            </div>


                            {{-- Start --}}
                            <div>

                                <label class="block text-sm
                                              font-bold
                                              text-gray-700
                                              mb-2">

                                    Start Time

                                </label>

                                <input type="time"
                                       name="start_time"
                                       value="{{ old('start_time', $event->start_time) }}"
                                       required
                                       class="w-full
                                              px-5 py-4
                                              rounded-2xl
                                              border border-gray-200
                                              bg-gray-50
                                              focus:bg-white
                                              focus:ring-2
                                              focus:ring-green-500
                                              focus:border-green-500">

                            </div>


                            {{-- End --}}
                            <div>

                                <label class="block text-sm
                                              font-bold
                                              text-gray-700
                                              mb-2">

                                    End Time

                                </label>

                                <input type="time"
                                       name="end_time"
                                       value="{{ old('end_time', $event->end_time) }}"
                                       required
                                       class="w-full
                                              px-5 py-4
                                              rounded-2xl
                                              border border-gray-200
                                              bg-gray-50
                                              focus:bg-white
                                              focus:ring-2
                                              focus:ring-green-500
                                              focus:border-green-500">

                            </div>

                        </div>

                    </div>


                    {{-- DIVIDER --}}
                    <div class="border-t border-gray-100 my-10"></div>


                    {{-- ================================================= --}}
                    {{-- CAPACITY --}}
                    {{-- ================================================= --}}

                    <div>

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-11 h-11
                                        bg-purple-100
                                        rounded-xl
                                        flex items-center
                                        justify-center
                                        text-xl">

                                👥

                            </div>

                            <div>

                                <h3 class="text-xl font-black text-gray-800">

                                    Volunteer Capacity

                                </h3>

                                <p class="text-gray-500 text-sm">

                                    Manage maximum volunteer slots

                                </p>

                            </div>

                        </div>


                        <div class="grid md:grid-cols-2 gap-6">


                            {{-- Capacity --}}
                            <div>

                                <label class="block text-sm
                                              font-bold
                                              text-gray-700
                                              mb-2">

                                    Maximum Volunteers

                                </label>

                                <input type="number"
                                       name="capacity"
                                       min="1"
                                       value="{{ old('capacity', $event->capacity) }}"
                                       required
                                       class="w-full
                                              px-5 py-4
                                              rounded-2xl
                                              border border-gray-200
                                              bg-gray-50
                                              focus:bg-white
                                              focus:ring-2
                                              focus:ring-green-500
                                              focus:border-green-500">

                            </div>


                            {{-- Filled Slots --}}
                            <div>

                                <label class="block text-sm
                                              font-bold
                                              text-gray-700
                                              mb-2">

                                    Registered Volunteers

                                </label>

                                <div class="w-full
                                            px-5 py-4
                                            rounded-2xl
                                            bg-green-50
                                            border border-green-100
                                            text-green-700
                                            font-bold">

                                    {{ $event->filled_slots }}

                                    <span class="text-sm font-normal
                                                 text-gray-500 ml-2">

                                        volunteers already registered

                                    </span>

                                </div>

                            </div>

                        </div>


                        <div class="mt-5
                                    bg-blue-50
                                    border border-blue-100
                                    rounded-2xl
                                    p-5">

                            <div class="flex gap-3">

                                <span class="text-2xl">

                                    💡

                                </span>

                                <div>

                                    <p class="font-bold text-blue-800">

                                        Capacity Information

                                    </p>

                                    <p class="text-sm
                                              text-blue-700
                                              mt-1">

                                        Registered volunteer count is
                                        automatically maintained by the system.
                                        You cannot edit it from this page.

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- DIVIDER --}}
                    <div class="border-t border-gray-100 my-10"></div>


                    {{-- ================================================= --}}
                    {{-- EVENT BANNER --}}
                    {{-- ================================================= --}}

                    <div>

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-11 h-11
                                        bg-pink-100
                                        rounded-xl
                                        flex items-center
                                        justify-center
                                        text-xl">

                                🖼️

                            </div>

                            <div>

                                <h3 class="text-xl font-black text-gray-800">

                                    Event Banner

                                </h3>

                                <p class="text-gray-500 text-sm">

                                    Upload a new banner or keep the current one

                                </p>

                            </div>

                        </div>


                        <div class="grid lg:grid-cols-2 gap-8">


                            {{-- Upload --}}
                            <div>

                                <label class="block text-sm
                                              font-bold
                                              text-gray-700
                                              mb-2">

                                    Upload New Banner

                                </label>

                                <input type="file"
                                       name="banner"
                                       id="banner"
                                       accept="image/png,image/jpeg,image/jpg"
                                       class="w-full
                                              px-5 py-4
                                              rounded-2xl
                                              border border-gray-200
                                              bg-gray-50
                                              focus:bg-white
                                              focus:ring-2
                                              focus:ring-green-500
                                              focus:border-green-500">

                                <p class="text-xs
                                          text-gray-500
                                          mt-2">

                                    JPG, JPEG or PNG • Maximum 2MB

                                </p>

                            </div>


                            {{-- Preview --}}
                            <div>

                                <p class="text-sm
                                          font-bold
                                          text-gray-700
                                          mb-2">

                                    Banner Preview

                                </p>


                                <div id="previewContainer"
                                     class="relative
                                            h-48
                                            rounded-2xl
                                            overflow-hidden
                                            border
                                            border-gray-200
                                            bg-gray-50">


                                    @if($event->banner)

                                        <img id="bannerPreview"
                                             src="{{ asset('images/events/'.$event->banner) }}"
                                             alt="{{ $event->title }}"
                                             class="w-full h-full object-cover">

                                    @else

                                        <img id="bannerPreview"
                                             src=""
                                             class="hidden w-full h-full object-cover">

                                        <div id="previewPlaceholder"
                                             class="w-full h-full
                                                    flex items-center
                                                    justify-center
                                                    text-gray-400">

                                            <div class="text-center">

                                                <div class="text-5xl">

                                                    🖼️

                                                </div>

                                                <p class="text-sm mt-2">

                                                    No banner uploaded

                                                </p>

                                            </div>

                                        </div>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- INFORMATION BOX --}}
                    {{-- ================================================= --}}

                    <div class="mt-10
                                bg-gradient-to-r
                                from-green-50
                                to-blue-50
                                border border-green-100
                                rounded-2xl
                                p-6">

                        <div class="flex gap-4">

                            <div class="text-3xl">

                                💚

                            </div>

                            <div>

                                <h3 class="font-black
                                           text-gray-800">

                                    Before Updating

                                </h3>

                                <p class="text-sm
                                          text-gray-600
                                          mt-1
                                          leading-6">

                                    Please verify the event date,
                                    time, venue, capacity and status
                                    before saving your changes.

                                </p>

                            </div>

                        </div>

                    </div>


                </div>


                {{-- ================================================= --}}
                {{-- FORM FOOTER --}}
                {{-- ================================================= --}}

                <div class="bg-gray-50
                            border-t
                            border-gray-100
                            px-8 lg:px-10
                            py-6
                            flex flex-col sm:flex-row
                            justify-between
                            items-center gap-4">


                    <a href="{{ route('admin.events.index') }}"
                       class="text-gray-600
                              font-semibold
                              hover:text-gray-900
                              transition">

                        ← Cancel & Back

                    </a>


                    <button type="submit"
                            class="bg-gradient-to-r
                                   from-green-600
                                   via-emerald-600
                                   to-teal-600
                                   hover:from-green-700
                                   hover:via-emerald-700
                                   hover:to-teal-700
                                   text-white
                                   px-10 py-4
                                   rounded-2xl
                                   font-black
                                   shadow-xl
                                   transition
                                   hover:-translate-y-1">

                        💾 Update Event

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- ============================================================= --}}
{{-- BANNER PREVIEW JAVASCRIPT --}}
{{-- ============================================================= --}}

<script>

const bannerInput = document.getElementById('banner');
const bannerPreview = document.getElementById('bannerPreview');
const previewContainer = document.getElementById('previewContainer');
const previewPlaceholder = document.getElementById('previewPlaceholder');

if (bannerInput) {

    bannerInput.addEventListener('change', function () {

        const file = this.files[0];

        if (file) {

            const reader = new FileReader();

            reader.onload = function (e) {

                bannerPreview.src = e.target.result;

                bannerPreview.classList.remove('hidden');

                if (previewPlaceholder) {
                    previewPlaceholder.classList.add('hidden');
                }

            };

            reader.readAsDataURL(file);

        }

    });

}

</script>

@endsection