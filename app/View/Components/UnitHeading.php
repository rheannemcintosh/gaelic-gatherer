<?php

namespace App\View\Components;

use App\Models\Unit;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UnitHeading extends Component
{
    /**
     * The unit instance.
     */
    public Unit $unit;

    /**
     * The overview data.
     */
    public mixed $overview;

    /**
     * Create a new component instance.
     */
    public function __construct($unit, $overview = null)
    {
        $this->unit     = $unit;
        $this->overview = $overview;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.unit-heading');
    }
}
