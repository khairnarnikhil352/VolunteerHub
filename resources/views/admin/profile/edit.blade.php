@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-50">

<section class="relative overflow-hidden rounded-b-[45px]
                bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500
                text-white shadow-2xl">

    <div class="absolute -top-20 -right-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 -left-20 w-80 h-80 bg-green-300/20 rounded-full blur-3xl"></div>
    <div class="absolute top-20 left-1/2 w-40 h-40 bg-teal-300/10 rounded-full blur-2xl"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16 relative z-10">

        <div class="flex flex-col lg:flex-row items-center justify-between gap-10">

            <div>

                <div class="inline-flex items-center gap-2
                            bg-white/15 backdrop-blur-md border border-white/20
                            px-5 py-2 rounded-full text-sm font-semibold">

                    🛡️ VolunteerHub • Admin Portal

                </div>

                <h1 class="text-5xl lg:text-6xl font-black mt-6">
                    Edit Admin Profile
                </h1>

                <p class="mt-5 text-lg text-green-100 max-w-2xl leading-8">
                    Update your administrator information, profile photo and password securely from the VolunteerHub Admin Portal.
                </p>

                <div class="flex flex-wrap gap-4 mt-8">

                    <a href="{{ route('admin.profile.show') }}"
                       class="bg-white text-green-700 px-6 py-3 rounded-2xl font-bold shadow-lg hover:bg-green-50 transition">
                        👤 View Profile
                    </a>

                    <a href="{{ route('admin.dashboard') }}"
                       class="border border-white/30 px-6 py-3 rounded-2xl font-bold hover:bg-white/20 transition">
                        🏠 Dashboard
                    </a>

                </div>

            </div>

            {{-- Admin Photo --}}
            <div class="relative">

                <div class="absolute inset-0 bg-white/20 rounded-full blur-2xl scale-110"></div>

                <div class="relative bg-white/10 p-2 rounded-full border border-white/30 shadow-2xl">

                    @if($user->profile_photo)
                        <img id="heroPhoto"
                             src="{{ asset('storage/'.$user->profile_photo) }}"
                             class="w-40 h-40 rounded-full object-cover border-4 border-white">
                    @else
                        <img id="heroPhoto"
                             src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=ffffff&color=16a34a&size=256"
                             class="w-40 h-40 rounded-full object-cover border-4 border-white">
                    @endif

                </div>

                <div class="absolute bottom-2 right-2 w-11 h-11 rounded-full bg-white text-green-700 flex items-center justify-center shadow-lg border-4 border-green-700">
                    📷
                </div>

            </div>

        </div>

    </div>

</section>

<div class="max-w-6xl mx-auto px-6 py-10">

<div class="bg-white rounded-[35px] shadow-xl border border-green-100 overflow-hidden">

    <div class="bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500 p-7 text-white">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center text-2xl">
                ✏️
            </div>

            <div>

                <h2 class="text-3xl font-black">
                    Update Administrator Information
                </h2>

                <p class="text-green-100 mt-1">
                    Keep your administrator account information up to date.
                </p>

            </div>

        </div>

    </div>

    <form action="{{ route('admin.profile.update') }}"
          method="POST"
          enctype="multipart/form-data"
          class="p-8 lg:p-10">

        @csrf
        @method('PUT')

        <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-100 rounded-3xl p-6 mb-10">

    <div class="flex flex-col md:flex-row items-center gap-6">

        <div class="relative">

            @if($user->profile_photo)
                <img id="photoPreview"
                     src="{{ asset('storage/'.$user->profile_photo) }}"
                     class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-xl ring-4 ring-green-200">
            @else
                <img id="photoPreview"
                     src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=16a34a&color=ffffff&size=256"
                     class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-xl ring-4 ring-green-200">
            @endif

        </div>

        <div class="flex-1">

            <label class="font-bold text-gray-700 mb-2 block">
                📷 Upload Profile Photo
            </label>

            <input type="file"
                   name="profile_photo"
                   id="profilePhotoInput"
                   accept="image/png,image/jpeg,image/jpg,image/webp"
                   class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-3">

            <p class="text-xs text-gray-500 mt-2">
                JPG, PNG, JPEG or WEBP • Max 2MB
            </p>

        </div>

    </div>

</div>

