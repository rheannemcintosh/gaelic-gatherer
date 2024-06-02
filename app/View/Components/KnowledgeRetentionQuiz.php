<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KnowledgeRetentionQuiz extends Component
{
    public int $quiz;

    /**
     * Create a new component instance.
     */
    public function __construct($quiz)
    {
        $this->quiz = $quiz;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.knowledge-retention-quiz');
    }
}
