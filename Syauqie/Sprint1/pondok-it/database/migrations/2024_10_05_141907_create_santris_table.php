<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('santris', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->integer('umur');
        $table->integer('angkatan');
        $table->unsignedBigInteger('divisi_id');
        $table->timestamps();

        $table->foreign('divisi_id')->references('id')->on('divisis')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
