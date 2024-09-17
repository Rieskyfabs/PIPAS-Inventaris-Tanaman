<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $type;
    public $title;
    public $period;
    public $icon;
    public $value;
    public $changePercent;
    public $changeType;
    public $filter;
    public $filterOptions;

    /**
     * Create a new component instance.
     */
    public function __construct($type, $title, $period, $icon, $value, $changePercent = 0, $changeType, $filter = null, $filterOptions = [])
    {
        $this->type = $type;
        $this->title = $title;
        $this->period = $period;
        $this->icon = $icon;
        $this->value = $value;
        $this->changePercent = $changePercent;
        $this->changeType = $changeType;
        $this->filter = $filter;
        $this->filterOptions = $filterOptions;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
