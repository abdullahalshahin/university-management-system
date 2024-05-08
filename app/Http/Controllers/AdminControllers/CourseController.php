<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $courses = Course::query()
            ->latest()
            ->get();

        return view('admin_panel.courses.index', compact('courses'));
    }

    private function data(Course $course) {
        return [
            'course' => $course
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin_panel.courses.create', $this->data(new Course()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'code' => ['required', 'string', 'max:255', 'unique:courses'],
            'name' => ['required', 'string', 'max:255'],
            'credits' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'pdf_file' => ['nullable'],
            'input_status' => ['required', 'string', 'max:255']
        ]);

        if ($pdf_file = $request->file('pdf_file')) {
            $destination_path = 'files/courses/';
            $pdf_file_name = date('YmdHis') . "." . $pdf_file->getClientOriginalExtension();
            $pdf_file->move($destination_path, $pdf_file_name);
            $pdf_file_name = "$pdf_file_name";
        }
        else {
            $pdf_file_name = null;
        }

        Course::create([
            'code' => $request->code,
            'name' => $request->name,
            'credits' => $request->credits,
            'description' => $request->description,
            'pdf_file' => $pdf_file_name,
            'status' => $request->input_status,
        ]);

        return redirect()->to('admin-panel/dashboard/courses')
            ->with('success', 'Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course) {
        return view('admin_panel.courses.show', $this->data($course));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course) {
        return view('admin_panel.courses.edit', $this->data($course));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course) {
        $request->validate([
            'code' => ['required', 'string', 'max:255', 'unique:courses,code,'.$course->id],
            'name' => ['required', 'string', 'max:255'],
            'credits' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'pdf_file' => ['nullable'],
            'input_status' => ['required', 'string', 'max:255']
        ]);

        if ($pdf_file = $request->file('pdf_file')) {
            if ($course->pdf_file && file_exists('files/courses/' . $course->pdf_file)) {
                unlink('files/courses/' . $course->pdf_file);
            }

            $destination_path = 'files/courses/';
            $pdf_file_name = date('YmdHis') . "." . $pdf_file->getClientOriginalExtension();
            $pdf_file->move($destination_path, $pdf_file_name);
            $pdf_file_name = "$pdf_file_name";
        }
        else {
            $pdf_file_name = null;
        }

        $course->update([
            'code' => $request->code,
            'name' => $request->name,
            'credits' => $request->credits,
            'description' => $request->description,
            'pdf_file' => $pdf_file_name,
            'status' => $request->input_status,
        ]);

        return redirect()->to('admin-panel/dashboard/courses')
            ->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course) {
        $course->delete();

        return redirect()->to('admin-panel/dashboard/courses')
            ->with('success', 'Deleted Successfully.');
    }
}
