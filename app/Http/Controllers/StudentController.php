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
    // Handles student login
    public function login(Request $request)
    {
        // Validate email and password input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Get email and password from the request
        $email = $request->input('email');
        $password = $request->input('password');

        // Find the student by email
        $student = Student::where('email', $email)->first();

        // Check if the student exists and if the password matches (plain-text)
        if ($student && $student->password === $password) {
            // Store student data in the session
            Session::put('student_id', $student->id);
            Session::put('student_email', $student->email); // Store email in session

            // Redirect to the student dashboard or home page
            return to_route('studentswelcome-page');
        }

        // Return back with an error message if login fails
        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ]);
    }

    // Handles password editing and validation for the student
    public function editPassword(Request $request)
    {
        // Validate email and password input
        $request->validate([
            'email' => 'required|email|exists:students,email',
            'password' => [
                'required',
                'string',
                'min:8', // Minimum 8 characters
                'confirmed', // Confirmed with password_confirmation field
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#+-])[A-Za-z\d@$!%*?&#+-]{8,}$/',
            ], // At least 8 characters, including 1 uppercase, 1 number, and 1 special character
        ], [
            // Custom message for the password validation
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must be contain at least one uppercase letter, one lowercase letter, one number, and one special character (e.g., @$!%*?&#+-).',
        ]);

        // Find student by email
        $student = Student::where('email', $request->email)->firstOrFail();

        // Update password (not hashed)
        $student->password = $request->password;
        $student->save();

        // Redirect with success message
        return to_route('student-pages')->with('success', 'Password updated successfully!');
    }

    // Handles student registration with validation
    public function studentRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z]{2,6}$/', // Valid email format
                'unique:students,email'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#+-])[A-Za-z\d@$!%*?&#+-]{8,}$/', // Complex password requirements
            ],
            'address' => 'string|max:255',
            'gender' => 'required|in:male,female', // Must be 'male' or 'female'
            'phonenumber' => ['nullable', 'regex:/^[0-9]{11}$/'], // Exactly 11 digits if provided
        ], [
            // Custom message for the password validation
            'name.min' =>'name must be at least 3 characters' ,
            'email.regex' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must be contain at least one uppercase letter, one lowercase letter, one number, and one special character (e.g., @$!%*?&#+-).',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with input and error messages
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new student record
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = $request->password; // Store plain text password
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->phonenumber = $request->phonenumber;

        $student->save();

        // Redirect to student page
        return to_route('student-pages');
    }

    // Displays courses not yet enrolled and those enrolled by the student
    public function showCourses()
    {
        // Retrieve student ID from session
        $studentId = Session::get('student_id');

        // Get courses the student has NOT enrolled in
        $courses = DB::table('courses')
            ->leftJoin('student_course', function ($join) use ($studentId) {
                $join->on('courses.id', '=', 'student_course.course_id')
                    ->where('student_course.student_id', '=', $studentId);
            })
            ->join('instructors', 'courses.instructor_id', '=', 'instructors.id')
            ->whereNull('student_course.course_id') // Exclude enrolled courses
            ->select('courses.*', 'instructors.name as instructor_name')
            ->get();

        // Get enrolled courses for the student from the pivot table
        $enrolledCourses = DB::table('student_course')
            ->join('courses', 'student_course.course_id', '=', 'courses.id')
            ->join('instructors', 'courses.instructor_id', '=', 'instructors.id')
            ->where('student_course.student_id', $studentId)
            ->select('courses.*', 'instructors.name as instructor_name')
            ->get();

        // Pass both available and enrolled courses to the view
        return view('student.courses', [
            'courses' => $courses,
            'myCourses' => $enrolledCourses,
        ]);
    }

    // Enrolls a student in a specified course
    public function enroll($courseId)
    {
        // Get logged-in student ID from session
        $studentId = Session::get('student_id');

        // Enroll student in the course without detaching previous enrollments
        $student = Student::findOrFail($studentId);
        $student->courses()->syncWithoutDetaching($courseId);

        return to_route('studentscourses-page');
    }

    // Deletes an enrolled course for the student
    public function deleteEnrolledCourse($courseId)
    {
        // Retrieve student ID from session
        $studentId = Session::get('student_id');

        // Delete course enrollment from the pivot table
        DB::table('student_course')
            ->where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->delete();

        // Redirect back to the courses page
        return to_route('studentscourses-page');
    }

    // Displays a list of instructors
    public function showInstructors()
    {
        // Retrieve all instructors along with their associated courses
        $instructors = Instructor::with('course')->get();

        return view('student.instructors', compact('instructors'));
    }

    // Handles contact form submission to the admin
    public function contactAdmin(Request $request)
    {
        // Validate contact form inputs
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'instructor_id' => 'nullable|exists:courses,id', // instructor_id is nullable
            'question' => 'required|string',
            'message' => 'required|string',
        ]);

        // Retrieve student ID and email from session
        $studentId = $request->session()->get('student_id');
        $studentEmail = $request->session()->get('student_email');

        // Determine the instructor ID, if an instructor is selected
        $instructorId = null;
        if ($request->filled('instructor_id')) {
            $course = Course::find($request->input('instructor_id'));
            if ($course && $course->instructor) {
                $instructorId = $course->instructor->id;
            }
        }

        // Create a new message record for the admin
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

        // Redirect to contact page
        return to_route('studentcontact-page');
    }

    // Logs the student out by clearing session data
    public function logout()
    {
        Session::flush(); // Clear all session data
        return to_route('home-page');
    }
}
