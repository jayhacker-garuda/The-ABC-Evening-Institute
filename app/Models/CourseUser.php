<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Assign;

class CourseUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
    ];


    public function student()
    {
        return $this->belongsTo(User::class, 'student_id','id', );
    }
    public function course()
    {
        return $this->belongsTo(Course::class,  'course_id','id');
    }

    public function teacher()
    {
        return $this->hasManyThrough(AssignTeacher::class,Course::class,'id','course_id', 'course_id');
    }
}