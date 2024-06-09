<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TargetCircle extends Component
{
    /**
     * The route to the target circle.
     */
    public $route;

    /**
     * Create a new component instance.
     */
    public function __construct($route)
    {
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.circles.target-circle');
    }
}
