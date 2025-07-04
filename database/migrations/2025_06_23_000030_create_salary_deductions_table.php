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
        Schema::create('salary_deductions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade');
            $table->date('deduction_date');

            $table->decimal('amount', 10, 2)->default(0);
            $table->string('reason'); // e.g., late, uniform
            $table->text('note')->nullable();

            $table->foreignId('created_by')->nullable()->constrained('staff')->nullOnDelete();
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_deductions');
    }
};
