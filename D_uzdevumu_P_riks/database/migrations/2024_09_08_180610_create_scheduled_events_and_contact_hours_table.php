<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduledEventsAndContactHoursTable extends Migration
{
    public function up(): void
    {
        Schema::create('scheduled_events_and_contact_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('study_group_id')->constrained('study_groups')->onDelete('cascade');
            $table->string('event_type'); // e.g., Kontakstunda, nometne
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->text('description')->nullable();
            $table->integer('number_of_participants')->default(0);
            $table->boolean('is_leader')->default(false); // True, ja darbinieks ir vadītājs
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scheduled_events_and_contact_hours');
    }
}
