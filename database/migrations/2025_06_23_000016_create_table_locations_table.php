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
        Schema::create('table_locations', function (Blueprint $table) {
            $table->id();

            $table->string('location_code')->unique(); // e.g., "A1", "B2"
            $table->integer(column: 'capacity')->default(1);
            $table->boolean('is_reserved')->default(false);
            $table->dateTime('reserved_from')->nullable();
            $table->dateTime('reserved_until')->nullable();
            $table->text('reservation_note')->nullable();

            $table->boolean('is_active')->default(true);
            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_locations');
    }
};
