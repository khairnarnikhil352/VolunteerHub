<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    // All Events
    public function index()
    {
        $events = Event::latest()->get();

        return view('admin.events.index', compact('events'));
    }

    // Create Event Form
    public function create()
    {
        return view('admin.events.create');
    }

    // Save Event
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'category'    => 'required',
            'description' => 'required',
            'city'        => 'required',
            'venue'       => 'required',
            'event_date'  => 'required|date',
            'start_time'  => 'required',
            'end_time'    => 'required|after:start_time',
            'capacity'    => 'required|integer|min:1',
            'banner'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'      => 'required',
        ]);

        $bannerName = null;

        if ($request->hasFile('banner')) {
            $bannerName = time().'.'.$request->banner->extension();

            $request->banner->move(
                public_path('images/events'),
                $bannerName
            );
        }

        Event::create([
            'title'        => $request->title,
            'category'     => $request->category,
            'description'  => $request->description,
            'city'         => $request->city,
            'venue'        => $request->venue,
            'event_date'   => $request->event_date,
            'start_time'   => $request->start_time,
            'end_time'     => $request->end_time,
            'capacity'     => $request->capacity,
            'filled_slots' => 0,
            'banner'       => $bannerName,
            'status'       => $request->status,
        ]);

        return redirect()
            ->route('admin.events.index')
            ->with('success','Event Created Successfully!');
    }

    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'category'    => 'required',
            'description' => 'required',
            'city'        => 'required',
            'venue'       => 'required',
            'event_date'  => 'required|date',
            'start_time'  => 'required',
            'end_time'    => 'required|after:start_time',
            'capacity'    => 'required|integer|min:1',
            'banner'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'      => 'required',
        ]);

        // Old banner name
        $bannerName = $event->banner;

        // If new banner uploaded
        if ($request->hasFile('banner')) {

            // Delete old banner
            if ($event->banner) {
                $oldBanner = public_path('images/events/' . $event->banner);

                if (file_exists($oldBanner)) {
                    unlink($oldBanner);
                }
            }

            // Create new banner name
            $bannerName = time() . '.' . $request->banner->extension();

            // Move new banner
            $request->banner->move(
                public_path('images/events'),
                $bannerName
            );
        }

        // Update event
        $event->update([
            'title'        => $request->title,
            'category'     => $request->category,
            'description'  => $request->description,
            'city'         => $request->city,
            'venue'        => $request->venue,
            'event_date'   => $request->event_date,
            'start_time'   => $request->start_time,
            'end_time'     => $request->end_time,
            'capacity'     => $request->capacity,
            'banner'       => $bannerName,
            'status'       => $request->status,
        ]);

        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Event Updated Successfully!');
    }

    public function destroy(Event $event)
    {
        // Delete event banner from public folder
        if ($event->banner) {

            $bannerPath = public_path('images/events/' . $event->banner);

            if (file_exists($bannerPath)) {
                unlink($bannerPath);
            }
        }

        // Delete event from database
        $event->delete();

        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Event Deleted Successfully!');
    }

}   