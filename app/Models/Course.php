<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name'
    ];

    public function assignTeacher()
    {
        return $this->belongsTo(AssignTeacher::class);
    }

    public function courseUser()
    {
        return $this->belongsTo(CourseUser::class);
    }



}
