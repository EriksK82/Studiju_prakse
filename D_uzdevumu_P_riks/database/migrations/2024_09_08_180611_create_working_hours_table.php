<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingHoursTable extends Migration
{
    public function up(): void
    {
        Schema::create('working_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_group_id')->constrained('study_groups')->onDelete('cascade');
            $table->integer('contact_hours_per_month')->default(0);
            $table->integer('event_hours_per_month')->default(0);
            $table->integer('total_hours_per_year')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('working_hours');
    }
}