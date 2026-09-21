<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_registrations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();

            $table->string('phone');
            $table->date('dob');
            $table->string('gender');

            $table->string('aadhaar_number',12);
            $table->string('passport_photo');

            $table->string('volunteer_category');
            $table->string('occupation')->nullable();

            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');

            $table->string('emergency_contact_name');
            $table->string('emergency_contact_relation');
            $table->string('emergency_contact_phone');

            $table->text('why_join');
            $table->text('previous_experience')->nullable();
            $table->text('medical_condition')->nullable();

            $table->enum('status',['Pending','Approved','Rejected'])
                ->default('Pending');

            $table->timestamp('approved_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
    }
};
