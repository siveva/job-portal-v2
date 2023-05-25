<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PopupModal extends Component
{
    public $title;
    public $target;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $target)
    {
        $this->title = $title;
        $this->target = $target;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.popup-modal');
    }
}
