<?php

namespace App\Livewire;

use App\Models\Supervisor;
use Livewire\Component;

class SupervisorManager extends Component
{
    public $fullName;
    public $emailAddress;
    public $phoneNumber;
    public $supervisors;

    public function mount()
    {
        $this->supervisors = Supervisor::all();
    }

    public function createSupervisor()
    {
        // Validate input data
        $this->validate([
            'fullName' => 'required|string|max:255',
            'emailAddress' => 'required|email|unique:supervisors,email_address',
            'phoneNumber' => 'nullable|string|max:20',
        ]);

        // Create a new supervisor (assuming you have a Supervisor model)
        Supervisor::create([
            'fullname' => $this->fullName,
            'email_address' => $this->emailAddress,
            'phone_number' => $this->phoneNumber,
        ]);

        // Reset form fields
        $this->reset([
            'fullName',
            'emailAddress',
            'phoneNumber'
        ]);

        // Optionally, you can emit an event or flash a message
        session()->flash('feedback', 'Supervisor added successfully!');
    }

    public function render()
    {
        return view('livewire.supervisor-manager');
    }
}
