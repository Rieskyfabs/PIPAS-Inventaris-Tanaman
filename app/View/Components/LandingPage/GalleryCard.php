<?php

namespace App\View\Components\LandingPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GalleryCard extends Component
{
    public $image;
    public $title;
    public $description;

    /**
     * Create a new component instance.
     */
    public function __construct($image, $title, $description)
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landing-page.gallery-card');
    }
}
