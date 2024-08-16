<?php

namespace App\Http\Controllers\StudentControllers;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use App\Models\SemesterCourseParticipant;
use App\Models\Student;
use App\Models\StudentRegisteredSemester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseRegistrationController extends Controller
{
    public function registered_courses() {
        $student = Student::find(Auth::user()->id);

        $registered_semesters = $student->registered_semesters()->get();

        return view('student_panel.course_registration.registered_courses', compact('registered_semesters'));
    }

    public function new_registration() {
        $student = Auth::user();

        $semesters = Semester::query()
            ->where('department_id', $student->department_id)
            ->with(['semester_courses.course', 'semester_courses.teacher'])
            ->orderBy('name', "asc")
            ->get();

        return view('student_panel.course_registration.new_registration', compact('semesters'));
    }

    public function new_registration_store(Semester $semester) {
        $student = Auth::user();

        StudentRegisteredSemester::create([
            'semester_id' => $semester->id,
            'student_id' => $student->id
        ]);

        foreach($semester->semester_courses as $semester_course) {
            SemesterCourseParticipant::create([
                'semester_course_id' => $semester_course->id,
                'student_id' => $student->id
            ]);
        }

        return redirect()->to('student-panel/dashboard/registered-courses')
            ->with('success', "Course Registered Successfully!!!");
    }
}
