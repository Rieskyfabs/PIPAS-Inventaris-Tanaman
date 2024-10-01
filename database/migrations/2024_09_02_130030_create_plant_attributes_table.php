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
            $table->id();
            $table->string('plant_code')->unique();
            $table->string('name')->unique();
            $table->string('scientific_name')->unique();
            $table->enum('type', ['Herbal', 'Sayuran']);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('benefit_id')->constrained('benefits')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('plant_attributes');
    }
};
