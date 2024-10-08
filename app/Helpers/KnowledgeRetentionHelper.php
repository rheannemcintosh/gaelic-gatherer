<?php

namespace App\Helpers;

class KnowledgeRetentionHelper
{
    /**
     * The questions and answers for the knowledge retention quiz.
     */
    public const QUESTIONS = [
        2 => [
            'question' => 'What is the Scottish Gaelic word for "nine"?',
            'answers' => [
                1 => 'Còig',
                2 => 'Còig Deug',
                3 => 'Naoi Deug',
                4 => 'Naoi'
            ],
            'correct_answer' => '4'
        ],
        5 => [
            'question' => 'What is "Teth" in Scottish Gaelic"?',
            'answers' => [
                1 => 'Cold',
                2 => 'Warm',
                3 => 'Hot',
                4 => 'Freezing'
            ],
            'correct_answer' => '3'
        ],
        4 => [
            'question' => 'How would you say "How are you?" to a teacher in Scottish Gaelic?',
            'answers' => [
                1 => 'Ciamar a tha thu?',
                2 => 'Ciamar a tha sibh?',
                3 => 'Cò às a tha thu?',
                4 => 'A bheil i an seo?'
            ],
            'correct_answer' => '2'
        ],
        10 => [
            'question' => 'What does "Aran?" mean in Scottish Gaelic?',
            'answers' => [
                1 => 'Cheese',
                2 => 'Bread',
                3 => 'Ham',
                4 => 'Chicken'
            ],
            'correct_answer' => '2'
        ],
        6 => [
            'question' => 'Translate the phrase "It is cold and windy" into Scottish Gaelic',
            'answers' => [
                1 => 'Tha i fuar agus gaothach',
                2 => 'Tha i blàth agus ceòthach',
                3 => 'Tha i reòiteach agus grianach',
                4 => 'Tha i teth agus sneachda'
            ],
            'correct_answer' => '1'
        ],
        3 => [
            'question' => 'What does "Fàilte!" mean in Scottish Gaelic?',
            'answers' => [
                1 => 'Cheers!',
                2 => 'Goodbye!',
                3 => 'Welcome!',
                4 => 'Hello!'
            ],
            'correct_answer' => '3'
        ],
        8 => [
            'question' => 'How would you say "I am from Scotland" in Scottish Gaelic?',
            'answers' => [
                1 => 'Tha mi Albannach',
                2 => 'S ann à Sasainn a tha mi',
                3 => 'Tha mi às an Spàinn',
                4 => 'Tha mi à Alba'
            ],
            'correct_answer' => '4'
        ],
        1 => [
            'question' => 'What does "Trì" mean in Scottish Gaelic?',
            'answers' => [
                1 => 'One',
                2 => 'Two',
                3 => 'Three',
                4 => 'Four'
            ],
            'correct_answer' => '3'
        ],
        9 => [
            'question' => 'Translate "I like salmon but I don\'t like haggis" into Scottish Gaelic.',
            'answers' => [
                1 => 'Is toil leam càise ach cha toil leam sneachda',
                2 => 'Is toil leam bradan ach cha toil leam taigeis',
                3 => 'Is toil leam taigeis ach cha toil leam bradan',
                4 => 'Is toil leam sneachda ach cha toil leam càise'
            ],
            'correct_answer' => '2'
        ],
        7 => [
            'question' => 'Translate the phrase "Cò às a tha thu"?',
            'answers' => [
                1 => 'Where are you from?',
                2 => 'How are you?',
                3 => 'Where are you?',
                4 => 'What is that?'
            ],
            'correct_answer' => '1'
        ],
    ];
}
