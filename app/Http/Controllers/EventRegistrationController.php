<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventRegistrationController extends Controller
{
    // Registration Form Open
    public function create(Event $event)
    {
        return view('events.register', compact('event'));
    }

    // Store Registration
    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([

            'phone' => 'required|digits:10',

            'dob' => 'required|date',

            'gender' => 'required',

            'aadhaar_number' => 'required|digits:12',

            'aadhaar_document' => 'required|mimes:pdf,jpg,jpeg,png|max:3072',

            'passport_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',

            'volunteer_category' => 'required',

            'occupation' => 'nullable|string|max:255',

            'address' => 'required|string',

            'city' => 'required|string|max:100',

            'state' => 'required|string|max:100',

            'pincode' => 'required|digits:6',

            'emergency_contact_name' => 'required|string|max:255',

            'emergency_contact_relation' => 'required|string|max:100',

            'emergency_contact_phone' => 'required|digits:10',

            'why_join' => 'required|string|max:500',

            'previous_experience' => 'nullable|string|max:500',

            'medical_condition' => 'nullable|string|max:500',

        ]);




        // Prevent Duplicate Registration
        $alreadyRegistered = EventRegistration::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->exists();

            if ($alreadyRegistered) {
            return redirect()->route('events.index')
                ->with('error', '⚠️ You have already registered for this event.');
        }

        // Upload Passport Photo
        $photoPath = $request->file('passport_photo')
            ->store('passport_photos', 'public');

        // Upload Aadhaar Document
        $aadhaarPath = $request->file('aadhaar_document')
            ->store('aadhaar_documents', 'public');

        // Save Registration
        EventRegistration::create([

            'user_id' => Auth::id(),

            'event_id' => $event->id,

            'phone' => $validated['phone'],

            'dob' => $validated['dob'],

            'gender' => $validated['gender'],

            'aadhaar_number' => $validated['aadhaar_number'],

            'aadhaar_document' => $aadhaarPath,

            'passport_photo' => $photoPath,

            'volunteer_category' => $validated['volunteer_category'],

            'occupation' => $validated['occupation'],

            'address' => $validated['address'],

            'city' => $validated['city'],

            'state' => $validated['state'],

            'pincode' => $validated['pincode'],

            'emergency_contact_name' => $validated['emergency_contact_name'],

            'emergency_contact_relation' => $validated['emergency_contact_relation'],

            'emergency_contact_phone' => $validated['emergency_contact_phone'],

            'why_join' => $validated['why_join'],

            'previous_experience' => $validated['previous_experience'],

            'medical_condition' => $validated['medical_condition'],

            'status' => 'Pending',

        ]);


        return redirect()->route('events.index')
        ->with('success', '🎉 Registration submitted successfully! Your request is pending organizer approval.');



    
    }



    // ================= MY EVENTS =================
    public function myEvents(Request $request)
    {
        $query = EventRegistration::where('user_id', Auth::id())
                    ->with('event');

        if ($request->filled('search')) {
            $query->whereHas('event', function ($q) use ($request) {
                $q->where('title', 'ILIKE', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status') && $request->status != 'All') {
            $query->where('status', $request->status);
        }

        $registrations = $query->latest()->get();

        return view('events.my-events', compact('registrations'));
    }

    // ================= CANCEL REGISTRATION =================
    public function cancelRegistration(EventRegistration $registration)
    {
        if ($registration->user_id != Auth::id()) {
            abort(403);
        }

        if ($registration->status == 'Pending') {
            $registration->delete();

            return redirect()->route('my.events')
                ->with('success', 'Registration cancelled successfully.');
        }

        return redirect()->route('my.events')
            ->with('error', 'Approved or Rejected registrations cannot be cancelled.');
    }



    public function edit(EventRegistration $registration)
    {
        // Only owner can edit
        if ($registration->user_id != Auth::id()) {
            abort(403);
        }

        // Only Pending applications editable
        if ($registration->status != 'Pending') {
            return redirect()->route('my.events')
                ->with('error', 'Only pending applications can be edited.');
        }

        $event = $registration->event;

        return view('events.edit-registration', compact('registration', 'event'));
    }

  


    public function update(Request $request, EventRegistration $registration)
    {
        // Only logged in user can edit own application
        if ($registration->user_id != Auth::id()) {
            abort(403);
        }

        // Only Pending application editable
        if ($registration->status != 'Pending') {
            return redirect()->route('my.events')
                ->with('error', 'Only pending applications can be edited.');
        }

        // Validation
        $validated = $request->validate([
            'phone' => 'required|digits:10',
            'dob' => 'required|date',
            'gender' => 'required',
            'aadhaar_number' => 'required|digits:12',
            'aadhaar_document' => 'nullable|mimes:pdf,jpg,jpeg,png|max:3072',
            'volunteer_category' => 'required',
            'occupation' => 'nullable|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|digits:6',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_relation' => 'required|string|max:100',
            'emergency_contact_phone' => 'required|digits:10',
            'why_join' => 'required|string|max:500',
            'previous_experience' => 'nullable|string|max:500',
            'medical_condition' => 'nullable|string|max:500',
            'passport_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Photo update (optional)
        if ($request->hasFile('passport_photo')) {

            $photoPath = $request->file('passport_photo')
                ->store('passport_photos', 'public');

            $validated['passport_photo'] = $photoPath;
        }

        // Update Aadhaar Document
        if ($request->hasFile('aadhaar_document')) {

            $aadhaarPath = $request->file('aadhaar_document')
                ->store('aadhaar_documents', 'public');

            $validated['aadhaar_document'] = $aadhaarPath;
        }

        // Update registration
        $registration->update($validated);

        return redirect()->route('my.events')
            ->with('success', '✅ Volunteer application updated successfully.');
    }

    // View Submitted Application
    public function showApplication(EventRegistration $registration)
    {
        // Only logged-in user can view own application
        if ($registration->user_id != Auth::id()) {
            abort(403);
        }

        $event = $registration->event;

        return view('events.view-application', compact('registration', 'event'));
    }




}