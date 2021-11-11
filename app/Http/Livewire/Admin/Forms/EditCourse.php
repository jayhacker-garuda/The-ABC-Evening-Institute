<?php

namespace App\Http\Livewire\Admin\Forms;


use App\Models\Course;
use Livewire\Component;

class EditCourse extends Component
{
    public Course $course;
    public $editCourseMode;

    protected $rules = [
        'course.course_name' => 'required',
    ];

    public function editCourse(Course $course)
    {
        $this->editCourseMode = $course;
        $this->dispatchBrowserEvent('edit-course-open');
        $this->course->course_name = $course->course_name;
    }

    public function updateCourse(): void
    {
        $this->validate();
        Course::find($this->editCourseMode->id)
        ->update([
            'course_name' => $this->course->course_name
        ]);

        $this->editCourseMode = false;

        $this->dispatchBrowserEvent('edit-course-close');
    }
    public function render()
    {
        return view('livewire.admin.forms.edit-course');
    }
}
