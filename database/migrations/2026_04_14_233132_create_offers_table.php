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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qr_page_id')->constrained()->cascadeOnDelete();
            $table->string('titolo');
            $table->text('descrizione')->nullable();
            $table->string('prezzo')->nullable();
            $table->boolean('attiva')->default(true);
            $table->integer('ordine')->default(0);
            $table->timestamps();        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
