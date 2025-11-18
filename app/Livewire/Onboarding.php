<?php

namespace App\Livewire;

use Livewire\Component;

class Onboarding extends Component
{
    public $username;
    public $username_value;
    public $email_address;
    public $email_address_value;
    public $password;
    public $password_value;
    public $feedback;

    public function registerUser()
    {
        $this->feedback = "Account Created Successfully!";
        $this->username_value = $this->username;
        $this->email_address_value = $this->email_address;
        $this->password_value = $this->password;

        $this->username = "";
        $this->email_address = "";
        $this->password = "";
    }

    public function render()
    {
        return view('livewire.onboarding');
    }
}
