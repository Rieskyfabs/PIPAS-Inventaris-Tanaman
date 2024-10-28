<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tanaman_masuk', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Menggunakan UUID sebagai primary key
            $table->uuid('plant_id'); // Menggunakan UUID untuk foreign key plant_id

            $table->foreign('plant_id')->references('id')->on('plants')->onDelete('cascade')->onUpdate('cascade'); // Foreign key ke tabel plants

            $table->string('kode_tanaman_masuk')->unique(); // Kode unik untuk tanaman masuk
            $table->date('tanggal_masuk');  // Tanggal tanaman masuk
            $table->integer('jumlah_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanaman_masuk');
    }
};
