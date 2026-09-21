@extends('layouts.app')

@section('content')

<!-- ================= HERO SECTION ================= -->
<section class="relative overflow-hidden bg-gradient-to-br from-emerald-700 via-green-600 to-blue-700 text-white">

    <!-- Background Blur -->
    <div class="absolute -top-20 -left-20 w-96 h-96 bg-green-400/30 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-400/30 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6 py-24 grid lg:grid-cols-2 gap-12 items-center">

        <!-- Left -->
        <div>
            <span class="bg-white/20 backdrop-blur-lg px-4 py-2 rounded-full border border-white/20 text-sm">
                🌍 India's Trusted Volunteer Platform
            </span>

            <h1 class="mt-8 text-5xl md:text-7xl font-black leading-tight">
                Together We Can
                <span class="text-yellow-300">Change Lives.</span>
            </h1>

            <p class="mt-6 text-lg text-green-100 leading-8">
                VolunteerHub helps volunteers connect with NGOs, discover nearby events,
                choose volunteer roles and track their community impact.
            </p>

            <div class="mt-10 flex flex-wrap gap-4">
                <a href="/register"
                   class="bg-yellow-400 text-black px-7 py-3 rounded-full font-bold hover:bg-yellow-300 transition shadow-xl">
                    Join Community
                </a>

                <a href="#events"
                   class="border border-white px-7 py-3 rounded-full hover:bg-white hover:text-green-700 transition">
                    Explore Events
                </a>
            </div>

            <!-- Mini Stats -->
            <div class="grid grid-cols-3 gap-4 mt-12">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-4 text-center border border-white/20">
                    <h2 class="text-3xl font-bold">120+</h2>
                    <p class="text-sm text-green-100">Volunteers</p>
                </div>

                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-4 text-center border border-white/20">
                    <h2 class="text-3xl font-bold">25</h2>
                    <p class="text-sm text-green-100">Events</p>
                </div>

                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-4 text-center border border-white/20">
                    <h2 class="text-3xl font-bold">18</h2>
                    <p class="text-sm text-green-100">NGO Partners</p>
                </div>
            </div>

        </div>

        <!-- Right Image -->
        <div class="relative">

            <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?auto=format&fit=crop&w=900&q=80"
                 class="rounded-[35px] shadow-2xl border-4 border-white/20 hover:scale-105 duration-500">

            <!-- Floating Card -->
            <div class="absolute -bottom-6 left-6 bg-white rounded-3xl p-5 shadow-2xl text-gray-800 w-60">
                <p class="text-sm text-gray-500">Upcoming Event</p>

                <h3 class="font-bold text-green-700 mt-2">
                    🌳 Tree Plantation Drive
                </h3>

                <p class="text-sm mt-2">📍 Nashik</p>
                <p class="text-sm">20 Sept 2026</p>

                <div class="mt-3 text-green-700 font-semibold text-sm">
                    12 Slots Available
                </div>
            </div>

        </div>

    </div>

    <!-- Wave -->
    <svg class="absolute bottom-0 left-0 w-full" viewBox="0 0 1440 160">
        <path fill="white"
            d="M0,96L60,106C120,117,240,139,360,138C480,139,600,117,720,106C840,96,960,96,1080,106C1200,117,1320,139,1380,149L1440,160V160H0Z"/>
    </svg>

</section>

<!-- ================= IMPACT ================= -->
<section class="bg-white py-20">

<div class="max-w-7xl mx-auto px-6">

<div class="text-center mb-14">

<h2 class="text-4xl font-bold text-green-700">
Our Community Impact
</h2>

<p class="text-gray-500 mt-3">
Helping communities through volunteering.
</p>

</div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-6">

<div class="rounded-3xl p-6 text-center text-white bg-gradient-to-br from-green-500 to-green-700 shadow-xl hover:-translate-y-2 transition">

<div class="text-5xl">🌱</div>

<h3 class="text-4xl font-bold mt-3">120+</h3>

<p>Active Volunteers</p>

</div>

<div class="rounded-3xl p-6 text-center text-white bg-gradient-to-br from-blue-500 to-cyan-600 shadow-xl hover:-translate-y-2 transition">

<div class="text-5xl">📅</div>

<h3 class="text-4xl font-bold mt-3">25</h3>

<p>Volunteer Events</p>

</div>

<div class="rounded-3xl p-6 text-center text-white bg-gradient-to-br from-orange-400 to-red-500 shadow-xl hover:-translate-y-2 transition">

<div class="text-5xl">❤️</div>

<h3 class="text-4xl font-bold mt-3">500+</h3>

