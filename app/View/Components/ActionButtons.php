<?php

namespace App\View\Components;

use Illuminate\View\Component;

// class ActionButtons extends Component
// {
//     public $action;
//     public $viewData;
//     public $deleteData;
//     public $method;
//     public $submit;
//     public $dropdown;

//     /**
//      * Create a new component instance.
//      *
//      * @param  string|null  $action
//      * @param  string|null  $viewData
//      * @param  string|null  $deleteData
//      * @param  string|null  $method
//      * @param  bool  $submit
//      * @param  array|null  $dropdown
//      * @return void
//      */
//     public function __construct($action = null, $viewData = null, $deleteData = null, $method = 'POST', $submit = false, $dropdown = null)
//     {
//         $this->action = $action;
//         $this->viewData = $viewData;
//         $this->deleteData = $deleteData;
//         $this->method = $method;
//         $this->submit = $submit;
//         $this->dropdown = $dropdown;
//     }

//     /**
//      * Get the view / contents that represent the component.
//      *
//      * @return \Illuminate\View\View|\Closure|string
//      */
//     public function render()
//     {
//         return view('components.action-buttons');
//     }
// }


class ActionButtons extends Component
{
    public $editModalTarget;
    public $deleteRoute;
    public $extraButtons;
    public $markAsHarvested;
    public $QrCode;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $editModalTarget  Target modal untuk edit.
     * @param  string|null  $deleteRoute  Route untuk aksi delete.
     * @param  array|null   $extraButtons  Tombol tambahan jika diperlukan.
     * @param  string|null  $markAsHarvested  Status panen tanaman (untuk menampilkan tombol harvest).
     * @param  string|null  $QrCode  QrCode Tanaman
     * @return void
     */
    public function __construct($editModalTarget = null, $deleteRoute = null, $extraButtons = [], $markAsHarvested = null, $QrCode = null,)
    {
        $this->editModalTarget = $editModalTarget;
        $this->deleteRoute = $deleteRoute;
        $this->extraButtons = $extraButtons;
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

