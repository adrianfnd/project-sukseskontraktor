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
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->integer('months_rented');
            $table->enum('status_payment', ['pending', 'paid', 'failed'])->default('pending');
            $table->enum('status_product', ['pending', 'rented', 'returned'])->default('rented');
            $table->string('xendit_id', 50)->nullable();
            $table->foreign('xendit_id')->references('id')->on('xendit_logs')->onDelete('cascade');
            $table->timestamps();
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
