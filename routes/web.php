<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegistrationController;
use App\Http\Controllers\EventSaveController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminVolunteerController;
use App\Http\Controllers\AdminApplicationController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

// Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');


// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');


// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| VOLUNTEER DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| VOLUNTEER EVENTS
|--------------------------------------------------------------------------
*/

// Browse Events
Route::get('/events', [EventController::class, 'index'])
    ->middleware('auth')
    ->name('events.index');


// Register for Event
Route::get('/events/{event}/register',
    [EventRegistrationController::class, 'create']
)
    ->middleware('auth')
    ->name('events.register');


// Submit Event Registration
Route::post('/events/{event}/register',
    [EventRegistrationController::class, 'store']
)
    ->middleware('auth')
    ->name('events.register.store');


// Save Event
Route::post('/events/{event}/save',
    [EventSaveController::class, 'store']
)
    ->middleware('auth')
    ->name('events.save');


// Unsave Event
Route::delete('/events/{event}/unsave',
    [EventSaveController::class, 'destroy']
)
    ->middleware('auth')
    ->name('events.unsave');


// Saved Events
Route::get('/saved-events',
    [EventSaveController::class, 'index']
)
    ->middleware('auth')
    ->name('saved.events');


/*
|--------------------------------------------------------------------------
| MY EVENTS
|--------------------------------------------------------------------------
*/

// My Events
Route::get('/my-events',
    [EventRegistrationController::class, 'myEvents']
)
    ->middleware('auth')
    ->name('my.events');


// Edit Registration
Route::get('/events/register/{registration}/edit',
    [EventRegistrationController::class, 'edit']
)
    ->middleware('auth')
    ->name('events.register.edit');


// Update Registration
Route::put('/events/register/{registration}',
    [EventRegistrationController::class, 'update']
)
    ->middleware('auth')
    ->name('events.register.update');


// Cancel Registration
Route::delete('/my-events/{registration}',
    [EventRegistrationController::class, 'cancelRegistration']
)
    ->middleware('auth')
    ->name('my.events.cancel');


// View Application Details
Route::get('/my-events/application/{registration}',
    [EventRegistrationController::class, 'showApplication']
)
    ->middleware('auth')
    ->name('my.events.view');


/*
|--------------------------------------------------------------------------
| VOLUNTEER PROFILE
|--------------------------------------------------------------------------
*/

Route::get('/profile',
    [ProfileController::class, 'index']
)
    ->middleware('auth')
    ->name('profile');


Route::get('/profile/edit',
    [ProfileController::class, 'edit']
)
    ->middleware('auth')
    ->name('profile.edit');


Route::put('/profile/update',
    [ProfileController::class, 'update']
)
    ->middleware('auth')
    ->name('profile.update');


/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
|
| URL:
| /admin/dashboard
|
| Middleware:
| auth + admin
|
| Route Name:
| admin.dashboard
|
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | ADMIN DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard',
            [AdminDashboardController::class, 'index']
        )
            ->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | ADMIN EVENT MANAGEMENT
        |--------------------------------------------------------------------------
        */

        Route::resource('events', AdminEventController::class);


        /*
        |--------------------------------------------------------------------------
        | ADMIN VOLUNTEER MANAGEMENT
        |--------------------------------------------------------------------------
        */

        // Volunteer List
        Route::get('/volunteers',
            [AdminVolunteerController::class, 'index']
        )
            ->name('volunteers.index');


        // Volunteer Profile
        Route::get('/volunteers/{user}',
            [AdminVolunteerController::class, 'show']
        )
            ->name('volunteers.show');


        // Activate Volunteer
        Route::patch('/volunteers/{user}/activate',
            [AdminVolunteerController::class, 'activate']
        )
            ->name('volunteers.activate');


        // Deactivate Volunteer
        Route::patch('/volunteers/{user}/deactivate',
            [AdminVolunteerController::class, 'deactivate']
        )
            ->name('volunteers.deactivate');


        // Delete Volunteer
        Route::delete('/volunteers/{user}',
            [AdminVolunteerController::class, 'destroy']
        )
            ->name('volunteers.destroy');


        /*
        |--------------------------------------------------------------------------
        | ADMIN APPLICATION MANAGEMENT
        |--------------------------------------------------------------------------
        */

        // Application List
        Route::resource('applications',
            AdminApplicationController::class
        )
            ->only([
                'index',
                'show',
                'destroy'
            ]);


        // Approve Application
        Route::patch('/applications/{application}/approve',
            [AdminApplicationController::class, 'approve']
        )
            ->name('applications.approve');


        // Reject Application
        Route::patch('/applications/{application}/reject',
            [AdminApplicationController::class, 'reject']
        )
            ->name('applications.reject');


        // Complete Application
        Route::patch('/applications/{application}/complete',
            [AdminApplicationController::class, 'complete']
        )
            ->name('applications.complete');


        /*
        |--------------------------------------------------------------------------
        | ADMIN PROFILE
        |--------------------------------------------------------------------------
        */

        // View Admin Profile
        Route::get('/profile',
            [AdminProfileController::class, 'show']
        )
            ->name('profile.show');


        // Edit Admin Profile
        Route::get('/profile/edit',
            [AdminProfileController::class, 'edit']
        )
            ->name('profile.edit');


        // Update Admin Profile
        Route::put('/profile',
            [AdminProfileController::class, 'update']
        )
            ->name('profile.update');


        // Update Admin Password
        Route::put('/profile/password',
            [AdminProfileController::class, 'updatePassword']
        )
            ->name('profile.password');




    

   
    });

    Route::middleware('auth')->group(function () {

    // My Events
    Route::get('/my-events', [EventRegistrationController::class, 'myEvents'])
        ->name('my.events');

    // Volunteer ID Card
    Route::get('/my-events/id-card/{registration}', [EventRegistrationController::class, 'idCard'])
        ->name('volunteer.id.card');

    // Volunteer Certificate
    Route::get('/my-events/certificate/{registration}', [EventRegistrationController::class, 'downloadCertificate'])
        ->name('certificate.download');

});


Route::get('/', [HomeController::class, 'index']) ->name('home');