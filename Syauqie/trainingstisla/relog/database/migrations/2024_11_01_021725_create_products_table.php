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
            $table->string('nama_produk', 100);
            $table->string('satuan', 50);
            $table->unsignedBigInteger('harga_beli');
            $table->integer('stok');
            $table->unsignedBigInteger('harga_jual');
            $table->integer('diskon')->default(0);
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
