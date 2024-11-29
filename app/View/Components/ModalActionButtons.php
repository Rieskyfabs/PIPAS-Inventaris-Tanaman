<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalActionButtons extends Component
{
    public $deleteRoute;
    public $markAsHarvested;
    public $QrCode;

    /**
     * Create a new component instance.
     * @param  string|null  $deleteRoute
     * @param  string|null  $markAsHarvested
     * @param  string|null  $QrCode
     * @return void
     */
    public function __construct($QrCode = null, $deleteRoute = null, $markAsHarvested = null)
    {
        $this->deleteRoute = $deleteRoute;
        $this->markAsHarvested = $markAsHarvested;
        $this->QrCode = $QrCode;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-action-buttons');
    }
}
