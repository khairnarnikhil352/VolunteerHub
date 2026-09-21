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
        Schema::create('events', function (Blueprint $table) {

            $table->id();

            // Event Information
            $table->string('title');
            $table->string('category');
            $table->text('description');

            // Location
            $table->string('city');
            $table->string('venue');

            // Date & Time
            $table->date('event_date');
            $table->time('start_time');
            $table->time('end_time');

            // Capacity
            $table->integer('capacity');
            $table->integer('filled_slots')->default(0);

            // Banner Emoji/Image
            $table->string('banner')->nullable();

            // Event Status
            $table->enum('status', ['Upcoming', 'Completed', 'Cancelled'])
                ->default('Upcoming');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
