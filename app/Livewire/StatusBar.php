<?php

namespace App\Livewire;

use Livewire\Component;

class StatusBar extends Component
{
    /**
     * @var string The message to display in the status bar
     */
    public string $message = '';

    /**
     * @var string The type of status bar to display
     */
    public mixed $type = '';

    /**
     * Mounts the type and the message property
     *
     * @param $type
     * @param $message
     * @return void
     */
    public function mount($type, $message): void
    {
        $this->type    = $type;
        $this->message = $message;
    }

    /**
     * Return the class properties depending on the type of the status bar
     *
     * @return string
     */
    public function getStatusBarClassProperty(): string
    {
        $classes = [
            'success'     => 'success-bg',
            'error'       => 'error-bg',
            'warning'     => 'warning-bg',
            'information' => 'information-bg',
        ];

        return $classes[$this->type] ?? 'information-bg';
    }

    /**
     * Render the livewire component
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.status-bar');
    }
}
