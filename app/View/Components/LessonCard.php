<?php

namespace App\View\Components;

use App\Models\Lesson;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LessonCard extends Component
{
    /**
     * The lesson instance.
     */
    public Lesson $lesson;

    /**
     * The slug.
     */
    public String $slug;

    /**
     * Create a new component instance.
     */
    public function __construct($lesson, $slug)
    {
        $this->lesson = $lesson;
        $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.lesson-card');
    }
}
