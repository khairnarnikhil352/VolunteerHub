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

// Home Page
Route::get('/', function () {
    return view('home');
});

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
// Dashboard
Route::get('/dashboard', function () {
    return view('volunteer.dashboard');
})->middleware('auth')->name('volunteerdashboard');

//logout 
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// Browse Events Page
Route::get('/events', [EventController::class, 'index'])
    ->middleware('auth')
    ->name('events.index');

// My Events 
Route::get('/my-events', function () {
    return view('events.my-events');
})->middleware('auth')->name('my.events');


// Volunteer Registration Form
Route::get('/events/{event}/register',
 [EventRegistrationController::class, 'create'])
    ->name('events.register');

// Submit Registration
Route::post('/events/{event}/register', 
[EventRegistrationController::class, 'store'])
    ->name('events.register.store');


Route::post('/events/{event}/save',
        [EventSaveController::class,'store'])
        ->name('events.save');


Route::delete('/events/{event}/unsave',
        [EventSaveController::class,'destroy'])
        ->name('events.unsave');

Route::get('/saved-events',
        [EventSaveController::class,'index'])
        ->name('saved.events');

Route::get('/my-events',
        [EventRegistrationController::class, 'myEvents'])
        ->name('my.events');

 Route::delete('/my-events/{registration}',
        [EventRegistrationController::class, 'cancelRegistration'])
        ->name('my.events.cancel');

// Edit Registration Form
Route::get('/events/register/{registration}/edit',
    [EventRegistrationController::class, 'edit'])
    ->name('events.register.edit');

// Update Registration
Route::put('/events/register/{registration}',
    [EventRegistrationController::class, 'update'])
    ->name('events.register.update');
    
// View Application Details
Route::get('/my-events/application/{registration}',
    [EventRegistrationController::class, 'showApplication'])
    ->name('my.events.view');

 Route::get('/profile', [ProfileController::class,'index'])
    ->name('profile');

Route::get('/profile/edit', [ProfileController::class,'edit'])
    ->name('profile.edit');

Route::put('/profile/update', [ProfileController::class,'update'])
    ->name('profile.update');















Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // ================= ADMIN DASHBOARD =================

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');


        // ================= EVENT MANAGEMENT =================

        Route::resource('events', AdminEventController::class);


        // ================= VOLUNTEER MANAGEMENT =================

        // Volunteer List
        Route::get('/volunteers',
            [AdminVolunteerController::class, 'index']
        )->name('volunteers.index');


        // Volunteer Profile
        Route::get('/volunteers/{user}',
            [AdminVolunteerController::class, 'show']
        )->name('volunteers.show');


        // Activate Volunteer
        Route::patch('/volunteers/{user}/activate',
            [AdminVolunteerController::class, 'activate']
        )->name('volunteers.activate');


        // Deactivate Volunteer
        Route::patch('/volunteers/{user}/deactivate',
            [AdminVolunteerController::class, 'deactivate']
        )->name('volunteers.deactivate');


        // Delete Volunteer
        Route::delete('/volunteers/{user}',
            [AdminVolunteerController::class, 'destroy']
        )->name('volunteers.destroy');


        // Applications
        Route::resource('applications', AdminApplicationController::class)
            ->only(['index', 'show', 'destroy']);

        // Approve Application
        Route::patch('/applications/{application}/approve',
            [AdminApplicationController::class, 'approve'])
            ->name('applications.approve');

        // Reject Application
        Route::patch('/applications/{application}/reject',
            [AdminApplicationController::class, 'reject'])
            ->name('applications.reject');

        //complete Application 
        Route::patch('/applications/{application}/complete',
            [AdminApplicationController::class, 'complete'])
            ->name('applications.complete');





       



    Route::get('/profile', [AdminProfileController::class, 'show'])
        ->name('profile.show');

    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [AdminProfileController::class, 'update'])
        ->name('profile.update');

    Route::put('/profile/password', [AdminProfileController::class, 'updatePassword'])
        ->name('profile.password');

    });




