<?php

namespace App\Livewire;

use App\Models\Lesson;
use Livewire\Component;

class Maths extends Component
{
    /**
     * The lesson instance.
     */
    public Lesson $lesson;

    /**
     * @var array The questions.
     */
    public array $questions = [];

    /**
     * @var array The answers the user has selected.
     */
    public array $selectedAnswers = [];

    /**
     * @var array The correct answers.
     */
    public array $correctAnswers = [];

    /**
     * The form completion status.
     */
    public bool $isComplete = false;

    /**
     * The incorrect pairs status.
     */
    public bool $isIncorrect = false;

    /**
     * Create a new component instance.
     */
    public function mount($lesson): void
    {
        $this->lesson = $lesson;

        $this->questions = [
            [
                'id' => 1,
                'options' => ['1', '+', '2', '=', '?'],
                'choices' => ['naoi', 'aon', 'trì'],
                'correct_answer' => 'trì'
            ],

            [
                'id' => 3,
                'options' => ['12', '÷', '?', '=', 'dà'],
                'choices' => ['sia', 'trì', 'còig'],
                'correct_answer' => 'sia'
            ],
            [
                'id' => 4,
                'options' => ['naoi', '-', 'ceithir', '=', '?'],
                'choices' => ['aon', 'còig', 'seachd'],
                'correct_answer' => 'còig'
            ],
            [
                'id' => 2,
                'options' => ['dà', 'x', '?', '=', 'ochd'],
                'choices' => ['ceithir', 'sia', 'deich'],
                'correct_answer' => 'ceithir'
            ],
        ];

        foreach ($this->questions as $question) {
            $this->correctAnswers[$question['id']] = $question['correct_answer'];
        }
    }

    /**
     * Select an answer for a question.
     *
     * @param int $questionId
     * @param string $choice
     */
    public function selectAnswer($questionId, $choice)
    {
        $this->selectedAnswers[$questionId] = $choice;

        $this->checkCompletion();
    }

    /**
     * Dispatch an event to reset the incorrect answers after a delay
     */
    public function resetSelectionsAfterDelay()
    {
        $this->dispatch('reset-selections');
    }

    /**
     * Reset the incorrect answers
     */
    public function resetSelections()
    {
        foreach ($this->selectedAnswers as $questionId => $answer) {
            if ($this->correctAnswers[$questionId] !== $answer) {
                unset($this->selectedAnswers[$questionId]);
            }
        }
        $this->isIncorrect = false;
    }

    /**
     * Check whether the lesson is complete.
     */
    public function checkCompletion()
    {
        $hasIncorrect = false;
        foreach ($this->selectedAnswers as $questionId => $answer) {
            if ($this->correctAnswers[$questionId] != $answer) {
                $hasIncorrect = true;
            }
        }

        if ($hasIncorrect) {
            $this->resetSelectionsAfterDelay();
            if (count($this->selectedAnswers) == count($this->questions)) {
                $this->isIncorrect = true;
                $this->isComplete = false;
            }
        } else {
            if (count($this->selectedAnswers) == count($this->questions)) {
                $this->isComplete = true;
                $this->isIncorrect = false;
            }
        }
    }

    /**
     * Render the component.
     */
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.maths');
    }
}
