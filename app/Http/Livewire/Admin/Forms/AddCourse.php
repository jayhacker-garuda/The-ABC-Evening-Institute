<?php

namespace App\Http\Livewire\Admin\Forms;

use App\Models\Course;
use Livewire\Component;

class AddCourse extends Component
{
    public $course_name;

    protected $rules = [
      'course_name' => 'required|unique:courses'
    ];

    public function updated($param)
    {
        $this->validateOnly($param);
    }

    public function donAddCourse()
    {
        $courseData = $this->validate();
        // dd($courseData);

        Course::create($courseData);
        session()->flash('success', 'Course Added');
    }
    public function render()
    {
        return view('livewire.admin.forms.add-course');
    }
}