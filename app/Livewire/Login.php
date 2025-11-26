<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email_address;
    public $password;

    protected $rules = [
        'email_address' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function loginUser()
    {
        $this->validate();

        // Authentication logic here
        if (
            Auth::attempt([
                'email_address' => $this->email_address,
                'password' => $this->password
            ])
        ) {
            // Login successful
            session()->flash('feedback', 'Login successful!');

            // You can redirect the user or perform other actions here
            return redirect()->intended('/dashboard');
        } else {
            // Login failed
            session()->flash('feedback', 'Login failed. Please check your credentials.');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
