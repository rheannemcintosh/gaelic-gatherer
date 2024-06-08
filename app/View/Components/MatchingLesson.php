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
    public $columnTwoWords;
    public $columnOneWords;
    public $name;
    public $columnOneName;
    public $columnTwoName;

    /**
     * Create a new component instance.
     */
    public function __construct($lesson, $columnOneName, $columnTwoName, $columnOneWords, $columnTwoWords, $name)
    {
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
