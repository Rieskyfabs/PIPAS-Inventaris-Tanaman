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
        Schema::create('tanaman_keluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plant_id')->constrained('plants')->onDelete('cascade')->onUpdate('cascade');  // Foreign key ke tabel plants
            $table->string('kode_tanaman_keluar'); // Kode unik untuk tanaman keluar
            $table->date('tanggal_keluar');  // Tanggal tanaman keluar
            $table->integer('jumlah_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanaman_keluar');
    }
};
