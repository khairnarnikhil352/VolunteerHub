@extends('layouts.student')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-emerald-50">

    {{-- =========================================================
         HERO SECTION
    ========================================================== --}}
    <section class="relative overflow-hidden rounded-b-[45px] bg-gradient-to-br from-green-800 via-emerald-700 to-teal-600 text-white">

        {{-- Background Decorations --}}
        <div class="absolute -top-32 -right-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-20 w-96 h-96 bg-emerald-300/10 rounded-full blur-3xl"></div>

        <div class="absolute top-10 right-1/3 w-20 h-20 bg-white/5 rounded-2xl rotate-12"></div>
        <div class="absolute bottom-10 left-1/3 w-14 h-14 bg-white/5 rounded-full"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-14 relative z-10">

            <div class="flex flex-col lg:flex-row items-center justify-between gap-10">

                {{-- Hero Text --}}
                <div class="text-center lg:text-left">

                    <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-md border border-white/20 px-5 py-2 rounded-full text-sm font-semibold shadow-lg">

                        ✏️

                        <span>
                            VolunteerHub Profile
                        </span>

                    </div>

                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black tracking-tight mt-5">

                        Edit Your Profile

                    </h1>

                    <p class="mt-4 text-green-100 text-base md:text-lg max-w-xl">

                        Keep your volunteer information updated and make your VolunteerHub profile complete.

                    </p>

                    {{-- Small Status --}}
                    <div class="flex flex-wrap justify-center lg:justify-start gap-3 mt-7">

                        <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-4 py-2 rounded-xl text-sm">

                            🟢 Active Volunteer

                        </span>

                        <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-4 py-2 rounded-xl text-sm">

                            🛡️ Secure Profile

                        </span>

                    </div>

                </div>


                {{-- Hero Profile Photo --}}
                <div class="relative">

                    <div class="absolute inset-0 bg-white/20 rounded-full blur-2xl scale-110"></div>

                    <div class="relative bg-white/10 backdrop-blur-md p-2 rounded-full border border-white/30 shadow-2xl">

                        @if(Auth::user()->profile_photo)

                            <img id="heroPhoto"
                                 src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                 class="w-36 h-36 md:w-44 md:h-44 rounded-full object-cover border-4 border-white shadow-2xl">

                        @else

                            <img id="heroPhoto"
                                 src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ffffff&color=16a34a&size=256"
                                 class="w-36 h-36 md:w-44 md:h-44 rounded-full object-cover border-4 border-white shadow-2xl">

                        @endif

                    </div>

                    <div class="absolute bottom-3 right-2 bg-white text-green-700 w-11 h-11 rounded-full flex items-center justify-center shadow-xl border-4 border-green-700">

                        📷

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
         MAIN CONTENT
    ========================================================== --}}
    <section class="max-w-6xl mx-auto px-5 lg:px-8 py-10">


        {{-- Validation Errors --}}
        @if ($errors->any())

            <div class="mb-8 bg-red-50 border border-red-200 rounded-3xl p-6 shadow-sm">

                <div class="flex items-start gap-4">

                    <div class="w-11 h-11 bg-red-100 rounded-xl flex items-center justify-center text-xl">
                        ⚠️
                    </div>

                    <div>

                        <h3 class="font-black text-red-700 text-lg">
                            Please check the following
                        </h3>

                        <ul class="mt-2 text-sm text-red-600 space-y-1 list-disc ml-5">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif


        {{-- Success Message --}}
        @if(session('success'))

            <div class="mb-8 bg-emerald-50 border border-emerald-200 rounded-3xl p-5 shadow-sm">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center">
                        ✅
                    </div>

                    <div>

                        <p class="font-bold text-emerald-700">
                            {{ session('success') }}
                        </p>

                        <p class="text-sm text-emerald-600">
                            Your profile has been updated successfully.
                        </p>

                    </div>

                </div>

            </div>

        @endif


        {{-- =====================================================
             PROFILE CARD
        ====================================================== --}}
        <div class="bg-white rounded-[35px] shadow-xl shadow-green-100/40 border border-gray-100 overflow-hidden">


            {{-- Card Header --}}
            <div class="px-6 md:px-10 py-7 border-b border-gray-100 bg-gradient-to-r from-white to-green-50">

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-5">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-green-600 to-emerald-500 text-white flex items-center justify-center text-2xl shadow-lg">

                            👤

                        </div>

                        <div>

                            <h2 class="text-2xl md:text-3xl font-black text-gray-800">
                                Personal Information
                            </h2>

                            <p class="text-gray-500 mt-1 text-sm">
                                Update your basic volunteer information
                            </p>

                        </div>

                    </div>

                    <div class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-sm font-bold">

                        ✨ Member Profile

                    </div>

                </div>

            </div>


            {{-- Form --}}
            <form action="{{ route('profile.update') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="p-6 md:p-10">

                @csrf
                @method('PUT')


                {{-- =================================================
                     PROFILE PHOTO
                ================================================== --}}
                <div class="mb-10">

                    <div class="flex items-center gap-3 mb-5">

                        <span class="w-9 h-9 bg-green-100 rounded-xl flex items-center justify-center">
                            📷
                        </span>

                        <div>

                            <h3 class="text-xl font-black text-gray-800">
                                Profile Photo
                            </h3>

                            <p class="text-sm text-gray-500">
                                Upload a clear photo for your volunteer profile
                            </p>

                        </div>

                    </div>


                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-100 rounded-3xl p-6">

                        <div class="flex flex-col sm:flex-row items-center gap-6">

                            {{-- Photo Preview --}}
                            <div class="relative">

                                @if(Auth::user()->profile_photo)

                                    <img id="photoPreview"
                                         src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                         class="w-28 h-28 rounded-full object-cover border-4 border-white shadow-xl ring-4 ring-green-200">

                                @else

                                    <img id="photoPreview"
                                         src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=16a34a&color=fff&size=256"
                                         class="w-28 h-28 rounded-full object-cover border-4 border-white shadow-xl ring-4 ring-green-200">

                                @endif

                                <span class="absolute bottom-0 right-0 w-9 h-9 bg-green-600 text-white rounded-full flex items-center justify-center border-4 border-white shadow-md">
                                    📷
                                </span>

                            </div>


                            {{-- Upload --}}
                            <div class="flex-1 w-full">

                                <label class="block text-gray-700 font-bold mb-2">
                                    Choose New Photo
                                </label>

                                <input type="file"
                                       id="profilePhotoInput"
                                       name="profile_photo"
                                       accept="image/png,image/jpeg,image/jpg,image/webp"
                                       class="w-full bg-white border border-gray-200 rounded-2xl p-3.5 text-sm text-gray-600 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">

                                <p class="text-xs text-gray-500 mt-2">
                                    JPG, JPEG, PNG or WEBP • Maximum 2MB
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     BASIC INFORMATION
                ================================================== --}}
                <div class="grid md:grid-cols-2 gap-6">


                    {{-- Name --}}
                    <div>

                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            👤 Full Name
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name', Auth::user()->name) }}"
                               required
                               class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-5 py-4 text-gray-800 font-medium focus:bg-white focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition">

                    </div>


                    {{-- Email --}}
                    <div>

                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            📧 Email Address
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ old('email', Auth::user()->email) }}"
                               required
                               class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-5 py-4 text-gray-800 font-medium focus:bg-white focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition">

                    </div>


                    {{-- Phone --}}
                    <div>

                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            📱 Phone Number
                        </label>

                        <input type="text"
                               name="phone"
                               value="{{ old('phone', Auth::user()->phone) }}"
                               class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-5 py-4 text-gray-800 font-medium focus:bg-white focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                               placeholder="Enter your phone number">

                    </div>


                    {{-- DOB --}}
                    <div>

                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            🎂 Date of Birth
                        </label>

                        <input type="date"
                               name="dob"
                               value="{{ old('dob', Auth::user()->dob) }}"
                               class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-5 py-4 text-gray-800 font-medium focus:bg-white focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition">

                    </div>


                    {{-- Gender --}}
                    <div class="md:col-span-2">

                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            ⚧ Gender
                        </label>

                        <select name="gender"
                                class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-5 py-4 text-gray-800 font-medium focus:bg-white focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition">

                            <option value="">
                                Select Gender
                            </option>

                            <option value="Male"
                                {{ old('gender', Auth::user()->gender) == 'Male' ? 'selected' : '' }}>
                                Male
                            </option>

                            <option value="Female"
                                {{ old('gender', Auth::user()->gender) == 'Female' ? 'selected' : '' }}>
                                Female
                            </option>

                            <option value="Other"
                                {{ old('gender', Auth::user()->gender) == 'Other' ? 'selected' : '' }}>
                                Other
                            </option>

                        </select>

                    </div>

                </div>


                {{-- =================================================
                     PASSWORD SECTION
                ================================================== --}}
                <div class="mt-10">

                    <div class="relative overflow-hidden bg-gradient-to-br from-slate-50 to-green-50 border border-green-100 rounded-3xl p-6 md:p-8">

                        <div class="absolute -right-10 -top-10 w-32 h-32 bg-green-100 rounded-full blur-2xl"></div>

                        <div class="relative z-10">

                            <div class="flex items-center gap-4 mb-6">

                                <div class="w-12 h-12 rounded-2xl bg-green-600 text-white flex items-center justify-center text-xl shadow-lg">
                                    🔐
                                </div>

                                <div>

                                    <h3 class="text-xl font-black text-gray-800">
                                        Change Password
                                    </h3>

                                    <p class="text-sm text-gray-500">
                                        Update your password securely
                                    </p>

                                </div>

                            </div>


                            <div class="grid md:grid-cols-2 gap-6">


                                {{-- New Password --}}
                                <div>

                                    <label class="block text-sm font-bold text-gray-700 mb-2">
                                        New Password
                                    </label>

                                    <div class="relative">

                                        <input type="password"
                                               id="password"
                                               name="password"
                                               minlength="8"
                                               class="w-full bg-white border border-gray-200 rounded-2xl px-5 py-4 pr-14 text-gray-800 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                                               placeholder="Minimum 8 characters">

                                        <button type="button"
                                                onclick="togglePassword('password', 'passwordIcon')"
                                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-green-600">

                                            <span id="passwordIcon">
                                                👁️
                                            </span>

                                        </button>

                                    </div>

                                </div>


                                {{-- Confirm Password --}}
                                <div>

                                    <label class="block text-sm font-bold text-gray-700 mb-2">
                                        Confirm New Password
                                    </label>

                                    <div class="relative">

                                        <input type="password"
                                               id="password_confirmation"
                                               name="password_confirmation"
                                               minlength="8"
                                               class="w-full bg-white border border-gray-200 rounded-2xl px-5 py-4 pr-14 text-gray-800 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                                               placeholder="Re-enter your password">

                                        <button type="button"
                                                onclick="togglePassword('password_confirmation', 'confirmPasswordIcon')"
                                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-green-600">

                                            <span id="confirmPasswordIcon">
                                                👁️
                                            </span>

                                        </button>

                                    </div>

                                </div>

                            </div>


                            <div class="mt-5 flex items-center gap-3 bg-white/70 border border-green-100 rounded-2xl px-4 py-3">

                                <span class="text-lg">
                                    🛡️
                                </span>

                                <p class="text-sm text-gray-600">
                                    Leave both password fields empty if you don't want to change your password.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     PROFILE PREVIEW
                ================================================== --}}
                <div class="mt-10">

                    <div class="flex items-center gap-3 mb-5">

                        <span class="w-9 h-9 bg-emerald-100 rounded-xl flex items-center justify-center">
                            ✨
                        </span>

                        <div>

                            <h3 class="text-xl font-black text-gray-800">
                                Profile Preview
                            </h3>

                            <p class="text-sm text-gray-500">
                                This is how your profile currently looks
                            </p>

                        </div>

                    </div>


                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500 p-6 md:p-8 text-white shadow-xl">

                        <div class="absolute -right-16 -top-16 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>

                        <div class="relative z-10 flex flex-col sm:flex-row items-center gap-6">

                            <img id="previewCardPhoto"
                                 src="{{ Auth::user()->profile_photo
                                    ? asset('storage/' . Auth::user()->profile_photo)
                                    : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=ffffff&color=16a34a&size=256' }}"
                                 class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-xl">

                            <div class="text-center sm:text-left">

                                <h4 class="text-2xl font-black">
                                    {{ Auth::user()->name }}
                                </h4>

                                <p class="text-green-100 mt-1">
                                    {{ Auth::user()->email }}
                                </p>

                                <div class="flex flex-wrap justify-center sm:justify-start gap-2 mt-3">

                                    <span class="bg-white/15 border border-white/20 px-3 py-1 rounded-full text-xs font-bold">
                                        🌿 VolunteerHub Member
                                    </span>

                                    <span class="bg-white/15 border border-white/20 px-3 py-1 rounded-full text-xs font-bold">
                                        🟢 Active
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     ACTION BUTTONS
                ================================================== --}}
                <div class="mt-10 pt-8 border-t border-gray-100 flex flex-col sm:flex-row gap-4 justify-between">

                    <a href="{{ route('profile') }}"
                       class="order-2 sm:order-1 inline-flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-7 py-4 rounded-2xl font-bold transition">

                        ←

                        <span>
                            Cancel
                        </span>

                    </a>


                    <button type="submit"
                            class="order-1 sm:order-2 inline-flex items-center justify-center gap-3 bg-gradient-to-r from-green-600 to-emerald-500 hover:from-green-700 hover:to-emerald-600 text-white px-9 py-4 rounded-2xl font-black shadow-xl shadow-green-200 hover:shadow-2xl hover:-translate-y-0.5 transition">

                        💾

                        <span>
                            Save Changes
                        </span>

                    </button>

                </div>

            </form>

        </div>


        {{-- Bottom Security Note --}}
        <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-2 text-sm text-gray-500">

            <span>🔒</span>

            <span>
                Your profile information is securely managed by VolunteerHub.
            </span>

        </div>

    </section>

</div>


{{-- =============================================================
     LIVE PHOTO PREVIEW + PASSWORD TOGGLE
============================================================= --}}
<script>

    // Profile Photo Preview
    document.getElementById('profilePhotoInput').addEventListener('change', function(event) {

        const file = event.target.files[0];

        if (file) {

            const reader = new FileReader();

            reader.onload = function(e) {

                document.getElementById('photoPreview').src = e.target.result;

                document.getElementById('heroPhoto').src = e.target.result;

                document.getElementById('previewCardPhoto').src = e.target.result;

            };

            reader.readAsDataURL(file);
        }

    });


    // Password Show / Hide
    function togglePassword(inputId, iconId) {

        const input = document.getElementById(inputId);

        const icon = document.getElementById(iconId);

        if (input.type === 'password') {

            input.type = 'text';

            icon.textContent = '🙈';

        } else {

            input.type = 'password';

            icon.textContent = '👁️';

        }

    }

</script>

@endsection