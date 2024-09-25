<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $type;
    public $title;
    public $icon;
    public $value;

    /**
     * Create a new component instance.
     */
    public function __construct($type, $title, $icon, $value)
    {
        $this->type = $type;
        $this->title = $title;
        $this->icon = $icon;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
