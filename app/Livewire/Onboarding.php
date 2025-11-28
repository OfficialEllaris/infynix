<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Onboarding extends Component
{
    public $username;
    public $email_address;
    public $password;

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
        $this->validate();


        // Create user record
        User::create([
            'username' => $this->username,
            'email_address' => $this->email_address,
            'password' => $this->password
        ]);

        // Reset input fields
        $this->reset([
            'username',
            'email_address',
            'password'
        ]);

        session()->flash('feedback', 'Account Created Successfully!');
    }

    public function render()
    {
        return view('livewire.onboarding');
    }
}
