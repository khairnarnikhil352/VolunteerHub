<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\EventSave;

class EventController extends Controller
{
    // =========================================================
    // Browse Events Page
    // =========================================================
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Upcoming Events Query
        |--------------------------------------------------------------------------
        */

        $query = Event::where('status', 'Upcoming');


        /*
        |--------------------------------------------------------------------------
        | Search by Title
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $query->where(
                'title',
                'ILIKE',
                '%' . $request->search . '%'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Filter by Category
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled('category') &&
            $request->category != 'All'
        ) {

            $query->where(
                'category',
                $request->category
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Filter by City
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled('city') &&
            $request->city != 'All'
        ) {

            $query->where(
                'city',
                $request->city
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Get Events
        |--------------------------------------------------------------------------
        */

        $events = $query
            ->orderBy('event_date', 'asc')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Logged In Volunteer Registrations
        |--------------------------------------------------------------------------
        */

        $registrations = EventRegistration::where(
            'user_id',
            Auth::id()
        )
        ->pluck('status', 'event_id')
        ->toArray();


        /*
        |--------------------------------------------------------------------------
        | Saved Events
        |--------------------------------------------------------------------------
        */

        $savedEvents = EventSave::where(
            'user_id',
            Auth::id()
        )
        ->pluck('event_id')
        ->toArray();


        /*
        |--------------------------------------------------------------------------
        | ACTIVE EVENTS
        |--------------------------------------------------------------------------
        */

        $activeEvents = Event::where(
            'status',
            'Upcoming'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL UNIQUE VOLUNTEERS JOINED
        |--------------------------------------------------------------------------
        */

        $volunteersJoined = EventRegistration::whereIn(
            'status',
            ['Approved', 'approved', 'Completed', 'completed']
        )
        ->distinct('user_id')
        ->count('user_id');


        /*
        |--------------------------------------------------------------------------
        | CERTIFICATES
        |--------------------------------------------------------------------------
        */

        $certificates = 0;

        if (Schema::hasTable('certificates')) {

            try {

                $certificates = DB::table('certificates')->count();

            } catch (\Exception $e) {

                $certificates = 0;

            }
        }


        /*
        |--------------------------------------------------------------------------
        | COMMUNITY PARTNERS
        |--------------------------------------------------------------------------
        */

        $communityPartners = 0;

        if (Schema::hasTable('ngos')) {

            try {

                $communityPartners = DB::table('ngos')->count();

            } catch (\Exception $e) {

                $communityPartners = 0;

            }
        }


        /*
        |--------------------------------------------------------------------------
        | Dynamic Categories
        |--------------------------------------------------------------------------
        */

        $categories = Event::where(
            'status',
            'Upcoming'
        )
        ->whereNotNull('category')
        ->where('category', '!=', '')
        ->distinct()
        ->orderBy('category')
        ->pluck('category');


        /*
        |--------------------------------------------------------------------------
        | Dynamic Cities
        |--------------------------------------------------------------------------
        */

        $cities = Event::where(
            'status',
            'Upcoming'
        )
        ->whereNotNull('city')
        ->where('city', '!=', '')
        ->distinct()
        ->orderBy('city')
        ->pluck('city');


        /*
        |--------------------------------------------------------------------------
        | Community Impact Counts
        |--------------------------------------------------------------------------
        */

        $environmentEvents = Event::where('status', 'Upcoming')
            ->where('category', 'Environment')
            ->count();

        $educationEvents = Event::where('status', 'Upcoming')
            ->where('category', 'Education')
            ->count();

        $healthcareEvents = Event::where('status', 'Upcoming')
            ->where('category', 'Healthcare')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */

        return view('events.index', compact(

            'events',

            'registrations',

            'savedEvents',

            'activeEvents',

            'volunteersJoined',

            'certificates',

            'communityPartners',

            'categories',

            'cities',

            'environmentEvents',

            'educationEvents',

            'healthcareEvents'

        ));
    }
}