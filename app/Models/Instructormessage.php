<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructormessage extends Model
{
    use HasFactory;
    protected $fillable = ['firstname' , 'lastname' , 'email' , 'question' , 'message' , 'instructor_id'] ;

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
}
