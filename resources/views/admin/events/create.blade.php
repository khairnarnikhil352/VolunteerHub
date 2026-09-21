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
                        justify-between items-start lg:items-center
                        gap-8">


                {{-- ================================================= --}}
                {{-- HERO CONTENT --}}
                {{-- ================================================= --}}

                <div>

                    <span class="inline-block bg-white/20 backdrop-blur
                                 px-5 py-2 rounded-full
                                 text-sm font-semibold
                                 border border-white/20">

                        🛡️ VolunteerHub Admin Portal

                    </span>


                    <h1 class="text-5xl lg:text-6xl
                               font-black mt-6 leading-tight">

                        Create New Event

                    </h1>


                    <p class="mt-5 text-green-100
                              text-lg max-w-2xl leading-8">

                        Create a new volunteering opportunity
                        and provide your community with a chance
                        to make a positive impact.

                    </p>


                    <div class="flex flex-wrap gap-4 mt-8">

                        {{-- Back to Events --}}

                        <a href="{{ route('admin.events.index') }}"
                           class="bg-yellow-400 hover:bg-yellow-300
                                  text-black px-7 py-3 rounded-xl
                                  font-bold shadow-xl transition
                                  hover:-translate-y-1">

                            ← Back to Events

                        </a>


                        {{-- Dashboard --}}

                        <a href="{{ route('admin.dashboard') }}"
                           class="border border-white/40
                                  px-7 py-3 rounded-xl
                                  hover:bg-white/20 transition">

                            🏠 Dashboard

                        </a>

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- HERO SIDE CARD --}}
                {{-- ================================================= --}}

                <div class="w-full lg:w-80">

                    <div class="bg-white/15 backdrop-blur-xl
                                border border-white/20
                                rounded-[30px] p-7
                                shadow-2xl">

                        <div class="text-center">

                            <div class="w-20 h-20 mx-auto
                                        bg-white rounded-3xl
                                        flex items-center justify-center
                                        text-5xl shadow-xl">

                                📅

                            </div>


                            <h2 class="text-2xl font-black mt-5">

                                Event Creator

                            </h2>


                            <p class="text-green-100 text-sm mt-2">

                                Build meaningful volunteer
                                opportunities

                            </p>

                        </div>


                        {{-- Quick Info --}}

                        <div class="grid grid-cols-2 gap-3 mt-6">

                            <div class="bg-white/10
                                        rounded-2xl p-4 text-center">

                                <p class="text-2xl font-black">

                                    ✨

                                </p>

                                <p class="text-xs text-green-100">

                                    New Event

                                </p>

                            </div>


                            <div class="bg-white/10
                                        rounded-2xl p-4 text-center">

                                <p class="text-2xl font-black">

                                    👥

                                </p>

                                <p class="text-xs text-green-100">

                                    Volunteers

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- HERO BOTTOM INFO --}}
            {{-- ================================================= --}}

            <div class="mt-10 pt-6
                        border-t border-white/20
                        flex flex-wrap gap-6
                        text-sm text-green-50">

                <div class="flex items-center gap-2">

                    <span>📝</span>

                    <span>Add event details</span>

                </div>


                <div class="flex items-center gap-2">

                    <span>📍</span>

                    <span>Set location & venue</span>

                </div>


                <div class="flex items-center gap-2">

                    <span>🕒</span>

                    <span>Schedule your event</span>

                </div>


                <div class="flex items-center gap-2">

                    <span>👥</span>

                    <span>Set volunteer capacity</span>

                </div>

            </div>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================================= --}}

    <div class="max-w-6xl mx-auto px-6 lg:px-8 py-12">


        {{-- ========================================================= --}}
        {{-- SUCCESS MESSAGE --}}
        {{-- ========================================================= --}}

        @if(session('success'))

            <div class="mb-8 bg-green-100
                        border border-green-300
                        text-green-800 rounded-2xl
                        p-5 shadow-lg
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



        {{-- ========================================================= --}}
        {{-- VALIDATION ERRORS --}}
        {{-- ========================================================= --}}

        @if($errors->any())

            <div class="mb-8 bg-red-50
                        border border-red-200
                        text-red-700 rounded-2xl
                        p-5 shadow-lg">

                <div class="flex items-center gap-3 mb-3">

                    <span class="text-2xl">

                        ⚠️

                    </span>

                    <h3 class="font-bold text-lg">

                        Please fix the following errors

                    </h3>

                </div>


                <ul class="list-disc list-inside
                           text-sm space-y-1">

                    @foreach($errors->all() as $error)

                        <li>

                            {{ $error }}

                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        {{-- ========================================================= --}}
        {{-- FORM --}}
        {{-- ========================================================= --}}

        <form action="{{ route('admin.events.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf


            {{-- ===================================================== --}}
            {{-- MAIN FORM CARD --}}
            {{-- ===================================================== --}}

            <div class="bg-white rounded-[35px]
                        shadow-xl
                        border border-gray-100
                        overflow-hidden">


                {{-- ================================================= --}}
                {{-- FORM CARD HEADER --}}
                {{-- ================================================= --}}

                <div class="px-6 md:px-10 py-7
                            bg-gradient-to-r
                            from-green-700
                            via-emerald-600
                            to-teal-500
                            text-white">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-2xl
                                    bg-white/20 backdrop-blur
                                    flex items-center justify-center
                                    text-3xl">

                            ✨

                        </div>


                        <div>

                            <h2 class="text-xl md:text-2xl
                                       font-black">

                                Event Information

                            </h2>


                            <p class="text-green-100
                                      text-sm mt-1">

                                Fill in the details below to create
                                your volunteer event.

                            </p>

                        </div>

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- FORM CONTENT --}}
                {{-- ================================================= --}}

                <div class="p-6 md:p-10 space-y-10">


                    {{-- ================================================= --}}
                    {{-- BASIC INFORMATION --}}
                    {{-- ================================================= --}}

                    <div>

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-10 h-10 rounded-xl
                                        bg-green-100
                                        flex items-center justify-center
                                        text-xl">

                                📝

                            </div>


                            <div>

                                <h3 class="font-black text-lg
                                           text-gray-900">

                                    Basic Information

                                </h3>


                                <p class="text-sm text-gray-500">

                                    Give your event a clear identity.

                                </p>

                            </div>

                        </div>


                        <div class="grid md:grid-cols-2 gap-6">


                            {{-- Event Title --}}

                            <div class="md:col-span-2">

                                <label class="block text-sm
                                              font-bold text-gray-700 mb-2">

                                    Event Title

                                    <span class="text-red-500">*</span>

                                </label>


                                <input
                                    type="text"
                                    name="title"
                                    value="{{ old('title') }}"
                                    placeholder="e.g. Clean City Volunteer Drive"
                                    required
                                    class="w-full px-5 py-3.5
                                           rounded-2xl
                                           border border-gray-200
                                           bg-gray-50
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-green-100
                                           focus:border-green-500
                                           outline-none
                                           transition">

                            </div>



                            {{-- Category --}}

                            <div>

                                <label class="block text-sm
                                              font-bold text-gray-700 mb-2">

                                    Category

                                    <span class="text-red-500">*</span>

                                </label>


                                <select
                                    name="category"
                                    required
                                    class="w-full px-5 py-3.5
                                           rounded-2xl
                                           border border-gray-200
                                           bg-gray-50
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-green-100
                                           focus:border-green-500
                                           outline-none transition">

                                    <option value="">

                                        Select Category

                                    </option>


                                    <option value="Environment"
                                        {{ old('category') == 'Environment' ? 'selected' : '' }}>

                                        🌱 Environment

                                    </option>


                                    <option value="Education"
                                        {{ old('category') == 'Education' ? 'selected' : '' }}>

                                        📚 Education

                                    </option>


                                    <option value="Healthcare"
                                        {{ old('category') == 'Healthcare' ? 'selected' : '' }}>

                                        🏥 Healthcare

                                    </option>


                                    <option value="Community"
                                        {{ old('category') == 'Community' ? 'selected' : '' }}>

                                        🤝 Community

                                    </option>


                                    <option value="Animal Welfare"
                                        {{ old('category') == 'Animal Welfare' ? 'selected' : '' }}>

                                        🐾 Animal Welfare

                                    </option>


                                    <option value="Disaster Relief"
                                        {{ old('category') == 'Disaster Relief' ? 'selected' : '' }}>

                                        🚑 Disaster Relief

                                    </option>


                                    <option value="Other"
                                        {{ old('category') == 'Other' ? 'selected' : '' }}>

                                        ✨ Other

                                    </option>

                                </select>

                            </div>



                            {{-- Status --}}

                            <div>

                                <label class="block text-sm
                                              font-bold text-gray-700 mb-2">

                                    Event Status

                                    <span class="text-red-500">*</span>

                                </label>


                                <select
                                    name="status"
                                    required
                                    class="w-full px-5 py-3.5
                                           rounded-2xl
                                           border border-gray-200
                                           bg-gray-50
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-green-100
                                           focus:border-green-500
                                           outline-none transition">

                                    <option value="Upcoming"
                                        {{ old('status', 'Upcoming') == 'Upcoming' ? 'selected' : '' }}>

                                        🟢 Upcoming

                                    </option>


                                    <option value="Ongoing"
                                        {{ old('status') == 'Ongoing' ? 'selected' : '' }}>

                                        🔵 Ongoing

                                    </option>


                                    <option value="Completed"
                                        {{ old('status') == 'Completed' ? 'selected' : '' }}>

                                        ⚪ Completed

                                    </option>


                                    <option value="Cancelled"
                                        {{ old('status') == 'Cancelled' ? 'selected' : '' }}>

                                        🔴 Cancelled

                                    </option>

                                </select>

                            </div>



                            {{-- Description --}}

                            <div class="md:col-span-2">

                                <label class="block text-sm
                                              font-bold text-gray-700 mb-2">

                                    Event Description

                                    <span class="text-red-500">*</span>

                                </label>


                                <textarea
                                    name="description"
                                    rows="5"
                                    required
                                    placeholder="Describe the purpose, activities and volunteer responsibilities..."
                                    class="w-full px-5 py-4
                                           rounded-2xl
                                           border border-gray-200
                                           bg-gray-50
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-green-100
                                           focus:border-green-500
                                           outline-none
                                           transition
                                           resize-none">{{ old('description') }}</textarea>


                                <p class="text-xs text-gray-400 mt-2">

                                    💡 Keep the description clear and
                                    informative for volunteers.

                                </p>

                            </div>

                        </div>

                    </div>



                    {{-- ================================================= --}}
                    {{-- LOCATION --}}
                    {{-- ================================================= --}}

                    <div class="pt-8 border-t border-gray-100">

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-10 h-10 rounded-xl
                                        bg-blue-100
                                        flex items-center justify-center
                                        text-xl">

                                📍

                            </div>


                            <div>

                                <h3 class="font-black text-lg
                                           text-gray-900">

                                    Event Location

                                </h3>


                                <p class="text-sm text-gray-500">

                                    Tell volunteers where the event
                                    will happen.

                                </p>

                            </div>

                        </div>


                        <div class="grid md:grid-cols-2 gap-6">


                            {{-- City --}}

                            <div>

                                <label class="block text-sm
                                              font-bold text-gray-700 mb-2">

                                    City

                                    <span class="text-red-500">*</span>

                                </label>


                                <input
                                    type="text"
                                    name="city"
                                    value="{{ old('city') }}"
                                    placeholder="e.g. Nashik"
                                    required
                                    class="w-full px-5 py-3.5
                                           rounded-2xl
                                           border border-gray-200
                                           bg-gray-50
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-green-100
                                           focus:border-green-500
                                           outline-none transition">

                            </div>



                            {{-- Venue --}}

                            <div>

                                <label class="block text-sm
                                              font-bold text-gray-700 mb-2">

                                    Venue

                                    <span class="text-red-500">*</span>

                                </label>


                                <input
                                    type="text"
                                    name="venue"
                                    value="{{ old('venue') }}"
                                    placeholder="e.g. City Community Hall"
                                    required
                                    class="w-full px-5 py-3.5
                                           rounded-2xl
                                           border border-gray-200
                                           bg-gray-50
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-green-100
                                           focus:border-green-500
                                           outline-none transition">

                            </div>

                        </div>

                    </div>



                    {{-- ================================================= --}}
                    {{-- DATE & TIME --}}
                    {{-- ================================================= --}}

                    <div class="pt-8 border-t border-gray-100">

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-10 h-10 rounded-xl
                                        bg-purple-100
                                        flex items-center justify-center
                                        text-xl">

                                🕒

                            </div>


                            <div>

                                <h3 class="font-black text-lg
                                           text-gray-900">

                                    Date & Time

                                </h3>


                                <p class="text-sm text-gray-500">

                                    Set the schedule for your
                                    volunteering event.

                                </p>

                            </div>

                        </div>


                        <div class="grid md:grid-cols-3 gap-6">


                            {{-- Event Date --}}

                            <div>

                                <label class="block text-sm
                                              font-bold text-gray-700 mb-2">

                                    Event Date

                                    <span class="text-red-500">*</span>

                                </label>


                                <input
                                    type="date"
                                    name="event_date"
                                    value="{{ old('event_date') }}"
                                    required
                                    class="w-full px-5 py-3.5
                                           rounded-2xl
                                           border border-gray-200
                                           bg-gray-50
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-green-100
                                           focus:border-green-500
                                           outline-none transition">

                            </div>



                            {{-- Start Time --}}

                            <div>

                                <label class="block text-sm
                                              font-bold text-gray-700 mb-2">

                                    Start Time

                                    <span class="text-red-500">*</span>

                                </label>


                                <input
                                    type="time"
                                    name="start_time"
                                    value="{{ old('start_time') }}"
                                    required
                                    class="w-full px-5 py-3.5
                                           rounded-2xl
                                           border border-gray-200
                                           bg-gray-50
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-green-100
                                           focus:border-green-500
                                           outline-none transition">

                            </div>



                            {{-- End Time --}}

                            <div>

                                <label class="block text-sm
                                              font-bold text-gray-700 mb-2">

                                    End Time

                                    <span class="text-red-500">*</span>

                                </label>


                                <input
                                    type="time"
                                    name="end_time"
                                    value="{{ old('end_time') }}"
                                    required
                                    class="w-full px-5 py-3.5
                                           rounded-2xl
                                           border border-gray-200
                                           bg-gray-50
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-green-100
                                           focus:border-green-500
                                           outline-none transition">

                            </div>

                        </div>

                    </div>



                    {{-- ================================================= --}}
                    {{-- VOLUNTEER CAPACITY --}}
                    {{-- ================================================= --}}

                    <div class="pt-8 border-t border-gray-100">

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-10 h-10 rounded-xl
                                        bg-orange-100
                                        flex items-center justify-center
                                        text-xl">

                                👥

                            </div>


                            <div>

                                <h3 class="font-black text-lg
                                           text-gray-900">

                                    Volunteer Capacity

                                </h3>


                                <p class="text-sm text-gray-500">

                                    Define how many volunteers can
                                    join this event.

                                </p>

                            </div>

                        </div>


                        <div class="max-w-md">

                            <label class="block text-sm
                                          font-bold text-gray-700 mb-2">

                                Maximum Volunteers

                                <span class="text-red-500">*</span>

                            </label>


                            <div class="relative">

                                <span class="absolute left-5 top-1/2
                                             -translate-y-1/2
                                             text-gray-400">

                                    👥

                                </span>


                                <input
                                    type="number"
                                    name="capacity"
                                    value="{{ old('capacity') }}"
                                    min="1"
                                    placeholder="e.g. 50"
                                    required
                                    class="w-full pl-12 pr-5 py-3.5
                                           rounded-2xl
                                           border border-gray-200
                                           bg-gray-50
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-green-100
                                           focus:border-green-500
                                           outline-none transition">

                            </div>


                            <p class="text-xs text-gray-400 mt-2">

                                New events start with
                                <strong>0 filled slots</strong>.

                            </p>

                        </div>

                    </div>



                    {{-- ================================================= --}}
                    {{-- EVENT BANNER --}}
                    {{-- ================================================= --}}

                    <div class="pt-8 border-t border-gray-100">

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-10 h-10 rounded-xl
                                        bg-pink-100
                                        flex items-center justify-center
                                        text-xl">

                                🖼️

                            </div>


                            <div>

                                <h3 class="font-black text-lg
                                           text-gray-900">

                                    Event Banner

                                </h3>


                                <p class="text-sm text-gray-500">

                                    Add an attractive image for
                                    your event.

                                </p>

                            </div>

                        </div>


                        <div class="grid md:grid-cols-2
                                    gap-8 items-center">


                            {{-- Upload Box --}}

                            <div>

                                <label
                                    for="banner"
                                    class="flex flex-col
                                           items-center
                                           justify-center
                                           w-full h-52
                                           rounded-3xl
                                           border-2
                                           border-dashed
                                           border-green-200
                                           bg-green-50/50
                                           hover:bg-green-50
                                           hover:border-green-400
                                           cursor-pointer
                                           transition">

                                    <div class="text-5xl mb-3">

                                        🖼️

                                    </div>


                                    <p class="font-bold text-gray-700">

                                        Click to upload banner

                                    </p>


                                    <p class="text-xs
                                              text-gray-400 mt-1">

                                        JPG, JPEG or PNG • Max 2MB

                                    </p>


                                    <input
                                        id="banner"
                                        type="file"
                                        name="banner"
                                        accept="image/png,image/jpeg"
                                        class="hidden">

                                </label>

                            </div>



                            {{-- Preview --}}

                            <div>

                                <div id="previewContainer"
                                     class="hidden">

                                    <p class="text-sm
                                              font-bold
                                              text-gray-700 mb-3">

                                        Banner Preview

                                    </p>


                                    <img
                                        id="bannerPreview"
                                        src=""
                                        alt="Banner Preview"
                                        class="w-full h-52
                                               object-cover
                                               rounded-3xl
                                               shadow-lg
                                               border
                                               border-gray-100">

                                </div>


                                <div id="previewPlaceholder"
                                     class="h-52
                                            rounded-3xl
                                            bg-gradient-to-br
                                            from-green-100
                                            to-blue-100
                                            flex flex-col
                                            items-center
                                            justify-center
                                            text-gray-500">

                                    <span class="text-4xl mb-2">

                                        📸

                                    </span>


                                    <span class="font-semibold">

                                        Image preview will appear here

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- ================================================= --}}
                    {{-- INFORMATION BOX --}}
                    {{-- ================================================= --}}

                    <div class="rounded-2xl
                                bg-blue-50
                                border border-blue-100
                                p-5">

                        <div class="flex gap-3">

                            <div class="text-xl">

                                💡

                            </div>


                            <div>

                                <h4 class="font-bold text-blue-800">

                                    Before publishing

                                </h4>


                                <p class="text-sm
                                          text-blue-700 mt-1">

                                    Make sure the event information,
                                    location, date, time and volunteer
                                    capacity are correct.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- FORM FOOTER --}}
                {{-- ================================================= --}}

                <div class="px-6 md:px-10 py-6
                            bg-gray-50
                            border-t border-gray-100
                            flex flex-col sm:flex-row
                            justify-between items-center
                            gap-4">


                    <p class="text-sm text-gray-500">

                        <span class="text-red-500">*</span>

                        Required fields

                    </p>


                    <div class="flex gap-3
                                w-full sm:w-auto">


                        {{-- Cancel --}}

                        <a href="{{ route('admin.events.index') }}"
                           class="flex-1 sm:flex-none
                                  px-6 py-3.5
                                  rounded-xl
                                  bg-white
                                  border border-gray-200
                                  text-gray-700
                                  font-bold
                                  text-center
                                  hover:bg-gray-100
                                  transition">

                            Cancel

                        </a>


                        {{-- Submit --}}

                        <button
                            type="submit"
                            class="flex-1 sm:flex-none
                                   px-8 py-3.5
                                   rounded-xl
                                   bg-gradient-to-r
                                   from-green-600
                                   to-emerald-500
                                   text-white
                                   font-black
                                   shadow-lg
                                   shadow-green-200
                                   hover:from-green-700
                                   hover:to-emerald-600
                                   hover:-translate-y-0.5
                                   transition">

                            🚀 Create Event

                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>



{{-- ============================================================= --}}
{{-- BANNER PREVIEW JAVASCRIPT --}}
{{-- ============================================================= --}}

<script>

const bannerInput =
    document.getElementById('banner');

const bannerPreview =
    document.getElementById('bannerPreview');

const previewContainer =
    document.getElementById('previewContainer');

const previewPlaceholder =
    document.getElementById('previewPlaceholder');


if (bannerInput) {

    bannerInput.addEventListener('change', function () {

        const file = this.files[0];


        if (file) {

            const reader = new FileReader();


            reader.onload = function (e) {

                bannerPreview.src =
                    e.target.result;

                previewContainer.classList.remove('hidden');

                previewPlaceholder.classList.add('hidden');

            };


            reader.readAsDataURL(file);

        }

    });

}

</script>

@endsection