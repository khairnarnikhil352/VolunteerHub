<?php

namespace App\Http\Controllers;

use App\Models\EventRegistration;
use Illuminate\Support\Facades\DB;

class AdminApplicationController extends Controller
{
    // ==========================================
    // All Applications
    // ==========================================
    public function index()
    {
        $applications = EventRegistration::with(['user', 'event'])
            ->latest()
            ->get();

        return view('admin.applications.index', compact('applications'));
    }


    // ==========================================
    // Application Details
    // ==========================================
    public function show(EventRegistration $application)
    {
        $application->load(['user', 'event']);

        return view('admin.applications.show', compact('application'));
    }


    // ==========================================
    // APPROVE APPLICATION
    // ==========================================
    public function approve(EventRegistration $application)
    {
        // Already approved or completed
        if (in_array($application->status, ['approved', 'completed'])) {

            return redirect()
                ->route('admin.applications.index')
                ->with('success', 'This application is already approved.');
        }


        DB::transaction(function () use ($application) {

            // Lock event row so two admins cannot
            // increase slots at the same time
            $event = $application->event()
                ->lockForUpdate()
                ->first();

            // Check event exists
            if (!$event) {
                abort(404, 'Event not found.');
            }

            // Check available capacity
            if ($event->filled_slots >= $event->capacity) {

                abort(400, 'This event is already full.');
            }

            // Approve application
            $application->status = 'approved';
            $application->approved_at = now();
            $application->rejection_reason = null;
            $application->save();

            // Increase filled slots
            $event->increment('filled_slots');
        });


        return redirect()
            ->route('admin.applications.index')
            ->with('success', 'Application approved successfully!');
    }


    // ==========================================
    // REJECT APPLICATION
    // ==========================================
    public function reject(EventRegistration $application)
    {
        // Will implement rejection reason next
    }


    // ==========================================
    // DELETE APPLICATION
    // ==========================================
    public function destroy(EventRegistration $application)
    {
        $application->delete();

        return redirect()
            ->route('admin.applications.index')
            ->with('success', 'Application deleted successfully!');
    }



    public function complete(EventRegistration $application)
    {
        if ($application->status !== 'approved') {
            return redirect()
                ->route('admin.applications.index')
                ->with('error', 'Only approved applications can be completed.');
        }

        $application->status = 'completed';
        $application->completed_at = now();
        $application->save();

        return redirect()
            ->route('admin.applications.index')
            ->with('success', 'Application marked as completed successfully!');
    }
}