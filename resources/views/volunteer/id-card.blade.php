@extends('layouts.student')

@section('content')

@php
    $event = $registration->event;
    $volunteer = $registration->user;

    $volunteerId = 'VH-' . str_pad($registration->id, 5, '0', STR_PAD_LEFT);

    $eventDate = $event && $event->event_date
        ? \Carbon\Carbon::parse($event->event_date)->format('d M Y')
        : 'N/A';

    $eventTitle = $event->title ?? 'Volunteer Event';
    $category = $event->category ?? 'Community Service';

    $photo = $volunteer->profile_photo ?? null;
@endphp


<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-emerald-100 py-10 px-4">

    {{-- ================= PAGE HEADER ================= --}}
    <div class="max-w-7xl mx-auto mb-8 print:hidden">

        <div class="flex flex-col lg:flex-row justify-between items-center gap-5">

            <div>
                <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest">
                    🌿 VolunteerHub Premium ID Card
                </span>

                <h1 class="text-4xl font-black text-slate-800 mt-3">
                    Official Volunteer Identity Card
                </h1>

                <p class="text-slate-500 mt-2">
                    Verified Student Volunteer • VolunteerHub Community Network
                </p>
            </div>

            <div class="flex gap-3">

                <a href="{{ route('my.events') }}"
                    class="bg-white border border-slate-300 px-5 py-3 rounded-xl font-bold hover:bg-slate-100 transition">
                    ← Back
                </a>

                <button onclick="window.print()"
                    class="bg-gradient-to-r from-green-600 to-emerald-600 text-white px-6 py-3 rounded-xl font-bold shadow-lg hover:scale-105 transition">
                    🖨️ Print ID Card
                </button>

            </div>

        </div>

    </div>


    {{-- ================= BOTH SIDES ================= --}}
    <div class="id-card-wrapper">


        {{-- ######################################################## --}}
        {{-- ###################### FRONT SIDE ####################### --}}
        {{-- ######################################################## --}}

        <div class="id-card">

            <div class="card-inner">

                {{-- Background Decoration --}}
                <div class="absolute top-0 right-0 w-52 h-52 bg-white/20 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-green-300/20 rounded-full blur-2xl"></div>

                {{-- HEADER --}}
                <div class="card-header">

                    <div class="flex items-center gap-3">

                        {{-- VolunteerHub Logo --}}
                        <div class="logo-box">

                            <svg width="42" height="42" viewBox="0 0 100 100" fill="none">

                                <circle cx="50" cy="50" r="46"
                                        stroke="#16A34A" stroke-width="4"/>

                                <path d="M50 18
                                         C58 28 60 40 50 52
                                         C40 40 42 28 50 18Z"
                                      fill="#22C55E"/>

                                <circle cx="50" cy="58" r="12"
                                        fill="#059669"/>

                                <path d="M22 70
                                         Q50 88 78 70"
                                      stroke="#0D9488"
                                      stroke-width="6"
                                      stroke-linecap="round"/>

                            </svg>

                        </div>

                        <div>

                            <h2 class="text-xl font-black tracking-wide">
                                VolunteerHub
                            </h2>

                            <p class="text-[10px] uppercase tracking-[0.3em] text-green-100">
                                VERIFIED VOLUNTEER
                            </p>

                        </div>

                    </div>


                    {{-- VERIFIED Badge --}}
                    <div class="verified-badge">

                        <span>✔ VERIFIED</span>

                    </div>

                </div>


                {{-- BODY --}}
                <div class="card-content">


                    {{-- PHOTO + DETAILS --}}
                    <div class="flex gap-5 items-center">

                        {{-- PHOTO --}}
                        <div class="photo-frame">

                            @if($photo)

                                <img src="{{ asset('storage/'.$photo) }}"
                                    class="w-full h-full object-cover">

                            @else

                                <img src="https://ui-avatars.com/api/?name={{ urlencode($volunteer->name) }}&size=300&background=059669&color=ffffff&bold=true"
                                    class="w-full h-full object-cover">

                            @endif

                            <div class="photo-status">
                                ✔
                            </div>

                        </div>


                        {{-- USER DETAILS --}}
                        <div class="flex-1">

                            <p class="text-[11px] uppercase tracking-[0.25em] text-green-600 font-bold">
                                Volunteer Name
                            </p>

                            <h2 class="text-2xl font-black text-slate-800 leading-tight mt-1 break-words">
                                {{ $volunteer->name }}
                            </h2>

                            <div class="mt-3 inline-flex items-center gap-2 bg-green-50 border border-green-200 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                🪪 {{ $volunteerId }}
                            </div>

                            <div class="mt-3 flex items-center gap-2 text-xs text-slate-500">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                Active Volunteer
                            </div>

                        </div>

                    </div>


                    {{-- CONTACT INFO --}}
                    <div class="grid grid-cols-2 gap-3 mt-5">

                        <div class="info-box">
                            <p>Email</p>
                            <h4>{{ $volunteer->email }}</h4>
                        </div>

                        <div class="info-box">
                            <p>Phone</p>
                            <h4>{{ $volunteer->phone ?? '+91 XXXXX XXXXX' }}</h4>
                        </div>

                    </div>


                    {{-- EVENT BOX --}}
                    <div class="event-box mt-5">

                        <div class="icon-circle">
                            🌱
                        </div>

                        <div class="flex-1">

                            <p class="text-xs uppercase tracking-[0.25em] text-green-600 font-bold">
                                Registered Event
                            </p>

                            <h3 class="text-lg font-black text-slate-800 mt-1">
                                {{ $eventTitle }}
                            </h3>

                            <p class="text-sm text-slate-500 mt-1">
                                Community Volunteer Activity
                            </p>

                        </div>

                    </div>


                    {{-- DETAILS --}}
                    <div class="grid grid-cols-3 gap-3 mt-5">

                        <div class="detail-card">

                            <span>Category</span>

                            <strong>{{ $category }}</strong>

                        </div>

                        <div class="detail-card">

                            <span>Event Date</span>

                            <strong>{{ $eventDate }}</strong>

                        </div>

                        <div class="detail-card">

                            <span>Status</span>

                            <strong class="text-green-700">APPROVED</strong>

                        </div>

                    </div>


                    {{-- NFC + SECURITY STRIP --}}
                    <div class="flex items-center justify-between mt-6">

                        <div class="flex items-center gap-3">

                            <div class="nfc-chip"></div>

                            <div>

                                <p class="text-[10px] uppercase tracking-[0.25em] text-slate-400 font-bold">
                                    NFC Secure Card
                                </p>

                                <h4 class="font-bold text-slate-700 text-sm">
                                    VolunteerHub Digital Identity
                                </h4>

                            </div>

                        </div>

                        <div class="secure-tag">
                            VERIFIED
                        </div>

                    </div>


                    {{-- FOOTER --}}
                    <div class="front-footer mt-6">

                        <div>

                            <p class="text-[10px] uppercase tracking-[0.25em] text-slate-400 font-bold">
                                Authorized By
                            </p>

                            <h4 class="font-bold text-slate-700">
                                VolunteerHub Administration
                            </h4>

                        </div>

                        <div class="vh-mini-logo">
                            VH
                        </div>

                    </div>

                </div>

                {{-- GREEN STRIP --}}
                <div class="bottom-strip"></div>

            </div>

        </div>


        {{-- ========= BACK SIDE WILL COME IN PART 2 ========= --}}

                {{-- ######################################################## --}}
        {{-- ###################### BACK SIDE ######################## --}}
        {{-- ######################################################## --}}

        <div class="id-card">

            <div class="card-inner bg-white relative overflow-hidden">

                {{-- Background Decoration --}}
                <div class="absolute -top-16 -left-16 w-48 h-48 bg-emerald-200/30 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-44 h-44 bg-teal-200/30 rounded-full blur-3xl"></div>

                {{-- HEADER --}}
                <div class="card-header">

                    <div class="flex items-center gap-3">

                        <div class="logo-box bg-white">

                            <svg width="40" height="40" viewBox="0 0 100 100" fill="none">

                                <circle cx="50" cy="50" r="46"
                                        stroke="#16A34A" stroke-width="4"/>

                                <path d="M50 18
                                         C58 28 60 40 50 52
                                         C40 40 42 28 50 18Z"
                                      fill="#22C55E"/>

                                <circle cx="50" cy="58" r="12"
                                        fill="#059669"/>

                                <path d="M22 70 Q50 88 78 70"
                                      stroke="#0D9488"
                                      stroke-width="6"
                                      stroke-linecap="round"/>

                            </svg>

                        </div>

                        <div>

                            <h2 class="text-xl font-black tracking-wide">
                                VolunteerHub
                            </h2>

                            <p class="text-[10px] uppercase tracking-[0.30em] text-green-100">
                                DIGITAL IDENTITY
                            </p>

                        </div>

                    </div>

                    <div class="verified-badge">
                        DIGITAL
                    </div>

                </div>


                {{-- BODY --}}
                <div class="card-content flex flex-col justify-between">

                    {{-- QR + Verification --}}
                    <div class="flex items-center gap-5">

                        {{-- QR BOX --}}
                        <div class="bg-white rounded-2xl border-2 border-green-200 shadow-md p-3">

                            <div class="grid grid-cols-8 gap-[2px] w-28 h-28">

                                @php
                                    $qrPattern = [
                                        1,1,1,1,1,0,1,0,
                                        1,0,0,0,1,1,0,1,
                                        1,0,1,0,1,0,1,1,
                                        1,0,0,1,1,1,0,0,
                                        1,1,1,1,0,1,1,0,
                                        0,1,0,1,1,0,1,1,
                                        1,1,0,0,1,1,0,1,
                                        0,1,1,1,0,1,1,1
                                    ];
                                @endphp

                                @foreach($qrPattern as $pixel)
                                    <div class="{{ $pixel ? 'bg-black' : 'bg-white border border-gray-100' }} rounded-sm"></div>
                                @endforeach

                            </div>

                        </div>


                        {{-- Verification --}}
                        <div class="flex-1">

                            <p class="text-[11px] uppercase tracking-[0.25em] text-green-600 font-bold">
                                Digital Verification
                            </p>

                            <h3 class="text-xl font-black text-slate-800 mt-1">
                                Verified Volunteer
                            </h3>

                            <p class="text-sm text-slate-500 leading-6 mt-2">
                                This identity card is issued by
                                <span class="font-semibold text-green-700">VolunteerHub</span>
                                for approved student volunteers participating in verified
                                community service events.
                            </p>

                            <div class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-3 py-1 rounded-full mt-3 text-xs font-bold">
                                ✔ Verified Identity
                            </div>

                        </div>

                    </div>


                    {{-- Divider --}}
                    <div class="flex items-center gap-3 my-5">
                        <div class="flex-1 h-px bg-green-200"></div>
                        <span class="text-green-700 text-xs font-black tracking-[0.30em]">
                            VOLUNTEERHUB
                        </span>
                        <div class="flex-1 h-px bg-green-200"></div>
                    </div>


                    {{-- Mission --}}
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl p-4 border border-green-100">

                        <div class="flex items-center gap-3 mb-2">
                            <span class="text-2xl">🌍</span>
                            <h4 class="font-black text-green-700">
                                OUR MISSION
                            </h4>
                        </div>

                        <p class="text-sm text-slate-600 leading-6">
                            Connecting students with meaningful volunteering opportunities,
                            building stronger communities, and rewarding social impact through
                            verified volunteer experiences.
                        </p>

                    </div>


                    {{-- Volunteer Guidelines --}}
                    <div class="mt-5">

                        <h4 class="font-black text-green-700 mb-3 flex items-center gap-2">
                            📋 Volunteer Guidelines
                        </h4>

                        <div class="grid grid-cols-2 gap-3 text-xs">

                            <div class="bg-slate-50 rounded-xl p-3 border">
                                <span class="font-black text-green-700">01</span>
                                <p class="mt-1 text-slate-600">
                                    Carry this ID during every volunteer activity.
                                </p>
                            </div>

                            <div class="bg-slate-50 rounded-xl p-3 border">
                                <span class="font-black text-green-700">02</span>
                                <p class="mt-1 text-slate-600">
                                    Show this card to the Event Coordinator when requested.
                                </p>
                            </div>

                            <div class="bg-slate-50 rounded-xl p-3 border">
                                <span class="font-black text-green-700">03</span>
                                <p class="mt-1 text-slate-600">
                                    This card is non-transferable and valid only for the registered volunteer.
                                </p>
                            </div>

                            <div class="bg-slate-50 rounded-xl p-3 border">
                                <span class="font-black text-green-700">04</span>
                                <p class="mt-1 text-slate-600">
                                    Misuse of this ID may result in cancellation of volunteer membership.
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Security Seal --}}
                    <div class="mt-5 bg-gradient-to-r from-emerald-600 via-green-600 to-teal-600 rounded-2xl px-4 py-3 text-white flex justify-between items-center shadow-lg">

                        <div>
                            <p class="text-[10px] uppercase tracking-[0.30em] text-green-100">
                                Security Seal
                            </p>

                            <h4 class="font-black text-lg">
                                AUTHENTIC VOLUNTEER ID
                            </h4>
                        </div>

                        <div class="w-14 h-14 rounded-full bg-white/20 border border-white/30 flex items-center justify-center text-2xl">
                            🛡️
                        </div>

                    </div>


                    {{-- Signature + Volunteer ID --}}
                    <div class="grid grid-cols-2 gap-6 items-end mt-6">

                        {{-- Founder Signature --}}
                        <div class="text-center">

                            <div class="h-12 flex justify-center items-end">

                                <svg width="150" height="45" viewBox="0 0 180 55" xmlns="http://www.w3.org/2000/svg">

                                    <path d="M8 40
                                             C20 18,28 18,34 36
                                             C39 50,48 12,58 22
                                             C66 30,69 43,78 35
                                             C87 27,91 13,98 19
                                             C105 25,101 43,111 39
                                             C121 35,123 17,132 21
                                             C141 25,135 42,146 39
                                             C155 36,158 25,171 19"
                                          fill="none"
                                          stroke="#047857"
                                          stroke-width="2.5"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"/>

                                    <path d="M25 47
                                             C60 51,105 49,163 44"
                                          fill="none"
                                          stroke="#059669"
                                          stroke-width="2"
                                          stroke-linecap="round"/>

                                </svg>

                            </div>

                            <div class="border-b-2 border-slate-400 pb-1 w-40 mx-auto">
                                <p class="font-bold text-sm text-slate-700">
                                    Nikhil Khairnar
                                </p>
                            </div>

                            <p class="text-[10px] uppercase tracking-[0.20em] text-slate-500 mt-2 font-bold">
                                Founder & CEO of VolunteerHub
                            </p>

                        </div>


                        {{-- Volunteer ID --}}
                        <div class="text-right">

                            <p class="text-[10px] uppercase tracking-[0.25em] text-slate-400 font-bold">
                                Volunteer ID
                            </p>

                            <h2 class="text-2xl font-black text-green-700 mt-2">
                                {{ $volunteerId }}
                            </h2>

                            <p class="text-xs text-slate-500 mt-1">
                                Keep this ID card safe.
                            </p>

                        </div>

                    </div>

                </div>

                {{-- Bottom Strip --}}
                <div class="bottom-strip"></div>

            </div>

        </div>

    </div>

    {{-- END OF BOTH CARDS --}}


    <style>

/* ===================================================
   VOLUNTEERHUB PREMIUM ID CARD V3
===================================================*/

body{
    font-family:'Poppins',sans-serif;
}

/* ---------- Wrapper ---------- */

.id-card-wrapper{
    max-width:1200px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:30px;
}

/* ---------- Card ---------- */

.id-card{
    width:100%;
}

.card-inner{
    position:relative;
    background:#fff;
    border-radius:28px;
    overflow:hidden;
    border:1px solid #D1FAE5;
    box-shadow:0 20px 45px rgba(15,23,42,.12);
    min-height:720px;
    display:flex;
    flex-direction:column;
}

/* ---------- Header ---------- */

.card-header{
    background:linear-gradient(135deg,#166534,#10B981,#0F766E);
    padding:20px 22px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    color:white;
    position:relative;
}

.card-header::after{
    content:"";
    position:absolute;
    width:160px;
    height:160px;
    right:-60px;
    top:-70px;
    background:rgba(255,255,255,.08);
    border-radius:50%;
}

.logo-box{
    width:56px;
    height:56px;
    border-radius:16px;
    background:white;
    display:flex;
    justify-content:center;
    align-items:center;
    box-shadow:0 6px 18px rgba(0,0,0,.15);
}

.verified-badge{
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(10px);
    padding:10px 14px;
    border-radius:12px;
    font-size:11px;
    font-weight:800;
    letter-spacing:.12em;
    border:1px solid rgba(255,255,255,.2);
}

/* ---------- Body ---------- */

.card-content{
    flex:1;
    padding:22px;
    display:flex;
    flex-direction:column;
    justify-content:flex-start;
    gap:18px;
}

/* ---------- Photo ---------- */

.photo-frame{
    width:120px;
    height:140px;
    border-radius:22px;
    overflow:hidden;
    border:4px solid white;
    outline:2px solid #A7F3D0;
    position:relative;
    box-shadow:0 10px 25px rgba(0,0,0,.15);
    flex-shrink:0;
}

.photo-frame img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.photo-status{
    position:absolute;
    right:6px;
    bottom:6px;
    width:28px;
    height:28px;
    background:#16A34A;
    color:white;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:14px;
    border:2px solid white;
    font-weight:bold;
}

/* ---------- Info Box ---------- */

.info-box{
    background:#F8FAFC;
    padding:12px;
    border-radius:14px;
    border:1px solid #E2E8F0;
}

.info-box p{
    font-size:10px;
    font-weight:700;
    color:#64748B;
    text-transform:uppercase;
    letter-spacing:.12em;
}

.info-box h4{
    margin-top:6px;
    font-size:13px;
    font-weight:700;
    color:#1E293B;
    word-break:break-word;
}

/* ---------- Event ---------- */

.event-box{
    background:linear-gradient(135deg,#ECFDF5,#F0FDFA);
    border:1px solid #BBF7D0;
    padding:16px;
    border-radius:18px;
    display:flex;
    align-items:center;
    gap:15px;
}

.icon-circle{
    width:52px;
    height:52px;
    border-radius:16px;
    background:white;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:24px;
    box-shadow:0 4px 10px rgba(0,0,0,.08);
}

/* ---------- Detail Cards ---------- */

.detail-card{
    background:#F9FAFB;
    border-radius:14px;
    padding:12px;
    border:1px solid #E5E7EB;
    text-align:center;
}

.detail-card span{
    display:block;
    font-size:10px;
    color:#64748B;
    text-transform:uppercase;
    letter-spacing:.08em;
    font-weight:700;
}

.detail-card strong{
    display:block;
    margin-top:6px;
    font-size:13px;
    font-weight:800;
    color:#0F172A;
}

/* ---------- NFC ---------- */

.nfc-chip{
    width:42px;
    height:30px;
    border-radius:6px;
    background:linear-gradient(135deg,#FACC15,#EAB308,#CA8A04);
    position:relative;
}

.nfc-chip::before,
.nfc-chip::after{
    content:"";
    position:absolute;
    border:2px solid rgba(255,255,255,.55);
    border-radius:4px;
}

.nfc-chip::before{
    inset:5px;
}

.nfc-chip::after{
    inset:10px;
}

.secure-tag{
    background:#DCFCE7;
    color:#047857;
    padding:8px 16px;
    border-radius:999px;
    font-size:11px;
    font-weight:800;
}

/* ---------- Footer ---------- */

.front-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;
    border-top:1px solid #E5E7EB;
    padding-top:14px;
}

.vh-mini-logo{
    width:46px;
    height:46px;
    border-radius:14px;
    background:linear-gradient(135deg,#16A34A,#0F766E);
    display:flex;
    justify-content:center;
    align-items:center;
    color:white;
    font-weight:900;
    font-size:14px;
}

/* ---------- QR ---------- */

.qr-container{
    padding:10px;
    background:white;
    border-radius:18px;
    border:2px solid #DCFCE7;
    box-shadow:0 6px 15px rgba(0,0,0,.08);
}

.qr{
    width:110px;
    height:110px;
    display:grid;
    grid-template-columns:repeat(8,1fr);
    gap:2px;
}

.qr div{
    border-radius:2px;
}

/* ---------- Signature ---------- */

.signature-name{
    border-bottom:2px solid #94A3B8;
    padding-bottom:5px;
    display:inline-block;
    width:170px;
    text-align:center;
    font-size:14px;
    font-weight:700;
    color:#334155;
}

/* ---------- Bottom Strip ---------- */

.bottom-strip{
    height:8px;
    background:linear-gradient(90deg,#166534,#10B981,#14B8A6);
}

/* ---------- Mobile ---------- */

@media(max-width:900px){

    .id-card-wrapper{
        grid-template-columns:1fr;
    }

    .card-inner{
        min-height:auto;
    }

}

/* ---------- Print ---------- */

@media print{

    @page{
        size:A4 landscape;
        margin:8mm;
    }

    body{
        background:white !important;
    }

    nav,header,footer,.print\:hidden{
        display:none !important;
    }

    .id-card-wrapper{
        display:grid !important;
        grid-template-columns:1fr 1fr !important;
        gap:8mm;
        max-width:none !important;
    }

    .card-inner{
        min-height:335px !important;
        box-shadow:none !important;
        border:1px solid #059669 !important;
    }

    .bottom-strip,
    .card-header{
        print-color-adjust:exact;
        -webkit-print-color-adjust:exact;
    }

}
</style>

@endsection