<?php

namespace App\View\Components\LandingPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardInfo extends Component
{
    public $title;
    public $icon;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $icon)
    {
        $this->title = $title;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landing-page.card-info');
    }
}
