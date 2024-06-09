<?php

namespace App\Livewire;

use Livewire\Component;

class AllBadgesPopup extends Component
{
    /**
     * @var bool Whether to show the popup.
     */
    public $showPopup = false;

    /**
     * @var array The new badges to display.
     */
    public $badges = [];

    /**
     * @var string[] The events this component listens to.
     */
    protected $listeners = ['togglePopup' => 'togglePopup'];

    /**
     * Create a new component instance.
     */
    public function mount($badges)
    {
        $this->badges = $badges;
    }

    /**
     * Toggle the popup visibility.
     */
    public function togglePopup()
    {
        $this->showPopup = !$this->showPopup;
    }

    public function render()
    {
        return view('livewire.all-badges-popup');
    }
}
