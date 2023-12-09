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
            $table->string('customer_username');
            $table->string('merchant_username');
            $table->string('note')->nullable();
            $table->string('payment_status')->default('not_paid');
            $table->string('order_status')->default('belum_diterima');
            $table->string('service_order');
            $table->boolean('panggil');
            $table->string('total_order');
            $table->timestamps();

            $table->foreign('merchant_username')->references('merchant_username')->on('merchants')->onDelete('cascade');
            $table->foreign('customer_username')->references('customer_username')->on('customers')->onDelete('cascade');

        
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
