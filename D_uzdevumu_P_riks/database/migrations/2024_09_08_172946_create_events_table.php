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
            $table->foreignId('study_group_id')->constrained('study_groups')->onDelete('cascade');
            $table->enum('event_type', ['Camp', 'Hike', 'Contact Session']);
            $table->text('location');
            $table->string('name');
            $table->timestamp('starts_at');
            $table->timestamp('ends_at');
            $table->boolean('is_leader')->default(false);
            $table->integer('participant_count');
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
