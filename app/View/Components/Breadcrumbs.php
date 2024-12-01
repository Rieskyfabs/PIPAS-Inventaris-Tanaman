<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    public $title;
    public $items;

    /**
     * Create a new component instance.
     *
     * @param  string  $title
     * @param  array  $items
     * @return void
     */
    public function __construct($title, $items)
    {
        $this->title = $title;
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('components.molecules.breadcrumbs');
    }
}
