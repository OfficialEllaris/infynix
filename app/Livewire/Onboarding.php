<?php

namespace App\Livewire;

use App\Mail\OnboardingSuccessful;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Onboarding extends Component
{
    public $username;
    public $email_address;
    public $password;

    protected $rules = [
        'username' => 'required|min:3|max:20',
        'email_address' => 'unique:users,email_address|required|email|max:255',
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
        $user = User::create([
            'username' => $this->username,
            'email_address' => $this->email_address,
            'password' => $this->password
        ]);

        // Send email
        Mail::to($this->email_address)->queue(
            new OnboardingSuccessful($user)
        );

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
