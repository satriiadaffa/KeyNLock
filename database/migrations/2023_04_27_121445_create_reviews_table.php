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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('customer_username');
            $table->string('merchant_username');
            $table->unsignedBigInteger('order_id');
            $table->string('rating');
            $table->string('comment');
            $table->timestamps();

            $table->foreign('merchant_username')->references('merchant_username')->on('merchants')->onDelete('cascade');
            $table->foreign('customer_username')->references('customer_username')->on('customers')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
