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
            $table->id(); // The ID of the user data

            // User ID
            $table->foreignId('user_id')->constrained(); // The user id of the user data

            // Study Group
            $table->enum('study_group', ['Control', 'Experimental']); // The study group of the user

            // Pre Study Questionnaire Fields
            $table->enum('pre_study_motivation', ['Highly Motivated', 'Moderately Motivated', 'Slightly Motivated', 'Not Motivated'])->nullable(); // The motivation of the user to learn Scottish Gaelic before the study
            $table->enum('pre_study_competency', ['None', 'Beginner', 'Intermediate', 'Advanced', 'Fluent', 'Native Speaker'])->nullable(); // The competency of the user in Scottish Gaelic before the study
            $table->timestamp('pre_study_completed_at')->nullable(); // The date the pre study questionnaire was completed

            // Study Fields
            $table->timestamp('study_started_at')->nullable(); // The date the study was started (exploring the platform)
            $table->timestamp('study_completed_at')->nullable(); // The date the study was completed (exploring the platform)

            // Post Study Questionnaire Fields
            $table->enum('post_study_motivation', ['Highly Motivated', 'Moderately Motivated', 'Slightly Motivated', 'Not Motivated'])->nullable(); // The motivation of the user to learn Scottish Gaelic after the study
            $table->boolean('post_study_born_in_scotland')->nullable(); // Whether the user was born in Scotland
            $table->boolean('post_study_live_in_scotland')->nullable(); // Whether the user lives in Scotland
            $table->boolean('post_study_visited_scotland')->nullable(); // Whether the user has visited Scotland
            $table->boolean('post_study_scottish_ancestry')->nullable(); // Whether the user has Scottish ancestry
            $table->boolean('post_study_relations_to_highlands_and_islands')->nullable(); // Whether the user has relations to the Highlands and Islands
            $table->boolean('post_study_interested_in_scottish_culture')->nullable(); // Whether the user is interested in Scottish culture
            $table->boolean('post_study_speak_scottish_gaelic')->nullable(); // Whether the user speaks Scottish Gaelic
            $table->boolean('post_study_speak_gaelic')->nullable(); // Whether the user speaks Gaelic
            $table->boolean('post_study_interested_in_scottish_gaelic')->nullable(); // Whether the user is interested in Scottish Gaelic
            $table->boolean('post_study_interested_in_gaelic')->nullable(); // Whether the user is interested in Gaelic
            $table->timestamp('post_study_completed_at')->nullable(); // The date the post study questionnaire was completed

            // Knowledge Retention Quiz One Fields
            $table->timestamp('quiz_one_unlocked_at')->nullable(); // The date quiz one was unlocked
            $table->timestamp('quiz_one_started_at')->nullable(); // The date quiz one was started
            $table->timestamp('quiz_one_completed_at')->nullable(); // The date quiz one was completed

            // Knowledge Retention Quiz Two Fields
            $table->timestamp('quiz_two_unlocked_at')->nullable(); // The date quiz two was unlocked
            $table->timestamp('quiz_two_started_at')->nullable(); // The date quiz two was started
            $table->timestamp('quiz_two_completed_at')->nullable(); // The date quiz two was completed

            // Knowledge Retention Quiz Three Fields
            $table->timestamp('quiz_three_unlocked_at')->nullable(); // The date quiz three was unlocked
            $table->timestamp('quiz_three_started_at')->nullable(); // The date quiz three was started
            $table->timestamp('quiz_three_completed_at')->nullable(); // The date quiz three was completed

            // Created At & Updated At Fields
            $table->timestamps(); // The created at and updated at timestamps of the user data
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
