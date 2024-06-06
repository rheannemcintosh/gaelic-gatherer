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
        Schema::create('user_data', function (Blueprint $table) {
            // ID
            $table->id();

            // User ID
            $table->foreignId('user_id')->constrained();

            // Study Group
            $table->enum('study_group', ['Control', 'Experimental']);

            // Pre Study Questionnaire
            $table->enum('pre_study_motivation', ['Highly Motivated', 'Moderately Motivated', 'Slightly Motivated', 'Not Motivated'])->nullable();
            $table->enum('pre_study_competency', ['None', 'Beginner', 'Intermediate', 'Advanced', 'Fluent', 'Native Speaker'])->nullable();
            $table->timestamp('pre_study_completed_at')->nullable();

            // Study
            $table->timestamp('study_started_at')->nullable();
            $table->timestamp('study_completed_at')->nullable();

            // Post Study Questionnaire
            $table->enum('post_study_motivation', ['Highly Motivated', 'Moderately Motivated', 'Slightly Motivated', 'Not Motivated'])->nullable();
            $table->boolean('post_study_born_in_scotland')->nullable();
            $table->boolean('post_study_live_in_scotland')->nullable();
            $table->boolean('post_study_visited_scotland')->nullable();
            $table->boolean('post_study_scottish_ancestry')->nullable();
            $table->boolean('post_study_relations_to_highlands_and_islands')->nullable();
            $table->boolean('post_study_interested_in_scottish_culture')->nullable();
            $table->boolean('post_study_speak_scottish_gaelic')->nullable();
            $table->boolean('post_study_speak_gaelic')->nullable();
            $table->boolean('post_study_interested_in_scottish_gaelic')->nullable();
            $table->boolean('post_study_interested_in_gaelic')->nullable();
            $table->timestamp('post_study_completed_at')->nullable();

            // Knowledge Retention Quiz One
            $table->timestamp('quiz_one_unlocked_at')->nullable();
            $table->timestamp('quiz_one_started_at')->nullable();
            $table->timestamp('quiz_one_completed_at')->nullable();

            // Knowledge Retention Quiz Two
            $table->timestamp('quiz_two_unlocked_at')->nullable();
            $table->timestamp('quiz_two_started_at')->nullable();
            $table->timestamp('quiz_two_completed_at')->nullable();

            // Knowledge Retention Quiz Three
            $table->timestamp('quiz_three_unlocked_at')->nullable();
            $table->timestamp('quiz_three_started_at')->nullable();
            $table->timestamp('quiz_three_completed_at')->nullable();

            // Created At & Updated At
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data');
    }
};
