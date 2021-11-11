<?php

namespace App\Http\Livewire\Admin\Forms;

use App\Models\User;
use Livewire\Component;

class AddStudent extends Component
{
    public User $student;

    protected $rules = [
        'student.name' => 'required|min:8',
        'student.email' => 'required|email|unique:users,email',
        'student.user_type' => 'required'
    ];

    public function updated($param): void
    {
        $this->validateOnly($param);
    }

    public function donAddStudent()
    {
        $this->validate();

        User::create([
            'name' => $this->student->name,
            'email' => $this->student->email,
            'user_type' => $this->student->user_type,
            'password' => bcrypt('@1234321')
        ]);

        session()->flash('success', 'Student Added');
    }

    public function mount(): void
    {
        $this->student = new User;
    }
    public function render()
    {
        return view('livewire.admin.forms.add-student');
    }
}