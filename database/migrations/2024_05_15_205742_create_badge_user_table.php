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
        Schema::create('badge_user', function (Blueprint $table) {
            $table->id(); // The ID of the badge_user
            $table->foreignId('badge_id')->constrained(); // The badge id of the user
            $table->foreignId('user_id')->constrained(); // The user id of the badge
            $table->boolean('completed')->default(false); // Whether the badge is completed or not
            $table->timestamp('completed_at')->nullable(); // The date the badge was completed
            $table->timestamps(); // The created at and updated at timestamps of the badge user
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_user');
    }
};
