<?php

namespace App\View\Components\MainSite;

use Illuminate\View\Component;

class HeroComponent extends Component
{
    public $totalJobs;
    public $jobTitle;
    public $jobType;
    public $location;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($totalJobs, $jobTitle, $jobType, $location)
    {
        $this->totalJobs = $totalJobs;
        $this->jobTitle = $jobTitle;
        $this->jobType = $jobType;
        $this->location = $location;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main-site.hero-component');
    }
}
