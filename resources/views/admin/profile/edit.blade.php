@extends('layouts.admin')

@section('content')

@php
    $profileImage = $user->profile_photo
        ? asset('storage/' . $user->profile_photo)
        : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=ffffff&color=16a34a&size=256';
@endphp


<div class="min-h-screen bg-slate-50">


    {{-- ========================================================= --}}
    {{-- PREMIUM HERO SECTION --}}
    {{-- ========================================================= --}}

    <section class="relative overflow-hidden
                    bg-gradient-to-br
                    from-green-800 via-emerald-700 to-teal-600
                    text-white">

        {{-- Decorative Background --}}
        <div class="absolute -top-32 -right-32
                    w-[450px] h-[450px]
                    rounded-full bg-white/10 blur-3xl">
        </div>

        <div class="absolute -bottom-40 -left-32
                    w-[500px] h-[500px]
                    rounded-full bg-teal-300/10 blur-3xl">
        </div>

        <div class="absolute top-20 left-1/2
                    w-40 h-40
                    rounded-full bg-emerald-300/10 blur-2xl">
        </div>

        {{-- Dot Pattern --}}
        <div class="absolute inset-0 opacity-[0.05]"
             style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 24px 24px;">
        </div>


        <div class="relative z-10
                    max-w-7xl mx-auto
                    px-6 lg:px-8
                    py-12 md:py-16">


            {{-- Breadcrumb --}}
            <div class="flex items-center gap-2
                        text-sm text-green-100 mb-8">

                <a href="{{ route('admin.dashboard') }}"
                   class="hover:text-white transition">

                    Dashboard

                </a>

                <span>/</span>

                <a href="{{ route('admin.profile.show') }}"
                   class="hover:text-white transition">

                    Profile

                </a>

                <span>/</span>

                <span class="text-white font-semibold">

                    Edit

                </span>

            </div>



            <div class="flex flex-col
                        lg:flex-row
                        items-center
                        justify-between
                        gap-10">


                {{-- HERO CONTENT --}}
                <div class="flex-1">


                    <div class="inline-flex items-center gap-2
                                bg-white/10
                                backdrop-blur-md
                                border border-white/20
                                px-5 py-2
                                rounded-full
                                text-sm font-semibold
                                shadow-lg">

                        <span class="w-2 h-2
                                     bg-green-300
                                     rounded-full
                                     animate-pulse">
                        </span>

                        VolunteerHub • Admin Portal

                    </div>


                    <h1 class="text-4xl md:text-5xl lg:text-6xl
                               font-black
                               tracking-tight
                               mt-6">

                        Edit Admin Profile

                    </h1>


                    <p class="mt-5
                              text-base md:text-lg
                              text-green-100
                              max-w-2xl
                              leading-8">

                        Update your administrator information,
                        profile photo and password securely
                        from your VolunteerHub account.

                    </p>


                    <div class="flex flex-wrap gap-4 mt-8">


                        <a href="{{ route('admin.profile.show') }}"
                           class="inline-flex items-center gap-2
                                  bg-white
                                  text-green-700
                                  px-6 py-3.5
                                  rounded-2xl
                                  font-bold
                                  shadow-xl
                                  hover:bg-green-50
                                  hover:-translate-y-1
                                  transition">

                            👤

                            View Profile

                        </a>


                        <a href="{{ route('admin.dashboard') }}"
                           class="inline-flex items-center gap-2
                                  bg-white/10
                                  backdrop-blur-md
                                  border border-white/20
                                  px-6 py-3.5
                                  rounded-2xl
                                  font-bold
                                  hover:bg-white/20
                                  transition">

                            🏠

                            Dashboard

                        </a>


                    </div>

                </div>



                {{-- HERO PROFILE PHOTO --}}
                <div class="relative shrink-0">


                    <div class="absolute inset-0
                                bg-white/20
                                rounded-full
                                blur-3xl
                                scale-110">
                    </div>


                    <div class="relative
                                p-2
                                rounded-full
                                bg-white/10
                                backdrop-blur-md
                                border border-white/30
                                shadow-2xl">

                        <img id="heroPhoto"
                             src="{{ $profileImage }}"
                             alt="{{ $user->name }}"
                             class="w-36 h-36 md:w-44 md:h-44
                                    rounded-full
                                    object-cover
                                    border-4 border-white">

                    </div>


                    <div class="absolute
                                bottom-1 right-1
                                w-12 h-12
                                rounded-full
                                bg-white
                                text-green-700
                                flex items-center
                                justify-center
                                shadow-xl
                                border-4 border-green-700">

                        📷

                    </div>


                </div>


            </div>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================================= --}}

    <div class="max-w-6xl mx-auto
                px-6 lg:px-8
                -mt-8
                relative z-20
                pb-14">


        {{-- ===================================================== --}}
        {{-- MAIN FORM CARD --}}
        {{-- ===================================================== --}}

        <div class="bg-white
                    rounded-[32px]
                    border border-slate-200
                    shadow-2xl
                    overflow-hidden">


            {{-- FORM HEADER --}}
            <div class="relative overflow-hidden
                        bg-gradient-to-r
                        from-green-700
                        via-emerald-600
                        to-teal-500
                        px-7 md:px-9
                        py-7
                        text-white">


                <div class="absolute
                            -right-12 -top-20
                            w-48 h-48
                            rounded-full
                            bg-white/10">
                </div>


                <div class="relative z-10
                            flex items-center gap-4">


                    <div class="w-14 h-14
                                rounded-2xl
                                bg-white/15
                                backdrop-blur-md
                                border border-white/20
                                flex items-center
                                justify-center
                                text-2xl">

                        ✏️

                    </div>


                    <div>

                        <h2 class="text-2xl md:text-3xl
                                   font-black">

                            Update Administrator Information

                        </h2>


                        <p class="text-green-100
                                  text-sm md:text-base
                                  mt-1">

                            Keep your VolunteerHub administrator
                            information accurate and up to date.

                        </p>

                    </div>


                </div>

            </div>



            {{-- FORM --}}
            <form action="{{ route('admin.profile.update') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="p-6 md:p-9">

                @csrf

                @method('PUT')



                {{-- ================================================= --}}
                {{-- VALIDATION ERRORS --}}
                {{-- ================================================= --}}

                @if($errors->any())

                    <div class="mb-8
                                rounded-2xl
                                border border-red-200
                                bg-red-50
                                p-5">

                        <div class="flex items-start gap-3">

                            <div class="text-xl">
                                ⚠️
                            </div>

                            <div>

                                <h3 class="font-black text-red-700">
                                    Please check the following:
                                </h3>

                                <ul class="mt-2
                                           text-sm
                                           text-red-600
                                           space-y-1">

                                    @foreach($errors->all() as $error)

                                        <li>
                                            • {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        </div>

                    </div>

                @endif



                {{-- ================================================= --}}
                {{-- PROFILE PHOTO SECTION --}}
                {{-- ================================================= --}}

                <div class="rounded-[28px]
                            bg-gradient-to-br
                            from-green-50
                            via-white
                            to-emerald-50
                            border border-green-100
                            p-6 md:p-7
                            mb-9">


                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-11 h-11
                                    rounded-xl
                                    bg-green-600
                                    text-white
                                    flex items-center
                                    justify-center
                                    shadow-lg">

                            📷

                        </div>


                        <div>

                            <h3 class="text-xl
                                       font-black
                                       text-slate-800">

                                Profile Photo

                            </h3>


                            <p class="text-sm
                                      text-slate-500
                                      mt-1">

                                Choose a professional photo
                                for your administrator profile.

                            </p>

                        </div>

                    </div>



                    <div class="flex flex-col
                                md:flex-row
                                items-center
                                gap-7">


                        {{-- PHOTO PREVIEW --}}
                        <div class="relative shrink-0">


                            <div class="absolute inset-0
                                        bg-green-200
                                        rounded-full
                                        blur-xl
                                        opacity-50">
                            </div>


                            <img id="photoPreview"
                                 src="{{ $profileImage }}"
                                 alt="{{ $user->name }}"
                                 class="relative
                                        w-32 h-32
                                        md:w-36 md:h-36
                                        rounded-full
                                        object-cover
                                        border-4 border-white
                                        shadow-xl
                                        ring-4 ring-green-200">


                            <div class="absolute
                                        bottom-0 right-0
                                        w-10 h-10
                                        bg-green-600
                                        text-white
                                        rounded-full
                                        flex items-center
                                        justify-center
                                        border-4 border-white
                                        shadow-lg">

                                ✓

                            </div>

                        </div>



                        {{-- UPLOAD --}}
                        <div class="flex-1 w-full">


                            <label class="block
                                          text-sm
                                          font-black
                                          text-slate-700
                                          mb-3">

                                Upload New Profile Photo

                            </label>


                            <label for="profilePhotoInput"
                                   class="group
                                          flex flex-col
                                          items-center
                                          justify-center
                                          w-full
                                          min-h-[150px]
                                          rounded-2xl
                                          border-2
                                          border-dashed
                                          border-green-200
                                          bg-white
                                          cursor-pointer
                                          hover:border-green-400
                                          hover:bg-green-50/50
                                          transition">


                                <div class="w-12 h-12
                                            rounded-xl
                                            bg-green-100
                                            text-green-700
                                            flex items-center
                                            justify-center
                                            text-xl
                                            group-hover:scale-110
                                            transition">

                                    ⬆️

                                </div>


                                <p class="font-bold
                                          text-slate-700
                                          mt-3">

                                    Click to upload photo

                                </p>


                                <p class="text-xs
                                          text-slate-400
                                          mt-1">

                                    PNG, JPG, JPEG or WEBP •
                                    Maximum 2MB

                                </p>


                            </label>


                            <input type="file"
                                   name="profile_photo"
                                   id="profilePhotoInput"
                                   accept="image/png,image/jpeg,image/jpg,image/webp"
                                   class="hidden">


                            <p id="fileName"
                               class="text-xs
                                      text-green-600
                                      font-semibold
                                      mt-3
                                      hidden">
                            </p>

                        </div>

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- PERSONAL INFORMATION --}}
                {{-- ================================================= --}}

                <div class="mb-9">


                    <div class="flex items-center
                                justify-between
                                mb-6">


                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11
                                        rounded-xl
                                        bg-emerald-100
                                        text-emerald-700
                                        flex items-center
                                        justify-center">

                                👤

                            </div>


                            <div>

                                <h3 class="text-xl
                                           font-black
                                           text-slate-800">

                                    Personal Information

                                </h3>


                                <p class="text-sm
                                          text-slate-500">

                                    Update your basic account details.

                                </p>

                            </div>

                        </div>


                        <span class="hidden sm:inline-flex
                                     px-3 py-1.5
                                     rounded-full
                                     bg-green-50
                                     text-green-700
                                     text-xs
                                     font-bold">

                            Required Details

                        </span>

                    </div>



                    <div class="grid md:grid-cols-2 gap-6">


                        {{-- NAME --}}
                        <div>

                            <label for="name"
                                   class="premium-label">

                                <span>👤</span>

                                Full Name

                            </label>


                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name', $user->name) }}"
                                   placeholder="Enter your full name"
                                   class="premium-input
                                          @error('name') border-red-400 @enderror">


                            @error('name')

                                <p class="field-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>



                        {{-- EMAIL --}}
                        <div>

                            <label for="email"
                                   class="premium-label">

                                <span>📧</span>

                                Email Address

                            </label>


                            <input type="email"
                                   id="email"
                                   name="email"
                                   value="{{ old('email', $user->email) }}"
                                   placeholder="Enter email address"
                                   class="premium-input
                                          @error('email') border-red-400 @enderror">


                            @error('email')

                                <p class="field-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>



                        {{-- PHONE --}}
                        <div>

                            <label for="phone"
                                   class="premium-label">

                                <span>📱</span>

                                Phone Number

                            </label>


                            <input type="text"
                                   id="phone"
                                   name="phone"
                                   value="{{ old('phone', $user->phone) }}"
                                   placeholder="Enter 10 digit phone number"
                                   maxlength="10"
                                   class="premium-input
                                          @error('phone') border-red-400 @enderror">


                            @error('phone')

                                <p class="field-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>



                        {{-- DOB --}}
                        <div>

                            <label for="dob"
                                   class="premium-label">

                                <span>🎂</span>

                                Date of Birth

                            </label>


                            <input type="date"
                                   id="dob"
                                   name="dob"
                                   value="{{ old('dob', $user->dob) }}"
                                   class="premium-input
                                          @error('dob') border-red-400 @enderror">


                            @error('dob')

                                <p class="field-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>



                        {{-- GENDER --}}
                        <div class="md:col-span-2">

                            <label for="gender"
                                   class="premium-label">

                                <span>⚧️</span>

                                Gender

                            </label>


                            <select id="gender"
                                    name="gender"
                                    class="premium-input
                                           @error('gender') border-red-400 @enderror">

                                <option value="">
                                    Select Gender
                                </option>

                                <option value="Male"
                                    {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>

                                    Male

                                </option>

                                <option value="Female"
                                    {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>

                                    Female

                                </option>

                                <option value="Other"
                                    {{ old('gender', $user->gender) == 'Other' ? 'selected' : '' }}>

                                    Other

                                </option>

                            </select>


                            @error('gender')

                                <p class="field-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- PASSWORD SECTION --}}
                {{-- ================================================= --}}

                <div id="password"
                     class="rounded-[28px]
                            border border-emerald-100
                            bg-gradient-to-br
                            from-slate-50
                            via-white
                            to-green-50
                            p-6 md:p-7">


                    <div class="flex items-start
                                gap-4 mb-7">


                        <div class="w-12 h-12
                                    rounded-2xl
                                    bg-gradient-to-br
                                    from-green-600
                                    to-emerald-600
                                    text-white
                                    flex items-center
                                    justify-center
                                    text-xl
                                    shadow-lg
                                    shrink-0">

                            🔒

                        </div>


                        <div>

                            <h3 class="text-xl md:text-2xl
                                       font-black
                                       text-slate-800">

                                Change Password

                            </h3>


                            <p class="text-sm
                                      text-slate-500
                                      mt-1">

                                Update your administrator password
                                to keep your account secure.

                            </p>

                        </div>

                    </div>



                    <div class="grid md:grid-cols-2 gap-6">


                        {{-- NEW PASSWORD --}}
                        <div>

                            <label for="passwordInput"
                                   class="premium-label">

                                <span>🔑</span>

                                New Password

                            </label>


                            <div class="relative">

                                <input type="password"
                                       id="passwordInput"
                                       name="password"
                                       placeholder="Minimum 8 characters"
                                       class="premium-input pr-14
                                              @error('password') border-red-400 @enderror">


                                <button type="button"
                                        onclick="togglePassword('passwordInput', 'passwordIcon')"
                                        class="absolute right-4 top-1/2
                                               -translate-y-1/2
                                               text-slate-400
                                               hover:text-green-600
                                               transition">

                                    <span id="passwordIcon">
                                        👁️
                                    </span>

                                </button>

                            </div>


                            @error('password')

                                <p class="field-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>



                        {{-- CONFIRM PASSWORD --}}
                        <div>

                            <label for="passwordConfirmation"
                                   class="premium-label">

                                <span>🔐</span>

                                Confirm Password

                            </label>


                            <div class="relative">

                                <input type="password"
                                       id="passwordConfirmation"
                                       name="password_confirmation"
                                       placeholder="Confirm new password"
                                       class="premium-input pr-14">


                                <button type="button"
                                        onclick="togglePassword('passwordConfirmation', 'confirmIcon')"
                                        class="absolute right-4 top-1/2
                                               -translate-y-1/2
                                               text-slate-400
                                               hover:text-green-600
                                               transition">

                                    <span id="confirmIcon">
                                        👁️
                                    </span>

                                </button>

                            </div>

                        </div>


                    </div>



                    {{-- SECURITY INFO --}}
                    <div class="mt-6
                                rounded-2xl
                                bg-white
                                border border-green-100
                                p-4">


                        <div class="flex items-start gap-3">

                            <div class="text-lg">
                                🛡️
                            </div>


                            <div>

                                <p class="font-bold
                                          text-slate-700
                                          text-sm">

                                    Password Security

                                </p>


                                <p class="text-xs
                                          text-slate-500
                                          leading-5
                                          mt-1">

                                    Leave both password fields empty
                                    if you don't want to change your
                                    current password.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- LIVE PROFILE CARD --}}
                {{-- ================================================= --}}

                <div class="mt-9
                            relative overflow-hidden
                            rounded-[30px]
                            bg-gradient-to-r
                            from-green-700
                            via-emerald-600
                            to-teal-500
                            p-7 md:p-8
                            text-white
                            shadow-xl">


                    <div class="absolute
                                -right-16 -top-20
                                w-56 h-56
                                rounded-full
                                bg-white/10">
                    </div>


                    <div class="absolute
                                -left-16 -bottom-20
                                w-48 h-48
                                rounded-full
                                bg-white/10">
                    </div>


                    <div class="relative z-10">


                        <div class="flex items-center gap-2
                                    text-green-200
                                    text-xs
                                    font-bold
                                    uppercase
                                    tracking-widest">

                            ✨ Profile Preview

                        </div>


                        <div class="flex flex-col
                                    sm:flex-row
                                    items-center
                                    gap-6 mt-5">


                            <img id="previewCardPhoto"
                                 src="{{ $profileImage }}"
                                 alt="{{ $user->name }}"
                                 class="w-28 h-28
                                        rounded-full
                                        object-cover
                                        border-4 border-white
                                        shadow-xl">


                            <div class="text-center sm:text-left">

                                <h3 id="previewName"
                                    class="text-2xl md:text-3xl
                                           font-black">

                                    {{ $user->name }}

                                </h3>


                                <p id="previewEmail"
                                   class="text-green-100
                                          mt-1">

                                    {{ $user->email }}

                                </p>


                                <div class="flex flex-wrap
                                            justify-center
                                            sm:justify-start
                                            gap-2 mt-4">


                                    <span class="bg-white/15
                                                 border border-white/20
                                                 px-3 py-1.5
                                                 rounded-full
                                                 text-xs font-bold">

                                        🛡️ Administrator

                                    </span>


                                    <span class="bg-white/15
                                                 border border-white/20
                                                 px-3 py-1.5
                                                 rounded-full
                                                 text-xs font-bold">

                                        🟢 Active Account

                                    </span>


                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- FORM ACTIONS --}}
                {{-- ================================================= --}}

                <div class="mt-9
                            pt-8
                            border-t border-slate-200
                            flex flex-col
                            sm:flex-row
                            items-center
                            justify-between
                            gap-4">


                    <a href="{{ route('admin.profile.show') }}"
                       class="w-full sm:w-auto
                              inline-flex
                              items-center
                              justify-center
                              gap-2
                              bg-slate-100
                              text-slate-700
                              px-7 py-4
                              rounded-2xl
                              font-bold
                              hover:bg-slate-200
                              transition">

                        ←

                        Cancel

                    </a>


                    <button type="submit"
                            class="group
                                   w-full sm:w-auto
                                   inline-flex
                                   items-center
                                   justify-center
                                   gap-3
                                   bg-gradient-to-r
                                   from-green-600
                                   via-emerald-600
                                   to-teal-600
                                   text-white
                                   px-9 py-4
                                   rounded-2xl
                                   font-black
                                   shadow-xl
                                   hover:-translate-y-1
                                   hover:shadow-2xl
                                   transition duration-300">


                        <span class="text-xl">
                            💾
                        </span>


                        Save Profile Changes


                        <span class="group-hover:translate-x-1
                                     transition">

                            →

                        </span>

                    </button>


                </div>


            </form>

        </div>



        {{-- ========================================================= --}}
        {{-- SECURITY FOOTER --}}
        {{-- ========================================================= --}}

        <div class="mt-7
                    rounded-[28px]
                    bg-slate-900
                    text-white
                    p-6 md:p-7
                    shadow-xl
                    overflow-hidden
                    relative">


            <div class="absolute
                        -right-16 -top-16
                        w-48 h-48
                        rounded-full
                        bg-emerald-500/10">
            </div>


            <div class="relative z-10
                        flex flex-col
                        md:flex-row
                        items-center
                        justify-between
                        gap-5">


                <div class="flex items-start gap-4">

                    <div class="w-12 h-12
                                rounded-xl
                                bg-emerald-500/15
                                border border-emerald-400/20
                                flex items-center
                                justify-center
                                text-xl">

                        🔐

                    </div>


                    <div>

                        <p class="text-emerald-400
                                  text-xs
                                  font-bold
                                  uppercase
                                  tracking-widest">

                            Secure Administrator Account

                        </p>


                        <p class="text-slate-300
                                  text-sm
                                  mt-1
                                  leading-6">

                            Your profile information is protected
                            by VolunteerHub authentication.

                        </p>

                    </div>

                </div>


                <a href="{{ route('admin.profile.show') }}"
                   class="shrink-0
                          text-emerald-400
                          hover:text-emerald-300
                          font-bold
                          text-sm
                          transition">

                    View Profile →

                </a>


            </div>

        </div>


    </div>

