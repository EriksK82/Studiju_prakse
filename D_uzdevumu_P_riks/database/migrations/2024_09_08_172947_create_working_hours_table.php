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
        Schema::create('working_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_group_id')->constrained('study_groups')->onDelete('cascade');
            $table->year('year');
            $table->unsignedTinyInteger('month'); // 1 - 12
            $table->decimal('contact_hours', 8, 2); // Stundas kontakstundām
            $table->decimal('event_hours', 8, 2); // Stundas pasākumiem
            $table->decimal('np_nv_hours', 8, 2); // Stundas NP NV rīcībā
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_hours');
    }
};
