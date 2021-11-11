<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignTeacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'course_id',
        'date',
        'time_from',
        'time_to'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id', 'id');
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id', 'id');
    }

    public function courseUser()
    {
        return $this->belongsTo(CourseUser::class);
    }
}
