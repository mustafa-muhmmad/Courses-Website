<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'link' , 'description'] ;

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_course');
    }

    public function studentmessages()
    {
        return $this->hasMany(Studentmessage::class, 'student_id');
    }

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'student_course', 'student_id', 'course_id')
                    ->join('courses', 'courses.id', '=', 'student_course.course_id')
                    ->join('instructors', 'instructors.id', '=', 'courses.instructor_id')
                    ->select('instructors.*');
    }
}
