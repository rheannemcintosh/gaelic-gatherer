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
     * The message to display in the status bar.
     */
    public mixed $statusMessage;

    /**
     * The type of the status message.
     */
    public mixed $statusType;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $hideButton = false,
        $statusMessage = null,
        $statusType = null,
    )
    {
        $this->hideButton = $hideButton;
        $this->statusMessage = $statusMessage;
        $this->statusType = $statusType;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.admin');
    }
}
