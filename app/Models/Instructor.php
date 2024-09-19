<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'email' , 'password' , 'phonenumber' , 'gender'] ;

    public function course()
    {
        return $this->hasOne(Course::class, 'instructor_id');
    }

    public function instructormessages()
    {
        return $this->hasMany(Instructormessage::class, 'instructor_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_course', 'course_id', 'student_id')
                    ->join('courses', 'courses.id', '=', 'student_course.course_id')
                    ->where('courses.instructor_id', '=', $this->id) 
                    ->select('students.*');
    }

    public function studentMessages()
    {
        return $this->hasMany(StudentMessage::class, 'instructor_id');
    }
}
