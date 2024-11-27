<?php

namespace App\View\Components\LandingPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatisticCard extends Component
{
    public $count;
    public $title;
    public $description;

    /**
     * Create a new component instance.
     * @param  string|null  $count
     * @param  string|null  $title
     * @param  string|null  $description
     * @return void
     */
    public function __construct($description, $count, $title)
    {
        $this->count = $count;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landing-page.statistic-card');
    }
}
