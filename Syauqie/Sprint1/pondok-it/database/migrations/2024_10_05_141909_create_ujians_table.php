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
    Schema::create('ujians', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('santri_id');
        $table->unsignedBigInteger('spesialis_id');
        $table->date('tanggal');
        $table->integer('nilai');
        $table->timestamps();

        $table->foreign('santri_id')->references('id')->on('santris')->onDelete('cascade');
        $table->foreign('spesialis_id')->references('id')->on('spesialis')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ujians');
    }
};