<p>Volunteer Hours</p>

</div>

<div class="rounded-3xl p-6 text-center text-white bg-gradient-to-br from-purple-500 to-indigo-600 shadow-xl hover:-translate-y-2 transition">

<div class="text-5xl">🤝</div>

<h3 class="text-4xl font-bold mt-3">18</h3>

<p>NGO Partners</p>

</div>

</div>

</div>

</section>

<!-- ================= CATEGORIES ================= -->
<section id="about" class="py-20 bg-gradient-to-b from-green-50 to-white">

<div class="max-w-7xl mx-auto px-6">

<div class="text-center mb-14">

<h2 class="text-4xl font-bold text-green-700">
Choose Your Volunteer Category
</h2>

<p class="text-gray-500 mt-3">
Find volunteering opportunities based on your interests.
</p>

</div>

<div class="grid md:grid-cols-3 gap-8">

@foreach([
['🌳','Environment','Tree Plantation & Clean-Up Drives','green'],
['❤️','Healthcare','Blood Donation & Health Camps','red'],
['📚','Education','Teaching Children & Literacy Programs','blue'],
['🍲','Food Drive','Food Distribution for Communities','orange'],
['🛡️','Disaster Relief','Emergency Response Volunteers','indigo'],
['🤝','Community Support','Helping NGOs & Elderly Citizens','purple']
] as $cat)

<div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition text-center">

<div class="text-6xl">{{ $cat[0] }}</div>

<h3 class="text-2xl font-bold mt-5 text-{{ $cat[3] }}-600">
{{ $cat[1] }}
</h3>

<p class="mt-3 text-gray-500">{{ $cat[2] }}</p>

</div>

@endforeach

</div>

</div>

</section>

<!-- ================= FEATURED EVENTS ================= -->
<section id="events" class="py-20 bg-gray-100">

<div class="max-w-7xl mx-auto px-6">

<div class="flex justify-between items-center mb-12">

<h2 class="text-4xl font-bold text-green-700">
Featured Events
</h2>

<a href="#" class="text-green-700 font-semibold">
View All →
</a>

</div>

<div class="grid lg:grid-cols-3 gap-8">

<!-- Event 1 -->
<div class="bg-white rounded-[30px] overflow-hidden shadow-xl hover:-translate-y-2 transition">

<img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=700&q=80"
class="h-56 w-full object-cover">

<div class="p-6">

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
Environment
</span>

<h3 class="text-2xl font-bold mt-4">
Tree Plantation Drive
</h3>

<p class="mt-3 text-gray-500">
📍 Nashik • 20 Sept 2026
</p>

<div class="flex justify-between mt-6 items-center">

<span class="text-green-600 font-bold">
12 Slots Left
</span>

<button class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700">
Join
</button>

</div>

</div>

</div>

<!-- Event 2 -->
<div class="bg-white rounded-[30px] overflow-hidden shadow-xl hover:-translate-y-2 transition">

<img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=700&q=80"
class="h-56 w-full object-cover">

<div class="p-6">

<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
Healthcare
</span>

<h3 class="text-2xl font-bold mt-4">
Blood Donation Camp
</h3>

<p class="mt-3 text-gray-500">
📍 Mumbai • 30 Sept 2026
</p>

<div class="flex justify-between mt-6 items-center">

<span class="text-orange-600 font-bold">
5 Slots Left
</span>

<button class="bg-red-600 text-white px-5 py-2 rounded-full hover:bg-red-700">
Join
</button>

</div>

</div>

</div>

<!-- Event 3 -->
<div class="bg-white rounded-[30px] overflow-hidden shadow-xl hover:-translate-y-2 transition">

<img src="https://images.unsplash.com/photo-1469571486292-b53601020f35?auto=format&fit=crop&w=700&q=80"
class="h-56 w-full object-cover">

<div class="p-6">

<span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm">
Food Drive
</span>

<h3 class="text-2xl font-bold mt-4">
Food Distribution Camp
</h3>

<p class="mt-3 text-gray-500">
📍 Pune • 25 Sept 2026
</p>

<div class="flex justify-between mt-6 items-center">

<span class="text-red-600 font-bold">
2 Slots Left
</span>

<button class="bg-orange-500 text-white px-5 py-2 rounded-full hover:bg-orange-600">
Join
</button>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- ================= HOW IT WORKS ================= -->
<section class="py-20 bg-white">

<div class="max-w-6xl mx-auto px-6 text-center">

<h2 class="text-4xl font-bold text-blue-700 mb-12">
How VolunteerHub Works
</h2>

