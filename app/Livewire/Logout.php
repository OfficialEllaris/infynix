<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();                // destroy user session
        session()->invalidate();       // invalidate session
        session()->regenerateToken();  // regenerate CSRF token

        return redirect()->route('login'); // redirect
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
