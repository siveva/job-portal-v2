<?php

namespace App\View\Components\MainSite;

use Illuminate\View\Component;

class RecentJobComponent extends Component
{
    public $recentJobs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($recentJobs)
    {
        $this->recentJobs = $recentJobs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main-site.recent-job-component');
    }
}
