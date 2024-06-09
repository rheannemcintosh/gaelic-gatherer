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
        Schema::create('lesson_user', function (Blueprint $table) {
            $table->id(); // The ID of the lesson_user
            $table->foreignId('user_id')->constrained(); // The user id of the lessons
            $table->foreignId('lesson_id')->constrained(); // The lesson id of the user
            $table->boolean('completed')->default(false); // Whether the lesson is completed or not
            $table->timestamp('completed_at')->nullable(); // The date the lesson was completed
            $table->integer('number_of_starts')->default(0); // The number of times the lesson was started
            $table->integer('number_of_completes')->default(0); // The number of times the lesson was completed
            $table->timestamps(); // The created at and updated at timestamps of the lesson user
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_user');
    }
};
