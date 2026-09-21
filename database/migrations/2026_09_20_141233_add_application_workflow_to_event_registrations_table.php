<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('event_registrations', function (Blueprint $table) {

            // status already exists in the table
            // So we are NOT adding status again.

            if (!Schema::hasColumn('event_registrations', 'rejection_reason')) {
                $table->text('rejection_reason')
                    ->nullable()
                    ->after('status');
            }

            if (!Schema::hasColumn('event_registrations', 'approved_at')) {
                $table->timestamp('approved_at')
                    ->nullable()
                    ->after('rejection_reason');
            }

            if (!Schema::hasColumn('event_registrations', 'completed_at')) {
                $table->timestamp('completed_at')
                    ->nullable()
                    ->after('approved_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('event_registrations', function (Blueprint $table) {

            if (Schema::hasColumn('event_registrations', 'completed_at')) {
                $table->dropColumn('completed_at');
            }

            if (Schema::hasColumn('event_registrations', 'approved_at')) {
                $table->dropColumn('approved_at');
            }

            if (Schema::hasColumn('event_registrations', 'rejection_reason')) {
                $table->dropColumn('rejection_reason');
            }

        });
    }
};