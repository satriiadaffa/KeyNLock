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
        Schema::create('services', function (Blueprint $table) {
            
            $table->id();
            $table->string('merchant_username');
            $table->json('service')->nullable();
            $table->json('price')->nullable();
            $table->timestamps();
    
            // set foreign key constraint
            $table->foreign('merchant_username')->references('merchant_username')->on('merchants')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
