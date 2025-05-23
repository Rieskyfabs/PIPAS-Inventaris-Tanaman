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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id'); // Use UUID for the foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Define foreign key constraint
            $table->string('action'); // Store the action type like 'create', 'update', 'delete'
            $table->text('description')->nullable(); // Detailed description of the activity
            $table->timestamp('performed_at'); // The time of the activity
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
