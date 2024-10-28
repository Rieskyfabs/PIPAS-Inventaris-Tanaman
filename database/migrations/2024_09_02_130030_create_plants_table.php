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
            $table->id(); // ID auto-increment
            $table->string('image')->nullable();
            $table->foreignId('plant_code_id')->constrained('plant_attributes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('plant_name_id')->constrained('plant_attributes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('plant_scientific_name_id')->constrained('plant_attributes')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('type', ['Herbal', 'Sayuran']);
            $table->string('qr_code')->nullable();
            $table->uuid('category_id'); // Menggunakan UUID untuk category_id
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('benefit_id'); // Menggunakan UUID untuk benefit_id
            $table->foreign('benefit_id')->references('id')->on('benefits')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('location_id'); // Menggunakan UUID untuk location_id
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('plants', function (Blueprint $table) {
            // Hapus foreign key terlebih dahulu
            $table->dropForeign(['plant_code_id']);
            $table->dropForeign(['plant_name_id']);
            $table->dropForeign(['plant_scientific_name_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['benefit_id']);
            $table->dropForeign(['location_id']);
        });

        Schema::dropIfExists('plants');
    }
};
