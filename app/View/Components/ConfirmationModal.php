<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ConfirmationModal extends Component
{
    public $modalId;
    public $title;
    public $message;
    public $confirmText;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modalId, $title, $message, $confirmText = 'Confirm')
    {
        $this->modalId = $modalId;
        $this->title = $title;
        $this->message = $message;
        $this->confirmText = $confirmText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.confirmation-modal');
    }
}
