<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Course;
use App\Models\Student;
use App\Models\Instructormessage;
use App\Models\Studentmessage;

class InstructorController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $instructor = Instructor::where('email', $email)->first();
        if ($instructor && $instructor->password === $password) {
            Session::put('instructor_id', $instructor->id);
            Session::put('instructor_email', $instructor->email);
            return to_route('instructorswelcome-page');
        }
        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ]);
    }

    public function editPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:instructors,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#+-])[A-Za-z\d@$!%*?&#+-]{8,}$/',
            ],
        ]);
        $instructor = Instructor::where('email', $request->email)->firstOrFail();
        $instructor->password = $request->password;
        $instructor->save();
        return to_route('instructor-pages')->with('success', 'Password updated successfully!');
    }

    public function logout()
    {
        Session::flush();
        return to_route('home-page');
    }

    public function showStudentsInCourse()
    {
        $instructorId = Session::get('instructor_id');
        $course = Course::where('instructor_id', $instructorId)->first();
        if (!$course) {
            return view('instructor.students')->with('error', 'You are not assigned to any course.');
        }
        $students = $course->students;
        return view('instructor.students', compact('students'));
    }

    public function destroyStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return to_route('instructorsstudents-page');
    }

    public function showCourse()
    {
        $instructorId = Session::get('instructor_id');
        $course = Course::where('instructor_id', $instructorId)->first();
        // if (!$course) {
        //     return back()->with('error', 'No course is assigned to you.');
        // }
        // Return a view to display the course information
        return view('instructor.course', compact('course'));
    }

    public function editCourse($id){
        $course = Course::findOrFail($id) ;
        $instructors = Instructor::with('course')->get();
        return view('instructor.edit',compact('course')) ;
    }

    public function updateCourse(Request $request,$id){
        $course = Course::findOrFail($id) ;
        $updatedData=request()->all();
        $course->update($updatedData);
        return to_route('instructorscourse-page') ;
    }

    public function contactAdmin(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            // 'email' => 'required|email',
            'question' => 'required|string',
            'message' => 'required|string',
        ]);
        $instructorId = $request->session()->get('instructor_id');
        $instructorEmail = $request->session()->get('instructor_email');
        Instructormessage::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $instructorEmail,
            'question' => $request->input('question'),
            'message' => $request->input('message'),
            'instructor_id' => $instructorId,
        ]);
        return view('instructor.contact');
    }

    public function showStudentMessages()
    {
        $instructorId = Session::get('instructor_id');
        $messages = StudentMessage::with('student')
            ->where('show', 'yes')
            ->where('instructor_id', $instructorId)
            ->get();
        $formattedMessages = $messages->map(function ($message) {
            return [
                'message_id' => $message->id,
                'firstname' => $message->firstname,
                'lastname' => $message->lastname,
                'email' => $message->email,
                'question' => $message->question,
                'message' => $message->message,
                'address' => $message->student->address ?? 'N/A',
                'gender' => $message->student->gender ?? 'N/A',
                'phonenumber' => $message->student->phonenumber ?? 'N/A',
            ];
        });
        return view('instructor.stdMessages', compact('formattedMessages'));
    }

    public function destroyStudentMessages($id){
        $studentmessage = Studentmessage::findOrFail($id) ;
        $studentmessage->delete() ;
        return to_route('instructorsStudentMessages-page') ;
    }
}
