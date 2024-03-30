<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $students = Student::query()
            ->latest()
            ->get();

        return view('admin_panel.students.index', compact('students'));
    }

    private function data(Student $student) {
        $departments = Department::query()
            ->where('status', "active")
            ->orderBy('name', "asc")
            ->get();

        return [
            'student' => $student,
            'departments' => $departments,
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin_panel.students.create', $this->data(new Student()));
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
    public function show(Student $student) {
        return view('admin_panel.students.show', $this->data($student));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student) {
        return view('admin_panel.students.edit', $this->data($student));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student) {
        //
    }
}
