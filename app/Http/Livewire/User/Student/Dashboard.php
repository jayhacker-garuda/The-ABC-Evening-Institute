<?php

namespace App\Http\Livewire\User\Student;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Livewire\Component;

class Dashboard extends Component
{

    public CourseUser $courseUser;
    public $teacherName;
    public $showMode;


    protected $rules =[
        'courseUser.student_id' => 'required',
        'courseUser.course_id' => 'required',
    ];

    protected $validationAttributes = [
        'courseUser.course_id' => 'Course Name'
    ];

    public function updated($prop)
    {
        $this->validateOnly($prop);
    }

    public function donAddCourse()
    {
        CourseUser::create([
            'student_id' => auth()->user()->id,
            'course_id' => $this->courseUser->course_id
        ]);
        session()->flash('success', 'Your Choice Was Added');
    }

    public function updateTeacher(User $teacher): void
    {
        $this->showMode = $teacher;
        $this->teacherName = $teacher->name;
        $this->dispatchBrowserEvent('data-fetch');
    }

    public function closeHidden(): void
    {
        $this->showMode = false;
        $this->dispatchBrowserEvent('data-close');
    }

    public function mount()
    {
        $this->courseUser = new CourseUser;
    }

    public function render()
    {
        $courses = Course::all('id','course_name');

        $userData = CourseUser::with('student','teacher')
        ->where('student_id', '=', FacadesAuth::user()->id)
        ->get();
        // dd($courseUsers);
        return view('livewire.user.student.dashboard', [
            'courses' => $courses,
            'userData' => $userData
        ]);

   }
}
