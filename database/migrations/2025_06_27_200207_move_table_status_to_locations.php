<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('table_locations', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->nullable()->after('is_active');
            $table->foreign('status_id')->references('id')->on('table_statuses')->nullOnDelete();
        });

        Schema::table('tables', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropColumn('status_id');
        });
    }

    public function down()
    {
        Schema::table('tables', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('table_statuses')->nullOnDelete();
        });

        Schema::table('table_locations', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropColumn('status_id');
        });
    }
};
