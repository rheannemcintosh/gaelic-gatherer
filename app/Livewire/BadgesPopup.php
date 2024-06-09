<?php

namespace App\Livewire;

use Livewire\Component;

class BadgesPopup extends Component
{
    /**
     * @var bool Whether to show the popup.
     */
    public $showPopup = false;

    /**
     * @var array The new badges to display.
     */
    public $newBadges = [];

    /**
     * Create a new component instance.
     */
    public function mount($newBadges)
    {
        $this->showPopup = true;
        $this->newBadges = $newBadges;
    }

    /**
     * Toggle the popup visibility.
     */
    public function togglePopup()
    {
        $this->showPopup = !$this->showPopup;
    }

    /**
     * Render the component.
     */
    public function render()
    {
        return view('livewire.badges-popup');
    }
}
