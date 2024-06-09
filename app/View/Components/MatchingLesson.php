<?php

namespace App\View\Components;

use App\Models\Lesson;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MatchingLesson extends Component
{
    /**
     * The lesson instance.
     */
    public Lesson $lesson;

    /**
     * The name of the first column
     */
    public $columnOneName;

    /**
     * The name of the second column
     */
    public $columnTwoName;

    /**
     * The list of words to be displayed in column 1
     */
    public $columnOneWords;

    /**
     * The list of words to be displayed in column 2
     */
    public $columnTwoWords;

    /**
     * The name of the lesson
     */
    public $name;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $lesson,
        $columnOneName,
        $columnTwoName,
        $columnOneWords,
        $columnTwoWords,
        $name
    ) {
        $this->lesson = $lesson;
        $this->columnOneName = $columnOneName;
        $this->columnTwoName = $columnTwoName;
        $this->columnOneWords = $columnOneWords;
        $this->columnTwoWords = $columnTwoWords;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.matching-lesson');
    }
}
