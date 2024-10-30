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
    // Login function for instructor authentication
    public function login(Request $request)
    {
        // Retrieve email and password from the request
        $email = $request->input('email');
        $password = $request->input('password');

        // Find the instructor by email
        $instructor = Instructor::where('email', $email)->first();

        // Verify if the instructor exists and the password is correct
        if ($instructor && $instructor->password === $password) {
            // Store instructor ID and email in session
            Session::put('instructor_id', $instructor->id);
            Session::put('instructor_email', $instructor->email);

            // Redirect to the instructor's welcome page
            return to_route('instructorswelcome-page');
        }

        // If authentication fails, return to login with an error message
        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ]);
    }

    // Update instructor password with validation
    public function editPassword(Request $request)
    {
        // Validate request fields for password update
        $request->validate([
            'email' => 'required|email|exists:instructors,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#+-])[A-Za-z\d@$!%*?&#+-]{8,}$/',
            ],
        ], [
            // Custom message for the password validation
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must be contain at least one uppercase letter, one lowercase letter, one number, and one special character (e.g., @$!%*?&#+-).',
        ]);

        // Find instructor by email and update password
        $instructor = Instructor::where('email', $request->email)->firstOrFail();
        $instructor->password = $request->password;
        $instructor->save();

        // Redirect back with success message
        return to_route('instructor-pages')->with('success', 'Password updated successfully!');
    }

    // Log out the instructor and clear session data
    public function logout()
    {
        Session::flush();
        return to_route('home-page');
    }

    // Show all students enrolled in the course assigned to the instructor
    public function showStudentsInCourse()
    {
        $instructorId = Session::get('instructor_id');

        // Find course by instructor ID
        $course = Course::where('instructor_id', $instructorId)->first();

        // Initialize $students as an empty collection
        $students = collect();

        // If no course is found, display an error message
        if (!$course) {
            return view('instructor.students')->with('error', 'You are not assigned to any course.')
                                                ->with('students', $students);
        }

        // Get students enrolled in the course
        $students = $course->students;

        // Pass students to the view
        return view('instructor.students', compact('students'));
    }

    // Delete a specific student by ID
    public function destroyStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return to_route('instructorsstudents-page');
    }

    // Show course information assigned to the instructor
    public function showCourse()
    {
        $instructorId = Session::get('instructor_id');
        $course = Course::where('instructor_id', $instructorId)->first();

        // Return view to display course details
        return view('instructor.course', compact('course'));
    }

    // Edit a specific course by ID
    public function editCourse($id)
    {
        $course = Course::findOrFail($id);
        $instructors = Instructor::with('course')->get();
        return view('instructor.edit', compact('course'));
    }

    // Update course information based on input data
    public function updateCourse(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        // Validate the input data
        $validatedData = $request->validate([
            'link' => 'required|url|unique:courses,link,' . $id,
            'description' => 'required|string|min:15',
        ]);
        // Update the course with validated data
        $course->update($validatedData);
        return to_route('instructorscourse-page');
    }


    // Send a message to the admin from the instructor
    public function contactAdmin(Request $request)
    {
        // Validate input fields for the contact message
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            // 'email' => 'required|email',
            'question' => 'required|string',
            'message' => 'required|string',
        ]);
        // Get instructor ID and email from session
        $instructorId = $request->session()->get('instructor_id');
        $instructorEmail = $request->session()->get('instructor_email');
        // Create a new instructor message record
        Instructormessage::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $instructorEmail,
            'question' => $request->input('question'),
            'message' => $request->input('message'),
            'instructor_id' => $instructorId,
        ]);
        // Redirect to the contact view
        return view('instructor.contact');
    }

    // Show student messages related to the instructor
    public function showStudentMessages()
    {
        $instructorId = Session::get('instructor_id');

        // Retrieve student messages for the instructor
        $messages = StudentMessage::with('student')
            ->where('show', 'yes')
            ->where('instructor_id', $instructorId)
            ->get();

        // Format messages with student details
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

    // Delete a student message by ID
    public function destroyStudentMessages($id)
    {
        $studentmessage = Studentmessage::findOrFail($id);
        $studentmessage->delete();
        return to_route('instructorsStudentMessages-page');
    }
}
