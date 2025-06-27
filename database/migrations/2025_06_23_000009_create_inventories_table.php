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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('name_ar')->unique();
            $table->integer('quantity')->default(0);
            $table->integer('min_threshold')->default(0);
            $table->string('unit');
            $table->decimal('cost', 10, 2);

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
        Schema::dropIfExists('inventories');
    }
};
