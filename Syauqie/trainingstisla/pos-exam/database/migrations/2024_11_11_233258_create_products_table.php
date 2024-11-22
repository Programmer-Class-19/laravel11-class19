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
        Schema::create('products', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('category_id');
            $table->string('name', 100);
            $table->string('varian', 100);
            $table->integer('stock');
            $table->unsignedBigInteger('price');
            $table->timestamps();

            // Relasi ke tabel categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            // Indeks
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
