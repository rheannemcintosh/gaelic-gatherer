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
     * Create a new component instance.
     */
    public function __construct($lesson)
    {
        $this->lesson = $lesson;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.matching-lesson');
    }
}
