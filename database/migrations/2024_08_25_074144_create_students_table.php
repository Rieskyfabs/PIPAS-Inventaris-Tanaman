<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name'); // Nama siswa
            $table->uuid('rombel_id'); // Foreign key ke rombels
            $table->uuid('rayon_id'); // Foreign key ke rayons
            $table->string('nis')->unique(); // Nomor Induk Siswa
            $table->string('email')->unique(); // Email siswa
            $table->enum('gender', ['laki-laki', 'perempuan']); // Gender siswa
            $table->timestamps();

            // Foreign keys
            $table->foreign('rombel_id')->references('id')->on('rombels')->onDelete('cascade');
            $table->foreign('rayon_id')->references('id')->on('rayons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
