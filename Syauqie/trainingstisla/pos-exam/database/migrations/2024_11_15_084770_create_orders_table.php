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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->date('order_date');
            $table->enum('status', ['pending', 'completed']);
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->enum('payment_method', ['cash', 'credit_card', 'transfer', 'other'])->nullable();
            $table->decimal('total_price', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('tax', 10, 2)->default(0);
            $table->string('shipping_address')->nullable();
            $table->enum('shipping_status', ['pending', 'shipped', 'delivered'])->default('pending');
            $table->timestamp('payment_time')->nullable();
            $table->timestamp('shipping_time')->nullable();
            $table->string('order_reference')->unique();
            $table->timestamps();

            // relasi
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
