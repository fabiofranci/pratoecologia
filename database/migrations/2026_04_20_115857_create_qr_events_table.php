<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('qr_events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('qr_page_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('event'); // es: click_whatsapp

            $table->string('ip')->nullable();
            $table->text('user_agent')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('qr_events');
    }
};