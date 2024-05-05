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
        Schema::create('questionnaire_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->enum('post_study_motivation', ['Highly Motivated', 'Moderately Motivated', 'Slightly Motivated', 'Not Motivated'])->nullable();
            $table->boolean('born_in_scotland')->nullable();
            $table->boolean('live_in_scotland')->nullable();
            $table->boolean('visited_scotland')->nullable();
            $table->boolean('scottish_ancestry')->nullable();
            $table->boolean('relations_to_highlands_and_islands')->nullable();
            $table->boolean('interested_in_scottish_culture')->nullable();
            $table->boolean('speak_scottish_gaelic')->nullable();
            $table->boolean('speak_gaelic')->nullable();
            $table->boolean('interested_in_scottish_gaelic')->nullable();
            $table->boolean('interested_in_gaelic')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaire_responses');
    }
};
