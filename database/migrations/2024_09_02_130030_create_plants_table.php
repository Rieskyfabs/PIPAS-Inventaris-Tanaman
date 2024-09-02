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
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('scientific_name');
            $table->string('type');
            $table->string('barcode')->unique();
            $table->foreignId('category_id')->constrained('categories'); // FK ke categories
            $table->string('location');
            $table->integer('quantity')->default(0);
            $table->foreignId('benefit_id')->constrained('benefits'); // FK ke benefits
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
