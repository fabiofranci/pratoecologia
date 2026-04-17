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
        Schema::create('qr_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qr_page_id')->constrained()->cascadeOnDelete();
            $table->string('ip')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('device')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_visits');
    }
};
