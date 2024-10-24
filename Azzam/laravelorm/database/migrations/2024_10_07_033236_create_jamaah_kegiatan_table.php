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
        Schema::create('jamaah_kegiatan', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('jamaah_id')->constrained()->onDelete('cascade'); // Foreign key ke jamaah
            $table->foreignId('kegiatan_id')->constrained()->onDelete('cascade'); // Foreign key ke kegiatan
            $table->timestamps(); // created_at dan updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamaah_kegiatan');
    }
};