<div class="grid md:grid-cols-2 gap-6">

    <div>
        <label class="font-bold text-gray-700 block mb-2">👤 Full Name</label>
        <input type="text" name="name"
            value="{{ old('name',$user->name) }}"
            class="premium-input">
    </div>

    <div>
        <label class="font-bold text-gray-700 block mb-2">📧 Email Address</label>
        <input type="email" name="email"
            value="{{ old('email',$user->email) }}"
            class="premium-input">
    </div>

    <div>
        <label class="font-bold text-gray-700 block mb-2">📱 Phone Number</label>
        <input type="text" name="phone"
            value="{{ old('phone',$user->phone) }}"
            class="premium-input">
    </div>

    <div>
        <label class="font-bold text-gray-700 block mb-2">🎂 Date of Birth</label>
        <input type="date" name="dob"
            value="{{ old('dob',$user->dob) }}"
            class="premium-input">
    </div>

    <div class="md:col-span-2">

        <label class="font-bold text-gray-700 block mb-2">
            ⚧ Gender
        </label>

        <select name="gender" class="premium-input">

            <option value="">Select Gender</option>

            <option value="Male" {{ old('gender',$user->gender)=='Male'?'selected':'' }}>
                Male
            </option>

            <option value="Female" {{ old('gender',$user->gender)=='Female'?'selected':'' }}>
                Female
            </option>

            <option value="Other" {{ old('gender',$user->gender)=='Other'?'selected':'' }}>
                Other
            </option>

        </select>

    </div>

</div>

<div id="password"
     class="mt-10 bg-gradient-to-br from-slate-50 to-green-50 rounded-3xl border border-green-100 p-7">

    <div class="flex items-center gap-3 mb-6">

        <div class="w-12 h-12 rounded-2xl bg-green-600 text-white flex items-center justify-center">
            🔒
        </div>

        <div>

            <h3 class="text-xl font-black text-gray-800">
                Change Password
            </h3>

            <p class="text-sm text-gray-500">
                Update your administrator password securely.
            </p>

        </div>

    </div>

    <div class="grid md:grid-cols-2 gap-6">

        <div>
            <label class="font-bold text-gray-700 block mb-2">
                New Password
            </label>

            <input type="password"
                   name="password"
                   class="premium-input"
                   placeholder="Minimum 8 characters">
        </div>

        <div>
            <label class="font-bold text-gray-700 block mb-2">
                Confirm Password
            </label>

            <input type="password"
                   name="password_confirmation"
                   class="premium-input"
                   placeholder="Confirm password">
        </div>

    </div>

    <div class="mt-5 rounded-2xl bg-white border border-green-100 px-4 py-3 text-sm text-gray-600">
        🛡️ Leave password fields empty if you don't want to change your password.
    </div>

</div>
<div class="mt-10 rounded-[30px] bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500 p-7 text-white shadow-xl">

    <div class="flex flex-col md:flex-row items-center gap-6">

        <img id="previewCardPhoto"
             src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=ffffff&color=16a34a&size=256' }}"
             class="w-28 h-28 rounded-full object-cover border-4 border-white">

        <div>

            <h3 class="text-3xl font-black">{{ $user->name }}</h3>

            <p class="text-green-100 mt-2">{{ $user->email }}</p>

            <div class="flex flex-wrap gap-2 mt-3">

                <span class="bg-white/15 border border-white/20 px-3 py-1 rounded-full text-xs font-bold">
                    🛡️ Administrator
                </span>

                <span class="bg-white/15 border border-white/20 px-3 py-1 rounded-full text-xs font-bold">
                    🟢 Active Account
                </span>

            </div>

        </div>

    </div>

</div>

<div class="mt-10 border-t pt-8 flex flex-col sm:flex-row justify-between gap-4">

    <a href="{{ route('admin.profile.show') }}"
       class="bg-gray-100 text-gray-700 px-7 py-4 rounded-2xl font-bold text-center hover:bg-gray-200 transition">

        ← Cancel

    </a>

    <button type="submit"
        class="bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600
               text-white px-10 py-4 rounded-2xl font-black shadow-xl hover:scale-105 transition">

        💾 Save Profile Changes

    </button>

</div>

</form>
</div>
</div>
<style>
.premium-input{
    @apply w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 text-gray-800 font-medium transition;
}
.premium-input:focus{
    @apply bg-white ring-2 ring-green-500 border-green-500 outline-none;
}
</style>

<script>
const input=document.getElementById('profilePhotoInput');

if(input){
    input.addEventListener('change',function(e){

        const file=e.target.files[0];
        if(!file) return;

        const reader=new FileReader();

        reader.onload=function(event){
            photoPreview.src=event.target.result;
            heroPhoto.src=event.target.result;
            previewCardPhoto.src=event.target.result;
        };

        reader.readAsDataURL(file);

    });
}
</script>

@endsection