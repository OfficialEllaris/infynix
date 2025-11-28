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

    public $editingStudentId;
    public $editingFullName;
    public $editingEmailAddress;
    public $editingPhoneNumber;
    public $editingAssignedSupervisor;

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

        $this->students = Student::all();
    }

    public function loadStudentData($studentId)
    {
        $student = Student::find($studentId);

        $this->editingStudentId = $student->id;
        $this->editingFullName = $student->fullname;
        $this->editingEmailAddress = $student->email_address;
        $this->editingPhoneNumber = $student->phone_number;
        $this->editingAssignedSupervisor = $student->supervisor_id;

        $this->dispatch('openManageStudentModal');
    }

    public function updateStudentData()
    {
        // Validate input data
        $this->validate([
            'editingFullName' => 'required|string|max:255',
            'editingEmailAddress' => 'required|email|unique:students,email_address,' . $this->editingStudentId,
            'editingPhoneNumber' => 'nullable|string|max:20',
            'editingAssignedSupervisor' => 'required|exists:supervisors,id',
        ]);

        // Find and update student record
        $student = Student::find($this->editingStudentId);

        if ($student) {
            // Update student record
            $student->update([
                'fullname' => $this->editingFullName,
                'email_address' => $this->editingEmailAddress,
                'phone_number' => $this->editingPhoneNumber,
                'supervisor_id' => $this->editingAssignedSupervisor,
            ]);

            // Provide feedback
            session()->flash('feedback', 'Student updated successfully!');
        } else {
            // Student not found feedback
            session()->flash('feedback', 'Student not found.');
        }

        $this->reset([
            'editingStudentId',
            'editingFullName',
            'editingEmailAddress',
            'editingPhoneNumber',
            'editingAssignedSupervisor'
        ]);

        $this->dispatch('closeManageStudentModal');

        $this->students = Student::all();
    }

    public function deleteStudent($studentId)
    {
        $student = Student::find($studentId);

        if ($student) {
            $student->delete();
            session()->flash('feedback', 'Student deleted successfully!');
        } else {
            session()->flash('feedback', 'Student not found.');
        }

        $this->students = Student::all();
    }

    public function render()
    {
        return view('livewire.student-manager');
    }
}
