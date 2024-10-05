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
        Schema::create('mentor_spesialis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id')->constrained('mentor')->onDelete('cascade');
            $table->foreignId('spesialis_id')->constrained('spesialis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_spesialis');
    }
};
