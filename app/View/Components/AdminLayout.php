<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Shows whether the button to finish exploring the platform should be displayed or not.
     */
    public bool $hideButton;

    /**
     * Create a new component instance.
     */
    public function __construct($hideButton = false)
    {
        $this->hideButton = $hideButton;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.admin');
    }
}
