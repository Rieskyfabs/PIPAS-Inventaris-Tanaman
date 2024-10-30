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
        Schema::create('plant_attributes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('plant_code')->unique();
            $table->string('name')->unique();
            $table->string('scientific_name')->unique();
            $table->uuid('type_id'); // Reference to tipe_tanaman
            $table->foreign('type_id')->references('id')->on('tipe_tanaman')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('category_id'); // Reference to categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->text('benefit'); // Storing benefit directly here
            $table->text('description');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plant_attributes', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropForeign(['category_id']);
        });

        Schema::dropIfExists('plant_attributes');
    }
};
