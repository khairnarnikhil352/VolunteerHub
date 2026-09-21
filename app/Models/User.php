<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Mass Assignable Fields
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        // Profile
        'profile_photo',
        'phone',
        'dob',
        'gender',

        // Admin / Volunteer
        'role',
        'status',
    ];

    /**
     * Hidden Fields
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Type Casting
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'dob' => 'date',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Volunteer Event Registrations
    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helper Methods
    |--------------------------------------------------------------------------
    */

    // Check Admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Check Volunteer
    public function isVolunteer(): bool
    {
        return $this->role === 'volunteer';
    }

    // Check Active Status
    public function isActive(): bool
    {
        return strtolower($this->status ?? 'active') === 'active';
    }
}