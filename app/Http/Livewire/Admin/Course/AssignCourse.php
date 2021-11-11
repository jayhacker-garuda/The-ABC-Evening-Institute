<?php

namespace App\Http\Livewire\Admin\Course;

use App\Models\AssignTeacher;
use App\Models\Course;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AssignCourse extends Component
{
    use WithPagination;
    public AssignTeacher $assign;
    public $editMode;

    protected $rules = [
        'assign.teacher_id' => 'required',
        'assign.course_id' => 'required',
        'assign.date' => 'required',
        'assign.time_from' => 'required',
        'assign.time_to' => 'required',
    ];

    public function updated($prop)
    {
        $this->validateOnly($prop);
    }

    public function donAssign()
    {
        $assignData = $this->validate();
        // dd($assignData);

        AssignTeacher::create($assignData['assign']);
        session()->flash('success', 'data added');
    }

    public function editAssign(AssignTeacher $assign)
    {
        $this->editMode = $assign;
        $this->assign->course_id = $assign->course_id;
        $this->assign->teacher_id = $assign->teacher_id;
        $this->assign->date = $assign->date;
        $this->assign->time_from = $assign->time_from;
        $this->assign->time_to = $assign->time_to;

    }

    public function updateAssign()
    {
        AssignTeacher::find($this->editMode->id)
        ->update([
            'course_id' => $this->assign->course_id,
            'teacher_id' => $this->assign->teacher_id,
            'date' => $this->assign->date,
            'time_from' => $this->assign->time_from,
            'time_to' => $this->assign->time_to,
        ]);

        $this->editMode = false;
        $this->assign->course_id = "";
        $this->assign->teacher_id = "";
        $this->assign->date = "";
        $this->assign->time_from = "";
        $this->assign->time_to = "";
    }
    public function deleteAssign(AssignTeacher $assign)
    {
        // dd($assign);
        $assign->delete();
    }
    public function mount()
    {
        $this->assign = new AssignTeacher;
    }
    public function render()
    {
        $teachers = User::where('user_type', '=', 'teacher')->get(['id','name']);
        $courses = Course::all('id', 'course_name');

        $assignTeachers = AssignTeacher::paginate(5);
        return view('livewire.admin.course.assign-course', [
            'courses' => $courses,
            'teachers' => $teachers,
            'assignTeachers' => $assignTeachers
        ]);
    }
}