<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Semester;
use App\Models\SemesterCourse;
use App\Models\User;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $semesters = Semester::query()
            ->with([
                'students'
            ])
            ->latest()
            ->get();

        return view('admin_panel.semesters.index', compact('semesters'));
    }

    private function data(Semester $semester) {
        $courses = Course::query()
            ->orderBy('name', "asc")
            ->get();

        $teachers = User::query()
            ->where('id', '!=', 1)
            ->orderBy('name', "asc")
            ->get();

        return [
            'semester' => $semester,
            'courses' => $courses,
            'teachers' => $teachers
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin_panel.semesters.create', $this->data(new Semester()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'open_date' => ['required', 'string', 'max:255'],
            'closed_date' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'input_status' => ['required', 'string', 'max:255']
        ]);

        Semester::create([
            'name' => $request->name,
            'open_date' => $request->open_date,
            'closed_date' => $request->closed_date,
            'description' => $request->description,
            'status' => $request->input_status
        ]);

        return redirect()->to('admin-panel/dashboard/semesters')
            ->with('success', 'Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester) {
        return view('admin_panel.semesters.show', $this->data($semester));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester) {
        return view('admin_panel.semesters.edit', $this->data($semester));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semester $semester) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'open_date' => ['required', 'string', 'max:255'],
            'closed_date' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'input_status' => ['required', 'string', 'max:255']
        ]);

        $semester->update([
            'name' => $request->name,
            'open_date' => $request->open_date,
            'closed_date' => $request->closed_date,
            'description' => $request->description,
            'status' => $request->input_status
        ]);

        return redirect()->to('admin-panel/dashboard/semesters')
            ->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester) {
        $semester->delete();

        return redirect()->to('admin-panel/dashboard/semesters')
            ->with('success', 'Deleted Successfully.');
    }

    public function semester_cours_assign(Request $request, Semester $semester) {
        $request->validate([
            'course_id' => ['required', 'numeric'],
            'teacher_id' => ['required', 'numeric'],
            'description' => ['nullable', 'string']
        ]);

        SemesterCourse::create([
            'semester_id' => $semester->id,
            'course_id' => $request->course_id,
            'teacher_id' => $request->teacher_id,
            'description' => $request->description
        ]);

        return redirect()->to('admin-panel/dashboard/semesters/'. $semester->id .'/')
            ->with('success', 'Created Successfully.');
    }

    public function assigned_cours_assign(SemesterCourse $semester_course) {
        return response([
            'success' => true,
            'message' => "Data Show Successfully",
            'semester_course' => $semester_course
        ], 200);
    }

    public function assigned_cours_assign_update(Request $request, SemesterCourse $semester_course) {
        $request->validate([
            'edit_course_id' => ['required', 'numeric'],
            'edit_teacher_id' => ['required', 'numeric'],
            'edit_description' => ['nullable', 'string']
        ]);

        $semester_course->update([
            'course_id' => $request->edit_course_id,
            'teacher_id' => $request->edit_teacher_id,
            'description' => $request->edit_description
        ]);

        return back()
            ->with('success', 'Updated Successfully.');
    }

    public function unassign_semester_course(SemesterCourse $semester_course) {
        $semester_course->delete();
        
        return redirect()->to('admin-panel/dashboard/semesters/'. $semester_course->semester->id .'/')
            ->with('success', 'Deleted Successfully.');
    }
}
