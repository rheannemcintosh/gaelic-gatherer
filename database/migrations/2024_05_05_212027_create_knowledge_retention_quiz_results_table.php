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
        Schema::create('knowledge_retention_quiz_results', function (Blueprint $table) {
            $table->id(); // The ID of the quiz result
            $table->foreignId('user_id'); // The user who took the quiz
            $table->integer('quiz'); // The quiz that was taken (1, 2 or 3)
            $table->integer('question_1'); // The user's answer to question 1
            $table->integer('question_2'); // The user's answer to question 2
            $table->integer('question_3'); // The user's answer to question 3
            $table->integer('question_4'); // The user's answer to question 4
            $table->integer('question_5'); // The user's answer to question 5
            $table->integer('question_6'); // The user's answer to question 6
            $table->integer('question_7'); // The user's answer to question 7
            $table->integer('question_8'); // The user's answer to question 8
            $table->integer('question_9'); // The user's answer to question 9
            $table->integer('question_10'); // The user's answer to question 10
            $table->integer('score'); // The user's score on the quiz
            $table->timestamps(); // The created at and updated at timestamps of the quiz result
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledge_retention_quiz_results');
    }
};
