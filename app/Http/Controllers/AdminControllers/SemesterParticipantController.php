<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use App\Models\SemesterCourseParticipant;
use Illuminate\Http\Request;

class SemesterParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Semester $semester) {
        $participated_students = $semester->participated_students;

        return view('admin_panel.semesters_participants.index', compact('semester', 'participated_students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SemesterCourseParticipant $semesterCourseParticipant) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SemesterCourseParticipant $semesterCourseParticipant) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SemesterCourseParticipant $semesterCourseParticipant) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SemesterCourseParticipant $semesterCourseParticipant) {
        //
    }
}
