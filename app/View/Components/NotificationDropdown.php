<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NotificationDropdown extends Component
{
    public $notificationCount;
    public $notifications;

    /**
     * Create a new component instance.
     *
     * @param  int  $notificationCount
     * @param  array  $notifications
     * @return void
     */
    public function __construct($notificationCount, $notifications)
    {
        $this->notificationCount = $notificationCount;
        $this->notifications = $notifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('components.notification-dropdown');
    }
}
