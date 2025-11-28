<?php

namespace App\Livewire;

use App\Models\Supervisor;
use Livewire\Component;
use Livewire\WithFileUploads;

class SupervisorManager extends Component
{
    use WithFileUploads;
    public $fullName;
    public $emailAddress;
    public $phoneNumber;
    public $resume;

    public $editingSupervisorId;
    public $editingFullName;
    public $editingEmailAddress;
    public $editingPhoneNumber;
    public $editingResume;

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
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        // Create a new supervisor (assuming you have a Supervisor model)
        Supervisor::create([
            'fullname' => $this->fullName,
            'email_address' => $this->emailAddress,
            'phone_number' => $this->phoneNumber,
            'resume' => $this->resume ? $this->resume->store('resumes', 'public') : null,
        ]);

        // Reset form fields
        $this->reset([
            'fullName',
            'emailAddress',
            'emailAddress',
            'phoneNumber',
            'resume',
        ]);

        // Optionally, you can emit an event or flash a message
        session()->flash('feedback', 'Supervisor added successfully!');

        $this->supervisors = Supervisor::all();
    }

    public function loadSupervisorData($supervisorId)
    {
        $supervisor = Supervisor::find($supervisorId);

        $this->editingSupervisorId = $supervisor->id;
        $this->editingFullName = $supervisor->fullname;
        $this->editingEmailAddress = $supervisor->email_address;
        $this->editingPhoneNumber = $supervisor->phone_number;

        $this->dispatch('openManageSupervisorModal');
    }

    public function updateSupervisorData()
    {
        // Validate input data
        $this->validate([
            'editingFullName' => 'required|string|max:255',
            'editingEmailAddress' => 'required|email|unique:supervisors,email_address,' . $this->editingSupervisorId,
            'editingPhoneNumber' => 'nullable|string|max:20',
            'editingResume' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        // Update supervisor record
        $supervisor = Supervisor::find($this->editingSupervisorId);
        $supervisor->update([
            'fullname' => $this->editingFullName,
            'email_address' => $this->editingEmailAddress,
            'phone_number' => $this->editingPhoneNumber,
        ]);

        if ($this->editingResume) {
            $supervisor->update([
                'resume' => $this->editingResume->store('resumes', 'public'),
            ]);
        }

        $this->reset([
            'editingSupervisorId',
            'editingFullName',
            'editingEmailAddress',
            'editingEmailAddress',
            'editingPhoneNumber',
            'editingResume',
        ]);

        $this->dispatch('closeManageSupervisorModal');

        // Optionally, you can emit an event or flash a message
        session()->flash('feedback', 'Supervisor updated successfully!');

        $this->supervisors = Supervisor::all();
    }

    public function deleteSupervisor($supervisorId)
    {
        $supervisor = Supervisor::find($supervisorId);

        if ($supervisor) {
            $supervisor->delete();
            session()->flash('feedback', 'Supervisor deleted successfully!');
        } else {
            session()->flash('feedback', 'Supervisor not found.');
        }

        $this->supervisors = Supervisor::all();
    }

    public function render()
    {
        return view('livewire.supervisor-manager');
    }
}
