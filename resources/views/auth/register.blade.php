@extends('layouts.app')

@section('content')

<style>
    /* Premium Register Page CSS */
    .glass-card{
        background:rgba(255,255,255,.12);
        backdrop-filter:blur(18px);
        border:1px solid rgba(255,255,255,.2);
        box-shadow:0 20px 45px rgba(0,0,0,.25);
    }

    .input-box{
        width:100%;
        height:56px;
        padding:0 18px;
        border-radius:16px;
        background:rgba(255,255,255,.18);
        border:1px solid rgba(255,255,255,.25);
        color:white;
        outline:none;
        transition:.3s;
    }

    .input-box::placeholder{
        color:#d1fae5;
    }

    .input-box:focus{
        border-color:#fde047;
        box-shadow:0 0 0 3px rgba(253,224,71,.35);
    }

    .btn-register{
        background:linear-gradient(90deg,#FACC15,#FB923C);
        transition:.3s;
    }

    .btn-register:hover{
        transform:translateY(-2px);
        box-shadow:0 10px 30px rgba(250,204,21,.45);
    }

    .feature-card{
        background:rgba(255,255,255,.10);
        border:1px solid rgba(255,255,255,.15);
        backdrop-filter:blur(10px);
    }
</style>

<section class="min-h-screen bg-gradient-to-br from-green-700 via-emerald-600 to-blue-700 py-12 px-4 flex items-center relative overflow-hidden">

    <!-- Background Blur -->
    <div class="absolute -top-24 -left-24 w-80 h-80 bg-green-300/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-300/20 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto w-full grid lg:grid-cols-2 gap-12 items-center">

        <!-- LEFT CONTENT -->
        <div class="hidden lg:block text-white">

            <div class="flex items-center gap-4 mb-8">
                <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center text-3xl">
                    🌿
                </div>

                <div>
                    <h2 class="text-3xl font-black">VolunteerHub</h2>
                    <p class="text-green-100">Together We Can Make a Difference</p>
                </div>
            </div>

            <h1 class="text-5xl font-black leading-tight">
                Become a
                <span class="text-yellow-300">Volunteer Today!</span>
            </h1>

            <p class="mt-6 text-lg text-green-100 leading-8">
                Create your VolunteerHub account and participate in tree plantation,
                blood donation, education programs, and community events across India.
            </p>

            <div class="mt-10 space-y-5">

                <div class="feature-card rounded-2xl p-4 flex items-center gap-4">
                    <div class="text-3xl">🌳</div>
                    <div>
                        <h4 class="font-semibold">Environment Drives</h4>
                        <p class="text-sm text-green-100">Join tree plantation and clean-up campaigns.</p>
                    </div>
                </div>

                <div class="feature-card rounded-2xl p-4 flex items-center gap-4">
                    <div class="text-3xl">❤️</div>
                    <div>
                        <h4 class="font-semibold">Healthcare Events</h4>
                        <p class="text-sm text-green-100">Volunteer in blood donation camps.</p>
                    </div>
                </div>

                <div class="feature-card rounded-2xl p-4 flex items-center gap-4">
                    <div class="text-3xl">🏆</div>
                    <div>
                        <h4 class="font-semibold">Earn Certificates</h4>
                        <p class="text-sm text-green-100">Track volunteer hours and achievements.</p>
                    </div>
                </div>

            </div>

        </div>

        <!-- REGISTER CARD -->
        <div class="glass-card rounded-[32px] p-8 lg:p-10">

            <div class="text-center mb-8">

                <div class="w-20 h-20 rounded-full bg-white mx-auto flex items-center justify-center text-4xl shadow-xl">
                    🌿
                </div>

                <h2 class="text-4xl font-black text-white mt-4">
                    Create Account
                </h2>

                <p class="text-green-100 mt-2">
                    Join India's growing volunteer community.
                </p>

            </div>
            @if ($errors->any())
                <div class="mb-5 bg-red-100 border border-red-400 text-red-700 p-4 rounded-xl">
                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- FORM -->
            <form method="POST" action="/register" class="space-y-6">

                @csrf

                <!-- Row 1 -->
                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-white font-medium mb-2">
                            Full Name
                        </label>

                        <input type="text"
                               name="name"
                               placeholder="Enter your full name"
                               required
                               class="input-box">
                    </div>

                    <div>
                        <label class="block text-white font-medium mb-2">
                            Email Address
                        </label>

                        <input type="email"
                               name="email"
                               placeholder="Enter your email"
                               required
                               class="input-box">
                    </div>

                </div>

                <!-- Row 2 -->
                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-white font-medium mb-2">
                            Mobile Number
                        </label>

                        <input type="text"
                               name="phone"
                               placeholder="+91 9876543210"
                               required
                               class="input-box">
                    </div>

                    <div>
                        <label class="block text-white font-medium mb-2">
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               placeholder="Create Password"
                               required
                               class="input-box">
                    </div>

                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-white font-medium mb-2">
                        Confirm Password
                    </label>

                    <input type="password"
                           name="password_confirmation"
                           placeholder="Confirm Password"
                           required
                           class="input-box">
                </div>

                <!-- Terms -->
                <div class="flex items-start gap-3 text-white text-sm">
                    <input type="checkbox" required class="mt-1 rounded">

                    <span>
                        I agree to the
                        <span class="text-yellow-300 font-semibold">Terms & Conditions</span>
                        and
                        <span class="text-yellow-300 font-semibold">Privacy Policy</span>.
                    </span>
                </div>

                <!-- Register Button -->
                <button type="submit"
                        class="btn-register w-full h-14 rounded-xl text-black font-bold text-lg">
                    🚀 Create Account
                </button>

                <!-- Divider -->
                <div class="flex items-center gap-4">
                    <div class="flex-1 border-t border-white/30"></div>
                    <span class="text-green-100 text-sm">OR</span>
                    <div class="flex-1 border-t border-white/30"></div>
                </div>

                <!-- Google -->
                <button type="button"
                        class="w-full h-14 bg-white rounded-xl flex items-center justify-center gap-3 text-gray-700 font-semibold hover:bg-gray-100 transition">

                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6">

                    Continue with Google
                </button>

                <!-- Login -->
                <p class="text-center text-green-100">
                    Already have an account?

                    <a href="/login"
                       class="text-yellow-300 font-semibold hover:underline">
                        Login Here
                    </a>
                </p>

            </form>

        </div>

    </div>

</section>

@endsection