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
            $table->id(); // ID auto-incrementnggunakan UUID sebagai Primary Key
            $table->string('plant_code')->unique();
            $table->string('name')->unique();
            $table->string('scientific_name')->unique();
            $table->enum('type', ['Herbal', 'Sayuran']);
            $table->uuid('category_id'); // Ubah foreignId menjadi uuid
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('benefit_id'); // Ubah foreignId menjadi uuid
            $table->foreign('benefit_id')->references('id')->on('benefits')->onDelete('cascade')->onUpdate('cascade');
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
            // Hapus foreign key terlebih dahulu
            $table->dropForeign(['category_id']);
            $table->dropForeign(['benefit_id']);
        });

        Schema::dropIfExists('plant_attributes');
    }
};
