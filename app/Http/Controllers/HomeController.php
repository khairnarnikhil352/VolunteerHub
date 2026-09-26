<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // Total volunteers/users
        $totalVolunteers = User::count();

        // Total events
        $totalEvents = Event::count();

        // Upcoming events
        $upcomingEventsCount = Event::where('status', 'Upcoming')
            ->whereDate('event_date', '>=', now()->toDateString())
            ->count();

        // Completed events
        $completedEventsCount = Event::where('status', 'Completed')
            ->count();

        // Total cities
        $totalCities = Event::whereNotNull('city')
            ->where('city', '!=', '')
            ->select('city')
            ->distinct()
            ->count();

        // Dynamic categories
        $categories = Event::whereNotNull('category')
            ->where('category', '!=', '')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->get();

        // Next upcoming event
        $upcomingEvent = Event::where('status', 'Upcoming')
            ->whereDate('event_date', '>=', now()->toDateString())
            ->orderBy('event_date', 'asc')
            ->first();

        // Featured upcoming events
        $featuredEvents = Event::where('status', 'Upcoming')
            ->whereDate('event_date', '>=', now()->toDateString())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        // Recently completed volunteer registrations
        $recentVolunteers = EventRegistration::with([
                'user',
                'event'
            ])
            ->whereRaw('LOWER(status) = ?', ['completed'])
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact(
            'totalVolunteers',
            'totalEvents',
            'upcomingEventsCount',
            'completedEventsCount',
            'totalCities',
            'categories',
            'upcomingEvent',
            'featuredEvents',
            'recentVolunteers'
        ));
    }
}

