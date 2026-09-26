<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\User;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        // Dashboard Statistics
        $stats = [
            'totalEvents'          => Event::count(),
            'activeEvents'         => Event::whereDate('event_date', '>=', $today)->count(),
            'completedEvents'      => Event::whereDate('event_date', '<', $today)->count(),

            'totalVolunteers'      => User::where('role', 'volunteer')->count(),

            'totalApplications'    => EventRegistration::count(),
            'approvedApplications' => EventRegistration::where('status', 'approved')->count(),
            'pendingApplications'  => EventRegistration::where('status', 'pending')->count(),
            'rejectedApplications' => EventRegistration::where('status', 'rejected')->count(),
        ];

        // Approval Percentage
        $stats['approvalRate'] = $stats['totalApplications'] > 0
            ? round(($stats['approvedApplications'] / $stats['totalApplications']) * 100)
            : 0;

        // Latest Applications
        $recentApplications = EventRegistration::with(['user', 'event'])
            ->latest()
            ->take(5)
            ->get();

        // Upcoming Events
        $upcomingEvents = Event::whereDate('event_date', '>=', $today)
            ->orderBy('event_date')
            ->take(6)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentApplications',
            'upcomingEvents'
        ));
    }
}