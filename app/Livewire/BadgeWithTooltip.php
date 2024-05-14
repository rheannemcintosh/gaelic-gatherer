<?php

namespace App\Livewire;

use App\Models\Badge;
use Livewire\Component;

class BadgeWithTooltip extends Component
{
    /**
     * The badge instance.
     *
     * @var Badge
     */
    public Badge $badge;

    public function render()
    {
        return view('livewire.badge-with-tooltip');
    }
}
