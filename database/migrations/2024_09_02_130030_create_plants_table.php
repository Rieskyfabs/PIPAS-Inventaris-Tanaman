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
            $table->uuid('id')->primary();
            $table->string('image')->nullable();
            $table->uuid('plant_code_id'); // Reference to plant_attributes
            $table->foreign('plant_code_id')->references('id')->on('plant_attributes')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('plant_name_id'); // Reference to plant_attributes
            $table->foreign('plant_name_id')->references('id')->on('plant_attributes')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('plant_scientific_name_id'); // Reference to plant_attributes
            $table->foreign('plant_scientific_name_id')->references('id')->on('plant_attributes')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('type_id'); // Reference to tipe_tanaman
            $table->foreign('type_id')->references('id')->on('tipe_tanaman')->onDelete('cascade')->onUpdate('cascade');
            $table->string('qr_code')->nullable();
            $table->uuid('category_id'); // Reference to categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('benefit_id'); // Reference to plant_attributes for benefit
            $table->foreign('benefit_id')->references('id')->on('plant_attributes')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('location_id'); // Reference to locations
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
            $table->dropForeign(['plant_code_id']);
            $table->dropForeign(['plant_name_id']);
            $table->dropForeign(['plant_scientific_name_id']);
            $table->dropForeign(['type_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['benefit_id']);
            $table->dropForeign(['location_id']);
        });

        Schema::dropIfExists('plants');
    }
};
