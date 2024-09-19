<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentmessage extends Model
{
    use HasFactory;
    protected $fillable = ['firstname' , 'lastname' , 'email' , 'question' , 'message' , 'student_id' , 'instructor_id' , 'show'] ;

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
}
