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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');             
            $table->string('last_name');
            $table->string('national_id')->nullable()->unique(); 
            $table->text('address')->nullable();

            $table->foreignId('department_id')->constrained();    
            $table->foreignId('timetable_id')->nullable()->constrained('time_tables'); 
            $table->string('image_url')->nullable()->unique();
            $table->date('employment_date');
            $table->date('termination_date')->nullable();
            $table->foreignId('created_by')->nullable()
                ->constrained('staff')->nullOnDelete();         
            $table->foreignId('updated_by')->nullable()
                ->constrained('staff')->nullOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
