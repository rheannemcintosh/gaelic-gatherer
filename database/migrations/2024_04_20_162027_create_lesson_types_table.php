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
        Schema::create('lesson_types', function (Blueprint $table) {
            $table->id(); // The ID of the lesson type
            $table->string('name'); // The name of the lesson type
            $table->string('thumbnail')->nullable(); // The icon name of the lesson type
            $table->timestamps(); // The created at and updated at timestamps of the lesson type
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_types');
    }
};
