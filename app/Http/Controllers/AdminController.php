<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Course;
use App\Models\Student;
use App\Models\Instructor;
use App\Models\Studentmessage;
use App\Models\Instructormessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    // ##################### Login #####################

    /**
     * Admin login with email and password validation
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if ($admin && $admin->password === $request->password) {
            return to_route('adminswelcome-page');
        }

        // Return error if credentials are invalid
        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ]);
    }

    /**
     * Password update with complex validation
     */
    public function editPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#+-])[A-Za-z\d@$!%*?&#+-]{8,}$/',
            ],
        ]);

        $admin = Admin::where('email', $request->email)->firstOrFail();
        $admin->password = $request->password;
        $admin->save();

        return to_route('admins-pages')->with('success', 'Password updated successfully!');
    }

    // ##################### Instructor Messages #####################

    /**
     * Display instructor messages with their associated courses
     */
    public function showInstructorMessages()
    {
        // Retrieve messages and include associated course via instructor relationship
        $messages = InstructorMessage::with(['instructor.course'])->get();

        $formattedMessages = $messages->map(function ($message) {
            return [
                'message_id' => $message->id,
                'firstname' => $message->firstname,
                'lastname' => $message->lastname,
                'email' => $message->email,
                'question' => $message->question,
                'message' => $message->message,
                'course_name' => $message->instructor->course->name ?? 'No course assigned',
            ];
        });

        return view('admin.instructormessages', compact('formattedMessages'));
    }

    /**
     * Delete an instructor message by ID
     */
    public function destroyInstructorMessages($id)
    {
        $instructormessage = Instructormessage::findOrFail($id);
        $instructormessage->delete();

        return to_route('adminsInstructorMessages-page');
    }

    // ##################### Student Messages #####################

    /**
     * Display student messages marked as 'no' for 'show' status with associated instructor and course details
     */
    public function showStudentMessages()
    {
        $messages = StudentMessage::with(['student', 'instructor.course'])
            ->where('show', 'no')
            ->get();

        $formattedMessages = $messages->map(function ($message) {
            $courseName = $message->instructor->course->name ?? 'For Web Page';
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
                'course_name' => $courseName,
            ];
        });

        return view('admin.studentmessages', compact('formattedMessages'));
    }

    /**
     * Delete a student message by ID
     */
    public function destroyStudentMessages($id)
    {
        $studentmessage = Studentmessage::findOrFail($id);
        $studentmessage->delete();

        return to_route('adminsStudentMessages-page');
    }

    /**
     * Update the 'show' status of a student message to 'yes'
     */
    public function updateMessageShowStatus($id)
    {
        $message = StudentMessage::find($id);
        $message->show = 'yes';
        $message->save();

        return to_route('adminsStudentMessages-page');
    }

    // ##################### Course Management #####################

    /**
     * Display all courses with associated instructors
     */
    public function showCourses()
    {
        $courses = Course::with('instructor')->get();

        return view('admin.courses', compact('courses'));
    }

    /**
     * Delete a course by ID
     */
    public function destroyCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return to_route('adminscourses-page');
    }

    /**
     * Show edit form for a specific course
     */
    public function editCourse($id)
    {
        $course = Course::findOrFail($id);
        $instructors = Instructor::with('course')->get();

        return view('admin.edit', compact('course', 'instructors'));
    }

    /**
     * Update course data
     */
    public function updateCourse(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $updatedData = request()->all();
        $course->update($updatedData);

        return to_route('adminscourses-page');
    }

    /**
     * Show form to create a new course with unassigned instructors
     */
    public function createCourse()
    {
        $instructors = DB::table('instructors')
            ->leftJoin('courses', 'instructors.id', '=', 'courses.instructor_id')
            ->whereNull('courses.instructor_id')
            ->select('instructors.*')
            ->get();

        return view('admin.create', compact('instructors'));
    }

    /**
     * Store a new course in the database
     */
    public function storeCourse(Request $request)
    {
        // Validate and store the course if unique
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url|unique:courses,link',
            'description' => 'string|min:15',
            'instructor_id' => 'nullable|exists:instructors,id',
        ]);

        $existingCourse = Course::where('name', $request->input('name'))->first();
        if ($existingCourse) {
            return redirect()->back()->withErrors(['name' => 'A course with this name already exists.'])->withInput();
        }

        Course::create($validatedData);

        return to_route('adminscourses-page');
    }

    // ##################### Student Management #####################

    /**
     * Display all students
     */
    public function showStudents()
    {
        $students = DB::table('students')->get();

        return view('admin.students', compact('students'));
    }

    /**
     * Delete a student by ID
     */
    public function destroyStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return to_route('adminsstudents-page');
    }

    // ##################### Instructor Management #####################

    /**
     * Display all instructors with their assigned courses
     */
    public function showInstructor()
    {
        $instructors = Instructor::with('course')->get();

        return view('admin.instructors', compact('instructors'));
    }

    /**
     * Delete an instructor by ID
     */
    public function destroyInstructor($id)
    {
        $instructor = Instructor::findOrFail($id);
        $instructor->delete();

        return to_route('adminsinstructor-page');
    }

    /**
     * Show edit form for a specific instructor
     */
    public function editInstructor($id)
    {
        $instructor = Instructor::findOrFail($id);
        $courses = Course::whereNull('instructor_id')->get();

        return view('admin.editinstructor', compact('instructor', 'courses'));
    }

    /**
     * Update instructor information and their course assignments
     */
    public function updateInstructor(Request $request, $id)
    {
        $instructor = Instructor::findOrFail($id);
        $updatedData = request()->all();
        $instructor->update($updatedData);

        $course = Course::findOrFail($request->input('course_id'));
        $course->update(['instructor_id' => $instructor->id]);

        Course::where('instructor_id', $instructor->id)
            ->where('id', '!=', $course->id)
            ->update(['instructor_id' => null]);

        return to_route('adminsinstructor-page');
    }

    /**
     * Show form to create a new instructor
     */
    public function createInstructor()
    {
        $courses = Course::whereNull('instructor_id')->get();

        return view('admin.createinstructor', compact('courses'));
    }

    /**
     * Store a new instructor in the database
     */
    public function storeInstructor(Request $request) {
        // Validate instructor data, including required name, email (unique), password with complexity rules,
        // optional 11-digit phone number, gender limited to male/female, and optional course assignment.
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:instructors,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#+-])[A-Za-z\d@$!%*?&#+-]{8,}$/',
            ], // Password must be at least 8 characters, with 1 uppercase, 1 number, and 1 special character
            'phonenumber' => 'nullable|digits:11', // Ensure phone number is exactly 11 digits if provided
            'gender' => 'required|in:male,female',
            'course_id' => 'nullable|exists:courses,id',
        ], [
            // Custom message for the password validation
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must be contain at least one uppercase letter, one lowercase letter, one number, and one special character (e.g., @$!%*?&#+-).',
        ]);

        // Create the instructor with the validated data
        $instructor = Instructor::create($validatedData);

        // If a course ID is provided, assign the course to the instructor
        if ($request->filled('course_id')) {
            $course = Course::findOrFail($request->input('course_id'));
            $course->update(['instructor_id' => $instructor->id]);

            // If the instructor had other courses, remove the instructor ID from those courses
            Course::where('instructor_id', $instructor->id)
                ->where('id', '!=', $course->id)
                ->update(['instructor_id' => null]);
        }

        // Redirect to the instructor management page
        return to_route('adminsinstructor-page');
    }


}
