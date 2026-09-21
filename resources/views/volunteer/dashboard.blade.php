@extends('layouts.student')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-blue-50">

    <!-- ================= HERO SECTION ================= -->
    <section class="bg-gradient-to-r from-green-700 via-emerald-600 to-blue-700 rounded-b-[40px] shadow-xl text-white">

        <div class="max-w-7xl mx-auto px-6 py-10">

            <div class="flex flex-col lg:flex-row justify-between items-center gap-8">

                <!-- Welcome Text -->
                <div class="flex-1">

                    <span class="bg-green-500/30 px-4 py-2 rounded-full text-sm">
                        🌿 Student Volunteer Portal
                    </span>

                    <h1 class="text-5xl lg:text-6xl font-black mt-5 leading-tight">
                        Welcome Back,
                        <span class="text-yellow-300">
                            {{ Auth::user()->name }}
                        </span>
                    </h1>

                    <p class="mt-5 text-green-100 text-lg leading-8 max-w-xl">
                        Join community events, earn volunteer hours, unlock badges,
                        and make a positive impact through VolunteerHub.
                    </p>

                    <div class="flex flex-wrap gap-4 mt-8">

                        <button class="bg-yellow-400 hover:bg-yellow-300 text-black px-7 py-3 rounded-full font-bold transition shadow-lg">
                            🌍 Browse Events
                        </button>

                        <button class="border border-white px-7 py-3 rounded-full hover:bg-white hover:text-green-700 transition">
                            📅 My Events
                        </button>

                    </div>

                </div>

                <!-- Student Profile Card -->
                <div class="w-full lg:w-80">

                    <div class="bg-white/15 backdrop-blur-xl rounded-3xl p-6 border border-white/20 shadow-2xl">

                        <div class="flex flex-col items-center">

                            <div class="w-24 h-24 rounded-full bg-white text-green-700 flex items-center justify-center text-5xl font-black shadow-xl">
                                {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                            </div>

                            <h2 class="text-2xl font-bold mt-4">
                                {{ Auth::user()->name }}
                            </h2>

                            <p class="text-green-100 text-sm">
                                {{ Auth::user()->email }}
                            </p>

                            <span class="mt-3 bg-green-400 text-green-900 text-xs px-4 py-2 rounded-full font-bold">
                                ⭐ Active Volunteer
                            </span>

                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-6">

                            <div class="bg-white/10 rounded-2xl p-4 text-center">

                                <h3 class="text-2xl font-black">48</h3>

                                <p class="text-xs text-green-100">
                                    Volunteer Hours
                                </p>

                            </div>

                            <div class="bg-white/10 rounded-2xl p-4 text-center">

                                <h3 class="text-2xl font-black">5</h3>

                                <p class="text-xs text-green-100">
                                    Events Joined
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= DASHBOARD CONTENT ================= -->
    <div class="max-w-7xl mx-auto px-6 py-10">

        <!-- Title -->
        <div class="flex justify-between items-center mb-8">

            <div>
                <h2 class="text-3xl font-black text-gray-800">
                    📊 My Volunteer Dashboard
                </h2>

                <p class="text-gray-500 mt-2">
                    Overview of your volunteer journey and upcoming opportunities.
                </p>
            </div>

            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">
                📅 {{ now()->format('l, d M Y') }}
            </span>

        </div>

        <!-- ================= STATS CARDS ================= -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

            <!-- Card 1 -->
            <div class="bg-white rounded-3xl p-6 shadow-lg hover:-translate-y-2 hover:shadow-2xl transition">

                <div class="flex justify-between items-center">

                    <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">
                        🎉
                    </div>

                    <span class="text-green-600 text-sm font-bold">
                        +2 This Week
                    </span>

                </div>

                <p class="mt-5 text-gray-500">Upcoming Events</p>

                <h2 class="text-4xl font-black text-green-600 mt-2">
                    12
                </h2>

                <p class="text-green-600 text-sm mt-3">
                    New volunteering opportunities available.
                </p>

            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-2xl p-4 shadow-md hover:-translate-y-1 hover:shadow-xl transition duration-300">
                <div class="flex justify-between items-center">

                    <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">
                        🤝
                    </div>

                    <span class="text-blue-600 text-sm font-bold">
                        Active
                    </span>

                </div>

                <p class="mt-5 text-gray-500">Events Joined</p>

                <h2 class="text-4xl font-black text-blue-600 mt-2">
                    5
                </h2>

                <p class="text-blue-600 text-sm mt-3">
                    Keep participating to unlock badges.
                </p>

            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-3xl p-6 shadow-lg hover:-translate-y-2 hover:shadow-2xl transition">

                <div class="flex justify-between items-center">

                   <div class="w-11 h-11 rounded-xl bg-green-100 flex items-center justify-center text-2xl">
                        ⏱️
                    </div>

                    <span class="text-orange-600 text-sm font-bold">
                        Goal 60 Hrs
                    </span>

                </div>

                <p class="mt-5 text-gray-500">Volunteer Hours</p>

                <h2 class="text-4xl font-black text-orange-500 mt-2">
                    48
                </h2>

                <p class="text-orange-500 text-sm mt-3">
                    Only 12 hours left to reach your goal.
                </p>

            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-3xl p-6 shadow-lg hover:-translate-y-2 hover:shadow-2xl transition">

                <div class="flex justify-between items-center">

                    <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-3xl">
                        🏆
                    </div>

                    <span class="text-purple-600 text-sm font-bold">
                        Silver Badge
                    </span>

                </div>

                <p class="mt-5 text-gray-500">Certificates Earned</p>

                <h2 class="text-3xl font-black text-green-600 mt-1">
                    3
                </h2>

                <p class="text-purple-500 text-sm mt-3">
                    Complete 2 more events for Gold Badge.
                </p>

            </div>

        </div>

        <!-- PART 2 starts from here -->

                <!-- ================= QUICK ACTIONS ================= -->

        <div class="mt-12">

            <div class="flex justify-between items-center mb-6">

                <div>
                    <h2 class="text-3xl font-black text-gray-800">
                        ⚡ Quick Actions
                    </h2>
                    <p class="text-gray-500">
                        Everything you need in one place.
                    </p>
                </div>

            </div>

            <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

                <!-- Browse Events -->
                <a href="#events" class="group bg-gradient-to-r from-green-500 to-emerald-600 rounded-3xl p-6 text-white shadow-lg hover:-translate-y-2 transition">

                    <div class="text-5xl mb-5 group-hover:scale-110 transition">
                        🌍
                    </div>

                    <h3 class="text-xl font-bold">
                        Browse Events
                    </h3>

                    <p class="text-green-100 text-sm mt-2">
                        Explore all volunteer opportunities around you.
                    </p>

                </a>

                <!-- My Events -->
                <a href="#" class="group bg-gradient-to-r from-blue-500 to-cyan-600 rounded-3xl p-6 text-white shadow-lg hover:-translate-y-2 transition">

                    <div class="text-5xl mb-5 group-hover:scale-110 transition">
                        📅
                    </div>

                    <h3 class="text-xl font-bold">
                        My Events
                    </h3>

                    <p class="text-blue-100 text-sm mt-2">
                        View all registered volunteer events.
                    </p>

                </a>

                <!-- Certificates -->
                <a href="#" class="group bg-gradient-to-r from-purple-500 to-indigo-600 rounded-3xl p-6 text-white shadow-lg hover:-translate-y-2 transition">

                    <div class="text-5xl mb-5 group-hover:scale-110 transition">
                        📜
                    </div>

                    <h3 class="text-xl font-bold">
                        Certificates
                    </h3>

                    <p class="text-purple-100 text-sm mt-2">
                        Download your volunteer certificates.
                    </p>

                </a>

                <!-- Volunteer Hours -->
                <a href="#" class="group bg-gradient-to-r from-orange-400 to-red-500 rounded-3xl p-6 text-white shadow-lg hover:-translate-y-2 transition">

                    <div class="text-5xl mb-5 group-hover:scale-110 transition">
                        ⏱️
                    </div>

                    <h3 class="text-xl font-bold">
                        Volunteer Hours
                    </h3>

                    <p class="text-orange-100 text-sm mt-2">
                        Track completed community service hours.
                    </p>

                </a>

            </div>

        </div>

        <!-- ================= AVAILABLE EVENTS ================= -->

        <div id="events" class="mt-16">

            <div class="flex justify-between items-center mb-8">

                <div>
                    <h2 class="text-3xl font-black text-gray-800">
                        🌱 Available Volunteer Events
                    </h2>

                    <p class="text-gray-500">
                        Register now before the slots are filled.
                    </p>
                </div>

                <button class="text-green-700 font-semibold hover:text-green-900">
                    View All →
                </button>

            </div>

            <div class="grid lg:grid-cols-3 gap-8">

                <!-- EVENT CARD 1 -->
                <div class="bg-white rounded-[28px] overflow-hidden shadow-xl hover:-translate-y-2 transition">

                    <div class="h-48 bg-gradient-to-r from-green-500 to-emerald-400 flex items-center justify-center text-7xl">
                        🌳
                    </div>

                    <div class="p-6">

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                            Environment
                        </span>

                        <h3 class="text-2xl font-bold mt-4">
                            Tree Plantation Drive
                        </h3>

                        <div class="space-y-2 mt-4 text-gray-600 text-sm">

                            <p>📍 Nashik, Maharashtra</p>

                            <p>📅 20 September 2026</p>

                            <p>⏰ 9:00 AM – 1:00 PM</p>

                        </div>

                        <!-- Capacity -->
                        <div class="mt-5">

                            <div class="flex justify-between text-sm mb-2">
                                <span>Capacity</span>
                                <span class="font-semibold">38 / 50 Filled</span>
                            </div>

                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-green-600 h-2.5 rounded-full w-3/4"></div>
                            </div>

                            <p class="text-green-600 text-sm mt-2 font-semibold">
                                ✅ 12 Slots Remaining
                            </p>

                        </div>

                        <button class="w-full mt-6 bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-semibold">
                            Join Event
                        </button>

                    </div>

                </div>

                <!-- EVENT CARD 2 -->
                <div class="bg-white rounded-[28px] overflow-hidden shadow-xl hover:-translate-y-2 transition">

                    <div class="h-48 bg-gradient-to-r from-red-500 to-pink-400 flex items-center justify-center text-7xl">
                        ❤️
                    </div>

                    <div class="p-6">

                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                            Healthcare
                        </span>

                        <h3 class="text-2xl font-bold mt-4">
                            Blood Donation Camp
                        </h3>

                        <div class="space-y-2 mt-4 text-gray-600 text-sm">

                            <p>📍 Pune, Maharashtra</p>

                            <p>📅 25 September 2026</p>

                            <p>⏰ 10:00 AM – 4:00 PM</p>

                        </div>

                        <div class="mt-5">

                            <div class="flex justify-between text-sm mb-2">
                                <span>Capacity</span>
                                <span class="font-semibold">45 / 50 Filled</span>
                            </div>

                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-red-500 h-2.5 rounded-full w-[90%]"></div>
                            </div>

                            <p class="text-red-600 text-sm mt-2 font-semibold">
                                ⚠️ Only 5 Slots Remaining
                            </p>

                        </div>

                        <button class="w-full mt-6 bg-red-600 hover:bg-red-700 text-white py-3 rounded-xl font-semibold">
                            Join Event
                        </button>

                    </div>

                </div>

                <!-- EVENT CARD 3 -->
                <div class="bg-white rounded-[28px] overflow-hidden shadow-xl hover:-translate-y-2 transition">

                    <div class="h-48 bg-gradient-to-r from-blue-500 to-cyan-400 flex items-center justify-center text-7xl">
                        📚
                    </div>

                    <div class="p-6">

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                            Education
                        </span>

                        <h3 class="text-2xl font-bold mt-4">
                            Education Support Camp
                        </h3>

                        <div class="space-y-2 mt-4 text-gray-600 text-sm">

                            <p>📍 Mumbai, Maharashtra</p>

                            <p>📅 30 September 2026</p>

                            <p>⏰ 11:00 AM – 3:00 PM</p>

                        </div>

                        <div class="mt-5">

                            <div class="flex justify-between text-sm mb-2">
                                <span>Capacity</span>
                                <span class="font-semibold">32 / 40 Filled</span>
                            </div>

                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-blue-500 h-2.5 rounded-full w-4/5"></div>
                            </div>

                            <p class="text-blue-600 text-sm mt-2 font-semibold">
                                ✅ 8 Slots Remaining
                            </p>

                        </div>

                        <button class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold">
                            Join Event
                        </button>

                    </div>

                </div>

            </div>

        </div>

        <!-- ================= PART 3 STARTS BELOW ================= -->

                <!-- ================= VOLUNTEER PROGRESS ================= -->

        <div class="mt-16">

            <h2 class="text-3xl font-black text-gray-800 mb-8">
                🎯 My Volunteer Progress
            </h2>

            <div class="grid lg:grid-cols-2 gap-8">

                <!-- Progress Card -->
                <div class="bg-white rounded-[28px] shadow-xl p-8">

                    <h3 class="text-2xl font-bold text-gray-700 mb-6">
                        📈 Community Impact Progress
                    </h3>

                    <!-- Hours -->
                    <div class="mb-6">
                        <div class="flex justify-between mb-2">
                            <span class="font-medium">Volunteer Hours</span>
                            <span class="font-bold text-green-600">48 / 60 Hours</span>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-green-500 h-3 rounded-full w-4/5"></div>
                        </div>

                        <p class="text-green-600 text-sm mt-2">
                            ✅ 80% Completed
                        </p>
                    </div>

                    <!-- Events -->
                    <div class="mb-6">
                        <div class="flex justify-between mb-2">
                            <span class="font-medium">Events Participation</span>
                            <span class="font-bold text-blue-600">5 / 10 Events</span>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-blue-500 h-3 rounded-full w-1/2"></div>
                        </div>

                        <p class="text-blue-600 text-sm mt-2">
                            🌍 Participate in 5 more events.
                        </p>
                    </div>

                    <!-- Impact -->
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-medium">Community Impact</span>
                            <span class="font-bold text-purple-600">75%</span>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-purple-500 h-3 rounded-full w-3/4"></div>
                        </div>

                        <p class="text-purple-600 text-sm mt-2">
                            💜 Excellent contribution to society.
                        </p>
                    </div>

                </div>

                <!-- Badge Card -->
                <div class="bg-gradient-to-br from-purple-700 via-indigo-700 to-blue-700 rounded-[28px] shadow-xl p-8 text-white">

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-3xl font-black">
                            🏅 Silver Volunteer
                        </h3>

                        <span class="text-5xl">⭐</span>
                    </div>

                    <p class="text-purple-100">
                        Your Impact Score is growing every time you participate in community events.
                    </p>

                    <div class="bg-white/10 rounded-3xl p-6 mt-8 backdrop-blur-lg">

                        <div class="flex justify-between items-center">

                            <div>
                                <p class="text-purple-200 text-sm">Impact Score</p>
                                <h2 class="text-5xl font-black mt-2">
                                    950
                                </h2>
                            </div>

                            <div class="text-6xl">
                                🏆
                            </div>

                        </div>

                        <div class="w-full bg-white/20 rounded-full h-3 mt-6">
                            <div class="bg-yellow-300 h-3 rounded-full w-[90%]"></div>
                        </div>

                        <p class="mt-4 text-yellow-200 text-sm font-semibold">
                            🎖️ Complete 2 more events to unlock GOLD Volunteer Badge.
                        </p>

                    </div>

                    <!-- Mini Stats -->
                    <div class="grid grid-cols-2 gap-4 mt-8">

                        <div class="bg-white/10 rounded-2xl p-4 text-center">
                            <h3 class="text-2xl font-black">3</h3>
                            <p class="text-purple-200 text-xs">
                                Certificates
                            </p>
                        </div>

                        <div class="bg-white/10 rounded-2xl p-4 text-center">
                            <h3 class="text-2xl font-black">12</h3>
                            <p class="text-purple-200 text-xs">
                                Upcoming Events
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- ================= UPCOMING SCHEDULE ================= -->

        <div class="mt-16">

            <div class="flex justify-between items-center mb-8">

                <div>
                    <h2 class="text-3xl font-black text-gray-800">
                        📅 Upcoming Schedule
                    </h2>

                    <p class="text-gray-500">
                        Events you have registered for this month.
                    </p>
                </div>

            </div>

            <div class="grid lg:grid-cols-2 gap-8">

                <!-- Calendar Card -->
                <div class="bg-white rounded-[28px] p-8 shadow-xl">

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-green-700">
                            📅 September 2026
                        </h3>

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                            3 Events
                        </span>
                    </div>

                    <div class="grid grid-cols-7 gap-2 text-center text-sm font-semibold text-gray-500 mb-3">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>

                    <div class="grid grid-cols-7 gap-2 text-center">

                        @for ($day = 1; $day <= 30; $day++)

                            <div
                                class="aspect-square rounded-xl flex items-center justify-center text-sm font-semibold
                                {{ in_array($day, [20,25,30])
                                    ? 'bg-green-600 text-white shadow-md'
                                    : 'bg-gray-100 hover:bg-green-100 text-gray-700' }}">

                                {{ $day }}

                            </div>

                        @endfor

                    </div>

                    <p class="mt-6 text-sm text-green-600 font-semibold">
                        🟢 Green dates indicate your registered volunteer events.
                    </p>

                </div>

                <!-- Schedule List -->
                <div class="bg-white rounded-[28px] p-8 shadow-xl">

                    <h3 class="text-xl font-bold mb-6">
                        🗓️ My Event Schedule
                    </h3>

                    <div class="space-y-5">

                        <div class="flex items-center gap-4 bg-green-50 p-4 rounded-2xl border-l-4 border-green-500">

                            <div class="text-4xl">🌳</div>

                            <div>
                                <h4 class="font-bold">
                                    Tree Plantation Drive
                                </h4>
                                <p class="text-gray-500 text-sm">
                                    Nashik • 20 Sept • 9:00 AM
                                </p>
                            </div>

                        </div>

                        <div class="flex items-center gap-4 bg-red-50 p-4 rounded-2xl border-l-4 border-red-500">

                            <div class="text-4xl">❤️</div>

                            <div>
                                <h4 class="font-bold">
                                    Blood Donation Camp
                                </h4>
                                <p class="text-gray-500 text-sm">
                                    Pune • 25 Sept • 10:00 AM
                                </p>
                            </div>

                        </div>

                        <div class="flex items-center gap-4 bg-blue-50 p-4 rounded-2xl border-l-4 border-blue-500">

                            <div class="text-4xl">📚</div>

                            <div>
                                <h4 class="font-bold">
                                    Education Support Camp
                                </h4>
                                <p class="text-gray-500 text-sm">
                                    Mumbai • 30 Sept • 11:00 AM
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        

        <!-- ================= MOTIVATION BANNER ================= -->

        <div class="mt-16">

            <div class="bg-gradient-to-r from-green-700 via-emerald-600 to-blue-700 rounded-[32px] p-10 text-center text-white shadow-2xl">

                <h2 class="text-5xl font-black leading-tight">
                    💚 Together We Can Make a Difference!
                </h2>

                <p class="mt-5 text-lg text-green-100 max-w-3xl mx-auto leading-8">
                    Every event you join helps create a cleaner environment,
                    healthier communities and a brighter future for everyone.
                    Keep volunteering and inspire others to participate.
                </p>

                <div class="flex flex-wrap justify-center gap-4 mt-8">

                    <button class="bg-yellow-400 text-black px-8 py-3 rounded-full font-bold hover:bg-yellow-300 transition">
                        🌍 Browse More Events
                    </button>

                    <button class="border border-white px-8 py-3 rounded-full hover:bg-white hover:text-green-700 transition">
                        🤝 Invite Friends
                    </button>

                </div>

            </div>

        </div>

    </div>

    

        

</div>

@endsection