</div>



{{-- ========================================================= --}}
{{-- PREMIUM STYLES --}}
{{-- ========================================================= --}}

<style>

    .premium-label {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px;
        font-size: 14px;
        font-weight: 800;
        color: #334155;
    }

    .premium-input {
        width: 100%;
        padding: 14px 18px;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        color: #1e293b;
        font-size: 15px;
        font-weight: 500;
        outline: none;
        transition: all 0.25s ease;
    }

    .premium-input:hover {
        border-color: #86efac;
        background: #ffffff;
    }

    .premium-input:focus {
        background: #ffffff;
        border-color: #10b981;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.12);
    }

    .field-error {
        margin-top: 7px;
        font-size: 12px;
        font-weight: 600;
        color: #dc2626;
    }

</style>



{{-- ========================================================= --}}
{{-- JAVASCRIPT --}}
{{-- ========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('profilePhotoInput');

    const photoPreview = document.getElementById('photoPreview');

    const heroPhoto = document.getElementById('heroPhoto');

    const previewCardPhoto = document.getElementById('previewCardPhoto');

    const fileName = document.getElementById('fileName');

    const nameInput = document.getElementById('name');

    const emailInput = document.getElementById('email');

    const previewName = document.getElementById('previewName');

    const previewEmail = document.getElementById('previewEmail');


    /* =========================================================
       PROFILE PHOTO PREVIEW
       ========================================================= */

    if (input) {

        input.addEventListener('change', function (event) {

            const file = event.target.files[0];

            if (!file) {
                return;
            }


            /* File Type Check */

            const allowedTypes = [
                'image/jpeg',
                'image/jpg',
                'image/png',
                'image/webp'
            ];

            if (!allowedTypes.includes(file.type)) {

                alert('Please select a JPG, JPEG, PNG or WEBP image.');

                input.value = '';

                return;
            }


            /* File Size Check */

            if (file.size > 2 * 1024 * 1024) {

                alert('Profile photo must be less than 2MB.');

                input.value = '';

                return;
            }


            /* File Name */

            fileName.textContent = 'Selected file: ' + file.name;

            fileName.classList.remove('hidden');


            /* Preview */

            const reader = new FileReader();


            reader.onload = function (e) {

                const imageUrl = e.target.result;


                if (photoPreview) {
                    photoPreview.src = imageUrl;
                }


                if (heroPhoto) {
                    heroPhoto.src = imageUrl;
                }


                if (previewCardPhoto) {
                    previewCardPhoto.src = imageUrl;
                }

            };


            reader.readAsDataURL(file);

        });

    }



    /* =========================================================
       LIVE NAME PREVIEW
       ========================================================= */

    if (nameInput && previewName) {

        nameInput.addEventListener('input', function () {

            previewName.textContent =
                this.value.trim() || 'Administrator';

        });

    }



    /* =========================================================
       LIVE EMAIL PREVIEW
       ========================================================= */

    if (emailInput && previewEmail) {

        emailInput.addEventListener('input', function () {

            previewEmail.textContent =
                this.value.trim() || 'admin@example.com';

        });

    }

});



/* =============================================================
   PASSWORD VISIBILITY
   ============================================================= */

function togglePassword(inputId, iconId) {

    const input = document.getElementById(inputId);

    const icon = document.getElementById(iconId);


    if (!input || !icon) {
        return;
    }


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