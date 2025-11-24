<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\Supervisor;
use Livewire\Component;

class StudentManager extends Component
{
    public $fullName;
    public $emailAddress;
    public $phoneNumber;
    public $assignedSupervisor;
    public $supervisors;
    public $students;

    public function mount()
    {
        $this->supervisors = Supervisor::all();
        $this->students = Student::all();
    }

    public function createStudent()
    {
        // Validate input data
        $this->validate([
            'fullName' => 'required|string|max:255',
            'emailAddress' => 'required|email|unique:students,email_address',
            'phoneNumber' => 'nullable|string|max:20',
            'assignedSupervisor' => 'required|exists:supervisors,id',
        ]);

        // Create new student record
        Student::create([
            'fullname' => $this->fullName,
            'email_address' => $this->emailAddress,
            'phone_number' => $this->phoneNumber,
            'supervisor_id' => $this->assignedSupervisor,
        ]);

        // Reset form fields
        $this->reset(['fullName', 'emailAddress', 'phoneNumber', 'assignedSupervisor']);

        // Optionally, you can emit an event or set a session message for feedback
        session()->flash('feedback', 'Student added successfully!');
    }

    public function render()
    {
        return view('livewire.student-manager');
    }
}
