@extends('layouts.student')

@section('content')

<!-- Premium Volunteer Registration Blade -->
<style>
.input-box{
    width:100%;
    padding:14px 18px;
    border:2px solid #E5E7EB;
    border-radius:16px;
    background:#F9FAFB;
    transition:.3s;
    font-size:15px;
}
.input-box:focus{
    outline:none;
    border-color:#16A34A;
    background:#fff;
    box-shadow:0 0 0 4px rgba(22,163,74,.15);
}
.label-title{
    display:block;
    margin-bottom:8px;
    font-weight:700;
    color:#166534;
}
.section-card{
    background:#fff;
    border-radius:28px;
    padding:32px;
    box-shadow:0 10px 35px rgba(0,0,0,.08);
    border:1px solid #ECFDF5;
}
.section-title{
    font-size:28px;
    font-weight:900;
    color:#166534;
    margin-bottom:22px;
}
</style>



{{-- ================= PREMIUM HERO SECTION ================= --}}
<section class="relative h-[520px] overflow-hidden rounded-b-[40px]">

    {{-- Banner Image --}}
    @if($event->banner)
        <img src="{{ asset('images/events/'.$event->banner) }}"
             alt="{{ $event->title }}"
             class="absolute inset-0 w-full h-full object-cover">
    @else
        <img src="{{ asset('images/events/default.jpg') }}"
             alt="Volunteer Event"
             class="absolute inset-0 w-full h-full object-cover">
    @endif

    {{-- Dark Gradient Overlay --}}
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-green-900/50 to-black/40"></div>

    {{-- Blur Circle Effects --}}
    <div class="absolute top-10 right-10 w-72 h-72 bg-green-400/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-emerald-300/20 rounded-full blur-3xl"></div>

    {{-- Content --}}
    <div class="relative z-10 max-w-7xl mx-auto px-8 h-full flex items-center">

        <div class="max-w-3xl text-white">

            <span class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-lg px-5 py-2 rounded-full text-sm font-semibold">
                🌿 VolunteerHub Registration
            </span>

            <h1 class="text-5xl lg:text-6xl font-black mt-5 leading-tight drop-shadow-lg">
                {{ $event->title }}
            </h1>

            <p class="mt-5 text-lg text-green-100 leading-8">
                Complete your registration and become a part of this volunteer event.
                Your application will be reviewed by the event organizer.
            </p>

            {{-- Event Information Cards --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-8">

                <div class="bg-white/15 backdrop-blur-lg rounded-2xl p-4 text-center border border-white/20">
                    <div class="text-3xl mb-2">📅</div>
                    <p class="text-xs text-green-100">Event Date</p>
                    <h3 class="font-bold">
                        {{ $event->event_date->format('d M Y') }}
                    </h3>
                </div>

                <div class="bg-white/15 backdrop-blur-lg rounded-2xl p-4 text-center border border-white/20">
                    <div class="text-3xl mb-2">⏰</div>
                    <p class="text-xs text-green-100">Reporting Time</p>
                    <h3 class="font-bold">
                        {{ date('h:i A', strtotime($event->start_time)) }}
                    </h3>
                </div>

                <div class="bg-white/15 backdrop-blur-lg rounded-2xl p-4 text-center border border-white/20">
                    <div class="text-3xl mb-2">📍</div>
                    <p class="text-xs text-green-100">Location</p>
                    <h3 class="font-bold">
                        {{ $event->city }}
                    </h3>
                </div>

                <div class="bg-white/15 backdrop-blur-lg rounded-2xl p-4 text-center border border-white/20">
                    <div class="text-3xl mb-2">👥</div>
                    <p class="text-xs text-green-100">Available Slots</p>
                    <h3 class="font-bold">
                        {{ $event->capacity - $event->filled_slots }}
                    </h3>
                </div>

            </div>

            {{-- Event Venue Badge --}}
            <div class="mt-8 flex flex-wrap gap-3">

                <div class="bg-white/20 backdrop-blur-md px-4 py-2 rounded-full text-sm font-semibold">
                    🏢 {{ $event->venue }}
                </div>

                <div class="bg-yellow-400 text-black px-4 py-2 rounded-full text-sm font-bold">
                    {{ $event->category }}
                </div>

                <div class="bg-green-500 px-4 py-2 rounded-full text-sm font-semibold">
                    {{ $event->status }}
                </div>

            </div>

        </div>

    </div>

</section>



<form method="POST"
action="{{ route('events.register.store',$event->id) }}"
enctype="multipart/form-data"
class="max-w-6xl mx-auto px-6 py-10 space-y-8">

@csrf

<div class="section-card">
<h2 class="section-title">👤 Personal Information</h2>

<div class="grid md:grid-cols-2 gap-6">

<div>
<label class="label-title">Full Name</label>
<input type="text"
value="{{ Auth::user()->name }}"
readonly
class="input-box bg-green-50 cursor-not-allowed">
</div>

<div>
<label class="label-title">Email Address</label>
<input type="email"
value="{{ Auth::user()->email }}"
readonly
class="input-box bg-green-50 cursor-not-allowed">
</div>

<div>
<label class="label-title">📱 Mobile Number</label>
<input type="text"
name="phone"
value="{{ old('phone') }}"
placeholder="Enter mobile number"
class="input-box">
</div>

<div>
<label class="label-title">🎂 Date of Birth</label>
<input type="date"
name="dob"
value="{{ old('dob') }}"
class="input-box">
</div>

<div>
<label class="label-title">⚧ Gender</label>
<select name="gender" class="input-box">
<option value="">Select Gender</option>
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>
</div>

</div>
</div>


{{-- ================= IDENTITY VERIFICATION ================= --}}
<div class="section-card">

    <h2 class="section-title">🪪 Identity Verification</h2>

    <div class="grid lg:grid-cols-3 gap-8">

        {{-- LEFT : Passport Photo Upload --}}
        <div class="space-y-4">

            <label class="label-title">👤 Passport Size Photo</label>

            <label
                class="flex flex-col items-center justify-center h-[330px] border-2 border-dashed border-green-300 rounded-3xl bg-gradient-to-br from-green-50 to-emerald-100 hover:from-green-100 hover:to-emerald-200 cursor-pointer transition-all duration-300">

                <img id="preview"
                     src="{{ asset('images/avatar-placeholder.png') }}"
                     class="w-36 h-36 rounded-full object-cover border-4 border-white shadow-xl">

                <p class="mt-5 text-green-700 font-bold text-lg">
                    Upload Passport Photo
                </p>

                <p class="text-sm text-gray-500 text-center px-4">
                    JPG, JPEG or PNG <br> Maximum Size: 2 MB
                </p>

                <input type="file"
                       id="passport_photo"
                       name="passport_photo"
                       accept="image/*"
                       class="hidden">

            </label>

        </div>

        {{-- RIGHT : Aadhaar Number + Aadhaar Document --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Aadhaar Number --}}
            <div>

                <label class="label-title">🆔 Aadhaar Number</label>

                <input type="text"
                       name="aadhaar_number"
                       maxlength="12"
                       value="{{ old('aadhaar_number') }}"
                       placeholder="Enter 12 Digit Aadhaar Number"
                       class="input-box">

                <p class="text-xs text-gray-500 mt-2">
                    Aadhaar number is required for volunteer verification.
                </p>

            </div>

            {{-- Aadhaar Upload --}}
            <div>

                <label class="label-title">📄 Upload Aadhaar Card Document</label>

                <label
                    class="flex flex-col items-center justify-center h-52 border-2 border-dashed border-blue-300 rounded-3xl bg-gradient-to-br from-blue-50 to-sky-100 hover:from-blue-100 hover:to-sky-200 cursor-pointer transition-all duration-300">

                    <div class="text-5xl">📄</div>

                    <h3 class="mt-4 text-blue-700 font-bold text-lg">
                        Upload Aadhaar Card
                    </h3>

                    <p class="text-sm text-gray-500 text-center px-6">
                        PDF, JPG, JPEG or PNG <br>
                        Maximum File Size: 3 MB
                    </p>

                    <input type="file"
                           name="aadhaar_document"
                           accept=".pdf,.jpg,.jpeg,.png"
                           class="hidden">

                </label>

                <p class="text-xs text-gray-500 mt-3">
                    Upload the front side of your Aadhaar Card for identity verification.
                </p>

            </div>


        </div>

    </div>

</div>

<div class="section-card">
<h2 class="section-title">💼 Volunteer Information</h2>

<div class="grid md:grid-cols-2 gap-6">

<div>
<label class="label-title">Volunteer Category</label>
<select name="volunteer_category" class="input-box">
<option value="">Choose Category</option>
<option>Student</option>
<option>Working Professional</option>
<option>Homemaker</option>
<option>NGO Member</option>
<option>Self Employed</option>
<option>Retired</option>
<option>Other</option>
</select>
</div>

<div>
<label class="label-title">Occupation</label>
<input type="text"
name="occupation"
value="{{ old('occupation') }}"
placeholder="Example : Engineer / Teacher / Business"
class="input-box">
</div>

</div>

</div>

<div class="section-card">
<h2 class="section-title">🏠 Address Information</h2>

<label class="label-title">Full Address</label>

<textarea name="address"
rows="4"
placeholder="Enter your full address"
class="input-box resize-none">{{ old('address') }}</textarea>

<div class="grid md:grid-cols-3 gap-6 mt-6">

<div>
<label class="label-title">City</label>
<input type="text"
name="city"
value="{{ old('city') }}"
placeholder="Nashik"
class="input-box">
</div>

<div>
<label class="label-title">State</label>
<input type="text"
name="state"
value="{{ old('state') }}"
placeholder="Maharashtra"
class="input-box">
</div>

<div>
<label class="label-title">Pincode</label>
<input type="text"
name="pincode"
value="{{ old('pincode') }}"
placeholder="422005"
class="input-box">
</div>

</div>

</div>

<div class="section-card">
<h2 class="section-title">📞 Emergency Contact</h2>

<div class="grid md:grid-cols-2 gap-6">

<div>
<label class="label-title">Emergency Contact Name</label>
<input type="text"
name="emergency_contact_name"
value="{{ old('emergency_contact_name') }}"
placeholder="Parent / Friend / Relative"
class="input-box">
</div>

<div>
<label class="label-title">Relationship</label>
<select name="emergency_contact_relation" class="input-box">
<option value="">Select Relationship</option>
<option>Father</option>
<option>Mother</option>
<option>Brother</option>
<option>Sister</option>
<option>Friend</option>
<option>Spouse</option>
<option>Other</option>
</select>
</div>

<div class="md:col-span-2">
<label class="label-title">Emergency Mobile Number</label>
<input type="text"
name="emergency_contact_phone"
value="{{ old('emergency_contact_phone') }}"
placeholder="Emergency Contact Number"
class="input-box">
</div>

</div>

</div>

<div class="section-card">
<h2 class="section-title">❤️ Volunteer Motivation</h2>

<label class="label-title">Why do you want to join this event?</label>

<textarea name="why_join"
rows="5"
placeholder="Tell us why you want to participate in this volunteer event..."
class="input-box resize-none">{{ old('why_join') }}</textarea>

<div class="mt-6">

<label class="label-title">Previous Volunteer Experience (Optional)</label>

<textarea name="previous_experience"
rows="4"
placeholder="Mention previous volunteer experience if any."
class="input-box resize-none">{{ old('previous_experience') }}</textarea>

</div>

</div>

<div class="section-card">
<h2 class="section-title">⚕ Health Information</h2>

<label class="label-title">Medical Condition (Optional)</label>

<textarea name="medical_condition"
rows="4"
placeholder="Mention allergies, medications or medical conditions."
class="input-box resize-none">{{ old('medical_condition') }}</textarea>

</div>

<div class="section-card">

<div class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-3xl p-6 text-white">

<h3 class="text-xl font-bold mb-4">🌿 Volunteer Guidelines</h3>

<ul class="space-y-3 text-green-50 list-disc ml-5">
<li>Reach venue at least 15 minutes before reporting time.</li>
<li>Carry Aadhaar or any Government ID.</li>
<li>Follow coordinator and organizer instructions.</li>
<li>Wear comfortable clothes and shoes.</li>
<li>Respect volunteers and community members.</li>
</ul>

</div>

<label class="flex items-start gap-3 mt-8">

<input type="checkbox"
name="agree"
required
class="mt-1 w-5 h-5 accent-green-600">

<span class="text-gray-700 leading-7">
I confirm that the information provided above is correct and I agree to VolunteerHub rules and privacy policy.
</span>

</label>

<button type="submit"
class="w-full mt-8 py-4 rounded-2xl bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 text-white text-xl font-bold shadow-xl hover:scale-[1.02] transition">

🌿 Submit Volunteer Registration

</button>

<p class="text-center mt-4 text-gray-500">
After submission, your request will be sent to the organizer for approval.
</p>

</div>

</form>

</div>

<script>
const input = document.getElementById('passport_photo');
const preview = document.getElementById('preview');

if(input){
input.addEventListener('change',function(e){
const file = e.target.files[0];
if(file){
preview.src = URL.createObjectURL(file);
}
});
}
</script>

@endsection
