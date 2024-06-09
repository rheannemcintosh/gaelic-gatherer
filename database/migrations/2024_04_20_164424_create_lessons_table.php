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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id(); // The ID of the lesson
            $table->foreignId('unit_id')->constrained(); // The unit the lesson belongs to
            $table->foreignId('lesson_type_id')->constrained(); // The type of lesson
            $table->string('name'); // The name of the lesson
            $table->text('description')->nullable(); // The description of the lesson
            $table->boolean('active')->default(true); // Whether the lesson is active or not
            $table->boolean('required')->default(false); // Whether the lesson is required or not
            $table->timestamps(); // The created at and updated at timestamps of the lesson
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
