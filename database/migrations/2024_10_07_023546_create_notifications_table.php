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
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Menggunakan UUID sebagai primary key
            $table->uuid('plant_id'); // Menggunakan UUID untuk foreign key plant_id

            $table->foreign('plant_id')->references('id')->on('plants')->onDelete('cascade'); // Foreign key ke tabel plants

            $table->string('title');
            $table->string('message');
            $table->boolean('is_read')->default(false); // Menandai apakah notifikasi sudah dibaca
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
