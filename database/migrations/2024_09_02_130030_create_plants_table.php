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
            $table->enum('type', ['Herbal', 'Vegetable']); // Tipe tanaman dibatasi
            $table->string('barcode')->unique();
            $table->foreignId('category_id')->constrained('categories'); // FK ke categories
            $table->string('location');
            $table->integer('quantity')->default(0);
            $table->foreignId('benefit_id')->constrained('benefits'); // FK ke benefits
            $table->string('status'); // Menambahkan kolom status
            $table->date('seeding_date')->nullable(); // Menambahkan kolom tanggal pembibitan
            $table->date('harvest_date')->nullable(); // Menambahkan kolom tanggal panen
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
