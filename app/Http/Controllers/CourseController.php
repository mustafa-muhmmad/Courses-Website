<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{
    //
    public function index()
    {
        $courses = DB::table('courses')->get();
        return view('courses', compact('courses'));
    }
}
