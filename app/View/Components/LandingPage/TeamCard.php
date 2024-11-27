<?php

namespace App\View\Components\LandingPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TeamCard extends Component
{
    public $image;
    public $name;
    public $role;
    public $description;
    public $socials;

    /**
     * Create a new component instance.
     * 
     *  @param string $image
     *  @param string $name
     *  @param string $role
     *  @param string $description
     *  @param array $socials
     */
    public function __construct($image, $name, $role, $description, $socials = [])
    {
        $this->image = $image;
        $this->name = $name;
        $this->role = $role;
        $this->description = $description;
        $this->socials = $socials;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landing-page.team-card');
    }
}
