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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained()->onDelete('cascade'); // Link to staff
            $table->foreignId('timetable_id')->nullable()->constrained('time_tables');      // Optional: expected shift

            $table->date('day');                // The date of this attendance record
            $table->time('start')->nullable(); // When the person clocked in
            $table->time('end')->nullable();   // When they clocked out

            $table->enum('status', ['present', 'absent', 'late', 'off'])->default('present'); // Optional
            $table->text('note')->nullable();  // Any remarks

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
