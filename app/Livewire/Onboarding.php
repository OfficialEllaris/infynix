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

    protected $rules = [
        'username' => 'required|min:3|max:20',
        'email_address' => 'required|email',
        'password' => 'required|min:6',
    ];

    // 🔥 Real-time validation
    public function updated($field, $value)
    {
        $this->validateOnly($field);
    }

    public function registerUser()
    {
        sleep(2); // ⏳ Force 2-second loading time

        $this->validate();

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
