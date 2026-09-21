<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'category',
        'description',
        'city',
        'venue',
        'event_date',
        'start_time',
        'end_time',
        'capacity',
        'filled_slots',
        'banner',
        'status',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];



    // Registration form 
    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
}