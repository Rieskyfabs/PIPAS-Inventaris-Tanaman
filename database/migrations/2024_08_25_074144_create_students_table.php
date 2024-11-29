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
            $table->string('name');
            $table->uuid('rombel_id')->nullable();
            $table->uuid('rayon_id')->nullable(); 
            $table->string('nis')->unique(); 
            $table->string('email')->unique();
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->timestamps();

            // Foreign keys
            $table->foreign('rombel_id')->references('id')->on('rombels')->onDelete('restrict');
            $table->foreign('rayon_id')->references('id')->on('rayons')->onDelete('restrict');
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
