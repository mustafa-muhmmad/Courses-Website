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
    //
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if ($admin && $admin->password === $request->password) {
            return to_route('adminswelcome-page') ;
        } else {
            return response()->json(['error' => 'Invalid credentials.'], 401);
        }
    }

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

        // #####################################################################################################################################

        public function showInstructorMessages()
        {
            $messages = InstructorMessage::with(['instructor.course'])->get();
            $formattedMessages = $messages->map(function($message) {
                return [
                    'message_id' => $message->id,
                    'firstname' => $message->firstname,
                    'lastname' => $message->lastname,
                    'email' => $message->email,
                    'question' => $message->question,
                    'message' => $message->message,
                    'course_name' => $message->instructor->course->name ?? 'No course assigned', // Get course name or default message
                ];
            });
            return view('admin.instructormessages', compact('formattedMessages'));
        }

        public function destroyInstructorMessages($id){
            $instructormessage = Instructormessage::findOrFail($id) ;
            $instructormessage->delete() ;
            return to_route('adminsInstructorMessages-page') ;
        }

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

    public function destroyStudentMessages($id){
        $studentmessage = Studentmessage::findOrFail($id) ;
        $studentmessage->delete() ;
        return to_route('adminsStudentMessages-page') ;
    }

    public function updateMessageShowStatus($id)
    {
        $message = StudentMessage::find($id);
        $message->show = 'yes';
        $message->save();
        return to_route('adminsStudentMessages-page');
    }

        public function showCourses(){
            $courses = Course::with('instructor')->get();
            return view('admin.courses', compact('courses'));
        }


    public function destroyCourse($id){
        $course = Course::findOrFail($id) ;
        $course->delete() ;
        return to_route('adminscourses-page') ;
    }

    public function editCourse($id){
        $course = Course::findOrFail($id) ;
        $instructors = Instructor::with('course')->get();
        return view('admin.edit',compact('course'),compact('instructors')) ;
    }

    public function updateCourse(Request $request,$id){
        $course = Course::findOrFail($id) ;
        $updatedData=request()->all();
        $course->update($updatedData);
        return to_route('adminscourses-page') ;
    }

    public function createCourse(){
        $instructors = DB::table('instructors')->get();
        return view('admin.create',compact('instructors')) ;
    }

    public function storeCourse(Request $request){
        $createdData = request()->all() ;
        $course = Course::create($createdData) ;
        $course->save() ;
        return to_route('adminscourses-page') ;
    }

        // #####################################################################################################################################

    public function showStudents(){
        $students = DB::table('students')->get();
        return view('admin.students', compact('students'));
    }

    public function destroyStudent($id){
        $student = Student::findOrFail($id) ;
        $student->delete() ;
        return to_route('adminsstudents-page') ;
    }

    // #####################################################################################################################################

    public function showInstructor(){
        $instructors = Instructor::with('course')->get();
        return view('admin.instructors', compact('instructors'));
    }

    public function destroyInstructor($id){
        $instructor = Instructor::findOrFail($id) ;
        $instructor->delete() ;
        return to_route('adminsinstructor-page') ;
    }

    public function editInstructor($id)
    {
        $instructor = Instructor::findOrFail($id);
        $courses = Course::whereNull('instructor_id')->get();
        return view('admin.editinstructor', compact('instructor', 'courses'));
    }

    public function updateInstructor(Request $request,$id){
        $instructor = Instructor::findOrFail($id) ;
        $updatedData=request()->all();
        $instructor->update($updatedData);
        // $instructor = DB::table('instructors')->get();
        $course = Course::findOrFail($request->input('course_id'));
        $course->update(['instructor_id' => $instructor->id]);
        Course::where('instructor_id', $instructor->id)->where('id', '!=', $course->id)->update(['instructor_id' => null]);
        return to_route('adminsinstructor-page') ;
    }

    public function createInstructor(){
        $courses = Course::whereNull('instructor_id')->get();
        return view('admin.createinstructor',compact('courses')) ;
    }

    public function storeInstructor(Request $request){
        $createdData = request()->all() ;
        $instructor = Instructor::create($createdData) ;
        $instructor->save() ;
        $course = Course::findOrFail($request->input('course_id'));
        $course->update(['instructor_id' => $instructor->id]);
        Course::where('instructor_id', $instructor->id)->where('id', '!=', $course->id)->update(['instructor_id' => null]);
        return to_route('adminsinstructor-page') ;
    }
}
