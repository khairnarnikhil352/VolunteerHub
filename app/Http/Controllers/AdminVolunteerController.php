<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminVolunteerController extends Controller
{
    /**
     * Display all volunteers
     */
    public function index()
    {
        $volunteers = User::where('role', 'volunteer')
            ->latest()
            ->get();

        return view('admin.volunteers.index', compact('volunteers'));
    }


    /**
     * Display single volunteer profile
     */
    public function show(User $user)
    {
        // Only volunteer can be viewed from this module
        if ($user->role !== 'volunteer') {
            abort(404);
        }

        return view('admin.volunteers.show', compact('user'));
    }


    /**
     * Activate volunteer
     */
    public function activate(User $user)
    {
        // Prevent admin/other users from being modified
        if ($user->role !== 'volunteer') {
            abort(404);
        }

        $user->status = 'active';
        $user->save();

        return redirect()
            ->route('admin.volunteers.index')
            ->with('success', 'Volunteer activated successfully!');
    }


    /**
     * Deactivate volunteer
     */
    public function deactivate(User $user)
    {
        // Prevent admin/other users from being modified
        if ($user->role !== 'volunteer') {
            abort(404);
        }

        $user->status = 'deactive';
        $user->save();

        return redirect()
            ->route('admin.volunteers.index')
            ->with('success', 'Volunteer deactivated successfully!');
    }


    /**
     * Delete volunteer
     */
    public function destroy(User $user)
    {
        // Prevent admin/other users from being deleted
        if ($user->role !== 'volunteer') {
            abort(404);
        }

        $user->delete();

        return redirect()
            ->route('admin.volunteers.index')
            ->with('success', 'Volunteer deleted successfully!');
    }
}