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
        Schema::create('jamaahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat_kota');
            $table->decimal('jumlah_donasi', 15, 2);
            $table->date('tanggal_lahir');
            $table->foreignId('masjid_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamaahs');
    }
};