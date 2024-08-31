<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LogoSidebar extends Component
{
    public $logoSrc;
    public $logoText;

    /**
     * Create a new component instance.
     *
     * @param  string  $logoSrc
     * @param  string  $logoText
     * @return void
     */
    public function __construct($logoSrc, $logoText)
    {
        $this->logoSrc = $logoSrc;
        $this->logoText = $logoText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('components.logo-sidebar');
    }
}
