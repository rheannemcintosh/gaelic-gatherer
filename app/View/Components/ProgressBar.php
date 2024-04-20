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
    public function __construct()
    {
        // Generate a random number between 0 and 3
        $randomIndex = rand(0, 3);

        // Array of possible percentage values
        $values = [0, 33, 66, 100];

        // Set the percentage value
        $this->percentage = $values[$randomIndex];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress-bar');
    }
}
