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
        Schema::create('clovers', function (Blueprint $table) {
            $table->id();
            $table->string('kerajaan');
            $table->string('raja');
            $table->string('bangsawan');
            $table->string('kesatria');
            $table->string('warga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clovers');
    }
};
