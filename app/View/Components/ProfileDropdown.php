<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfileDropdown extends Component
{
    public $profileImage;
    public $username;
    public $email;
    public $role;
    public $profileUrl;
    public $helpUrl;

    /**
     * Create a new component instance.
     *
     * @param  string  $profileImage
     * @param  string  $username
     * @param  string  $email
     * @param  string  $role
     * @param  string  $profileUrl
     * @param  string  $helpUrl
     * @return void
     */
    public function __construct($profileImage, $username, $email ,$role, $profileUrl, $helpUrl)
    {
        $this->profileImage = $profileImage;
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
        $this->profileUrl = $profileUrl;
        $this->helpUrl = $helpUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('components.profile-dropdown');
    }
}
