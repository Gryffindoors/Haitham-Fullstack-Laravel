<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('operating_costs', function (Blueprint $table) {
        $table->id();
        $table->string('category'); // e.g., Rent, Electricity
        $table->decimal('amount', 10, 2);
        $table->date('cost_month'); // The date this cost applies to (e.g. month start)
        $table->text('note')->nullable();
        $table->foreignId('created_by')->nullable()->constrained('staff')->nullOnDelete();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('operating_costs');
}

};
