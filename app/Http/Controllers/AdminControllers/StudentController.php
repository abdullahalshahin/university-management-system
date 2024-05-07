<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $students = Student::query()
            ->with([
                'department'
            ])
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
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'gender' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'string', 'max:255'],
            'department_id' => ['required', 'numeric'],
            'mobile_number' => ['required', 'string', 'max:255', 'unique:students'],
            'email' => ['required', 'string', 'max:255', 'unique:students'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'guardian_name' => ['required', 'string', 'max:255'],
            'guardian_mobile' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:10240'],
            'input_status' => ['required', 'string', 'max:255']
        ]);

        if ($profile_image = $request->file('profile_image')) {
            $extension = $profile_image->getClientOriginalExtension();

            if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
                $destination_path = 'images/students/';
                $profile_image_name = date('YmdHis') . "." . $profile_image->getClientOriginalExtension();
                $profile_image->move($destination_path, $profile_image_name);
                $profile_image_name = "$profile_image_name";
            }
            else {
                $profile_image_name = NULL;
            }
        }

        Student::create([
            'department_id' => $request->department_id,
            'registration_number' => $this->get_new_student_registration_number(),
            'full_name' => $request->full_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'security' => $request->password,
            'guardian_name' => $request->guardian_name,
            'guardian_mobile' => $request->guardian_mobile,
            'address' => $request->address,
            'biography' => $request->biography,
            'profile_image' => ($request->file('profile_image')) ? $profile_image_name : NULL,
            'status' => $request->input_status
        ]);

        return redirect()->to('admin-panel/dashboard/students')
            ->with('success', 'Created Successfully.');
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
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'numeric'],
            'mobile_number' => ['required', 'string', 'max:255', 'unique:students,mobile_number,'.$student->id],
            'email' => ['required', 'string', 'max:255', 'unique:students,email,'.$student->id],
            'password' => ['required', 'confirmed'],
            'guardian_name' => ['required', 'string', 'max:255'],
            'guardian_mobile' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:10240'],
            'input_status' => ['required', 'string', 'max:255']
        ]);

        if ($profile_image = $request->file('profile_image')) {
            $extension = $profile_image->getClientOriginalExtension();

            if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
                if ($student->profile_image && file_exists('images/students/' . $student->profile_image)) {
                    unlink('images/students/' . $student->profile_image);
                }

                $destination_path = 'images/students/';
                $profile_image_name = date('YmdHis') . "." . $profile_image->getClientOriginalExtension();
                $profile_image->move($destination_path, $profile_image_name);
                $profile_image_name = "$profile_image_name";
            }
            else {
                $profile_image_name = NULL;
            }
        }

        $student->update([
            'department_id' => $request->department_id,
            // 'registration_number' => $this->get_new_student_registration_number(),
            'full_name' => $request->full_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'security' => $request->password,
            'guardian_name' => $request->guardian_name,
            'guardian_mobile' => $request->guardian_mobile,
            'address' => $request->address,
            'biography' => $request->biography,
            'profile_image' => ($request->file('profile_image')) ? $profile_image_name : $student->profile_image,
            'status' => $request->input_status
        ]);

        return redirect()->to('admin-panel/dashboard/students')
            ->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student) {
        $student->delete();

        return redirect()->to('admin-panel/dashboard/students')
            ->with('success', 'Deleted Successfully.');
    }
}
