<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | USER REGISTRATIONS
        |--------------------------------------------------------------------------
        */

        $registrations = EventRegistration::with('event')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | BASIC STATS
        |--------------------------------------------------------------------------
        */

        // Approved + Completed events
        $eventsJoined = $registrations
            ->whereIn('status', ['approved', 'completed'])
            ->count();

        // Upcoming approved events
        $upcomingRegistrations = $registrations
            ->filter(function ($registration) {
                return $registration->event
                    && strtolower($registration->status) === 'approved'
                    && Carbon::parse($registration->event->event_date)->gte(today());
            })
            ->sortBy(function ($registration) {
                return $registration->event->event_date;
            })
            ->values();

        $upcomingEvents = $upcomingRegistrations->count();

        /*
        |--------------------------------------------------------------------------
        | COMPLETED EVENTS / CERTIFICATES
        |--------------------------------------------------------------------------
        */

        $completedRegistrations = $registrations
            ->filter(function ($registration) {
                return strtolower($registration->status) === 'completed';
            });

        $certificates = $completedRegistrations->count();

        /*
        |--------------------------------------------------------------------------
        | VOLUNTEER HOURS
        |--------------------------------------------------------------------------
        |
        | If your events table has volunteer_hours / hours column,
        | it will be used automatically.
        |
        */

        $volunteerHours = 0;

        foreach ($completedRegistrations as $registration) {

            if (!$registration->event) {
                continue;
            }

            $event = $registration->event;

            if (isset($event->volunteer_hours)) {
                $volunteerHours += (float) $event->volunteer_hours;
            } elseif (isset($event->hours)) {
                $volunteerHours += (float) $event->hours;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | VOLUNTEER GOAL
        |--------------------------------------------------------------------------
        */

        $hoursGoal = 60;

        $hoursProgress = $hoursGoal > 0
            ? min(100, round(($volunteerHours / $hoursGoal) * 100))
            : 0;

        $remainingHours = max(0, $hoursGoal - $volunteerHours);

        /*
        |--------------------------------------------------------------------------
        | EVENT PROGRESS
        |--------------------------------------------------------------------------
        */

        $eventGoal = 10;

        $eventProgress = $eventGoal > 0
            ? min(100, round(($eventsJoined / $eventGoal) * 100))
            : 0;

        $remainingEvents = max(0, $eventGoal - $eventsJoined);

        /*
        |--------------------------------------------------------------------------
        | BADGE
        |--------------------------------------------------------------------------
        */

        if ($volunteerHours >= 100 || $eventsJoined >= 20) {

            $badge = 'Gold Badge';
            $badgeIcon = '🏆';

        } elseif ($volunteerHours >= 50 || $eventsJoined >= 10) {

            $badge = 'Silver Badge';
            $badgeIcon = '🥈';

        } elseif ($volunteerHours >= 25 || $eventsJoined >= 5) {

            $badge = 'Bronze Badge';
            $badgeIcon = '🥉';

        } else {

            $badge = 'New Volunteer';
            $badgeIcon = '🌱';
        }

        /*
        |--------------------------------------------------------------------------
        | UPCOMING EVENTS
        |--------------------------------------------------------------------------
        */

        $scheduleEvents = $upcomingRegistrations
            ->take(5);

        /*
        |--------------------------------------------------------------------------
        | AVAILABLE EVENTS
        |--------------------------------------------------------------------------
        |
        | Used for Browse Events section.
        |
        */

        $availableEvents = Event::whereDate('event_date', '>=', today())
            ->where(function ($query) {
                $query->whereColumn('filled_slots', '<', 'capacity')
                    ->orWhereNull('filled_slots');
            })
            ->orderBy('event_date')
            ->take(6)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | RECENT ACTIVITY
        |--------------------------------------------------------------------------
        */

        $recentRegistrations = $registrations
            ->take(5);

        /*
        |--------------------------------------------------------------------------
        | MONTH CALENDAR
        |--------------------------------------------------------------------------
        */

        $calendarMonth = Carbon::now();

        $calendarStart = $calendarMonth->copy()->startOfMonth();
        $calendarEnd = $calendarMonth->copy()->endOfMonth();

        $calendarDays = [];

        // Empty spaces before first day
        for ($i = 0; $i < $calendarStart->dayOfWeek; $i++) {
            $calendarDays[] = null;
        }

        for ($day = 1; $day <= $calendarEnd->day; $day++) {
            $calendarDays[] = $day;
        }

        /*
        |--------------------------------------------------------------------------
        | REGISTERED EVENT DATES
        |--------------------------------------------------------------------------
        */

        $registeredDates = $registrations
            ->filter(function ($registration) {

                return $registration->event
                    && strtolower($registration->status) === 'approved';

            })
            ->map(function ($registration) {

                return Carbon::parse(
                    $registration->event->event_date
                )->format('Y-m-d');

            })
            ->values()
            ->toArray();

        /*
        |--------------------------------------------------------------------------
        | RETURN DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view('volunteer.dashboard', compact(
            'user',
            'registrations',
            'eventsJoined',
            'upcomingEvents',
            'upcomingRegistrations',
            'completedRegistrations',
            'certificates',
            'volunteerHours',
            'hoursGoal',
            'hoursProgress',
            'remainingHours',
            'eventGoal',
            'eventProgress',
            'remainingEvents',
            'badge',
            'badgeIcon',
            'scheduleEvents',
            'availableEvents',
            'recentRegistrations',
            'calendarMonth',
            'calendarDays',
            'registeredDates'
        ));
    }
}