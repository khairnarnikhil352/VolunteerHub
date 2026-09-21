@extends('layouts.student')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-100">

    {{-- ================= HERO SECTION ================= --}}
    <section class="relative overflow-hidden rounded-b-[45px] bg-gradient-to-r from-pink-600 via-red-500 to-orange-500 text-white">

        <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-pink-300/20 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-8 py-16 relative z-10">

            <span class="bg-white/20 px-5 py-2 rounded-full text-sm font-semibold">
                ❤️ VolunteerHub Saved Events
            </span>

            <h1 class="text-5xl lg:text-6xl font-black mt-6 leading-tight">
                Your Saved Volunteer Events
            </h1>

            <p class="mt-5 text-lg text-pink-100 max-w-2xl">
                Keep track of volunteer opportunities that you want to join later.
                Register anytime before the event fills up.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">

                <a href="{{ route('events.index') }}"
                   class="bg-white text-red-600 px-6 py-3 rounded-xl font-bold hover:bg-red-100 transition">
                    🌍 Browse More Events
                </a>

            </div>

        </div>

    </section>

    {{-- ================= STATS ================= --}}
    <div class="max-w-7xl mx-auto px-6 -mt-10 relative z-20">

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

            <div class="bg-white rounded-2xl shadow-lg p-5 text-center">
                <div class="text-4xl">❤️</div>
                <h2 class="text-3xl font-black text-red-600 mt-2">
                    {{ $savedEvents->count() }}
                </h2>
                <p class="text-gray-500 text-sm">Saved Events</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-5 text-center">
                <div class="text-4xl">🌍</div>
                <h2 class="text-3xl font-black text-green-700 mt-2">
                    {{ $savedEvents->where('event.status','Upcoming')->count() }}
                </h2>
                <p class="text-gray-500 text-sm">Upcoming Events</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-5 text-center">
                <div class="text-4xl">🏆</div>
                <h2 class="text-3xl font-black text-yellow-500 mt-2">
                    {{ $savedEvents->where('event.status','Completed')->count() }}
                </h2>
                <p class="text-gray-500 text-sm">Completed Events</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-5 text-center">
                <div class="text-4xl">📍</div>
                <h2 class="text-3xl font-black text-blue-600 mt-2">
                    {{ $savedEvents->pluck('event.city')->unique()->count() }}
                </h2>
                <p class="text-gray-500 text-sm">Cities Covered</p>
            </div>

        </div>

    </div>

    {{-- ================= SAVED EVENTS GRID ================= --}}
    <section class="max-w-7xl mx-auto px-6 py-14">

        <div class="flex justify-between items-center mb-8">

            <div>
                <h2 class="text-4xl font-black text-gray-800">
                    ❤️ Saved Volunteer Opportunities
                </h2>

                <p class="text-gray-500 mt-2">
                    All the volunteer events you've bookmarked.
                </p>
            </div>

            <span class="bg-red-100 text-red-700 px-5 py-2 rounded-full font-semibold">
                {{ $savedEvents->count() }} Saved
            </span>

        </div>

        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">

            @forelse($savedEvents as $save)

                @php
                    $event = $save->event;

                    $percentage = ($event->capacity > 0)
                        ? ($event->filled_slots / $event->capacity) * 100
                        : 0;

                    $remaining = $event->capacity - $event->filled_slots;


                    $status = $registrations[$event->id] ?? null;

                    
                    $badgeColor = match($event->category){
                        'Environment' => 'bg-green-100 text-green-700',
                        'Healthcare' => 'bg-red-100 text-red-700',
                        'Education' => 'bg-blue-100 text-blue-700',
                        'Community Service' => 'bg-yellow-100 text-yellow-700',
                        default => 'bg-gray-100 text-gray-700'
                    };
                @endphp

                <div class="group bg-white rounded-[28px] shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition duration-500">

                    {{-- Event Banner --}}
                    <div class="relative h-52 overflow-hidden">

                        @if($event->banner)
                            <img src="{{ asset('images/events/'.$event->banner) }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        @else
                            <img src="{{ asset('images/events/default.jpg') }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

                        <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-bold {{ $badgeColor }}">
                            {{ $event->category }}
                        </span>

                        <span class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            ❤️ Saved
                        </span>

                    </div>

                    {{-- Card Body --}}

                    {{-- ================= CARD CONTENT ================= --}}
