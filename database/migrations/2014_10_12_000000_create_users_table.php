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
            $table->id(); // Standard Laravel Field - The ID of the user
            $table->string('email')->unique(); // Standard Laravel Field - The email of the user
            $table->timestamp('email_verified_at')->nullable(); // Standard Laravel Field - The date the email was verified
            $table->string('password'); // Standard Laravel Field - The user's password
            $table->rememberToken(); // Standard Laravel Field -  The remember token of the user
            $table->boolean('initial_consent')->default(false); // Whether the user has consented to all statements on the registration form
            $table->boolean('pre_study_consent')->default(false); // Whether the user has consented to starting the pre study
            $table->boolean('study_consent')->default(false); // Whether the user has consented to starting to explore the platform
            $table->boolean('post_study_consent')->default(false); // Whether the user has consented to starting the post study
            $table->boolean('quiz_one_consent')->default(false); // Whether the user has consented to starting the first quiz
            $table->boolean('quiz_two_consent')->default(false); // Whether the user has consented to starting the second quiz
            $table->boolean('quiz_three_consent')->default(false); // Whether the user has consented to starting the third quiz
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
