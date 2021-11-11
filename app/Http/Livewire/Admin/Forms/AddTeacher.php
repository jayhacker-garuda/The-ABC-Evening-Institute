<?php

namespace App\Http\Livewire\Admin\Forms;

use App\Models\User;
use Livewire\Component;

class AddTeacher extends Component
{
    public User $teacher;

    protected $rules = [
      'teacher.name' => 'required|min:8',
      'teacher.email' => 'required|email|unique:users,email',
      'teacher.user_type' => 'required'
    ];

    public function updated($param): void
    {
        $this->validateOnly($param);
    }

    public function donAddTeacher()
    {
        $this->validate();

        User::create([
           'name' => $this->teacher->name,
           'email' => $this->teacher->email,
           'user_type' => $this->teacher->user_type,
           'password' => bcrypt('12345678')
        ]);

        session()->flash('success', 'Teacher Added');
    }

    public function mount(): void
    {
       $this->teacher = new User;
    }
    public function render()
    {
        return view('livewire.admin.forms.add-teacher');
    }
}