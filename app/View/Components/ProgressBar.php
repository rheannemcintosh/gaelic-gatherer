<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProgressBar extends Component
{
    /**
     * The progress bar percentage.
     */
    public int $percentage;

    /**
     * Create a new component instance.
     */
    public function __construct($percentage)
    {
        $this->percentage = $percentage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress-bar');
    }
}
