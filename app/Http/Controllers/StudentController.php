<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Studentmessage;

class StudentController extends Controller
{
    //

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $student = Student::where('email', $email)->first();
        if ($student && $student->password === $password) {
            Session::put('student_id', $student->id);
            Session::put('student_email', $student->email);
            return to_route('studentswelcome-page');
        }
        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ]);
    }

    public function editPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:students,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#+-])[A-Za-z\d@$!%*?&#+-]{8,}$/',
            ],
        ]);
        $student = Student::where('email', $request->email)->firstOrFail();
        $student->password = $request->password;
        $student->save();
        return to_route('student-pages')->with('success', 'Password updated successfully!');
    }

    public function studentRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z]{2,6}$/', 'unique:students,email'],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#+-])[A-Za-z\d@$!%*?&#+-]{8,}$/',
            ],
            'address' => 'nullable|string|max:255',
            'gender' => 'required|in:male,female',
            'phonenumber' => ['nullable', 'regex:/^[0-9]{11}$/'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = $request->password;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->phonenumber = $request->phonenumber;
        $student->save();
        return to_route('student-pages');
    }

    public function showCourses()
    {
        $studentId = Session::get('student_id');
        $courses = DB::table('courses')
            ->leftJoin('student_course', function ($join) use ($studentId) {
                $join->on('courses.id', '=', 'student_course.course_id')
                    ->where('student_course.student_id', '=', $studentId);
            })
            ->join('instructors', 'courses.instructor_id', '=', 'instructors.id')
            ->whereNull('student_course.course_id')
            ->select('courses.*', 'instructors.name as instructor_name')
            ->get();
        $enrolledCourses = DB::table('student_course')
            ->join('courses', 'student_course.course_id', '=', 'courses.id')
            ->join('instructors', 'courses.instructor_id', '=', 'instructors.id')
            ->where('student_course.student_id', $studentId)
            ->select('courses.*', 'instructors.name as instructor_name')
            ->get();
        return view('student.courses', [
            'courses' => $courses,
            'myCourses' => $enrolledCourses,
        ]);
    }

    public function enroll($courseId)
    {
        $studentId = Session::get('student_id');
        $student = Student::findOrFail($studentId);
        $student->courses()->syncWithoutDetaching($courseId);
        return to_route('studentscourses-page');
    }

    public function deleteEnrolledCourse($courseId)
    {
        $studentId = Session::get('student_id');
        DB::table('student_course')
            ->where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->delete();
        return to_route('studentscourses-page');
    }

    public function showInstructors(){
        $instructors = Instructor::with('course')->get();
        return view('student.instructors',compact('instructors')) ;
    }

    public function contactAdmin(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'instructor_id' => 'nullable|exists:courses,id',
            'question' => 'required|string',
            'message' => 'required|string',
        ]);
        $studentId = $request->session()->get('student_id');
        $studentEmail = $request->session()->get('student_email');
        $instructorId = null;
        if ($request->filled('instructor_id')) {
            $course = Course::find($request->input('instructor_id'));
            if ($course && $course->instructor) {
                $instructorId = $course->instructor->id;
            }
        }
        Studentmessage::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $studentEmail,
            'question' => $request->input('question'),
            'message' => $request->input('message'),
            'student_id' => $studentId,
            'instructor_id' => $instructorId,
            'show' => "no",
        ]);
        return to_route('studentcontact-page');
    }


    public function logout()
    {
        Session::flush();
        return to_route('home-page');
    }
}
