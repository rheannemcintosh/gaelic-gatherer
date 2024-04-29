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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('initial_consent')->default(false);
            $table->enum('pre_study_motivation', ['Highly Motivated', 'Moderately Motivated', 'Slightly Motivated', 'Not Motivated'])->nullable();
            $table->enum('scottish_gaelic_competency', ['None', 'Beginner', 'Intermediate', 'Advanced', 'Fluent', 'Native Speaker'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
