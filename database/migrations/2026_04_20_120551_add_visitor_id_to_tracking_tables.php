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
        Schema::table('qr_visits', function (Blueprint $table) {
            $table->string('visitor_id')->nullable()->index();
        });

        Schema::table('qr_events', function (Blueprint $table) {
            $table->string('visitor_id')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tracking_tables', function (Blueprint $table) {
            //
        });
    }
};
