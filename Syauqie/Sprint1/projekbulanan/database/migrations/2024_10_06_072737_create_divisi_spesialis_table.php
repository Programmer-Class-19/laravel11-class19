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
        Schema::create('divisi_spesialis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('divisi_id')->constrained()->onDelete('cascade');
            $table->foreignId('spesialis_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divisi_spesialis');
    }
};
