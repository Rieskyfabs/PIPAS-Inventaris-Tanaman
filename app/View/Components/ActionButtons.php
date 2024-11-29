<?php

namespace App\View\Components;

use Illuminate\View\Component;
class ActionButtons extends Component
{
    public $showDetailModal;
    public $editModalTarget;
    public $deleteRoute;
    public $markAsHarvested;
    public $QrCode;

    /**
     * Create a new component instance.
     * @param  string|null  $showDetailModal
     * @param  string|null  $editModalTarget
     * @param  string|null  $deleteRoute
     * @param  string|null  $markAsHarvested
     * @param  string|null  $QrCode
     * @return void
     */
    public function __construct($showDetailModal = null, $editModalTarget = null, $QrCode = null, $deleteRoute = null, $extraButtons = [], $markAsHarvested = null)
    {
        $this->showDetailModal = $showDetailModal;
        $this->editModalTarget = $editModalTarget;
        $this->deleteRoute = $deleteRoute;
        $this->markAsHarvested = $markAsHarvested;
        $this->QrCode = $QrCode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.action-buttons');
    }
}

