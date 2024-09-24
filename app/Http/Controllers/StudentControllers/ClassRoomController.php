<?php

namespace App\Http\Controllers\StudentControllers;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\SemesterCourse;
use App\Models\SemesterCourseParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassRoomController extends Controller
{
    public function index() {
        $student = Auth::user();

        $semester_course_participants = SemesterCourseParticipant::query()
            ->with([
                'semester_course.semester',
                'semester_course.course',
                'semester_course.teacher'
            ])
            ->where('student_id', $student->id)
            ->get();

        return view('student_panel.classroom.index', compact('semester_course_participants'));
    }

    public function show(SemesterCourse $semester_course) {
        return view('student_panel.classroom.show', compact('semester_course'));
    }

    public function notices_list() {
        $notices = Notice::query()
            ->latest()
            ->get();
            
        return view('student_panel.classroom.notices_list', compact('notices'));
    }

    public function notices_show(Notice $notice) {
        return view('student_panel.classroom.notices_show', compact('notice'));
    }
}
