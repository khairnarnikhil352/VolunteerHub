<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Auth;
use App\Models\EventSave;



class EventController extends Controller
{
    // Browse Events Page
    public function index(Request $request)
    {
        $query = Event::where('status', 'Upcoming');

        // Search by title
        if ($request->filled('search')) {
            $query->where('title', 'ILIKE', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->filled('category') && $request->category != 'All') {
            $query->where('category', $request->category);
        }

        // Filter by city
        if ($request->filled('city') && $request->city != 'All') {
            $query->where('city', $request->city);
        }

        $events = $query->orderBy('event_date', 'asc')->get();

        // Logged in volunteer registrations
        $registrations = EventRegistration::where('user_id', Auth::id())
            ->pluck('status', 'event_id')
            ->toArray();

       

        //logged student is saved event
        $savedEvents = EventSave::where('user_id',Auth::id())
            ->pluck('event_id')
            ->toArray();

        return view('events.index', compact(
            'events',
            'registrations',
            'savedEvents'
        ));
    }
}