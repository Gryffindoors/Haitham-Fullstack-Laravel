<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('deduction_rules', function (Blueprint $table) {
            $table->string('name_ar')->nullable();
        });

        Schema::table('order_statuses', function (Blueprint $table) {
            $table->string('status_ar')->nullable();
        });

        Schema::table('order_types', function (Blueprint $table) {
            $table->string('type_ar')->nullable();
        });

        Schema::table('payment_methods', function (Blueprint $table) {
            $table->string('name_ar')->nullable();
        });

        Schema::table('staff', function (Blueprint $table) {
            $table->string('first_name_ar')->nullable();
            $table->string('last_name_ar')->nullable();
        });

        Schema::table('table_statuses', function (Blueprint $table) {
            $table->string('status_ar')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('deduction_rules', function (Blueprint $table) {
            $table->dropColumn('name_ar');
        });

        Schema::table('order_statuses', function (Blueprint $table) {
            $table->dropColumn('status_ar');
        });

        Schema::table('order_types', function (Blueprint $table) {
            $table->dropColumn('type_ar');
        });

        Schema::table('payment_methods', function (Blueprint $table) {
            $table->dropColumn('name_ar');
        });

        Schema::table('staff', function (Blueprint $table) {
            $table->dropColumn(['first_name_ar', 'last_name_ar']);
        });

        Schema::table('table_statuses', function (Blueprint $table) {
            $table->dropColumn('status_ar');
        });
    }
};
