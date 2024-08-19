<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\SemesterCourse;
use App\Models\SemesterCourseClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassRoomController extends Controller
{
    public function index() {
        $teacher = Auth::user();

        $semester_courses = SemesterCourse::query()
            ->with([
                'semester', 'course'
            ])
            ->where('teacher_id', $teacher->id)
            ->get();

        return view('admin_panel.classroom.index', compact('semester_courses'));
    }

    public function show(SemesterCourse $semester_course) {
        return view('admin_panel.classroom.show', compact('semester_course'));
    }

    public function make_class(Request $request, SemesterCourse $semester_course) {
        $request->validate([
            'description' => ['required', 'string']
        ]);

        SemesterCourseClass::create([
            'semester_course_id' => $semester_course->id,
            'description' => $request->description
        ]);

        return back()
            ->with('success', 'Created Successfully.');
    }
}
