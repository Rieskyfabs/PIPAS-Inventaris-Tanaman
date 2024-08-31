<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarSearch extends Component
{
    public $actionUrl;

    /**
     * Create a new component instance.
     *
     * @param  string  $actionUrl
     * @return void
     */
    public function __construct($actionUrl)
    {
        $this->actionUrl = $actionUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('components.sidebar-search');
    }
}
