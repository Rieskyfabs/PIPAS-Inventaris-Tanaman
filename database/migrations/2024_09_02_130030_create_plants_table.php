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
            $table->string('image')->nullable();
            $table->foreignId('plant_code_id')->constrained('plant_attributes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('plant_name_id')->constrained('plant_attributes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('plant_scientific_name_id')->constrained('plant_attributes')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('type', ['Herbal', 'Sayuran']);
            $table->string('qr_code')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('benefit_id')->constrained('benefits')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['sehat', 'baik', 'layu', 'sakit']);
            $table->date('seeding_date')->nullable();
            $table->date('harvest_date')->nullable();
            $table->enum('harvest_status', ['belum panen', 'siap panen', 'sudah dipanen'])->default('belum panen');
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
