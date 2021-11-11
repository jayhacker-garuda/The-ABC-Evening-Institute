<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public Course $course;
    public User $teacher;
    public User $student;
    public $editCourseMode;
    public $editTeacherMode;
    public $editStudentMode;

    protected $rules = [
        'course.course_name' => 'required',
        'teacher.name' => 'required',
        'teacher.email' => 'required',
        'teacher.user_type' => 'required',
        'student.name' => 'required',
        'student.email' => 'required',
        'student.user_type' => 'required',
    ];

    public function editCourse(Course $course)
    {
        $this->editCourseMode = $course;
        $this->dispatchBrowserEvent('edit-course-open');
        $this->course->course_name = $course->course_name;
    }

    public function updateCourse(): void
    {
        // $this->validate();
        Course::find($this->editCourseMode->id)
        ->update([
            'course_name' => $this->course->course_name
        ]);

        $this->editCourseMode = false;

        $this->dispatchBrowserEvent('edit-course-close');
    }

    public function deleteCourse(Course $course)
    {
        // dd($course);
        $course->delete();

    }
    public function editTeacher(User $teacher)
    {
        // dd($teacher);
        $this->editTeacherMode = $teacher;
        $this->dispatchBrowserEvent('teacher-open-modal');
        $this->teacher->name = $teacher->name;
        $this->teacher->email = $teacher->email;
        $this->teacher->user_type = $teacher->user_type;
    }

    public function updateTeacher(): void
    {
        // $this->validate();
        User::find($this->editTeacherMode->id)
        ->update([
            'name' => $this->teacher->name,
            'email' => $this->teacher->email,
            'user_type' => $this->teacher->user_type
        ]);

        $this->editTeacherMode = false;

        $this->dispatchBrowserEvent('teacher-close-modal');
    }

    public function deleteTeacher(User $teacher)
    {
        // dd($teacher);
        $teacher->delete();

    }

    public function editStudent(User $student)
    {
        // dd($student);
        $this->editStudentMode = $student;
        $this->dispatchBrowserEvent('edit-student-open');
        $this->student->name = $student->name;
        $this->student->email = $student->email;
        $this->student->user_type = $student->user_type;
    }
    public function updateStudent(): void
    {
        // $this->validate();
        User::find($this->editStudentMode->id)
        ->update([
            'name' => $this->student->name,
            'email' => $this->student->email,
            'user_type' => $this->student->user_type
        ]);

        $this->editStudentMode = false;

        $this->dispatchBrowserEvent('edit-student-close');
    }

    public function deleteStudent(User $student)
    {
        // dd($student);
        $student->delete();
    }

    public function mount(): void
    {
        $this->course = new Course;
        $this->teacher = new User;
        $this->student = new User;
    }

    public function render()
    {
        $teachers = User::where('user_type', '=','teacher')->paginate(5);
        $students = User::where('user_type', '=', 'student')->paginate(5);
        $courses = Course::paginate(5);


        return view('livewire.admin.dashboard',[
            'teachers' => $teachers,
            'students' => $students,
            'courses' => $courses
        ]);
    }
}
