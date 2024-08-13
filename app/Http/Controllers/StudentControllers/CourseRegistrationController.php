<?php

namespace App\Http\Controllers\StudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseRegistrationController extends Controller
{
    public function registered_courses() {
        $student = Auth::user();

        $registeredCourses = $student->semesterCourses()->with('course', 'semester')->get();


        return view('student_panel.course_registration.registered_courses');
    }

    public function new_registration() {
        
    }

    public function new_registration_store() {
        
    }
}
