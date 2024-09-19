<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
})->name('home-page');
Route::get('/instructors', function () {
    return view('instructors');
})->name('instructor-page');
// Route::get('/courses', function () {
    //     return view('courses');
    // })->name('courses-page');
    Route::get('/single-course', function () {
        return view('singlecourse');
    })->name('singlecourse-page');
    Route::get('/help', function () {
        return view('help');
    })->name('help-page');
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact-page');
    Route::get('/login', function () {
        return view('login');
    })->name('login-page');
    Route::get('/edit', function () {
        return view('edit');
    })->name('edit-page');
    Route::get('/register', function () {
        return view('register');
    })->name('register-page');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses-page');


    // ########################################################################################################################################


    Route::get('/admin', function () {return view('admin.login');})->name('admins-pages');

    Route::post('/admin/login', [AdminController::class,'login'])->name('admins.login');

    Route::get('/admin/welcome', function () {return view('admin.welcome');})->name('adminswelcome-page');
    // Route::get('/admin/instructors', function () {return view('admin.instructors');})->name('adminsinstructor-page');
    // Route::get('/admin/courses', function () {return view('admin.courses');})->name('adminscourses-page');
    // Route::get('/admin/courses', [CourseController::class, 'index'])->name('courses-page');
    Route::get('/admin/courses', [AdminController::class, 'showCourses'])->name('adminscourses-page');
    Route::get('/admin/instructorsmessages', [AdminController::class, 'showInstructorMessages'])->name('adminsInstructorMessages-page');
    Route::delete('/admin/instructorsmessages/{id}', [AdminController::class,'destroyInstructorMessages'])->name('adminDestroyInstructorMessages.destroy') ;
    // $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

    Route::get('/admin/studentsmessages', [AdminController::class, 'showStudentMessages'])->name('adminsStudentMessages-page');
    Route::delete('/admin/studentsmessages/{id}', [AdminController::class,'destroyStudentMessages'])->name('adminDestroyStudentMessages.destroy') ;
    Route::post('/admin/studentmessages/{id}/show', [AdminController::class, 'updateMessageShowStatus'])->name('updateMessageShowStatus');

    // $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

    // Route::get('/admin/students', function () {return view('admin.students');})->name('adminsstudents-page');
    Route::delete('/admin/courses/{id}', [AdminController::class,'destroyCourse'])->name('adminDestroyCourses.destroy') ;
    Route::get('/admin/courses/{id}/edit', [AdminController::class,'editCourse'])->name('adminEditCourses.edit') ;
    Route::put('/admin/courses/{id}', [AdminController::class,'updateCourse'])->name('adminUpdateCourses.update') ;
    Route::get('/admin/courses/create', [AdminController::class,'createCourse'])->name('adminCreateCourses.create') ;
    Route::post('/admin/courses/store', [AdminController::class,'storeCourse'])->name('adminStoreCourses.store') ;

    Route::get('/admin/edit', function () {
        return view('admin.editPassword');
    })->name('adminEditPassword-page');
    Route::put('/admin/update', [AdminController::class, 'editPassword'])->name('adminEditPassword.edit');

    Route::get('/admin/students', [AdminController::class,'showStudents'])->name('adminsstudents-page');
    Route::delete('/admin/students/{id}', [AdminController::class,'destroyStudent'])->name('adminDestroyStudents.destroy') ;

    Route::get('/admin/instructors', [AdminController::class, 'showInstructor'])->name('adminsinstructor-page');
    Route::delete('/admin/instructors/{id}', [AdminController::class,'destroyInstructor'])->name('adminDestroyInstructor.destroy') ;
    Route::get('/admin/instructors/{id}/edit', [AdminController::class,'editInstructor'])->name('adminEditInstructor.edit') ;
    Route::put('/admin/instructors/{id}', [AdminController::class,'updateInstructor'])->name('adminUpdateInstructor.update') ;
    Route::get('/admin/instructors/create', [AdminController::class,'createInstructor'])->name('adminCreateInstructor.create') ;
    Route::post('/admin/instructors/store', [AdminController::class,'storeInstructor'])->name('adminStoreInstructor.store') ;

    // ########################################################################################################################################


    // Route::get('/instructor/login', function () {
        //     return view('instructor.login');
        // })->name('instructorslogin-page');

        Route::get('/instructor', function () {return view('instructor.login');})->name('instructor-pages');

        Route::POST('/instructor/login', [InstructorController::class, 'login'])->name('instructors.login');
        Route::get('/instructor/welcome', function () {return view('instructor.welcome');})->name('instructorswelcome-page');
        // Route::get('/instructor/students', function () {return view('instructor.students');})->name('instructorsstudents-page');
        // Route::get('/instructor/course', function () {return view('instructor.course');})->name('instructorscourse-page');
        // Route::get('/instructor/messages', function () {return view('instructor.stdMessages');})->name('instructorsmessages-page');

        Route::get('/instructor/studentsmessages', [InstructorController::class, 'showStudentMessages'])->name('instructorsStudentMessages-page');
        Route::delete('/instructor/studentsmessages/{id}', [InstructorController::class,'destroyStudentMessages'])->name('instructorDestroyStudentMessages.destroy') ;

        Route::get('/instructor/contact', function () {return view('instructor.contact');})->name('instructorscontact-page');
        Route::get('/instructor/logout', [InstructorController::class,'logout'])->name('instructorslogout-page');

        Route::get('/instructor/edit', function () {
            return view('instructor.editPassword');
        })->name('instructorEditPassword-page');
        Route::put('/instructor/update', [InstructorController::class, 'editPassword'])->name('instructorEditPassword.edit');


        Route::get('/instructor/students', [InstructorController::class, 'showStudentsInCourse'])->name('instructorsstudents-page');
        Route::delete('/instructor/students/{id}', [InstructorController::class,'destroyStudent'])->name('instructorDestroyStudents.destroy') ;
        Route::get('/instructor/course', [InstructorController::class,'showCourse'])->name('instructorscourse-page');
        Route::get('/instructor/course/{id}/edit', [InstructorController::class,'editCourse'])->name('instructorEditCourses.edit') ;
        Route::put('/instructor/course/{id}', [InstructorController::class,'updateCourse'])->name('instructorUpdateCourses.update') ;
        Route::post('/instructor/contact', [InstructorController::class,'contactAdmin'])->name('instructorContactAdmin.contact') ;




        // ########################################################################################################################################


        Route::get('/student', function () {return view('student.login');})->name('student-pages');

        Route::POST('/student/login', [StudentController::class, 'login'])->name('students.login');
        Route::get('/student/welcome', function () {return view('student.welcome');})->name('studentswelcome-page');
        Route::get('/student/courses', [StudentController::class, 'showCourses'])->name('studentscourses-page');
        Route::post('/student/enroll/{courseId}', [StudentController::class, 'enroll'])->name('studentEnrollCourses.enroll');
        Route::delete('/student/courses/{id}', [StudentController::class,'deleteEnrolledCourse'])->name('studentDeleteCourses.destroy') ;
        Route::get('/student/instructors', [StudentController::class,'showInstructors'])->name('studentShowInstructors.show') ;
        Route::get('/student/help', function () {return view('student.help');})->name('studentHelp-page');

        Route::get('/student/register', function () {
            return view('student.register');
        })->name('studentregister-page');
        Route::post('/student/store', [StudentController::class,'studentRegister'])->name('studentRegister.register');

        Route::get('/student/edit', function () {
            return view('student.editPassword');
        })->name('studentEditPassword-page');
        Route::put('/student/update', [StudentController::class, 'editPassword'])->name('studentEditPassword.edit');

        Route::get('/student/contact', function () {
            $courses = DB::table('courses')->get();
            return view('student.contact',compact('courses'));
        })->name('studentcontact-page');

        Route::post('/student/contact', [StudentController::class,'contactAdmin'])->name('studentContactAdmin.contact') ;




        Route::get('/student/logout', [StudentController::class,'logout'])->name('studentsslogout-page');


