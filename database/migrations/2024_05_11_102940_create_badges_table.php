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
        Schema::create('badges', function (Blueprint $table) {
            $table->id(); // The ID of the badge
            $table->string('name'); // The name of the badge
            $table->string('description')->nullable(); // The description of the badge
            $table->string('icon')->nullable(); // The name of the badge image (where it is located in storage)
            $table->timestamps(); // The created at and updated at timestamps of the badge
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};
