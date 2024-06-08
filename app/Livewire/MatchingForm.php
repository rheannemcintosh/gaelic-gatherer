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
     * The selected Gaelic word index.
     */
    public $selectedGaelic = null;

    /**
     * The selected English word index.
     */
    public $selectedEnglish = null;

    /**
     * The pairs of Gaelic and English words.
     */
    public $pairs = [];

    /**
     * The incorrect pairs of Gaelic and English words.
     */
    public $incorrectPairs = [];

    /**
     * The form completion status.
     */
    public $isComplete = false;

    /**
     * The incorrect pairs status.
     */
    public $isIncorrect = false;

    /**
     * The default words to match. These will be updated in future jira stories.
     */
    public $words = [];
    public $columnOneWords = [];
    public $columnTwoWords = [];
    public $columnOneName ='';
    public $columnTwoName ='';

    /**
     * The listeners for this component.
     */
    protected $listeners = ['selectGaelic', 'selectEnglish'];

    /**
     * Create a new component instance.
     */
    public function mount($lesson, $columnOneName, $columnTwoName, $columnTwoWords, $columnOneWords)
    {
        $this->lesson = $lesson;
        $this->columnTwoWords = $columnTwoWords;
        $this->columnOneWords = $columnOneWords;
        $this->columnOneName = $columnOneName;
        $this->columnTwoName = $columnTwoName;
        $this->words = array_map(function ($gaelic, $english) {
            return ['gaelic' => $gaelic, 'english' => $english];
        }, $this->columnOneWords, $this->columnTwoWords);
    }

    /**
     * Get the index of gaelic card and check if it matches the selected english card.
     */
    public function selectGaelic($index)
    {
        $this->selectedGaelic = $index;
        $this->checkPair();
    }

    /**
     * Get the index of english card and check if it matches the selected gaelic card.
     */
    public function selectEnglish($index)
    {
        $this->selectedEnglish = $index;
        $this->checkPair();
    }

    /**
     * Check whether the selected gaelic and english words are a pair.
     */
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

    /**
     * Reset the selected gaelic and english words after a delay.
     */
    public function resetSelectionsAfterDelay()
    {
        $this->dispatch('reset-selections');
    }

    /**
     * Reset the selected gaelic and english words.
     */
    public function resetSelections()
    {
        $this->selectedGaelic = null;
        $this->selectedEnglish = null;
        $this->incorrectPairs = [];
        $this->isIncorrect = false;
    }

    /**
     * Check whether the form is complete.
     */
    public function checkCompletion()
    {
        $this->isComplete = count($this->pairs) === count($this->words);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('livewire.matching-form');
    }
}
