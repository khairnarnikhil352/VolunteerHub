<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    protected $fillable = [

        'user_id',
        'event_id',

        'phone',
        'dob',
        'gender',

        'aadhaar_number',
         'aadhaar_document',
        'passport_photo',

        'volunteer_category',
        'occupation',

        'address',
        'city',
        'state',
        'pincode',

        'emergency_contact_name',
        'emergency_contact_relation',
        'emergency_contact_phone',

        'why_join',
        'previous_experience',
        'medical_condition',

        'status',
        'approved_at',
        
        'rejection_reason',
        'completed_at'
    ];

    protected $casts = [
        'dob' => 'date',
        'approved_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    // User Relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Event Relationship
    public function event()
    {
        return $this->belongsTo(Event::class);
    }


    
}