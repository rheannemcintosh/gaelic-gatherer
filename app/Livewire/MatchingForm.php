<?php

namespace App\Livewire;

use App\Models\Lesson;
use Livewire\Component;

class MatchingForm extends Component
{
    /**
     * The lesson instance.
     */
    public Lesson $lesson;

    /**
     * Create a new component instance.
     */
    public function mount($lesson)
    {
        $this->lesson = $lesson;
    }

    public $words = [
        ['gaelic' => 'Madainn mhath', 'english' => 'Good morning'],
        ['gaelic' => 'Oidhche mhath', 'english' => 'Good night'],
        ['gaelic' => 'Tapadh leat', 'english' => 'Thank you'],
        ['gaelic' => 'Ciamar a tha thu?', 'english' => 'How are you?'],
    ];

    public $selectedGaelic = null;
    public $selectedEnglish = null;
    public $pairs = [];
    public $incorrectPairs = [];
    public $isComplete = false;
    public $isIncorrect = false;

    protected $listeners = ['selectGaelic', 'selectEnglish'];

    public function selectGaelic($index)
    {
        $this->selectedGaelic = $index;
        $this->checkPair();
    }

    public function selectEnglish($index)
    {
        $this->selectedEnglish = $index;
        $this->checkPair();
    }

    public function checkPair()
    {
        if ($this->selectedGaelic !== null && $this->selectedEnglish !== null) {
            if ($this->words[$this->selectedGaelic]['english'] === $this->words[$this->selectedEnglish]['english']) {
                $this->isIncorrect = false;
                $this->pairs[$this->selectedGaelic] = $this->selectedEnglish;
                $this->selectedGaelic = null;
                $this->selectedEnglish = null;
            } else {
                $this->isIncorrect = true;
                $this->incorrectPairs = [$this->selectedGaelic, $this->selectedEnglish];
                $this->resetSelectionsAfterDelay();
            }
        }
        $this->checkCompletion();
    }

    public function resetSelectionsAfterDelay()
    {
        $this->dispatch('reset-selections');
    }

    public function resetSelections()
    {
        $this->selectedGaelic = null;
        $this->selectedEnglish = null;
        $this->incorrectPairs = [];
        $this->isIncorrect = false;
    }

    public function checkCompletion()
    {
        $this->isComplete = count($this->pairs) === count($this->words);
    }

    public function submitForm()
    {
        if ($this->isComplete) {
            // Handle form submission, e.g., save data, redirect, etc.
        } else {
            $this->dispatch('form-not-complete');
        }
    }

    public function render()
    {
        return view('livewire.matching-form');
    }
}
