@extends('layouts.student')

@section('content')

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

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-100">

    {{-- HERO --}}
    <section class="relative overflow-hidden rounded-b-[40px] bg-gradient-to-r from-green-700 via-emerald-600 to-teal-500 text-white">

        <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-8 py-14 relative z-10">

            <span class="bg-white/20 px-5 py-2 rounded-full text-sm font-semibold">
                ✏️ VolunteerHub • Edit Application
            </span>

            <h1 class="text-5xl font-black mt-5">
                {{ $event->title }}
            </h1>

            <p class="mt-4 text-green-100 text-lg">
                Update your volunteer application before organizer approval.
            </p>

            <div class="mt-6 flex gap-4 flex-wrap">
                <span class="bg-yellow-300 text-black px-4 py-2 rounded-full font-bold">
                    ⏳ {{ $registration->status }}
                </span>

                <span class="bg-white/20 px-4 py-2 rounded-full">
                    📅 Applied : {{ $registration->created_at->format('d M Y') }}
                </span>
            </div>

        </div>
    </section>

    {{-- EVENT CARD --}}
    <div class="max-w-7xl mx-auto px-6 -mt-10 relative z-20">

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

            <div class="grid lg:grid-cols-3">

                <div class="h-72 lg:h-full">
                    @if($event->banner)
                        <img src="{{ asset('images/events/'.$event->banner) }}"
                             class="w-full h-full object-cover">
                    @else
                        <img src="{{ asset('images/events/default.jpg') }}"
                             class="w-full h-full object-cover">
                    @endif
                </div>

                <div class="lg:col-span-2 p-8">

                    <h2 class="text-3xl font-black text-green-700">
                        {{ $event->title }}
                    </h2>

                    <p class="text-gray-600 mt-4 leading-7">
                        {{ $event->description }}
                    </p>

                    <div class="grid md:grid-cols-2 gap-5 mt-8">

                        <div class="bg-green-50 rounded-2xl p-4">
                            <p class="text-sm text-gray-500">📅 Event Date</p>
                            <h3 class="font-bold text-green-700">
                                {{ $event->event_date->format('d F Y') }}
                            </h3>
                        </div>

                        <div class="bg-blue-50 rounded-2xl p-4">
                            <p class="text-sm text-gray-500">⏰ Event Time</p>
                            <h3 class="font-bold text-blue-700">
                                {{ date('h:i A', strtotime($event->start_time)) }}
                            </h3>
                        </div>

                        <div class="bg-orange-50 rounded-2xl p-4">
                            <p class="text-sm text-gray-500">📍 City</p>
                            <h3 class="font-bold text-orange-700">
                                {{ $event->city }}
                            </h3>
                        </div>

                        <div class="bg-purple-50 rounded-2xl p-4">
                            <p class="text-sm text-gray-500">🏢 Venue</p>
                            <h3 class="font-bold text-purple-700">
                                {{ $event->venue }}
                            </h3>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- VALIDATION --}}
    @if ($errors->any())
    <div class="max-w-6xl mx-auto px-6 mt-6">
        <div class="bg-red-100 border border-red-400 text-red-700 rounded-2xl p-5">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    {{-- FORM START --}}
    <form method="POST"
          action="{{ route('events.register.update',$registration->id) }}"
          enctype="multipart/form-data"
          class="max-w-6xl mx-auto px-6 py-10 space-y-8">

        @csrf
        @method('PUT')

                {{-- ================= PERSONAL INFORMATION ================= --}}
        <div class="section-card">

            <h2 class="section-title">👤 Personal Information</h2>

            <div class="grid md:grid-cols-2 gap-6">

                {{-- Full Name --}}
                <div>
                    <label class="label-title">Full Name</label>

                    <input type="text"
                           value="{{ Auth::user()->name }}"
                           readonly
                           class="input-box bg-green-50 cursor-not-allowed">
                </div>

                {{-- Email --}}
                <div>
                    <label class="label-title">Email Address</label>

                    <input type="email"
                           value="{{ Auth::user()->email }}"
                           readonly
                           class="input-box bg-green-50 cursor-not-allowed">
                </div>

                {{-- Phone --}}
                <div>
                    <label class="label-title">📱 Mobile Number</label>

                    <input type="text"
                           name="phone"
                           value="{{ old('phone',$registration->phone) }}"
                           class="input-box">
                </div>

                {{-- DOB --}}
                <div>
                    <label class="label-title">🎂 Date of Birth</label>

                    <input type="date"
                           name="dob"
                           value="{{ old('dob',$registration->dob->format('Y-m-d')) }}"
                           class="input-box">
                </div>

                {{-- Gender --}}
                <div>
                    <label class="label-title">⚧ Gender</label>

                    <select name="gender" class="input-box">

                        <option value="Male"
                            {{ $registration->gender=='Male'?'selected':'' }}>
                            Male
                        </option>

                        <option value="Female"
                            {{ $registration->gender=='Female'?'selected':'' }}>
                            Female
                        </option>

                        <option value="Other"
                            {{ $registration->gender=='Other'?'selected':'' }}>
                            Other
                        </option>

                    </select>

                </div>

            </div>

        </div>

       
        {{-- ================= IDENTITY VERIFICATION ================= --}}
        <div class="section-card">

            <h2 class="section-title">🪪 Identity Verification</h2>

            <div class="grid lg:grid-cols-2 gap-8">

                {{-- Left Side --}}
                <div class="space-y-6">

                    {{-- Aadhaar Number --}}
                    <div>
                        <label class="label-title">Aadhaar Number</label>

                        <input type="text"
                            name="aadhaar_number"
                            maxlength="12"
                            value="{{ old('aadhaar_number', $registration->aadhaar_number) }}"
                            placeholder="Enter 12 Digit Aadhaar Number"
                            class="input-box">
                    </div>

                    {{-- Aadhaar Card Upload --}}
                    <div>
                        <label class="label-title">📄 Aadhaar Card Document</label>

                        @if($registration->aadhaar_document)
                            <a href="{{ asset('storage/'.$registration->aadhaar_document) }}"
                            target="_blank"
                            class="flex items-center justify-between bg-green-50 border border-green-200 rounded-2xl p-4 mb-3 hover:bg-green-100 transition">

                                <div>
                                    <p class="font-bold text-green-700">
                                        ✅ Aadhaar Uploaded
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        Click to view current document
                                    </p>
                                </div>

                                <span class="bg-green-600 text-white px-3 py-2 rounded-lg text-sm font-semibold">
                                    View PDF
                                </span>

                            </a>
                        @endif

                        <label class="flex flex-col items-center justify-center h-44 border-2 border-dashed border-blue-300 rounded-2xl bg-blue-50 hover:bg-blue-100 cursor-pointer transition">

                            <div class="text-5xl">📄</div>

                            <p class="mt-3 text-blue-700 font-bold">
                                Upload New Aadhaar Card
                            </p>

                            <p class="text-sm text-gray-500">
                                PDF, JPG, JPEG, PNG • Max 3MB
                            </p>

                            <input type="file"
                                name="aadhaar_document"
                                accept=".pdf,.jpg,.jpeg,.png"
                                class="hidden">

                        </label>
                    </div>

                </div>

                {{-- Right Side --}}
                <div>

                    <label class="label-title">👤 Passport Size Photo</label>

                    <label class="flex flex-col items-center justify-center h-full min-h-[320px] border-2 border-dashed border-green-300 rounded-2xl bg-green-50 hover:bg-green-100 cursor-pointer transition">

                        <img id="preview"
                            src="{{ asset('storage/'.$registration->passport_photo) }}"
                            class="w-36 h-36 rounded-full object-cover border-4 border-white shadow-xl">

                        <p class="mt-5 text-green-700 font-bold">
                            Change Passport Photo
                        </p>

                        <p class="text-sm text-gray-500">
                            JPG, JPEG, PNG • Max 2MB
                        </p>

                        <input type="file"
                            id="passport_photo"
                            name="passport_photo"
                            accept="image/*"
                            class="hidden">

                    </label>

                </div>

            </div>

        </div>

        {{-- ================= VOLUNTEER INFORMATION ================= --}}
        <div class="section-card">

            <h2 class="section-title">💼 Volunteer Information</h2>

            <div class="grid md:grid-cols-2 gap-6">

                {{-- Volunteer Category --}}
                <div>

                    <label class="label-title">Volunteer Category</label>

                    <select name="volunteer_category" class="input-box">

                        @foreach(['Student','Working Professional','NGO Member','Self Employed','Homemaker','Retired','Other'] as $cat)

                            <option value="{{ $cat }}"
                                {{ $registration->volunteer_category==$cat?'selected':'' }}>
                                {{ $cat }}
                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Occupation --}}
                <div>

                    <label class="label-title">Occupation</label>

                    <input type="text"
                           name="occupation"
                           value="{{ old('occupation',$registration->occupation) }}"
                           class="input-box">

                </div>

            </div>

        </div>

        {{-- ================= ADDRESS INFORMATION ================= --}}
        <div class="section-card">

            <h2 class="section-title">🏠 Address Information</h2>

            {{-- Full Address --}}
            <label class="label-title">Full Address</label>

            <textarea name="address"
                      rows="4"
                      class="input-box resize-none">{{ old('address',$registration->address) }}</textarea>

            <div class="grid md:grid-cols-3 gap-6 mt-6">

                {{-- City --}}
                <div>

                    <label class="label-title">City</label>

                    <input type="text"
                           name="city"
                           value="{{ old('city',$registration->city) }}"
                           class="input-box">

                </div>

                {{-- State --}}
                <div>

                    <label class="label-title">State</label>

                    <input type="text"
                           name="state"
                           value="{{ old('state',$registration->state) }}"
                           class="input-box">

                </div>

                {{-- Pincode --}}
                <div>

                    <label class="label-title">Pincode</label>

                    <input type="text"
                           name="pincode"
                           value="{{ old('pincode',$registration->pincode) }}"
                           class="input-box">

                </div>

            </div>

        </div>

                {{-- ================= EMERGENCY CONTACT ================= --}}
        <div class="section-card">

            <h2 class="section-title">📞 Emergency Contact</h2>

            <div class="grid md:grid-cols-2 gap-6">

                {{-- Contact Name --}}
                <div>
                    <label class="label-title">Emergency Contact Name</label>

                    <input type="text"
                           name="emergency_contact_name"
                           value="{{ old('emergency_contact_name',$registration->emergency_contact_name) }}"
                           class="input-box">
                </div>

                {{-- Relationship --}}
                <div>
                    <label class="label-title">Relationship</label>

                    <select name="emergency_contact_relation" class="input-box">

                        @foreach(['Father','Mother','Brother','Sister','Friend','Spouse','Other'] as $relation)
                            <option value="{{ $relation }}"
                                {{ $registration->emergency_contact_relation==$relation?'selected':'' }}>
                                {{ $relation }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- Emergency Phone --}}
                <div class="md:col-span-2">
                    <label class="label-title">Emergency Mobile Number</label>

                    <input type="text"
                           name="emergency_contact_phone"
                           value="{{ old('emergency_contact_phone',$registration->emergency_contact_phone) }}"
                           class="input-box">
                </div>

            </div>

        </div>

        {{-- ================= VOLUNTEER MOTIVATION ================= --}}
        <div class="section-card">

            <h2 class="section-title">❤️ Volunteer Motivation</h2>

            {{-- Why Join --}}
            <label class="label-title">Why do you want to join this event?</label>

            <textarea name="why_join"
                      rows="5"
                      class="input-box resize-none">{{ old('why_join',$registration->why_join) }}</textarea>

            {{-- Previous Experience --}}
            <div class="mt-6">

                <label class="label-title">
                    Previous Volunteer Experience (Optional)
                </label>

                <textarea name="previous_experience"
                          rows="4"
                          class="input-box resize-none">{{ old('previous_experience',$registration->previous_experience) }}</textarea>

            </div>

        </div>

        {{-- ================= HEALTH INFORMATION ================= --}}
        <div class="section-card">

            <h2 class="section-title">⚕ Health Information</h2>

            <label class="label-title">Medical Condition (Optional)</label>

            <textarea name="medical_condition"
                      rows="4"
                      class="input-box resize-none">{{ old('medical_condition',$registration->medical_condition) }}</textarea>

        </div>

        {{-- ================= UPDATE CARD ================= --}}
        <div class="section-card">

            <div class="bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 rounded-3xl p-6 text-white">

                <h3 class="text-2xl font-bold mb-3">
                    🌿 Update Volunteer Registration
                </h3>

                <p class="text-green-100 leading-7">
                    Please review all information carefully before saving changes.
                    Once the organizer approves your application, editing will be disabled.
                </p>

            </div>

            {{-- Important Notice --}}
            <div class="mt-6 bg-yellow-50 border-l-4 border-yellow-400 p-5 rounded-xl">

                <h4 class="font-bold text-yellow-700 mb-2">
                    ⚠ Important
                </h4>

                <ul class="text-gray-700 space-y-2 text-sm list-disc ml-5">
                    <li>You can edit this application only while it is <b>Pending</b>.</li>
                    <li>After approval, your details become read-only.</li>
                    <li>Carry the same Aadhaar ID during the event.</li>
                    <li>Your passport photo will appear on the Volunteer ID Card.</li>
                </ul>

            </div>

            {{-- Buttons --}}
            <div class="grid md:grid-cols-2 gap-5 mt-8">

                <button type="submit"
                        class="w-full py-4 rounded-2xl bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 text-white text-lg font-bold shadow-xl hover:scale-[1.02] transition">

                    💾 Save Changes

                </button>

                <a href="{{ route('my.events') }}"
                   class="w-full py-4 rounded-2xl bg-gray-200 text-gray-700 text-center text-lg font-bold hover:bg-gray-300 transition">

                    ← Cancel

                </a>

            </div>

        </div>

    </form>

</div>

{{-- ================= PASSPORT PHOTO PREVIEW ================= --}}
<script>
const input = document.getElementById('passport_photo');
const preview = document.getElementById('preview');

if (input) {
    input.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            preview.src = URL.createObjectURL(file);
        }
    });
}
</script>

@endsection