<div class="p-6">

    {{-- Event Title --}}
    <h3 class="text-2xl font-black text-gray-800">
        {{ $event->title }}
    </h3>

    {{-- Description --}}
    <p class="text-gray-500 text-sm mt-3 line-clamp-3">
        {{ $event->description }}
    </p>

    {{-- Event Information --}}
    <div class="grid grid-cols-2 gap-3 mt-5">

        <div class="bg-green-50 p-3 rounded-xl">
            <p class="text-xs text-gray-500">📍 City</p>
            <h4 class="font-bold text-green-700">
                {{ $event->city }}
            </h4>
        </div>

        <div class="bg-blue-50 p-3 rounded-xl">
            <p class="text-xs text-gray-500">🏢 Venue</p>
            <h4 class="font-bold text-blue-700">
                {{ $event->venue }}
            </h4>
        </div>

        <div class="bg-orange-50 p-3 rounded-xl">
            <p class="text-xs text-gray-500">📅 Date</p>
            <h4 class="font-bold text-orange-600">
                {{ $event->event_date->format('d M Y') }}
            </h4>
        </div>

        <div class="bg-purple-50 p-3 rounded-xl">
            <p class="text-xs text-gray-500">⏰ Time</p>
            <h4 class="font-bold text-purple-700">
                {{ date('h:i A', strtotime($event->start_time)) }}
            </h4>
        </div>

    </div>

    {{-- Volunteer Capacity --}}
    @php
        $percentage = ($event->capacity > 0)
            ? ($event->filled_slots / $event->capacity) * 100
            : 0;

        $remaining = $event->capacity - $event->filled_slots;
    @endphp

    <div class="mt-6">

        <div class="flex justify-between text-sm mb-2">

            <span class="font-semibold">Volunteer Capacity</span>

            <span class="font-bold text-green-700">
                {{ $remaining }} Slots Left
            </span>

        </div>

        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">

            <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-full rounded-full"
                 style="width: {{ $percentage }}%">
            </div>

        </div>

        <div class="flex justify-between mt-2 text-xs text-gray-500">

            <span>{{ $event->filled_slots }} Joined</span>

            <span>{{ $event->capacity }} Capacity</span>

        </div>

    </div>

    {{-- Action Buttons --}}
    <div class="grid grid-cols-2 gap-3 mt-6">

        {{-- Register Button --}}
          @if($status === 'Pending')

                                <button class="w-full bg-yellow-400 text-yellow-900 py-3 rounded-xl font-bold cursor-not-allowed">
                                    ⏳ Pending
                                </button>

                            @elseif($status === 'Approved')

                                <button class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold cursor-not-allowed">
                                    ✅ Approved
                                </button>

                            @elseif($status === 'Rejected')

                                <button class="w-full bg-red-500 text-white py-3 rounded-xl font-bold cursor-not-allowed">
                                    ❌ Rejected
                                </button>

                            @elseif($remaining > 0)

                                <a href="{{ route('events.register', $event->id) }}"
                                class="block text-center bg-gradient-to-r from-green-600 to-emerald-600 text-white py-3 rounded-xl font-bold hover:scale-105 transition">
                                    📝 Register
                                </a>

                            @else

                                <button class="w-full bg-gray-300 text-gray-600 py-3 rounded-xl font-bold cursor-not-allowed">
                                    🚫 Event Full
                                </button>

                            @endif

      

        

        {{-- Remove Saved Button --}}
        <form action="{{ route('events.unsave',$event->id) }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button class="w-full border border-red-500 text-red-600 py-3 rounded-xl font-bold hover:bg-red-50 transition">

                💔 Remove

            </button>

        </form>

    </div>

</div>
                 

                </div>

            @empty

                {{-- Empty State --}}
                <div class="col-span-3 bg-white rounded-[30px] shadow-lg p-12 text-center">

                    <div class="text-7xl mb-4">❤️</div>

                    <h2 class="text-3xl font-black text-red-600">
                        No Saved Events Yet
                    </h2>

                    <p class="text-gray-500 mt-3">
                        Save volunteer events that interest you and they'll appear here.
                    </p>

                    <a href="{{ route('events.index') }}"
                       class="inline-block mt-8 bg-gradient-to-r from-green-600 to-emerald-600 text-white px-8 py-4 rounded-xl font-bold hover:scale-105 transition">

                        🌍 Browse Volunteer Events

                    </a>

                </div>

            @endforelse

        </div>

    </section>

    {{-- ================= CTA ================= --}}
    <section class="max-w-7xl mx-auto px-6 pb-16">

        <div class="bg-gradient-to-r from-red-500 via-pink-500 to-orange-500 rounded-[35px] p-10 text-white text-center shadow-xl">

            <h2 class="text-4xl font-black">
                ❤️ Ready to Make an Impact?
            </h2>

            <p class="mt-4 text-pink-100 max-w-2xl mx-auto">
                Register for your saved volunteer events before slots fill up and become a part of your community.
            </p>

            <a href="{{ route('events.index') }}"
               class="inline-block mt-8 bg-white text-red-600 px-8 py-4 rounded-xl font-bold hover:bg-red-50 transition">

                Explore More Events 🌿

            </a>

        </div>

    </section>

</div>

@endsection