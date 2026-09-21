<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventSave;
use Illuminate\Support\Facades\Auth;
use App\Models\EventRegistration;

class EventSaveController extends Controller
{
    // Save Event
    public function store(Event $event)
    {
        EventSave::firstOrCreate([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
        ]);

        return redirect()->route('events.index')
            ->with('success','❤️ Event saved successfully.');
    }

    // Remove Saved Event
    public function destroy(Event $event)
    {
        EventSave::where('user_id',Auth::id())
            ->where('event_id',$event->id)
            ->delete();

        return redirect()->route('events.index')
            ->with('success','Event removed from saved list.');
    }

    // Saved Events Page
    public function index()
{
    // Saved Events
    $savedEvents = EventSave::where('user_id', Auth::id())
        ->with('event')
        ->latest()
        ->get();

    // Registration Status of Logged-in User
    $registrations = EventRegistration::where('user_id', Auth::id())
        ->pluck('status', 'event_id')
        ->toArray();

    return view('events.saved-events', compact(
        'savedEvents',
        'registrations'
    ));
}
   
}