<div class="grid md:grid-cols-4 gap-8">

@foreach([
['📝','Register','Create your free account.'],
['🔍','Explore Events','Find volunteer opportunities nearby.'],
['🎯','Choose Role','Select the role you like.'],
['🌍','Make Impact','Join events and earn volunteer hours.']
] as $step)

<div>

<div class="w-20 h-20 mx-auto rounded-full bg-green-100 flex items-center justify-center text-4xl shadow-md">
{{ $step[0] }}
</div>

<h3 class="mt-5 font-bold text-lg">{{ $step[1] }}</h3>

<p class="text-gray-500 mt-2">{{ $step[2] }}</p>

</div>

@endforeach

</div>

</div>

</section>

<!-- ================= WHY CHOOSE US ================= -->
<section class="py-20 bg-gradient-to-r from-green-600 to-blue-600 text-white">

<div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">

<div>

<h2 class="text-5xl font-black">
Why VolunteerHub?
</h2>

<p class="mt-6 text-green-100 leading-8">
VolunteerHub provides a simple platform where volunteers and NGOs work together.
Track volunteer hours, join events, and contribute to meaningful causes.
</p>

<ul class="mt-8 space-y-4 text-lg">

<li>✔ Easy Event Registration</li>

<li>✔ Volunteer Role Selection</li>

<li>✔ Real-time Slot Availability</li>

<li>✔ NGO & Volunteer Dashboard</li>

<li>✔ Certificate & Volunteer Hours</li>

</ul>

</div>

<div class="bg-white/10 backdrop-blur-xl rounded-[35px] p-8 border border-white/20">

<div class="space-y-6">

<div class="flex justify-between">
<span>Tree Plantation</span>
<span>90%</span>
</div>

<div class="w-full bg-white/20 rounded-full h-3">
<div class="bg-yellow-300 h-3 rounded-full w-[90%]"></div>
</div>

<div class="flex justify-between">
<span>Blood Donation</span>
<span>70%</span>
</div>

<div class="w-full bg-white/20 rounded-full h-3">
<div class="bg-red-300 h-3 rounded-full w-[70%]"></div>
</div>

<div class="flex justify-between">
<span>Education Camp</span>
<span>85%</span>
</div>

<div class="w-full bg-white/20 rounded-full h-3">
<div class="bg-blue-300 h-3 rounded-full w-[85%]"></div>
</div>

</div>

</div>

</div>

</section>

<!-- ================= TESTIMONIALS ================= -->
<section class="py-20 bg-green-50">

<div class="max-w-6xl mx-auto px-6">

<div class="text-center mb-12">

<h2 class="text-4xl font-bold text-green-700">
Volunteer Stories
</h2>

<p class="text-gray-500 mt-3">
What our volunteers say about VolunteerHub.
</p>

</div>

<div class="grid md:grid-cols-3 gap-8">

@foreach([
['Priya Patil','Volunteer','VolunteerHub helped me participate in my first tree plantation drive. Amazing experience!'],
['Rahul Shinde','Volunteer','I completed 42 volunteer hours through VolunteerHub and earned my certificate.'],
['Helping Hands NGO','NGO Partner','Managing volunteers became much easier using VolunteerHub dashboard.']
] as $t)

<div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-xl transition">

<div class="text-yellow-400 text-xl">★★★★★</div>

<p class="mt-4 text-gray-600">
{{ $t[2] }}
</p>

<h4 class="mt-6 font-bold text-green-700">
{{ $t[0] }}
</h4>

<p class="text-sm text-gray-500">
{{ $t[1] }}
</p>

</div>

@endforeach

</div>

</div>

</section>

<!-- ================= CALL TO ACTION ================= -->
<section class="py-24 bg-gradient-to-r from-green-700 via-green-600 to-blue-700 text-center text-white">

<div class="max-w-4xl mx-auto px-6">

<h2 class="text-5xl font-black">
Become a Volunteer Today
</h2>

<p class="mt-6 text-lg text-green-100 leading-8">
Join thousands of volunteers who are making communities cleaner,
healthier and happier every day.
</p>

<div class="mt-10 flex justify-center gap-5 flex-wrap">

<a href="/register"
class="bg-yellow-400 text-black px-8 py-4 rounded-full font-bold hover:bg-yellow-300 transition shadow-xl">
Join VolunteerHub
</a>

<a href="#events"
class="border border-white px-8 py-4 rounded-full hover:bg-white hover:text-green-700 transition">
Browse Events
</a>

</div>

</div>

</section>

@endsection